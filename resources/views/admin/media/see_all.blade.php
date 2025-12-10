@extends('layouts.admin')

@section('content')
    <div x-data="{ 
        showUploadModal: false, 
        uploadType: 'App\\Models\\City', 
        uploadCityId: '',
        uploadDestCityFilter: '',
        uploadDestId: '',
        uploadMediaType: 'image',
        cities: [
            @foreach($cities as $city)
                { id: '{{ $city->id }}', nom: '{{ addslashes($city->nom) }}' },
            @endforeach
        ],
        destinations: [
            @foreach($allDestinations as $dest)
                { id: '{{ $dest->id }}', nom: '{{ addslashes($dest->nom) }}', city_id: '{{ $dest->city_id }}' },
            @endforeach
        ],
        get filteredUploadDestinations() {
            if (!this.uploadDestCityFilter) return this.destinations;
            return this.destinations.filter(d => d.city_id == this.uploadDestCityFilter);
        }
    }">
        
        <!-- Header & Nav -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-1">
                    <a href="{{ route('admin.media.index') }}" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-gray-500">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    </a>
                    <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">{{ $title }}</h2>
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-lg ml-10">Browsing specific collection.</p>
            </div>
            
            <button @click="showUploadModal = true" class="btn-primary flex items-center shadow-lg shadow-primary-500/30">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                Upload Media
            </button>
        </div>

        <!-- Filters -->
        <div class="mb-12" x-data="{
            selectedCity: '{{ $cityId }}',
            selectedDest: '{{ $destinationId }}',
            cityOpen: false,
            destOpen: false,
            get filteredDestinations() {
                if (!this.selectedCity) return this.destinations;
                return this.destinations.filter(d => d.city_id == this.selectedCity);
            },
            get currentCityLabel() {
                const c = this.cities.find(x => x.id == this.selectedCity);
                return c ? c.nom : 'All Cities';
            },
            get currentDestLabel() {
                const d = this.destinations.find(x => x.id == this.selectedDest);
                return d ? d.nom : 'All Destinations';
            },
            selectCity(id) {
                this.selectedCity = id;
                this.selectedDest = ''; // Reset dest when city changes
                this.submitForm();
            },
            selectDest(id) {
                this.selectedDest = id;
                this.submitForm();
            },
            submitForm() {
                this.$nextTick(() => {
                    this.$refs.form.submit();
                });
            }
        }">
            <form x-ref="form" action="{{ route('admin.media.index') }}" method="GET" class="glass-card rounded-full p-2 flex items-center bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 shadow-lg w-fit overflow-visible relative z-[200]">
                <input type="hidden" name="section" value="{{ $section }}">
                <input type="hidden" name="city_id" :value="selectedCity">
                <input type="hidden" name="destination_id" :value="selectedDest">

                <!-- City Dropdown -->
                <div class="relative min-w-[140px]" @click.outside="cityOpen = false">
                    <button type="button" @click="cityOpen = !cityOpen" class="flex items-center justify-between w-full px-6 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                        <span x-text="currentCityLabel">All Cities</span>
                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-gray-500 dark:text-gray-400" :class="{'rotate-180': cityOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="cityOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                         class="absolute left-0 mt-3 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-[100] overflow-hidden text-left origin-top-left max-h-60 overflow-y-auto custom-scrollbar">
                        <div class="py-1">
                            <div @click="selectCity('')" class="px-6 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">All Cities</div>
                            <template x-for="city in cities" :key="city.id">
                                <div @click="selectCity(city.id)" class="px-6 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium" x-text="city.nom"></div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4"></div>

                <!-- Destination Dropdown (Hidden for city-only sections) -->
                <div class="relative min-w-[160px] {{ str_contains($section, 'city') ? 'hidden' : '' }}" @click.outside="destOpen = false">
                    <button type="button" @click="destOpen = !destOpen" class="flex items-center justify-between w-full px-6 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                        <span x-text="currentDestLabel">All Destinations</span>
                        <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-gray-500 dark:text-gray-400" :class="{'rotate-180': destOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="destOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                         class="absolute left-0 mt-3 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-[100] overflow-hidden text-left origin-top-left max-h-60 overflow-y-auto custom-scrollbar">
                        <div class="py-1">
                            <div @click="selectDest('')" class="px-6 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">All Destinations</div>
                            <template x-for="dest in filteredDestinations" :key="dest.id">
                                <div @click="selectDest(dest.id)" class="px-6 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium" x-text="dest.nom"></div>
                            </template>
                        </div>
                    </div>
                </div>

                <template x-if="selectedCity || selectedDest">
                    <div class="flex items-center">
                        <!-- Divider -->
                        <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4"></div>

                        <a href="{{ route('admin.media.index', ['section' => $section]) }}" class="flex items-center justify-center p-2 text-gray-500 hover:text-red-600 transition-colors rounded-full hover:bg-red-50 dark:hover:bg-red-900/20" title="Clear Filters">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                </template>
            </form>
        </div>

        <!-- Grouped Gallery Content -->
        <div class="space-y-12">
            @forelse($items as $item)
                @if($item->media->count() > 0)
                <div class="animate-enter" style="animation-delay: {{ $loop->index * 50 }}ms">
                    <div class="flex items-center gap-4 mb-6 border-b border-gray-100 dark:border-gray-800 pb-4">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $item->nom }}</h3>
                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded-full text-xs font-bold uppercase tracking-wide">
                            {{ $item->media->count() }} items
                        </span>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach($item->media as $media)
                        <div class="group relative aspect-square rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
                            @if($media->file_type === 'image')
                                <img src="{{ Storage::url($media->file_path) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <video src="{{ Storage::url($media->file_path) }}" class="w-full h-full object-cover"></video>
                            @endif

                            <!-- Premium Overlay -->
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-4">
                                <div class="flex justify-end">
                                    <form action="{{ route('admin.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Delete this media?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-500/90 backdrop-blur-md rounded-full text-white hover:bg-red-600 transition-colors shadow-lg transform hover:scale-110" title="Delete">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="flex justify-center flex-1 items-center">
                                    @php
                                        $displayTitle = str_contains($section, 'destination') 
                                            ? $item->city->nom . ' / ' . $item->nom 
                                            : $item->nom;
                                    @endphp
                                    <button type="button" class="lightbox-trigger px-4 py-2 bg-white/20 backdrop-blur-md rounded-lg text-white text-sm font-medium hover:bg-white/30 transition-colors border border-white/30" 
                                        data-src="{{ Storage::url($media->file_path) }}" 
                                        data-type="{{ $media->file_type }}"
                                        data-title="{{ $displayTitle }}">
                                        {{ $media->file_type === 'video' ? 'Play Full' : 'View Full' }}
                                    </button>
                                </div>
                                <div class="mt-auto">
                                    <div class="mb-0.5 text-sm text-white font-bold truncate text-shadow-sm">
                                        @if(str_contains($section, 'destination'))
                                            {{ $item->city->nom }} <span class="text-white/60 mx-0.5">/</span> {{ $item->nom }}
                                        @else
                                            {{ $item->nom }}
                                        @endif
                                    </div>
                                    <div class="text-xs text-white/70 font-medium truncate">
                                        {{ $media->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @empty
                <div class="text-center py-20">
                    <div class="w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">No media found</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Try adjusting your filters or upload some content.</p>
                </div>
            @endforelse
        </div>

        <!-- Cursor Floating Text -->
        <div id="cursor-text" class="fixed pointer-events-none z-50 px-3 py-1.5 bg-black/80 backdrop-blur-md text-white text-xs font-bold rounded-lg transform -translate-x-1/2 -translate-y-full opacity-0 transition-opacity duration-200 shadow-xl border border-white/20 whitespace-nowrap">
            View
        </div>

        <!-- Vanilla JS Lightbox (Included directly here to ensure it works consistently) -->
        <div id="vanilla-lightbox" class="fixed inset-0 z-[5000] hidden" style="backdrop-filter: blur(5px);">
            <div class="absolute inset-0 bg-black/95 transition-opacity duration-300" id="lightbox-backdrop"></div>
            <button id="lightbox-close" class="absolute top-4 right-4 z-[110] p-2 text-white/70 hover:text-white bg-black/50 hover:bg-black/80 rounded-full transition-all duration-200">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <div class="relative z-[105] h-full w-full flex flex-col items-center justify-center p-4">
                <div id="lightbox-title" class="text-white text-xl font-bold mb-4 opacity-0 transform -translate-y-4 transition-all duration-300"></div>
                <img id="lightbox-img" src="" class="hidden max-h-[85vh] max-w-full rounded-lg shadow-2xl object-contain animate-scale-in">
                <video id="lightbox-video" controls class="hidden max-h-[85vh] max-w-full rounded-lg shadow-2xl animate-scale-in"><source src="" type="video/mp4"></video>
            </div>
        </div>

        <!-- Filter & Lightbox Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // --- Cursor Text Logic ---
                const cursorText = document.getElementById('cursor-text');
                const mediaItems = document.querySelectorAll('.group.relative.aspect-square');

                document.addEventListener('mousemove', function(e) {
                    cursorText.style.top = (e.clientY - 10) + 'px';
                    cursorText.style.left = e.clientX + 'px';
                });

                mediaItems.forEach(item => {
                    item.addEventListener('mouseenter', function() {
                        const title = this.querySelector('.lightbox-trigger').getAttribute('data-title');
                        cursorText.textContent = title;
                        cursorText.classList.remove('opacity-0');
                    });
                    
                    item.addEventListener('mouseleave', function() {
                        cursorText.classList.add('opacity-0');
                    });
                });


                // --- Lightbox Logic ---
                const lightbox = document.getElementById('vanilla-lightbox');
                const lightboxImg = document.getElementById('lightbox-img');
                const lightboxVideo = document.getElementById('lightbox-video');
                const lightboxTitle = document.getElementById('lightbox-title');
                const closeBtn = document.getElementById('lightbox-close');
                const backdrop = document.getElementById('lightbox-backdrop');

                function openLightbox(src, type, title) {
                    lightboxImg.classList.add('hidden');
                    lightboxVideo.classList.add('hidden');
                    lightboxVideo.pause();
                    lightboxVideo.src = "";

                    // Set Title
                    lightboxTitle.textContent = title || "";
                    lightboxTitle.classList.remove('opacity-0', '-translate-y-4');

                    if (type === 'image') {
                        lightboxImg.src = src;
                        lightboxImg.classList.remove('hidden');
                    } else if (type === 'video') {
                        lightboxVideo.src = src;
                        lightboxVideo.classList.remove('hidden');
                        lightboxVideo.play().catch(e => console.log('Autoplay prevented:', e));
                    }
                    lightbox.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function closeLightbox() {
                    lightbox.classList.add('hidden');
                    lightboxTitle.classList.add('opacity-0', '-translate-y-4');
                    lightboxVideo.pause();
                    document.body.style.overflow = '';
                }

                closeBtn.addEventListener('click', closeLightbox);
                backdrop.addEventListener('click', closeLightbox);
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) closeLightbox();
                });

                document.body.addEventListener('click', function(e) {
                    const btn = e.target.closest('.lightbox-trigger');
                    if (btn) {
                        e.preventDefault();
                        e.stopPropagation();
                        openLightbox(
                            btn.getAttribute('data-src'), 
                            btn.getAttribute('data-type'),
                            btn.getAttribute('data-title')
                        );
                    }
                });
            });
        </script>

        <!-- Reuse the exact same Upload Modal logic -->
        <div x-show="showUploadModal" class="fixed inset-0 z-[6000] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showUploadModal = false">
                    <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                </div>
                 <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-bold text-gray-900 dark:text-white mb-4">
                                    Upload Media
                                </h3>
                                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    <!-- Type Toggle -->
                                    <div class="flex space-x-4 mb-4">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="model_type" value="App\Models\City" x-model="uploadType" class="form-radio text-primary-600 focus:ring-primary-500">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300 font-medium">City</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="model_type" value="App\Models\Destination" x-model="uploadType" class="form-radio text-primary-600 focus:ring-primary-500">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300 font-medium">Destination</span>
                                        </label>
                                    </div>

                                    <!-- City Dropdown (for City Upload) -->
                                    <div x-show="uploadType === 'App\\Models\\City'">
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Select City</label>
                                        <div class="relative" x-data="{ open: false }">
                                            <input type="hidden" name="model_id" :value="uploadCityId" x-bind:disabled="uploadType !== 'App\\Models\\City'"> 
                                            <button type="button" @click="open = !open" @click.outside="open = false" 
                                                class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                                                <span x-text="uploadCityId ? cities.find(c => c.id == uploadCityId)?.nom : 'Choose a city...'" 
                                                      :class="{'text-gray-500 dark:text-gray-400': !uploadCityId, 'text-gray-900 dark:text-white': uploadCityId}"></span>
                                                <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                            </button>
                                            <div x-show="open" class="absolute z-[6050] w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 max-h-60 overflow-y-auto custom-scrollbar">
                                                <template x-for="city in cities" :key="city.id">
                                                    <div @click="uploadCityId = city.id; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium" x-text="city.nom"></div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Destination Upload Section -->
                                    <div x-show="uploadType === 'App\\Models\\Destination'">
                                        <div class="space-y-4">
                                            <!-- City Filter -->
                                            <div>
                                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Select City (Filter)</label>
                                                <div class="relative" x-data="{ open: false }">
                                                    <button type="button" @click="open = !open" @click.outside="open = false" 
                                                        class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                                                        <span x-text="uploadDestCityFilter ? cities.find(c => c.id == uploadDestCityFilter)?.nom : 'All Cities'" 
                                                              :class="{'text-gray-900 dark:text-white': uploadDestCityFilter, 'text-gray-500 dark:text-gray-400': !uploadDestCityFilter}"></span>
                                                        <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                                    </button>
                                                    <div x-show="open" class="absolute z-[6050] w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 max-h-60 overflow-y-auto custom-scrollbar">
                                                        <div @click="uploadDestCityFilter = ''; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">All Cities</div>
                                                        <template x-for="city in cities" :key="city.id">
                                                            <div @click="uploadDestCityFilter = city.id; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium" x-text="city.nom"></div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Destination Select -->
                                            <div>
                                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Select Destination</label>
                                                <div class="relative" x-data="{ open: false }">
                                                    <input type="hidden" name="model_id" :value="uploadDestId" x-bind:disabled="uploadType !== 'App\\Models\\Destination'">
                                                    <button type="button" @click="open = !open" @click.outside="open = false" 
                                                        class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                                                        <span x-text="uploadDestId ? destinations.find(d => d.id == uploadDestId)?.nom : 'Choose a destination...'" 
                                                              :class="{'text-gray-500 dark:text-gray-400': !uploadDestId, 'text-gray-900 dark:text-white': uploadDestId}"></span>
                                                        <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                                    </button>
                                                    <div x-show="open" class="absolute z-[6050] w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 max-h-60 overflow-y-auto custom-scrollbar">
                                                        <template x-for="dest in filteredUploadDestinations" :key="dest.id">
                                                            <div @click="uploadDestId = dest.id; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium" x-text="dest.nom"></div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Media Type -->
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Media Type</label>
                                        <div class="relative" x-data="{ open: false }">
                                            <input type="hidden" name="type" :value="uploadMediaType">
                                            <button type="button" @click="open = !open" @click.outside="open = false" 
                                                class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                                                <span x-text="uploadMediaType === 'image' ? 'Image' : 'Video'" class="text-gray-900 dark:text-white"></span>
                                                <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                            </button>
                                            <div x-show="open" class="absolute z-[6050] w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                                                <div @click="uploadMediaType = 'image'; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Image</div>
                                                <div @click="uploadMediaType = 'video'; open = false" class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium">Video</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Custom File Input -->
                                    <div x-data="{ fileName: '' }">
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">File</label>
                                        <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-2xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors group">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-primary-500 dark:group-hover:text-primary-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" x-show="!fileName"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400" x-show="!fileName">PNG, JPG or MP4</p>
                                                <p class="text-sm font-medium text-primary-600 dark:text-primary-400" x-show="fileName" x-text="fileName"></p>
                                            </div>
                                            <input type="file" name="file" class="hidden" required @change="fileName = $event.target.files[0].name" />
                                        </label>
                                    </div>

                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Upload
                                        </button>
                                        <button type="button" @click="showUploadModal = false" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
