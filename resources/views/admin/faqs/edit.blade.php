@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <a href="{{ route('admin.faqs.index') }}" class="text-stone-500 hover:text-stone-900 mb-2 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider">
                    <i class="fas fa-arrow-left"></i> Back to FAQs
                </a>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight mt-2">Edit FAQ</h2>
            </div>
        </div>

        <div class="glass-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Category / Section</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $faq->category) }}" list="categories" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" required>
                        <datalist id="categories">
                            <option value="General Info">
                            <option value="Visa & Entry">
                            <option value="Transport">
                            <option value="Safety & Health">
                            <option value="Culture & Etiquette">
                            <option value="Money & Costs">
                            <option value="Accommodation">
                        </datalist>
                    </div>

                    <!-- Question -->
                    <div>
                        <label for="question" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Question</label>
                        <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" required>
                    </div>

                    <!-- Answer -->
                    <div>
                        <label for="answer" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Answer</label>
                        <textarea name="answer" id="answer" rows="5" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" required>{{ old('answer', $faq->answer) }}</textarea>
                    </div>

                    <!-- Is Active -->
                    <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }} class="w-5 h-5 text-[#C8102E] rounded focus:ring-[#C8102E] border-gray-300">
                        <label for="is_active" class="text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer select-none">Active (Visible on website)</label>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end gap-4">
                    <a href="{{ route('admin.faqs.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-600 font-bold hover:bg-gray-200 transition-colors">Cancel</a>
                    <button type="submit" class="px-8 py-3 bg-[#C8102E] hover:bg-[#a00c23] text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-red-500/20">
                        Update FAQ
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
