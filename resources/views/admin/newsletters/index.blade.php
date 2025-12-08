@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Newsletters</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Manage newsletter subscribers.</p>
        </div>
    </div>

    <!-- Filters & Export -->
    <div class="glass-card p-4 mb-8 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="{{ route('admin.newsletters.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search subscribers..." class="pl-10 pr-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500 w-full md:w-64 has-icon">
            </div>
            <select name="sort" onchange="this.form.submit()" class="px-4 h-12 rounded-xl border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-primary-500 focus:border-primary-500" style="padding-right: 2.5rem;">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                <option value="email_asc" {{ request('sort') == 'email_asc' ? 'selected' : '' }}>Email (A-Z)</option>
                <option value="email_desc" {{ request('sort') == 'email_desc' ? 'selected' : '' }}>Email (Z-A)</option>
            </select>
        </form>

        <!-- Export Button -->
        <a href="{{ route('admin.newsletters.export') }}" class="btn-primary whitespace-nowrap text-sm">
            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export to Excel
        </a>
    </div>

    <!-- Table -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-xl">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
                    <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Email</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Subscribed At</th>
                    <th class="px-8 py-5 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                @forelse($newsletters as $newsletter)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors group">
                    <td class="px-8 py-5">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center shrink-0">
                                <span class="text-primary-700 dark:text-primary-400 font-bold text-sm">@</span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $newsletter->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $newsletter->created_at->format('M d, Y') }}</div>
                        <div class="text-xs text-gray-400 dark:text-gray-500">{{ $newsletter->created_at->format('H:i') }}</div>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <form id="delete-form-{{ $newsletter->id }}" action="{{ route('admin.newsletters.destroy', $newsletter) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete('delete-form-{{ $newsletter->id }}')" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors" title="Delete">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-8 py-16 text-center text-gray-500 dark:text-gray-400">
                        <div class="flex flex-col items-center justify-center">
                            <div class="h-20 w-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                                <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">No subscribers found</h3>
                            <p class="text-sm mt-1">{{ request('search') ? 'Try adjusting your search.' : 'No newsletter subscribers yet.' }}</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-8 py-5 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-900/50">
            {{ $newsletters->links() }}
        </div>
    </div>
@endsection
