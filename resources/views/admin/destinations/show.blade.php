@extends('layouts.admin')

@section('content')
    <div x-data="{ showLightbox: false, lightboxSrc: '', lightboxType: 'image' }">
        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">{{ $destination->nom }}</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">{{ $destination->titre }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn-secondary">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Destination
                </a>
                <a href="{{ route('admin.destinations.index') }}" class="btn-primary">
                    Back to List
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Left Column: Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Cover Image -->
                <div class="glass-card rounded-2xl overflow-hidden shadow-xl h-96 relative group cursor-pointer" @click="showLightbox = true; lightboxSrc = '{{ $destination->image ? Storage::url($destination->image) : '' }}'; lightboxType = 'image'">
                    @if($destination->image)
                        <img src="{{ Storage::url($destination->image) }}" alt="{{ $destination->nom }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-8">
                        <div>
                            <h1 class="text-4xl font-bold text-white mb-2">{{ $destination->nom }}</h1>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-white text-sm border border-white/30">
                                    {{ $destination->city->nom }}
                                </span>
                                @if($destination->label)
                                    <span class="px-3 py-1 rounded-full bg-primary-500/80 backdrop-blur-md text-white text-sm border border-primary-400/50">
                                        {{ $destination->label }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="glass-card rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">About {{ $destination->nom }}</h3>
                    <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                        {{ $destination->description }}
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider mb-3">Categories</h4>
                        <div class="flex flex-wrap gap-2">
                            @forelse($destination->categories as $cat)
                                <span class="px-3 py-1 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 text-sm font-medium">
                                    {{ ucfirst($cat->categorie) }}
                                </span>
                            @empty
                                <span class="text-gray-500 dark:text-gray-400 text-sm">No categories assigned.</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Promo Video -->
            <div class="space-y-8">
                <!-- Promo Video -->
                <div class="glass-card rounded-2xl p-6 shadow-lg">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Promotional Video
                    </h3>
                    @if($destination->video)
                        <div class="rounded-xl overflow-hidden bg-black aspect-video relative group cursor-pointer" @click="showLightbox = true; lightboxSrc = '{{ Storage::url($destination->video) }}'; lightboxType = 'video'">
                            <video class="w-full h-full object-cover pointer-events-none">
                                <source src="{{ Storage::url($destination->video) }}" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="rounded-xl bg-gray-100 dark:bg-gray-800 aspect-video flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm">No video available</span>
                        </div>
                    @endif
                </div>

                <!-- Quick Stats -->
                <div class="glass-card rounded-2xl p-6 shadow-lg">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Quick Stats</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50">
                            <span class="text-gray-500 dark:text-gray-400 text-sm">City</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $destination->city->nom }}</span>
                        </div>
                        @if($destination->gps_location)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50">
                            <span class="text-gray-500 dark:text-gray-400 text-sm">GPS</span>
                            <span class="font-bold text-gray-900 dark:text-white text-xs">{{ $destination->gps_location }}</span>
                        </div>
                        @endif
                        <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50">
                            <span class="text-gray-500 dark:text-gray-400 text-sm">Created</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $destination->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50">
                            <span class="text-gray-500 dark:text-gray-400 text-sm">Last Updated</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $destination->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Media Gallery Section -->
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Media Gallery</h3>
                
                <!-- Upload Button (Triggers Modal or expands area) -->
                <button onclick="document.getElementById('upload-section').classList.toggle('hidden')" class="btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload Media
                </button>
            </div>

            <!-- Upload Section (Hidden by default) -->
            <div id="upload-section" class="hidden mb-8 p-6 rounded-xl bg-gray-50 dark:bg-gray-900/50 border-2 border-dashed border-gray-300 dark:border-gray-700">
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-end" x-data="{ type: 'image', open: false }">
                    @csrf
                    <input type="hidden" name="model_type" value="App\Models\Destination">
                    <input type="hidden" name="model_id" value="{{ $destination->id }}">
                    
                    <div class="flex-1 w-full" x-data="{ fileName: '' }">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Select File</label>
                        <label class="flex flex-col items-center justify-center w-full h-12 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors group px-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400 truncate w-full text-center" x-text="fileName || 'Click to choose file...'"></span>
                            <input type="file" name="file" class="hidden" required @change="fileName = $event.target.files[0].name">
                        </label>
                    </div>
                    
                    <div class="w-full md:w-48">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Type</label>
                        <div class="relative">
                            <input type="hidden" name="type" :value="type">
                            <button type="button" @click="open = !open" @click.outside="open = false" 
                                class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                                <span x-text="type === 'image' ? 'Image' : 'Video'" class="text-gray-900 dark:text-white"></span>
                                <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div x-show="open" class="absolute z-10 w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                                <div @click="type = 'image'; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Image</div>
                                <div @click="type = 'video'; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Video</div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary whitespace-nowrap h-[50px]">
                        Upload
                    </button>
                </form>
            </div>

            <!-- Photos Section -->
            <div class="mb-8">
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Photos
                </h4>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @forelse($destination->media->where('file_type', 'image') as $media)
                        <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-md transition-all">
                            <img src="{{ Storage::url($media->file_path) }}" alt="Media" class="w-full h-full object-cover">
                            
                            <!-- Overlay Actions -->
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'image'" class="p-2 bg-white/20 backdrop-blur-md rounded-full text-white hover:bg-white/40 transition-colors" title="View Full">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/80 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-6 text-center text-gray-500 dark:text-gray-400 text-sm">
                            No photos uploaded yet.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Videos Section -->
            <div>
                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Videos
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($destination->media->where('file_type', 'video') as $media)
                        <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-md transition-all">
                            <video class="w-full h-full object-cover">
                                <source src="{{ Storage::url($media->file_path) }}" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-10 h-10 rounded-full bg-white/30 backdrop-blur-sm flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                                </div>
                            </div>

                            <!-- Overlay Actions -->
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                <button @click="showLightbox = true; lightboxSrc = '{{ Storage::url($media->file_path) }}'; lightboxType = 'video'" class="p-2 bg-white/20 backdrop-blur-md rounded-full text-white hover:bg-white/40 transition-colors" title="Play Full">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this video?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-500/80 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors" title="Delete">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-6 text-center text-gray-500 dark:text-gray-400 text-sm">
                            No videos uploaded yet.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div x-show="showLightbox" class="fixed inset-0 z-[60] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showLightbox = false">
                    <div class="absolute inset-0 bg-black opacity-90"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-middle bg-transparent rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-5xl w-full relative">
                    <button @click="showLightbox = false" class="absolute top-0 right-0 -mt-12 -mr-12 p-4 text-white hover:text-gray-300 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <div class="flex justify-center items-center">
                        <template x-if="lightboxType === 'image'">
                            <img :src="lightboxSrc" class="max-h-[85vh] max-w-full rounded-lg shadow-2xl">
                        </template>
                        <template x-if="lightboxType === 'video'">
                            <video :src="lightboxSrc" controls autoplay class="max-h-[85vh] max-w-full rounded-lg shadow-2xl"></video>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
