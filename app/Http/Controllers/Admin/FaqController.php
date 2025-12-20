<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Faq::latest();

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $faqs = $query->paginate(10);
        $categories = Faq::select('category')->distinct()->pluck('category');

        return view('admin.faqs.index', compact('faqs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $faq = Faq::create($validated);

        \App\Models\Activity::create([
            'subject_type' => Faq::class,
            'subject_id' => $faq->id,
            'action' => 'created',
            'description' => 'Created FAQ: ' . \Illuminate\Support\Str::limit($faq->question, 30)
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Handle checkbox logic (if unchecked it's not present in request)
        $validated['is_active'] = $request->has('is_active');

        $faq->update($validated);

        \App\Models\Activity::create([
            'subject_type' => Faq::class,
            'subject_id' => $faq->id,
            'action' => 'updated',
            'description' => 'Updated FAQ: ' . \Illuminate\Support\Str::limit($faq->question, 30)
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $description = 'Deleted FAQ: ' . \Illuminate\Support\Str::limit($faq->question, 30);
        $faq->delete();

        \App\Models\Activity::create([
            'subject_type' => Faq::class,
            'subject_id' => $faq->id,
            'action' => 'deleted',
            'description' => $description
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }
}
