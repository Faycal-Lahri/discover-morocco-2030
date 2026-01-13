<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom_prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('objet', 'like', "%{$search}%");
            });
        }

        // Status Filter
        if ($request->has('status') && $request->status != '') {
            $query->where('statut', $request->status);
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'name_asc':
                    $query->orderBy('nom_prenom', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('nom_prenom', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $contacts = $query->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return view('admin.contacts.partials.table', compact('contacts'))->render();
        }

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'statut' => 'required|in:non_lu,en_cours,traite,non_valide',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.show', $contact)
            ->with('success', 'Contact status updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function sendToWorkflow(Contact $contact)
    {
        $data = [
            'id' => $contact->id,
            'nom_prenom' => $contact->nom_prenom,
            'email' => $contact->email,
            'telephone' => $contact->telephone,
            'objet' => $contact->objet,
            'message' => $contact->message,
            'statut' => $contact->statut,
        ];

        $webhookUrl = config('services.n8n.webhook_url');

        if (!$webhookUrl) {
            return back()->with('error', 'Workflow Webhook URL is not configured (N8N_WORKFLOW_WEBHOOK_URL).');
        }

        try {
            $response = Http::post($webhookUrl, $data);

            if ($response->successful()) {
                return back()->with('success', 'Contact sent to workflow successfully.');
            } else {
                return back()->with('error', 'Failed to send to workflow. Status: ' . $response->status());
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending to workflow: ' . $e->getMessage());
        }
    }
}
