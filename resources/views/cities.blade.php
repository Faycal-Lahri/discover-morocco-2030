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
                            image: '{{ asset($city->image) }}',
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
                            image: '{{ $destination->image ? (Str::startsWith($destination->image, 'http') ? $destination->image : asset($destination->image)) : asset('assets/images/morocco_hero_new.png') }}',
                            desc: '{{ addslashes(Str::limit($destination->description, 100)) }}',
                            link: '{{ route('cities.show', $destination->city_id) }}#experiences',
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

        <!-- HERO SECTION -->
        <div class="relative h-[60vh] min-h-[500px] overflow-hidden">
            <div class="absolute inset-0">
                <!-- Fallback Image if needed, or dynamic random -->
                <img src="{{ asset('assets/images/morocco_hero.png') }}" class="w-full h-full object-cover animate-pan-slow"
                    alt="Morocco">
                <div class="absolute inset-0 bg-stone-900/60"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-stone-50 via-transparent to-black/30"></div>
            </div>

            <div
                class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center items-center text-center pt-20">
                <span class="text-[#d4af37] font-bold tracking-[0.3em] uppercase mb-4 animate-fade-in-up">Start Your
                    Journey</span>
                <h1 class="text-6xl md:text-8xl font-playfair font-black text-white mb-8 animate-fade-in-up delay-100">
                    Discover Morocco
                </h1>

                <!-- SEARCH BAR -->
                <div class="w-full max-w-2xl relative animate-fade-in-up delay-200">
                    <input x-model="search" type="text" placeholder="Search cities, places..."
                        class="w-full py-5 pl-14 pr-6 bg-white/10 backdrop-blur-md border border-white/30 rounded-full text-white placeholder-white/70 focus:bg-white focus:text-stone-900 focus:placeholder-stone-400 focus:ring-0 focus:border-white transition-all duration-300 shadow-2xl text-lg font-outfit">
                    <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-white/70"></i>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="bg-stone-50 min-h-screen py-12 relative overflow-hidden">
            <!-- ZELLIGE BACKGROUND PATTERN -->
            <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 400px;">
            </div>

            <div class="container mx-auto px-6 relative z-10">

                <!-- FILTERS -->
                <div class="flex justify-center mb-16 animate-fade-in-up delay-300">
                    <div class="inline-flex bg-white p-1.5 rounded-full shadow-sm border border-stone-200">
                        <button @click="filter = 'all'"
                            :class="filter === 'all' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300">
                            All
                        </button>
                        <button @click="filter = 'city'"
                            :class="filter === 'city' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300">
                            Cities
                        </button>
                        <button @click="filter = 'destination'"
                            :class="filter === 'destination' ? 'bg-[#C8102E] text-white' : 'text-stone-500 hover:text-stone-900'"
                            class="px-6 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-all duration-300">
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

    <style>
        @keyframes panSlow {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .animate-pan-slow {
            animation: panSlow 20s infinite alternate linear;
        }
    </style>
@endsection