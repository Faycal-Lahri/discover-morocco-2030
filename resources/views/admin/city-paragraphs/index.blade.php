@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">City Content</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage content paragraphs for cities.</p>
        </div>
        <a href="{{ route('admin.city-paragraphs.create') }}" class="btn-primary shadow-lg shadow-primary-500/30">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Content
        </a>
    </div>

    <!-- Filters -->
    <!-- Filters -->
    <div class="mb-12">
        <form id="search-form" action="{{ route('admin.city-paragraphs.index') }}" method="GET" class="glass-card rounded-full p-2 flex items-center bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 shadow-lg w-fit overflow-visible">
            <!-- Search -->
            <div class="relative w-64 flex items-center pl-6">
                <svg class="w-5 h-5 text-gray-900 dark:text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search content..." class="w-full bg-transparent border-none p-2 text-sm focus:ring-0 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white font-medium">
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4"></div>

            <!-- Sort Dropdown -->
            <div class="relative min-w-[140px]" x-data="{ open: false, label: '{{ request('sort') == 'latest' ? 'Newest First' : (request('sort') == 'oldest' ? 'Oldest First' : (request('sort') == 'title_asc' ? 'Title (A-Z)' : (request('sort') == 'title_desc' ? 'Title (Z-A)' : 'Newest First'))) }}' }" @click.outside="open = false">
                <button type="button" @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                    <span x-text="label">Newest First</span>
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-gray-500 dark:text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <input type="hidden" name="sort" value="{{ request('sort', 'latest') }}">
                
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                     class="absolute right-0 mt-3 w-40 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-[100] overflow-hidden text-left origin-top-right">
                    <div class="py-1">
                        <div @click="document.getElementsByName('sort')[0].value = 'latest'; label = 'Newest First'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Newest First</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'oldest'; label = 'Oldest First'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Oldest First</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'title_asc'; label = 'Title (A-Z)'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Title (A-Z)</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'title_desc'; label = 'Title (Z-A)'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Title (Z-A)</div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
        @include('admin.city-paragraphs.partials.table')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('table-container');
            let timeout = null;

            const fetchResults = () => {
                const form = document.getElementById('search-form');
                const query = searchInput.value;
                const sort = form.querySelector('input[name="sort"]').value;

                const url = new URL("{{ route('admin.city-paragraphs.index') }}");
                url.searchParams.set('search', query);
                if (sort) url.searchParams.set('sort', sort);

                fetch(url, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                })
                .then(response => response.text())
                .then(html => { tableContainer.innerHTML = html; })
                .catch(error => console.error('Error:', error));
            };

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(fetchResults, 300);
            });

            // ROBUST GLOBAL EVENT DELEGATION
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.view-btn');
                if (!btn) return;
                
                if (btn.dataset.paragraph) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (!window.premiumModal) {
                        if (typeof PremiumModal !== 'undefined') window.premiumModal = new PremiumModal();
                        else return;
                    }

                    try {
                        const paragraph = JSON.parse(btn.dataset.paragraph);
                        window.premiumModal.open(paragraph, 'cityParagraph', 'selectedParagraph', 'showModal');
                    } catch (error) {
                        console.error('Modal Error:', error);
                        alert('Unable to open content details.');
                    }
                }
            });
        });
    </script>
@endsection
