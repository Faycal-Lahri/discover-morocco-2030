<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index(Request $request)
    {
        $query = Commentaire::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('commentaire', 'like', "%{$search}%");
            });
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'name_asc':
                    $query->orderBy('nom', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('nom', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $commentaires = $query->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return view('admin.commentaires.partials.table', compact('commentaires'))->render();
        }

        return view('admin.commentaires.index', compact('commentaires'));
    }

    public function show(Commentaire $commentaire)
    {
        return view('admin.commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        return view('admin.commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'commentaire' => 'required|string',
        ]);

        $commentaire->update($validated);

        return redirect()->route('admin.commentaires.index')
            ->with('success', 'Comment updated successfully.');
    }

    public function destroy(Commentaire $commentaire)
    {
        // Prevent deletion if 7 or fewer comments remain to maintain homepage layout
        if (Commentaire::count() <= 7) {
            return redirect()->route('admin.commentaires.index')
                ->with('error', 'Cannot delete. A minimum of 7 comments is preserved for the homepage design.');
        }

        $commentaire->delete();
        return redirect()->route('admin.commentaires.index')
            ->with('success', 'Comment deleted successfully.');
    }
}
