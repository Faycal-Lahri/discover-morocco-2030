@extends('layouts.app')

@section('content')
    <!-- HERO SECTION - Simplified & Elegant -->
    <div class="relative h-[85vh] w-full overflow-hidden bg-black">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            @if($city->image)
                @php
                    $imagePath = str_starts_with($city->image, 'http')
                        ? $city->image
                        : (str_starts_with($city->image, 'cities/') || str_starts_with($city->image, 'destinations/')
                            ? asset('storage/' . $city->image)
                            : asset($city->image));
                @endphp
                <img src="{{ $imagePath }}" class="w-full h-full object-cover animate-pan-slow opacity-90">
            @else
                <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover opacity-90">
            @endif
            <!-- Subtle Gradient for text readability - No heavy boxes -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/30"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 h-full flex flex-col justify-end pb-32 items-center text-center px-4 max-w-5xl mx-auto">

            <h1
                class="text-8xl md:text-[10rem] font-bold font-playfair text-white tracking-tighter mb-6 drop-shadow-xl leading-[0.8]">
                {{ $city->nom }}
            </h1>

            <div class="flex items-center gap-4 mb-8">
                <div class="h-px w-12 bg-white/50"></div>
                <span
                    class="text-white/80 uppercase tracking-[0.3em] text-xs font-bold">{{ $city->titre ?? 'The Kingdom of Morocco' }}</span>
                <div class="h-px w-12 bg-white/50"></div>
            </div>

            <p
                class="text-white/90 text-lg md:text-2xl font-light font-outfit max-w-2xl leading-relaxed drop-shadow-md mb-10">
                {{ $city->description }}
            </p>

            <button onclick="document.getElementById('experiences').scrollIntoView({behavior: 'smooth'})"
                class="group relative inline-flex items-center gap-3 px-8 py-4 bg-white text-black hover:bg-[#C8102E] hover:text-white rounded-full transition-all duration-300">
                <span class="text-xs font-bold uppercase tracking-widest">Start Exploring</span>
                <i class="fas fa-arrow-down transform group-hover:translate-y-1 transition-transform"></i>
            </button>
        </div>
    </div>

    <!-- MAIN CONTENT - Minimalist -->
    <div class="bg-white relative z-10 overflow-hidden">
        <!-- Zellige Pattern Background -->
        <div class="absolute inset-0 pointer-events-none opacity-[0.03] z-0"
            style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 400px;">
        </div>

        <!-- Experiences Section -->
        <section id="experiences" class="py-24 container mx-auto px-6 md:px-12">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <span class="text-[#006233] font-bold uppercase tracking-widest text-xs block mb-3">Discover
                    {{ $city->nom }}</span>
                <h2 class="text-4xl md:text-6xl font-playfair font-bold text-[#1A1A1A]">
                    Unforgettable Moments
                </h2>
                <div class="w-px h-16 bg-[#C8102E] mx-auto mt-8"></div>
            </div>

            @if($city->destinations->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-16">
                    @foreach($city->destinations as $destination)
                        <div class="group cursor-pointer">
                            <!-- Image Carousel Container -->
                            <div class="aspect-[3/4] overflow-hidden rounded-[2rem] relative mb-6 bg-gray-100"
                                x-data="carousel{{ $loop->index }}">
                                @php
                                    // Collect all images: cover image + gallery images
                                    $allImages = collect();

                                    // Add cover image first if exists
                                    if ($destination->image) {
                                        $coverPath = str_starts_with($destination->image, 'http')
                                            ? $destination->image
                                            : (str_starts_with($destination->image, 'destinations/') || str_starts_with($destination->image, 'cities/')
                                                ? asset('storage/' . $destination->image)
                                                : asset($destination->image));
                                        $allImages->push($coverPath);
                                    }

                                    // Add gallery images
                                    if ($destination->destinationImages && $destination->destinationImages->count() > 0) {
                                        foreach ($destination->destinationImages as $galleryImg) {
                                            $imgPath = str_starts_with($galleryImg->image, 'http')
                                                ? $galleryImg->image
                                                : (str_starts_with($galleryImg->image, 'destinations/') || str_starts_with($galleryImg->image, 'cities/')
                                                    ? asset('storage/' . $galleryImg->image)
                                                    : asset($galleryImg->image));
                                            $allImages->push($imgPath);
                                        }
                                    }
                                @endphp

                                @if($allImages->count() > 0)
                                    <!-- Images -->
                                    @foreach($allImages as $imgIndex => $imagePath)
                                        <div x-show="current === {{ $imgIndex }}" x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            class="absolute inset-0">
                                            <img src="{{ $imagePath }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        </div>
                                    @endforeach

                                    <!-- Navigation Arrows (only show if multiple images) -->
                                    @if($allImages->count() > 1)
                                        <button @click.stop="prev()"
                                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button @click.stop="next()"
                                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-2 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>

                                        <!-- Dots Indicator -->
                                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10">
                                            @foreach($allImages as $dotIndex => $img)
                                                <button @click.stop="current = {{ $dotIndex }}"
                                                    :class="current === {{ $dotIndex }} ? 'bg-white w-8' : 'bg-white/50 w-2'"
                                                    class="h-2 rounded-full transition-all duration-300">
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                                        <i class="fas fa-image text-4xl"></i>
                                    </div>
                                @endif

                                <!-- Floating Tag -->
                                <div
                                    class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full text-[10px] font-bold uppercase tracking-wider text-[#1A1A1A] shadow-sm z-10">
                                    {{ $destination->label ?? 'Experience' }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="px-2">
                                <h3
                                    class="text-2xl font-playfair font-bold text-[#1A1A1A] mb-3 group-hover:text-[#C8102E] transition-colors leading-tight">
                                    {{ $destination->nom }}
                                </h3>
                                <p class="text-stone-500 font-outfit text-sm leading-relaxed mb-4 line-clamp-3">
                                    {{ $destination->description }}
                                </p>
                                <div
                                    class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#C8102E] group-hover:gap-4 transition-all">
                                    <span>Read More</span>
                                    <i class="fas fa-arrow-right text-[10px]"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-20 text-center bg-stone-50 rounded-3xl">
                    <p class="text-stone-400 font-playfair text-xl italic">Curating experiences for you...</p>
                </div>
            @endif

        </section>

        <!-- Location Map Section -->
        <section class="py-24 bg-stone-50 relative overflow-hidden">
            <!-- Zellige Pattern Background -->
            <div class="absolute inset-0 pointer-events-none opacity-[0.04] z-0"
                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 400px;">
            </div>
            
            <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-10">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-5xl md:text-6xl font-playfair font-bold text-[#1A1A1A] mb-4">
                        Find {{ $city->nom }}
                    </h2>
                    <p class="text-stone-600 text-base max-w-2xl mx-auto">
                        Discover where {{ $city->nom }} is located in the Kingdom of Morocco
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <!-- Map Container -->
                    <div class="order-2 lg:order-1">
                        <div class="relative rounded-2xl overflow-hidden shadow-xl bg-white border-4 border-stone-100">
                            <div id="city-map" class="w-full h-[500px]"></div>
                        </div>
                    </div>

                    <!-- City Info Cards -->
                    <div class="order-1 lg:order-2 space-y-6">
                        <!-- Geographic Position Card -->
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-stone-100">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#C8102E] rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <h3 class="text-xl font-bold text-[#1A1A1A]">Geographic Position</h3>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-[#006233] mt-1"></i>
                                    <div>
                                        <p class="text-sm font-semibold text-stone-500">Latitude:</p>
                                        <p class="text-lg font-bold text-stone-900">{{ $city->latitude ?? 'N/A' }}°</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-[#006233] mt-1"></i>
                                    <div>
                                        <p class="text-sm font-semibold text-stone-500">Longitude:</p>
                                        <p class="text-lg font-bold text-stone-900">{{ $city->longitude ?? 'N/A' }}°</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About Card with Gradient -->
                        <div
                            class="bg-gradient-to-br from-[#C8102E] via-[#a00d25] to-[#006233] rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
                            <!-- Decorative Pattern -->
                            <div class="absolute inset-0 opacity-10"
                                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 200px;">
                            </div>

                            <div class="relative z-10">
                                <h3 class="text-2xl font-playfair font-bold mb-4 flex items-center gap-2">
                                    <i class="fas fa-info-circle text-xl"></i>
                                    About {{ $city->nom }}
                                </h3>
                                <p class="text-white/95 leading-relaxed text-base">
                                    {{ $city->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Attractions Card -->
                        @if($city->destinations && $city->destinations->count() > 0)
                            <div class="bg-white rounded-2xl p-8 shadow-lg border border-stone-100">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-12 h-12 bg-[#006233] rounded-full flex items-center justify-center">
                                        <i class="fas fa-landmark text-white text-lg"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-[#1A1A1A]">Attractions</h3>
                                </div>
                                <p class="text-stone-600 leading-relaxed">
                                    Discover <strong class="text-[#C8102E] text-lg">{{ $city->destinations->count() }} amazing
                                        destinations</strong> in {{ $city->nom }}, from historic landmarks to cultural
                                    experiences.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Navigation Strip - Moroccan Red & Green Theme -->
        <section class="py-24 relative overflow-hidden bg-[#C8102E] text-white border-t-8 border-[#006233]">
            <!-- Zellige Pattern Overlay -->
            <div class="absolute inset-0 z-0 opacity-10"
                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px;">
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex items-center justify-between mb-16">
                    <div>
                        <span
                            class="text-[#006233] bg-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest mb-3 inline-block shadow-md">Explore
                            More</span>
                        <h3 class="text-4xl md:text-5xl font-playfair font-black text-white drops-shadow-md">Continue Your
                            Journey</h3>
                    </div>
                    <a href="{{ route('cities') }}"
                        class="group flex items-center gap-3 bg-white text-[#C8102E] px-6 py-3 rounded-full font-bold uppercase tracking-widest text-xs hover:bg-[#006233] hover:text-white transition-all shadow-lg">
                        <span>View Map</span>
                        <i class="fas fa-map-marked-alt group-hover:rotate-12 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 max-w-7xl mx-auto">
                    @foreach($otherCities as $nextCity)
                        <a href="{{ route('cities.show', $nextCity->id) }}" class="group block text-center relative">
                            <!-- Arch Shape Container -->
                            <div
                                class="w-full aspect-[2/3] rounded-t-full rounded-b-[2rem] overflow-hidden mb-6 border-4 border-white/20 group-hover:border-[#006233] group-hover:-translate-y-3 transition-all duration-500 relative shadow-2xl bg-black/20">
                                @if($nextCity->image)
                                    <img src="{{ asset($nextCity->image) }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                                @else
                                    <div class="w-full h-full bg-stone-800 flex items-center justify-center text-white/20">
                                        <i class="fas fa-city text-3xl"></i>
                                    </div>
                                @endif

                                <!-- Green Gradient Overlay on Hover -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#006233]/80 via-[#006233]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Discover Button Overlay -->
                                <div
                                    class="absolute bottom-0 left-0 w-full p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <span
                                        class="inline-block px-4 py-1 bg-white text-[#C8102E] text-[10px] font-bold uppercase tracking-widest rounded-full shadow-lg">Discover</span>
                                </div>
                            </div>

                            <div class="relative transform group-hover:scale-105 transition-transform duration-300">
                                <h4
                                    class="font-playfair font-bold text-2xl text-white mb-2 group-hover:text-[#f3e5ab] transition-colors drop-shadow-md">
                                    {{ $nextCity->nom }}
                                </h4>
                                <div
                                    class="h-0.5 w-8 bg-[#006233] mx-auto group-hover:w-24 group-hover:bg-[#f3e5ab] transition-all duration-500 rounded-full">
                                </div>
                                <span
                                    class="text-[10px] text-white/60 uppercase tracking-[0.2em] mt-2 block group-hover:text-white transition-colors">{{ $nextCity->titre ?? 'MOROCCO' }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <style>
        @keyframes pan-slow {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .animate-pan-slow {
            animation: pan-slow 20s infinite alternate linear;
        }
    </style>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if($city->latitude && $city->longitude)
                // Initialize the map centered on the city
                const map = L.map('city-map').setView([{{ $city->latitude }}, {{ $city->longitude }}], 8);

                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 19,
                }).addTo(map);

                // Simple red marker pin
                const customIcon = L.divIcon({
                    className: 'custom-marker',
                    html: `
                        <div style="position: relative; width: 30px; height: 40px;">
                            <div style="width: 30px; height: 30px; background: #C8102E; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>
                            <div style="position: absolute; top: 8px; left: 8px; width: 8px; height: 8px; background: white; border-radius: 50%;"></div>
                        </div>
                    `,
                    iconSize: [30, 40],
                    iconAnchor: [15, 40],
                    popupAnchor: [0, -40]
                });

                // Add marker for the city
                const marker = L.marker([{{ $city->latitude }}, {{ $city->longitude }}], {
                    icon: customIcon
                }).addTo(map);

                // Add popup to marker
                marker.bindPopup(`
                                                                    <div style="text-align: center; padding: 10px;">
                                                                        <h3 style="margin: 0 0 8px 0; font-size: 18px; font-weight: bold; color: #C8102E;">{{ $city->nom }}</h3>
                                                                        <p style="margin: 0; font-size: 14px; color: #666;">{{ $city->titre }}</p>
                                                                        <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid #ddd;">
                                                                            <small style="color: #999;">📍 {{ $city->latitude }}°, {{ $city->longitude }}°</small>
                                                                        </div>
                                                                    </div>
                                                                `).openPopup();

                // Add Morocco boundary (approximate)
                const moroccoBounds = [
                    [27.6, -13.2],
                    [35.9, -1.0]
                ];

                // Optionally show Morocco outline
                L.rectangle(moroccoBounds, {
                    color: '#006233',
                    weight: 2,
                    fillOpacity: 0.05,
                    dashArray: '5, 10'
                }).addTo(map);
            @else
                // Fallback if no coordinates
                document.getElementById('city-map').innerHTML = `
                                                                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f5f5f5; border-radius: 1rem;">
                                                                        <div style="text-align: center; color: #999;">
                                                                            <i class="fas fa-map-marked-alt" style="font-size: 48px; margin-bottom: 16px;"></i>
                                                                            <p>Map coordinates not available</p>
                                                                        </div>
                                                                    </div>
                                                                `;
            @endif
                                });

        // Initialize carousels for each destination
        @foreach($city->destinations as $index => $destination)
            @php
                $allImagesCount = collect();
                if ($destination->image)
                    $allImagesCount->push(1);
                if ($destination->destinationImages) {
                    $allImagesCount = $allImagesCount->merge($destination->destinationImages);
                }
                $totalImages = $allImagesCount->count();
            @endphp
            document.addEventListener('alpine:init', () => {
                Alpine.data('carousel{{ $index }}', () => ({
                    current: 0,
                    total: {{ $totalImages }},
                    next() {
                        this.current = (this.current + 1) % this.total;
                    },
                    prev() {
                        this.current = (this.current - 1 + this.total) % this.total;
                    }
                }));
                });
        @endforeach
        </script>
@endsection