<!-- City Images Section -->
@if($cityImages->count() > 0)
<div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            City Pictures
        </h3>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $cityImages->count() }} Items</span>
            <a href="{{ route('admin.media.index', array_merge(request()->query(), ['section' => 'city_images'])) }}" class="px-3 py-1.5 rounded-lg bg-primary-50 text-primary-600 hover:bg-primary-100 dark:bg-primary-900/30 dark:text-primary-400 dark:hover:bg-primary-900/50 text-xs font-bold uppercase tracking-wide transition-colors">See All</a>
        </div>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($cityImages->take(5) as $media)
            <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="{{ Storage::url($media->file_path) }}" alt="City Media" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                    <div class="flex justify-end">
                        <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="lightbox-trigger px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30" data-src="{{ Storage::url($media->file_path) }}" data-type="image">
                            View Full
                        </button>
                    </div>
                    <div class="mb-0.5 text-sm text-white font-bold truncate text-shadow-sm">{{ $media->mediable?->nom ?? 'Unknown City' }}</div>
                    <div class="text-xs text-white/70 font-medium truncate">
                        {{ $media->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- City Videos Section -->
@if($cityVideos->count() > 0)
<div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            City Videos
        </h3>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $cityVideos->count() }} Items</span>
            <a href="{{ route('admin.media.index', array_merge(request()->query(), ['section' => 'city_videos'])) }}" class="px-3 py-1.5 rounded-lg bg-primary-50 text-primary-600 hover:bg-primary-100 dark:bg-primary-900/30 dark:text-primary-400 dark:hover:bg-primary-900/50 text-xs font-bold uppercase tracking-wide transition-colors">See All</a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($cityVideos->take(4) as $media)
            <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                <video class="w-full h-full object-cover">
                    <source src="{{ Storage::url($media->file_path) }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                    <div class="flex justify-end">
                        <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="lightbox-trigger px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30" data-src="{{ Storage::url($media->file_path) }}" data-type="video">
                            Play Full
                        </button>
                    </div>
                    <div class="mb-0.5 text-sm text-white font-bold truncate text-shadow-sm">{{ $media->mediable?->nom ?? 'Unknown City' }}</div>
                    <div class="text-xs text-white/70 font-medium truncate">
                        {{ $media->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Destination Images Section -->
@if($destinationImages->count() > 0)
<div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Destination Pictures
        </h3>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $destinationImages->count() }} Items</span>
            <a href="{{ route('admin.media.index', array_merge(request()->query(), ['section' => 'destination_images'])) }}" class="px-3 py-1.5 rounded-lg bg-primary-50 text-primary-600 hover:bg-primary-100 dark:bg-primary-900/30 dark:text-primary-400 dark:hover:bg-primary-900/50 text-xs font-bold uppercase tracking-wide transition-colors">See All</a>
        </div>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($destinationImages->take(5) as $media)
            <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                <img src="{{ Storage::url($media->file_path) }}" alt="Destination Media" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                    <div class="flex justify-end">
                        <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="lightbox-trigger px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30" data-src="{{ Storage::url($media->file_path) }}" data-type="image">
                            View Full
                        </button>
                    </div>
                    <div class="mb-0.5 text-sm text-white font-bold truncate text-shadow-sm">
                        {{ $media->mediable?->city?->nom ?? 'Unknown' }} <span class="text-white/60 mx-0.5">/</span> {{ $media->mediable?->nom ?? 'Unknown' }}
                    </div>
                    <div class="text-xs text-white/70 font-medium truncate">
                        {{ $media->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Destination Videos Section -->
@if($destinationVideos->count() > 0)
<div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 mr-3 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            Destination Videos
        </h3>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-xs font-bold text-gray-600 dark:text-gray-300">{{ $destinationVideos->count() }} Items</span>
            <a href="{{ route('admin.media.index', array_merge(request()->query(), ['section' => 'destination_videos'])) }}" class="px-3 py-1.5 rounded-lg bg-primary-50 text-primary-600 hover:bg-primary-100 dark:bg-primary-900/30 dark:text-primary-400 dark:hover:bg-primary-900/50 text-xs font-bold uppercase tracking-wide transition-colors">See All</a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($destinationVideos->take(4) as $media)
            <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300">
                <video class="w-full h-full object-cover">
                    <source src="{{ Storage::url($media->file_path) }}" type="video/mp4">
                </video>
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                    <div class="flex justify-end">
                        <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" class="lightbox-trigger px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30" data-src="{{ Storage::url($media->file_path) }}" data-type="video">
                            Play Full
                        </button>
                    </div>
                    <div class="mb-0.5 text-sm text-white font-bold truncate text-shadow-sm">
                        {{ $media->mediable?->city?->nom ?? 'Unknown' }} <span class="text-white/60 mx-0.5">/</span> {{ $media->mediable?->nom ?? 'Unknown' }}
                    </div>
                    <div class="text-xs text-white/70 font-medium truncate">
                        {{ $media->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

@if($cityImages->count() === 0 && $cityVideos->count() === 0 && $destinationImages->count() === 0 && $destinationVideos->count() === 0)
    <div class="glass-card rounded-2xl p-16 flex flex-col items-center justify-center text-center">
        <div class="h-20 w-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4">
            <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No Media Found</h3>
        <p class="text-gray-500 max-w-sm mb-6">No media assets found for the selected filters. Upload some media or change the filters.</p>
        <button @click="showUploadModal = true" class="btn-primary">
            Upload Media
        </button>
    </div>
@endif
