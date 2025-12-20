@extends('layouts.admin')

@section('content')
    <div>
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">FAQs</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage Frequently Asked Questions.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Filter Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.outside="open = false" class="px-5 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-bold text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-all flex items-center gap-2">
                        <i class="fas fa-filter text-gray-400"></i>
                        <span>{{ request('category') ?: 'All Categories' }}</span>
                        <i class="fas fa-chevron-down text-xs ml-2 text-gray-400"></i>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-50 overflow-hidden"
                         style="display: none;">
                         
                        <div class="py-1">
                            <a href="{{ route('admin.faqs.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 font-medium {{ !request('category') ? 'bg-gray-50 dark:bg-gray-700/50' : '' }}">
                                All Categories
                            </a>
                            @foreach($categories as $cat)
                            <a href="{{ route('admin.faqs.index', ['category' => $cat]) }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 font-medium {{ request('category') == $cat ? 'bg-gray-50 dark:bg-gray-700/50 text-[#C8102E] dark:text-[#C8102E]' : '' }}">
                                {{ $cat }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.faqs.create') }}" class="px-6 py-3 bg-[#C8102E] hover:bg-[#a00c23] text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-red-500/20 flex items-center gap-2">
                    <i class="fas fa-plus"></i> Add New FAQ
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="glass-card rounded-2xl overflow-hidden shadow-xl bg-white dark:bg-gray-800">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700 text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400">
                            <th class="px-8 py-6 font-bold">Question</th>
                            <th class="px-8 py-6 font-bold">Category</th>
                            <th class="px-8 py-6 font-bold text-center">Status</th>
                            <th class="px-8 py-6 font-bold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($faqs as $faq)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors group">
                            <td class="px-8 py-6">
                                <span class="font-bold text-gray-900 dark:text-white block mb-1 text-lg">{{ $faq->question }}</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 line-clamp-1">{{ $faq->answer }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                    {{ $faq->category }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                @if($faq->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-100 text-blue-700 hover:bg-blue-200 hover:text-blue-900 transition-all shadow-sm" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form id="delete-form-{{ $faq->id }}" action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirmDelete('delete-form-{{ $faq->id }}');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-center w-10 h-10 rounded-xl bg-red-100 text-red-700 hover:bg-red-200 hover:text-red-900 transition-all shadow-sm" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                        <i class="far fa-question-circle text-2xl"></i>
                                    </div>
                                    <p class="text-lg font-medium">No FAQs found.</p>
                                    <p class="text-sm mt-1">Start by adding a new question.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($faqs->hasPages())
            <div class="px-8 py-6 border-t border-gray-100 dark:border-gray-700 bg-gray-50/30">
                {{ $faqs->links() }}
            </div>
            @endif
        </div>
    </div>
@endsection
