@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Cities</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage Moroccan cities and their details.</p>
        </div>
        <a href="{{ route('admin.cities.create') }}" class="btn-primary shadow-lg shadow-primary-500/30">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create City
        </a>
    </div>

    <!-- Filters -->
    <div class="mb-12">
        <form id="search-form" action="{{ route('admin.cities.index') }}" method="GET" class="glass-card rounded-full p-2 flex items-center bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 shadow-lg w-fit">
            <!-- Search -->
            <div class="relative w-64 flex items-center pl-6">
                <svg class="w-5 h-5 text-gray-900 dark:text-white mr-3 hidden md:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}" placeholder="Search cities..." class="w-full bg-transparent border-none p-2 text-sm focus:ring-0 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white font-medium">
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4 hidden md:block"></div>

            <!-- Category Dropdown -->
            <div class="relative min-w-[140px]" x-data="{ open: false, label: '{{ request('category') ? ucfirst(request('category')) : 'Category' }}' }" @click.outside="open = false">
                <button type="button" @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                    <span x-text="label">Category</span>
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-gray-500 dark:text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <input type="hidden" name="category" value="{{ request('category') }}">
                
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                     class="absolute left-0 mt-3 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-[100] overflow-hidden text-left origin-top-left">
                    <div class="py-1 max-h-60 overflow-y-auto custom-scrollbar">
                        <div @click="document.getElementsByName('category')[0].value = ''; label = 'Category'; open = false; document.getElementById('search-form').submit()" 
                             class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors font-medium flex items-center">
                             All Categories
                        </div>
                        @foreach($available_categories as $cat)
                            <div @click="document.getElementsByName('category')[0].value = '{{ $cat }}'; label = '{{ ucfirst($cat) }}'; open = false; document.getElementById('search-form').submit()" 
                                 class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors font-medium flex items-center">
                                 {{ ucfirst($cat) }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4 hidden md:block"></div>

            <!-- Sort Dropdown -->
            <div class="relative min-w-[140px]" x-data="{ open: false, label: '{{ request('sort') == 'latest' ? 'Newest' : (request('sort') == 'oldest' ? 'Oldest' : (request('sort') == 'name_asc' ? 'A-Z' : (request('sort') == 'name_desc' ? 'Z-A' : 'Newest'))) }}' }" @click.outside="open = false">
                <button type="button" @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                    <span x-text="label">Newest</span>
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
                        <div @click="document.getElementsByName('sort')[0].value = 'latest'; label = 'Newest'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Newest</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'oldest'; label = 'Oldest'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Oldest</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'name_asc'; label = 'A-Z'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">A-Z</div>
                        <div @click="document.getElementsByName('sort')[0].value = 'name_desc'; label = 'Z-A'; open = false; document.getElementById('search-form').submit()" class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Z-A</div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="table-container" class="glass-card rounded-2xl overflow-hidden shadow-xl">
        @include('admin.cities.partials.table')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('table-container');
            let timeout = null;

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const query = this.value;
                const form = document.getElementById('search-form');
                
                const category = form.querySelector('input[name="category"]').value;
                const sort = form.querySelector('input[name="sort"]').value;

                timeout = setTimeout(() => {
                    const url = new URL("{{ route('admin.cities.index') }}");
                    url.searchParams.set('search', query);
                    if (category) url.searchParams.set('category', category);
                    if (sort) url.searchParams.set('sort', sort);

                    fetch(url, {
                        headers: {'X-Requested-With': 'XMLHttpRequest'}
                    })
                    .then(response => response.text())
                    .then(html => { tableContainer.innerHTML = html; })
                    .catch(error => console.error('Error:', error));
                }, 300);
            });

            // ROBUST GLOBAL EVENT DELEGATION
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.view-btn');
                if (!btn) return;
                
                if (btn.dataset.city) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (!window.premiumModal) {
                        if (typeof PremiumModal !== 'undefined') window.premiumModal = new PremiumModal();
                        else return;
                    }

                    try {
                        const city = JSON.parse(btn.dataset.city);
                        window.premiumModal.open(city, 'city', 'selectedCity', 'showModal');
                    } catch (error) {
                        console.error('Modal Error:', error);
                        alert('Unable to open city details.');
                    }
                }
            });
        });
    </script>
@endsection
