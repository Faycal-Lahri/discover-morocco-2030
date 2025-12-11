<table class="w-full">
    <thead>
        <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
            <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Author</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Comment</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-left">Date</th>
            <th class="px-6 py-4 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
        @forelse($commentaires as $commentaire)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors group">
            <td class="px-6 py-4">
                <div class="flex items-center">
                    @if($commentaire->photo)
                        <img src="{{ Storage::url($commentaire->photo) }}" alt="{{ $commentaire->nom }}" class="h-10 w-10 rounded-full object-cover shrink-0">
                    @else
                        <div class="h-10 w-10 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center shrink-0">
                            <span class="text-primary-700 dark:text-primary-400 font-bold text-sm">{{ substr($commentaire->nom, 0, 1) }}{{ substr($commentaire->prenom, 0, 1) }}</span>
                        </div>
                    @endif
                    <div class="ml-4">
                        <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $commentaire->nom }} {{ $commentaire->prenom }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $commentaire->email }}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 max-w-md">{{ $commentaire->commentaire }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $commentaire->created_at->format('M d, Y') }}</div>
            </td>
            <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end space-x-3">
                    <button type="button" class="view-btn p-2 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-colors cursor-pointer" title="View" data-commentaire="{{ json_encode($commentaire, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) }}">
                        <svg class="w-5 h-5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    <a href="{{ route('admin.commentaires.edit', $commentaire) }}" class="p-2 text-primary-600 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-xl transition-colors" title="Edit">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form id="delete-form-{{ $commentaire->id }}" action="{{ route('admin.commentaires.destroy', $commentaire) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete('delete-form-{{ $commentaire->id }}')" class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-colors" title="Delete">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                <div class="flex flex-col items-center justify-center">
                    <div class="h-20 w-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">No comments found</h3>
                    <p class="text-sm mt-1">{{ request('search') ? 'Try adjusting your search.' : 'No comments submitted yet.' }}</p>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/50">
    {{ $commentaires->links() }}
</div>
