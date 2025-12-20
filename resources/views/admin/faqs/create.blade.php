@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <a href="{{ route('admin.faqs.index') }}" class="text-stone-500 hover:text-stone-900 mb-2 inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider">
                    <i class="fas fa-arrow-left"></i> Back to FAQs
                </a>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight mt-2">Create New FAQ</h2>
            </div>
        </div>

        <div class="glass-card bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl border border-gray-100 dark:border-gray-700">
            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <!-- Category -->
                    <!-- Category (Custom Searchable Dropdown) -->
                    <div x-data="{ 
                        open: false, 
                        search: '',
                        options: ['General Info', 'Visa & Entry', 'Transport', 'Safety & Health', 'Culture & Etiquette', 'Money & Costs', 'Accommodation'],
                        get filteredOptions() {
                            return this.options.filter(i => i.toLowerCase().includes(this.search.toLowerCase()))
                        },
                        selectOption(option) {
                            this.search = option;
                            this.open = false;
                        }
                    }" class="relative">
                        <label for="category" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Category / Section</label>
                        
                        <!-- Input with Chevron -->
                        <div class="relative">
                            <input 
                                type="text" 
                                name="category" 
                                id="category" 
                                x-model="search"
                                @focus="open = true"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" 
                                placeholder="e.g. Safety & Health" 
                                autocomplete="off"
                                required
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
                                <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{'rotate-180': open}"></i>
                            </div>
                        </div>

                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open && filteredOptions.length > 0" 
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute z-50 w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 max-h-60 overflow-y-auto custom-scrollbar"
                            style="display: none;"
                        >
                            <template x-for="option in filteredOptions" :key="option">
                                <div 
                                    @click="selectOption(option)" 
                                    class="px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-200 transition-colors flex items-center justify-between group"
                                >
                                    <span x-text="option"></span>
                                    <i x-show="search === option" class="fas fa-check text-[#C8102E] text-xs"></i>
                                </div>
                            </template>
                        </div>
                        
                        <p class="text-xs text-gray-500 mt-2">Type a new category or select from the list.</p>
                    </div>

                    <!-- Question -->
                    <div>
                        <label for="question" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Question</label>
                        <input type="text" name="question" id="question" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" placeholder="Enter the question here" required>
                    </div>

                    <!-- Answer -->
                    <div>
                        <label for="answer" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wider">Answer</label>
                        <textarea name="answer" id="answer" rows="5" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#C8102E] transition-all" placeholder="Enter the answer here" required></textarea>
                    </div>

                    <!-- Is Active -->
                    <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border border-gray-100">
                        <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-5 h-5 text-[#C8102E] rounded focus:ring-[#C8102E] border-gray-300">
                        <label for="is_active" class="text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer select-none">Active (Visible on website)</label>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end gap-4">
                    <a href="{{ route('admin.faqs.index') }}" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-600 font-bold hover:bg-gray-200 transition-colors">Cancel</a>
                    <button type="submit" class="px-8 py-3 bg-[#C8102E] hover:bg-[#a00c23] text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-red-500/20">
                        Create FAQ
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
