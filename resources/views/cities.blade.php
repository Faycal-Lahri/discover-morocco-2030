@extends('layouts.app')

@section('content')
    <div x-data="{ 
                        filter: 'all', 
                        search: '',
                        items: [
                            @foreach($cities as $city)
                                {
                                    id: 'city-{{ $city->id }}',
                                    type: 'city',
                                    name: '{{ addslashes($city->nom) }}',
                                    image: '{{ $city->image ? (Str::startsWith($city->image, 'http') ? $city->image : asset('storage/' . $city->image)) : asset('assets/images/morocco_hero_new.png') }}',
                                    desc: '{{ addslashes(Str::limit($city->description, 100)) }}',
                                    link: '{{ route('cities.show', $city->id) }}',
                                    tag: '{{ $city->label ?? 'City' }}'
                                },
                            @endforeach
                            @foreach($destinations as $destination)
                                {
                                    id: 'dest-{{ $destination->id }}',
                                    type: 'destination',
                                    name: '{{ addslashes($destination->nom) }}',
                                    image: '{{ $destination->image ? (Str::startsWith($destination->image, 'http') ? $destination->image : (Str::startsWith($destination->image, 'images/') ? asset($destination->image) : asset('storage/' . $destination->image))) : asset('assets/images/morocco_hero_new.png') }}',
                                    desc: '{{ addslashes(Str::limit($destination->description, 100)) }}',
                                    link: '{{ route('destinations.show', $destination->id) }}',
                                    tag: '{{ addslashes($destination->city->nom ?? 'Destination') }}'
                                },
                            @endforeach
                        ],
                        get filteredItems() {
                            return this.items.filter(item => {
                                const matchesFilter = this.filter === 'all' || item.type === this.filter;
                                const matchesSearch = item.name.toLowerCase().includes(this.search.toLowerCase()) || item.tag.toLowerCase().includes(this.search.toLowerCase());
                                return matchesFilter && matchesSearch;
                            });
                        }
                    }">

    <!-- WRAPPER FOR SCROLL ANIMATION -->
    <div class="relative w-full bg-stone-50 pb-0">

        <!-- HERO SECTION (Video Background) -->
        <style>
             @keyframes fadeUpStagger {
                from { opacity: 0; transform: translateY(40px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-title-word {
                display: inline-block;
                opacity: 0;
                animation: fadeUpStagger 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            }
            @keyframes scrollDrop {
                0% { top: -50%; opacity: 0; }
                50% { opacity: 1; }
                100% { top: 100%; opacity: 0; }
            }
            .animate-scroll-drop {
                animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite;
            }
        </style>

        <div id="hero-container" class="relative w-full h-screen overflow-hidden bg-stone-900 mx-auto">
             <!-- Video Background -->
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60 scale-105">
                <source src="{{ asset('videos/about.mp4') }}" type="video/mp4">
            </video>
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-stone-900/50 via-transparent to-stone-900/90"></div>
            
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 z-10 pt-20">
                <h1 class="text-6xl md:text-9xl font-playfair font-black text-white leading-[0.85] drop-shadow-2xl tracking-tight">
                    <span class="animate-title-word" style="animation-delay: 0.3s;">Discover</span>
                    <br class="hidden md:block" />
                    <span class="animate-title-word text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] via-[#f3e5ab] to-[#d4af37]" style="animation-delay: 0.5s;">Morocco</span>
                </h1>
                
                <p class="mt-8 text-xl md:text-2xl font-light text-stone-200 max-w-2xl mx-auto leading-relaxed opacity-0 animate-[fadeIn_1s_ease-out_1.2s_forwards]">
                    Start your journey through the imperial cities, coastal gems, and desert mysteries.
                </p>
            </div>
            
             <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3 z-20 cursor-pointer" @click="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">
                <span class="text-[9px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
                <div class="w-[1px] h-12 bg-white/10 relative overflow-hidden rounded-full">
                    <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-[#d4af37] animate-scroll-drop"></div>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="relative bg-stone-50 min-h-screen py-24 overflow-hidden">
            <!-- ZELLIGE BACKGROUND PATTERN -->
            <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 400px;">
            </div>

            <div class="container mx-auto px-6 relative z-10">

                <!-- CONTROLS: SEARCH (LEFT) & FILTERS (RIGHT) -->
                <div class="flex flex-col lg:flex-row justify-between items-end mb-16 gap-6 animate-fade-in-up delay-300">
                    
                    <!-- Search Bar -->
                    <div class="w-full lg:max-w-md relative group">
                        <input x-model="search" type="text" placeholder="Search cities, places..."
                            class="w-full py-4 pl-14 pr-6 bg-white border border-stone-200 rounded-full text-stone-800 placeholder-stone-400 focus:outline-none focus:border-[#C8102E] focus:ring-1 focus:ring-[#C8102E] transition-all duration-300 shadow-sm group-hover:shadow-md text-base font-outfit">
                        <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-[#C8102E] transition-colors"></i>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="flex-shrink-0 inline-flex bg-white p-1.5 rounded-full shadow-sm border border-stone-200 overflow-x-auto max-w-full">
                        <button @click="filter = 'all'"
                            :class="filter === 'all' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-8 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">
                            All
                        </button>
                        <button @click="filter = 'city'"
                            :class="filter === 'city' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-8 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">
                            Cities
                        </button>
                        <button @click="filter = 'destination'"
                            :class="filter === 'destination' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-8 py-2.5 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300 whitespace-nowrap">
                            Destinations
                        </button>
                    </div>
                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <template x-for="item in filteredItems" :key="item.id">
                        <a :href="item.link"
                            class="group block bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <!-- Image -->
                            <div class="h-72 relative overflow-hidden">
                                <img :src="item.image"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>

                                <!-- Badges -->
                                <div class="absolute top-4 left-4 flex gap-2">
                                    <span x-show="item.type === 'city'"
                                        class="px-3 py-1 bg-black/50 backdrop-blur-sm text-white text-[10px] uppercase font-bold tracking-wider rounded-full">City</span>
                                    <span x-show="item.type === 'destination'"
                                        class="px-3 py-1 bg-[#C8102E]/80 backdrop-blur-sm text-white text-[10px] uppercase font-bold tracking-wider rounded-full">Place</span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <span class="text-[#d4af37] text-[10px] font-bold uppercase tracking-widest block mb-2"
                                    x-text="item.tag"></span>
                                <h3 class="text-2xl font-playfair font-black text-stone-900 mb-3 group-hover:text-[#C8102E] transition-colors"
                                    x-text="item.name"></h3>
                                <p class="text-stone-500 text-sm leading-relaxed line-clamp-2 font-light mb-6"
                                    x-text="item.desc"></p>

                                <div
                                    class="flex items-center text-[#C8102E] text-xs font-bold uppercase tracking-widest gap-2 group-hover:gap-4 transition-all">
                                    <span x-text="item.type === 'city' ? 'Discover City' : 'View Details'"></span>
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>

                <!-- Empty State -->
                <div x-show="filteredItems.length === 0" class="text-center py-24 hidden"
                    :class="{'block': filteredItems.length === 0}">
                    <div
                        class="w-20 h-20 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-6 text-stone-300">
                        <i class="fas fa-search text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-playfair font-bold text-stone-400">No results found</h3>
                    <p class="text-stone-400 mt-2">Try adjusting your search or filters</p>
                </div>

            </div>
        </div>
    </div>
@endsection