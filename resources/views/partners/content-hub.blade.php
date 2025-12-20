@extends('layouts.app')

@section('hide_newsletter', true)

@section('content')
    <!-- 1. HERO VIDEO (Standard Design) -->
    <div id="hero-container" class="relative w-full h-screen overflow-hidden bg-black group mx-auto">
        <!-- Video Container -->
        <div class="relative w-full h-full">
            <video 
                autoplay 
                muted 
                loop 
                playsinline 
                class="w-full h-full object-cover"
                id="hero-video">
                <source src="{{ asset('videos/content.mp4') }}" type="video/mp4">
            </video>
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/80"></div>
            
            <!-- Text Overlay -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 pt-20 z-10">
                <h1 class="hero-content text-6xl md:text-8xl lg:text-9xl font-playfair font-black mb-6 leading-none tracking-tighter drop-shadow-2xl opacity-0 translate-y-4 animate-fade-in-up delay-500">
                    Content <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] via-[#f3e5ab] to-[#d4af37] italic pr-4">Hub</span>
                </h1>
                <p class="hero-content text-lg md:text-xl font-light max-w-2xl text-stone-200 mb-10 leading-relaxed drop-shadow-lg opacity-0 translate-y-4 animate-fade-in-up delay-700">
                     A curated collection of high-fidelity assets. Explore, download, and share the beauty of the Kingdom.
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-20">
            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
            <div class="w-[1px] h-16 bg-gradient-to-b from-white/10 to-transparent relative overflow-hidden rounded-full">
                <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-white animate-scroll-drop"></div>
            </div>
        </div>
    </div>

    <!-- 2. FLUID MAIN SECTION -->
    <div class="bg-stone-50 min-h-screen relative pb-24" x-data="{ 
        cityOpen: false, 
        destOpen: false, 
        typeOpen: false,
        scrolled: false,
        modalOpen: false, 
        showPanel: false,
        activeItem: null,
        resultCount: '{{ $paginatedItems->total() }}',
        loading: false,
        
        // Filter Logic
        currentCity: '{{ $cityId }}',
        currentDest: '{{ $destinationId }}',
        currentType: '{{ $type }}',

        openModal(item) {
            this.activeItem = item;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
            
            if(item.type === 'video') {
                setTimeout(() => {
                    const videoEl = document.getElementById('modal-video');
                    if(videoEl) { 
                        videoEl.muted = true;
                        videoEl.play(); 
                    }
                }, 100);
            }
        },
        closeModal() {
            this.modalOpen = false;
            document.body.style.overflow = '';
        },
        togglePanel() {
            this.showPanel = !this.showPanel;
            document.body.style.overflow = this.showPanel ? 'hidden' : '';
        },
        applyFilter(type, value) {
            // Update local state
            if(type === 'city') { 
                this.currentCity = value; 
                this.currentDest = ''; 
                // Reset Destination Label
                if(document.getElementById('dest-label')) document.getElementById('dest-label').innerText = 'All Destinations';
            } 
            if(type === 'dest') this.currentDest = value;
            if(type === 'type') this.currentType = value;

            this.cityOpen = false; 
            this.destOpen = false;

            this.loading = true;

            window.filterContent({
                city_id: this.currentCity,
                destination_id: this.currentDest,
                type: this.currentType
            });
        }
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 400)"
    @filter-updated.window="resultCount = $event.detail.count; loading = false">
        


        <!-- 3. PREMIUM GRID GALLERY CONTAINER -->
        <div class="container mx-auto px-6 pt-8 min-h-[500px]" id="gallery-grid">
            <!-- Include Partial Initially -->
            @include('partners.partials.hub-grid')
        </div>

        <!-- FLOATING FILTER BUTTON (Small Fluid Tab) -->
        <button @click="togglePanel()" 
                x-show="scrolled" 
                x-transition:enter="transition ease-out duration-500 cubic-bezier(0.34, 1.56, 0.64, 1)"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed top-1/2 -translate-y-1/2 right-0 z-[60] w-10 h-14 bg-gradient-to-bl from-[#C8102E] to-[#A00C24] text-white rounded-l-[28px] shadow-[-4px_0_15px_rgba(200,16,46,0.3)] flex items-center justify-center pl-1 hover:w-12 hover:pl-2 transition-all duration-300 border-l border-t border-b border-white/20 group cursor-pointer overflow-hidden backdrop-blur-sm">
            
            <!-- Shine Effect -->
            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
            
            <i class="fas fa-chevron-left text-xs relative z-10 group-hover:-translate-x-0.5 transition-transform duration-300 drop-shadow-sm"></i>
        </button>

        <!-- SLIDE-OVER FILTER PANEL (Advanced) -->
        <div x-show="showPanel" class="fixed inset-0 z-[100]" style="display: none;">
            <!-- Backdrop -->
            <div x-show="showPanel" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="togglePanel()"
                 class="absolute inset-0 bg-stone-900/30 backdrop-blur-sm"></div>

            <!-- Panel -->
            <div x-show="showPanel"
                 x-transition:enter="transition cubic-bezier(0.16, 1, 0.3, 1) duration-500"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition cubic-bezier(0.16, 1, 0.3, 1) duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="absolute right-0 top-0 h-full w-full max-w-sm bg-white/90 backdrop-blur-2xl shadow-[-20px_0_50px_rgba(0,0,0,0.1)] p-8 flex flex-col gap-6 border-l border-white/40">
                
                <div class="flex items-center justify-between pb-4 mt-8">
                    <h3 class="text-3xl font-playfair font-black text-stone-900 tracking-tight">Filters</h3>
                    <button @click="togglePanel()" class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center text-stone-500 hover:bg-stone-200 transition-all">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- 1. CITY -->
                <div class="space-y-3">
                     <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400">City</label>
                     <div class="flex flex-wrap gap-2">
                        <button @click="applyFilter('city', '')" 
                                class="px-5 py-2.5 rounded-full text-sm font-bold transition-all border shadow-sm"
                                :class="!currentCity ? 'bg-black text-white border-black' : 'bg-white text-stone-600 border-stone-100 hover:border-stone-300'">
                             All
                        </button>
                        @foreach($cities as $city)
                        <button @click="applyFilter('city', '{{ $city->id }}')" 
                                class="px-5 py-2.5 rounded-full text-sm font-bold transition-all border shadow-sm"
                                :class="currentCity == '{{ $city->id }}' ? 'bg-black text-white border-black' : 'bg-white text-stone-600 border-stone-100 hover:border-stone-300'">
                             {{ $city->nom }}
                        </button>
                        @endforeach
                     </div>
                </div>

                <!-- 2. DESTINATION -->
                <div class="space-y-3 flex-1 overflow-hidden flex flex-col">
                     <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Destination</label>
                     <div class="overflow-y-auto no-scrollbar flex flex-col gap-2 flex-1 pr-2">
                        <button @click="applyFilter('dest', '')" 
                                class="w-full text-left px-5 py-3 rounded-2xl text-sm font-bold transition-all border shadow-sm flex items-center justify-between group"
                                :class="!currentDest ? 'bg-black text-white border-black' : 'bg-white text-stone-600 border-stone-100 hover:border-stone-300'">
                             <span>All Destinations</span>
                             <i class="fas fa-check" x-show="!currentDest"></i>
                        </button>
                        @foreach($allDestinations as $dest)
                        <button @click="applyFilter('dest', '{{ $dest->id }}')" 
                                x-show="!currentCity || '{{ $dest->city_id }}' == currentCity"
                                class="w-full text-left px-5 py-3 rounded-2xl text-sm font-bold transition-all border shadow-sm flex items-center justify-between group"
                                :class="currentDest == '{{ $dest->id }}' ? 'bg-black text-white border-black' : 'bg-white text-stone-600 border-stone-100 hover:border-stone-300'">
                             <span>{{ $dest->nom }}</span>
                             <i class="fas fa-check" x-show="currentDest == '{{ $dest->id }}'"></i>
                        </button>
                        @endforeach
                     </div>
                </div>

                <!-- 3. TYPE -->
                <div class="space-y-3">
                     <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400">Media Type</label>
                     <div class="grid grid-cols-3 gap-2 bg-stone-100 p-1.5 rounded-[20px]">
                        <button @click="applyFilter('type', '')" class="py-2.5 rounded-[16px] text-[10px] font-bold uppercase tracking-wider transition-all" :class="!currentType ? 'bg-white text-black shadow-md' : 'text-stone-400 hover:text-stone-600'">All</button>
                        <button @click="applyFilter('type', 'image')" class="py-2.5 rounded-[16px] text-[10px] font-bold uppercase tracking-wider transition-all" :class="currentType === 'image' ? 'bg-white text-black shadow-md' : 'text-stone-400 hover:text-stone-600'">Photos</button>
                        <button @click="applyFilter('type', 'video')" class="py-2.5 rounded-[16px] text-[10px] font-bold uppercase tracking-wider transition-all" :class="currentType === 'video' ? 'bg-white text-black shadow-md' : 'text-stone-400 hover:text-stone-600'">Videos</button>
                     </div>
                </div>

                 <div class="mt-auto pt-6 border-t border-stone-200/50">
                    <button @click="togglePanel()" 
                            class="w-full py-4 bg-[#C8102E] text-white font-bold rounded-[20px] text-sm uppercase tracking-widest hover:bg-[#A00C24] hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-red-900/20 flex items-center justify-center gap-2"
                            :disabled="loading">
                        <span x-show="!loading">View <span x-text="resultCount"></span> Results</span>
                        <span x-show="loading"><i class="fas fa-circle-notch fa-spin"></i> Updating...</span>
                    </button>
                </div>

            </div>
        </div>
        <template x-teleport="body">
            <div x-show="modalOpen" 
                 x-transition:enter="transition ease-out duration-300 bg-opacity-0"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[99999] flex items-center justify-center bg-black/90 backdrop-blur-xl"
                 @keydown.escape.window="closeModal()">
                
                <!-- Close Button (Top Right, Clean unique X) -->
                <button @click="closeModal()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-all z-50">
                    <i class="fas fa-times text-lg"></i>
                </button>

                <!-- Modal Content Wrapper -->
                <div class="relative w-full h-full max-w-7xl mx-auto p-4 md:p-10 flex flex-col items-center justify-center" @click.outside="closeModal()">
                    
                    <!-- The Media -->
                    <div class="relative rounded-lg overflow-hidden shadow-2xl max-h-[85vh]">
                        <template x-if="activeItem && activeItem.type === 'image'">
                            <img :src="activeItem.url" class="max-w-full max-h-[85vh] object-contain rounded-lg">
                        </template>
                        
                        <template x-if="activeItem && activeItem.type === 'video'">
                            <video id="modal-video" class="max-w-full max-h-[85vh] object-contain rounded-lg" controls loop muted playsinline>
                                <source :src="activeItem.url" type="video/mp4">
                            </video>
                        </template>
                    </div>

                    <!-- Bottom Info/Actions -->
                    <div class="mt-6 flex flex-col md:flex-row items-center gap-6 text-white text-center md:text-left">
                        <div>
                            <h3 class="text-2xl font-playfair font-bold" x-text="activeItem ? activeItem.title : ''"></h3>
                            <p class="text-sm text-stone-400 uppercase tracking-widest mt-1" x-text="activeItem ? activeItem.category : ''"></p>
                        </div>
                        
                        <a :href="activeItem ? activeItem.url : '#'" download class="px-6 py-2.5 bg-white text-stone-900 rounded-full font-bold text-xs uppercase tracking-widest hover:bg-[#C8102E] hover:text-white transition-colors">
                            Download Asset
                        </a>
                    </div>

                </div>
            </div>
        </template>

    </div>
    
    <script>
        // AJAX Filtering Logic
        window.filterContent = function(params) {
            const gridContainer = document.getElementById('gallery-grid');
            
            // Show loading state (optional, can be skeleton or opacity)
            gridContainer.style.opacity = '0.5';
            
            // 1. URL for Browser History (Clean)
            const historyParams = { ...params };
            delete historyParams.mode; // Ensure we never push 'mode=partial' to address bar
            const historyQueryString = new URLSearchParams(historyParams).toString();
            const historyUrl = `{{ route('partners.hub') }}?${historyQueryString}`;
            
            // 2. URL for AJAX Fetch (Technical)
            const fetchParams = { ...params };
            fetchParams.mode = 'partial';
            const fetchQueryString = new URLSearchParams(fetchParams).toString();
            const fetchUrl = `{{ route('partners.hub') }}?${fetchQueryString}`;
            
            // Update URL without refresh
            window.history.pushState({}, '', historyUrl);

            fetch(fetchUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                gridContainer.innerHTML = html;
                gridContainer.style.opacity = '1';
                
                // Extract new count
                const countInput = document.getElementById('hidden-total-count');
                if(countInput) {
                    const count = countInput.value;
                    // Dispatch event for Alpine
                    window.dispatchEvent(new CustomEvent('filter-updated', { detail: { count: count } }));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                gridContainer.style.opacity = '1';
            });
        };
        
        // Handle Back/Forward Browser Buttons
        window.onpopstate = function(event) {
             window.location.reload();
        };

        // Handle Pagination Clicks via AJAX
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const link = e.target.closest('.pagination a');
                const url = link.href;
                
                const gridContainer = document.getElementById('gallery-grid');
                gridContainer.style.opacity = '0.5';
                
                window.history.pushState({}, '', url);
                
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(res => res.text())
                    .then(html => {
                        gridContainer.innerHTML = html;
                        gridContainer.style.opacity = '1';
                         document.querySelector('.relative.z-40').scrollIntoView({ behavior: 'smooth' });
                    });
            }
        });
    </script>
    
    <!-- Custom Style Removed (Reverted to specific page styles only) -->
    <style>
        /* Hide scrollbar for dropdowns */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Custom Pagination adjustment if needed */
        .pagination span, .pagination a {
            border-radius: 9999px !important;
            margin: 0 4px;
        }
    </style>
@endsection
