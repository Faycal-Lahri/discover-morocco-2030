@extends('layouts.app')

@section('content')
    <!-- 1. HERO VIDEO -->
    <div class="relative w-full h-screen overflow-hidden bg-black group">
        <!-- Video Container -->
        <div class="relative w-full h-full">
            <video autoplay muted loop playsinline class="w-full h-full object-cover" id="hero-video">
                <source src="{{ asset('videos/home page - Made with Clipchamp.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black/80"></div>

            <!-- Text Overlay -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 pt-20 z-10">

                <h1
                    class="hero-content text-6xl md:text-8xl lg:text-9xl font-playfair font-black mb-6 leading-none tracking-tighter drop-shadow-2xl opacity-0 translate-y-4 transition-all duration-700 delay-500">
                    Unlock <br> <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] via-[#f3e5ab] to-[#d4af37] italic pr-4">Morocco</span>
                </h1>
                <p
                    class="hero-content text-lg md:text-xl font-light max-w-2xl text-stone-200 mb-10 leading-relaxed drop-shadow-lg opacity-0 translate-y-4 transition-all duration-700 delay-700">
                    Where ancient soul meets future vision.
                </p>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <!-- Scroll Indicator (Premium Drop Line) -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-20">
            <span
                class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
            <div class="w-[1px] h-16 bg-gradient-to-b from-white/10 to-transparent relative overflow-hidden rounded-full">
                <div
                    class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-white animate-scroll-drop">
                </div>
            </div>
        </div>
    </div>





    <style>
        .marquee-container {
            width: 100%;
            overflow: hidden;
        }

        .marquee-content {
            display: inline-flex;
            animation: marquee 30s linear infinite;
            padding-left: 100%;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .marquee-content:hover {
            animation-play-state: paused;
        }

        /* Scroll Drop Animation */
        @keyframes scrollDrop {
            0% {
                top: -50%;
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                top: 100%;
                opacity: 0;
            }
        }

        .animate-scroll-drop {
            animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite;
        }
    </style>

    <!-- 4. INTRO (MARHABA) -->
    <section class="py-24 bg-stone-50 relative overflow-hidden">
        <!-- Moroccan Zellige Background Pattern -->
        <div class="absolute inset-0 opacity-[0.08] pointer-events-none" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); 
                       background-size: 300px; 
                       background-repeat: repeat;
                       background-position: center;">
        </div>

        <!-- Gradient Overlays for Depth -->
        <div class="absolute inset-0 bg-gradient-to-b from-stone-50/80 via-transparent to-stone-50/80 pointer-events-none">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#C8102E]/5 via-transparent to-[#006233]/5 pointer-events-none">
        </div>

        <div class="container mx-auto px-6 md:px-12 max-w-4xl text-center relative z-10">
            <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-4 block">Marhaba</span>
            <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-8 leading-tight">
                Welcome to the detailed guide <br> for <span class="italic text-[#C8102E]">discovering Morocco</span>
            </h2>
            <p class="text-lg text-stone-600 leading-relaxed mb-10">
                Immerse yourself in a land of contrasts. From the imperial cities of Fez and Marrakech to the vast expanse
                of the Sahara Desert and the blue streets of Chefchaouen. Morocco offers a sensory journey like no other.
            </p>

            <!-- Beautiful CTA Button -->
            <div class="flex flex-col items-center gap-6">
                <a href="{{ route('cities') }}"
                    class="group relative inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#C8102E] via-[#a00d25] to-[#006233] text-white rounded-full font-bold uppercase tracking-widest text-xs hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
                    <!-- Animated Shine Effect -->
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover:translate-x-[200%] transition-transform duration-1000">
                    </div>

                    <!-- Icon -->
                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </svg>

                    <span class="relative z-10">Start Exploring Morocco</span>

                    <!-- Arrow Icon -->
                    <svg class="w-4 h-4 group-hover:translate-x-2 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <!-- Decorative Zellige Pattern -->
                <img src="{{ asset('assets/images/zellige_pattern.png') }}" class="h-8 mx-auto opacity-20 animate-pulse"
                    alt="Divider">
            </div>
        </div>
    </section>

    <!-- WINTER OFFERS -->
    <section class="relative py-24 overflow-hidden text-white" style="background-color: #C8102E;">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px; transform: rotate(0deg);">
        </div>
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#8a0b20] to-transparent pointer-events-none"></div>

        <div class="container mx-auto px-6 md:px-12 flex flex-col lg:flex-row items-center gap-16 relative z-10">
            <!-- Left: Text -->
            <div class="w-full lg:w-1/3 text-left relative z-10">
                <h2
                    class="text-6xl md:text-8xl font-black font-playfair mb-12 leading-[0.85] tracking-tighter drop-shadow-lg">
                    Winter <br> <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-white to-white/70">Offers</span>
                </h2>

                <div class="flex items-start gap-6 pl-2">
                    <i class="fas fa-quote-left text-4xl text-white/40 mt-1"></i>
                    <p
                        class="text-xl md:text-2xl font-outfit font-light leading-relaxed text-stone-100 border-l border-white/20 pl-6 py-1">
                        Experience the warmth of Moroccan hospitality this winter.
                    </p>
                </div>
            </div>

            <!-- Right: Cards -->
            <div class="w-full lg:w-2/3 flex flex-col md:flex-row gap-6">
                <!-- Card 1 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden text-stone-900 w-full md:w-1/2 group cursor-pointer shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <!-- Image Area -->
                    <div class="h-80 relative font-outfit">
                        <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-80"></div>

                        <!-- Badge -->
                        <span
                            class="absolute top-4 right-4 bg-stone-900/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wide">30%
                            OFF</span>

                        <!-- Bottom Text on Image -->
                        <span class="absolute bottom-6 right-6 text-white text-xs font-bold uppercase tracking-widest">Visit
                            Sahara</span>
                    </div>
                    <!-- Content -->
                    <div class="p-8">
                        <h3 class="font-bold text-xl mb-3 text-stone-900 font-outfit">The Sahara Destination</h3>
                        <p class="text-xs text-stone-500 mb-8 leading-relaxed font-medium">Book 6 nights or more and enjoy
                            30% off at Desert Rock and Shebara Resort!</p>
                        <span
                            class="text-[#700548] text-xs font-bold uppercase flex items-center gap-2 group-hover:gap-4 transition-all">
                            View Offer <i class="fas fa-external-link-alt"></i>
                        </span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-2xl overflow-hidden text-stone-900 w-full md:w-1/2 group cursor-pointer shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <!-- Image Area -->
                    <div class="h-80 relative font-outfit">
                        <!-- Using a shield/protection metaphor image if available or generic scenic -->
                        <img src="{{ asset('assets/images/casablanca_cityscape.png') }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-blue-900/40 mix-blend-multiply"></div>

                        <!-- Badge -->
                        <span
                            class="absolute top-4 right-4 bg-blue-900/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wide">Special
                            Offer</span>

                        <!-- Center Icon for Insurance -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <i class="fas fa-shield-alt text-6xl text-white/80 drop-shadow-lg"></i>
                        </div>

                        <span class="absolute bottom-6 right-6 text-white text-xs font-bold uppercase tracking-widest">Royal
                            Air Maroc</span>
                    </div>
                    <!-- Content -->
                    <div class="p-8">
                        <span class="block text-[10px] text-stone-400 font-bold uppercase mb-2 tracking-wide">Valid From 03
                            Sep 2025</span>
                        <h3 class="font-bold text-xl mb-3 text-stone-900 font-outfit">Travel Insurance Plus</h3>
                        <p class="text-xs text-stone-500 mb-8 leading-relaxed font-medium">Travel worry-free with Insurance
                            covering medical emergencies, lost baggage & theft.</p>
                        <span
                            class="text-[#700548] text-xs font-bold uppercase flex items-center gap-2 group-hover:gap-4 transition-all">
                            View Offer <i class="fas fa-external-link-alt"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. KNOW THE DESTINATIONS (MAP) -->
    <section class="py-24 bg-stone-50 relative">
        <!-- Background Separator -->
        <div class="absolute bottom-0 left-0 w-full h-4 bg-gradient-to-r from-[#C8102E] via-[#006233] to-[#d4af37]"></div>

        <div class="container mx-auto px-6 md:px-12">
            <!-- Decorated Title -->
            <div class="mb-12 text-center">
                <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-4 block">Explore</span>
                <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 leading-tight">
                    Know the <span class="italic text-[#C8102E]">Destinations</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT: Card List -->
                <div class="lg:col-span-1 overflow-y-auto pr-2 space-y-4 no-scrollbar h-[400px] lg:h-[600px]"
                    id="destination-list">

                    <!-- Card 1: Marrakech -->
                    <div class="destination-card active group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(31.6295, -7.9811, 0)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/morocco_hero_new.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-cloud-sun"></i> 28°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Culture, History &
                            Lifestyle</p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Marrakech</h3>
                    </div>

                    <!-- Card 2: Chefchaouen -->
                    <div class="destination-card group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(35.1688, -5.2684, 1)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/morocco_hype.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-sun"></i> 24°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Nature, Photography
                        </p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Chefchaouen</h3>
                    </div>

                    <!-- Card 3: Casablanca -->
                    <div class="destination-card group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(33.5731, -7.5898, 2)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/casablanca_cityscape.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-wind"></i> 22°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Business,
                            Architecture</p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Casablanca</h3>
                    </div>

                    <!-- Card 4: Merzouga -->
                    <div class="destination-card group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(31.0802, -4.0134, 3)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/morocco_hero_real.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-sun"></i> 32°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Desert, Adventure</p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Merzouga</h3>
                    </div>

                    <!-- Card 5: Tangier -->
                    <div class="destination-card group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(35.7595, -5.8340, 4)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/casablanca_cityscape.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-water"></i> 23°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Coastal, History</p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Tangier</h3>
                    </div>

                    <!-- Card 6: Fez -->
                    <div class="destination-card group p-4 rounded-2xl border border-stone-200 bg-white cursor-pointer hover:border-[#C8102E] transition-all"
                        onclick="focusMap(34.0181, -5.0078, 5)">
                        <div class="relative h-40 rounded-xl overflow-hidden mb-4">
                            <img src="{{ asset('assets/images/morocco_hero_new.png') }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span
                                class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-full"><i
                                    class="fas fa-landmark"></i> 30°C</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#C8102E] mb-1">Spiritual, Crafts</p>
                        <h3 class="text-2xl font-playfair font-bold text-stone-900">Fez</h3>
                    </div>

                </div>

                <!-- RIGHT: MAP -->
                <div
                    class="lg:col-span-2 relative h-[400px] lg:h-[600px] rounded-[2rem] overflow-hidden shadow-inner border border-stone-200 bg-[#e0e7eb]">
                    <div id="morocco-map" class="w-full h-full z-10"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. DID YOU KNOW (Card Stack Slider) -->
    <section class="py-24 relative overflow-hidden" style="background-color: #f0fdf4;"> <!-- Very light green tint base -->

        <!-- Rich Zellige Background -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); 
                                background-size: 150px; 
                                background-repeat: repeat;">
        </div>

        <!-- Gradient Overlay for Depth -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#006233]/10 to-transparent pointer-events-none"></div>

        <style>
            /* Card Stack Styles */
            .card-stack-container {
                position: relative;
                width: 100%;
                max-width: 450px;
                height: 500px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto;
                perspective: 1000px;
            }

            .stack-card {
                position: absolute;
                width: 340px;
                height: 480px;
                background: white;
                border: 1px solid rgba(0, 0, 0, 0.05);
                border-radius: 2rem;
                padding: 3rem 2rem;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

                /* HIGH PERFORMANCE ANIMATION */
                /* Split transitions for better control and no lag */
                transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
                will-change: transform, opacity;
                transform-origin: 50% 100%;
                transform-style: preserve-3d;

                display: flex;
                flex-direction: column;
                justify-content: space-between;
                z-index: 0;
                overflow: hidden;
                opacity: 0;
                visibility: hidden;
            }

            /* Decorative Left Border */
            .stack-card::after {
                content: '';
                position: absolute;
                top: 2rem;
                bottom: 2rem;
                left: 0;
                width: 4px;
                background: #e5e5e5;
                border-radius: 0 4px 4px 0;
            }

            .stack-card[data-index="0"]::after {
                background: #006233;
            }

            .stack-card[data-index="1"]::after {
                background: #d4af37;
            }

            .stack-card[data-index="2"]::after {
                background: #C8102E;
            }


            /* Active Card (Front) */
            /* Using translate3d for GPU acceleration */
            .stack-card.active {
                opacity: 1;
                visibility: visible;
                transform: translate3d(0, 0, 0) scale(1) rotate(0);
                z-index: 30;
                pointer-events: auto;
            }

            /* Next Card (Right) */
            .stack-card.next {
                opacity: 1;
                visibility: visible;
                transform: translate3d(40px, 0, -40px) scale(0.95) rotate(4deg);
                z-index: 20;
                /* Removed filter: brightness to prevent lag */
            }

            /* Next 2 (Far Right) */
            .stack-card.next-2 {
                opacity: 1;
                visibility: visible;
                transform: translate3d(80px, 0, -80px) scale(0.9) rotate(8deg);
                z-index: 10;
            }

            /* Leaving Card - The "Better Animation" */
            .stack-card.leaving {
                opacity: 0;
                visibility: visible;
                /* Smooth "Throw Away" Gesture to the left */
                transform: translate3d(-180px, 20px, 0) rotate(-15deg);
                transition: transform 0.5s ease-in, opacity 0.3s ease-in;
                /* Faster exit */
                z-index: 40;
            }

            /* Navigation Arrows - Minimalist & Small */
            .stack-nav-btn {
                width: 2.5rem;
                /* 40px - Standard small size */
                height: 2.5rem;
                border-radius: 50%;
                background: white;
                color: #006233;
                border: 1px solid #006233;
                /* Thinner border */
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                /* Lighter shadow */
                transition: transform 0.2s ease, background 0.2s;
                z-index: 100;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer !important;
            }

            .stack-nav-btn:hover {
                background: #006233;
                color: white;
                transform: translateY(-50%) scale(1.05);
            }

            .stack-nav-btn i {
                font-size: 0.9rem;
            }

            /* Tiny icon */

            .stack-prev {
                left: -0.5rem;
            }

            .stack-next {
                right: -0.5rem;
            }

            @media (max-width: 768px) {

                /* Even smaller buttons on mobile */
                .stack-nav-btn {
                    width: 2.25rem;
                    height: 2.25rem;
                }

                .stack-prev {
                    left: 0;
                }

                .stack-next {
                    right: 0;
                }

                /* Fix Right Edge Overflow: Scale down cards */
                .card-stack-container {
                    perspective: 600px;
                    /* Reduce perspective depth */
                    height: 450px;
                    /* Compact height */
                }

                .stack-card {
                    width: 270px;
                    /* Ensure it fits on 320px screens with padding/stack */
                    height: 400px;
                    padding: 1.5rem 1.5rem;
                }

                /* Tighter Stacking Offsets for Mobile to keep within screen */
                .stack-card.next {
                    transform: translate3d(12px, 0, -20px) scale(0.96) rotate(3deg);
                }

                /* Hide the 3rd card on mobile to absolutely prevent right-overflow */
                .stack-card.next-2 {
                    opacity: 0;
                    visibility: hidden;
                    transform: translate3d(0, 0, 0);
                }

                .stack-card.leaving {
                    transform: translate3d(-200px, 0, 0) rotate(-10deg);
                }
            }
        </style>

        <div
            class="container mx-auto px-6 md:px-12 relative z-10 h-full flex flex-col lg:flex-row items-center cursor-default">

            <!-- LEFT: Content -->
            <div class="w-full lg:w-1/2 mb-16 lg:mb-0 pt-12 lg:pt-0 z-20">
                <div class="animate-fade-in-up">
                    <span
                        class="inline-block py-2 px-4 bg-[#006233]/10 border border-[#006233]/20 rounded-full text-[#006233] text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-sm">
                        Discover Truths
                    </span>
                    <h2
                        class="text-6xl md:text-8xl font-playfair font-black text-[#006233] mb-8 leading-[0.9] drop-shadow-sm scale-y-110 origin-left">
                        Did you <br> know?
                    </h2>
                    <p class="text-xl text-stone-600 max-w-lg leading-relaxed mb-10 font-light">
                        Morocco is full of surprises, quirky facts, hidden gems, and stories you might not expect. Flick
                        through the cards to discover something new.
                    </p>
                </div>
            </div>

            <!-- RIGHT: Card Stack Interaction -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">

                <div class="card-stack-container group/stack">

                    <!-- Navigation Arrows -->
                    <button id="stack-prev" class="stack-nav-btn stack-prev" aria-label="Previous Card">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button id="stack-next" class="stack-nav-btn stack-next" aria-label="Next Card">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <!-- THE CARDS -->
                    <div class="card-stack relative w-full h-full flex items-center justify-center">

                        <!-- Card 1 -->
                        <div class="stack-card active" data-index="0">
                            <div class="relative z-10 pointer-events-none">
                                <div
                                    class="w-16 h-16 bg-green-50 text-[#006233] rounded-2xl flex items-center justify-center text-3xl mb-8">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-black text-stone-900 mb-4 leading-tight">
                                    The Oldest University
                                </h3>
                                <p class="text-base text-stone-600 leading-relaxed font-outfit font-medium">
                                    Al Quaraouiyine in Fez is the oldest existing, continually operating educational
                                    institution in the world.
                                </p>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-[#006233] font-bold text-sm border-b-2 border-[#006233] pb-1">Founded 859
                                    AD</span>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="stack-card next" data-index="1">
                            <div class="relative z-10 pointer-events-none">
                                <div
                                    class="w-16 h-16 bg-yellow-50 text-[#d4af37] rounded-2xl flex items-center justify-center text-3xl mb-8">
                                    <i class="fas fa-film"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-black text-stone-900 mb-4 leading-tight">
                                    Hollywood of Africa
                                </h3>
                                <p class="text-base text-stone-600 leading-relaxed font-outfit font-medium">
                                    Ouarzazate's studios have hosted Gladiator, Game of Thrones, and many more blockbusters.
                                </p>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-[#d4af37] font-bold text-sm border-b-2 border-[#d4af37] pb-1">Atlas
                                    Studios</span>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="stack-card next-2" data-index="2">
                            <div class="relative z-10 pointer-events-none">
                                <div
                                    class="w-16 h-16 bg-red-50 text-[#C8102E] rounded-2xl flex items-center justify-center text-3xl mb-8">
                                    <i class="fas fa-mug-hot"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-black text-stone-900 mb-4 leading-tight">
                                    The Tea Ritual
                                </h3>
                                <p class="text-base text-stone-600 leading-relaxed font-outfit font-medium">
                                    Moroccan mint tea isn't just a drink; it's a sign of hospitality, friendship, and
                                    tradition.
                                </p>
                            </div>
                            <div class="mt-auto relative z-10">
                                <span class="text-[#C8102E] font-bold text-sm border-b-2 border-[#C8102E] pb-1">Atai</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. MOROCCO IN NUMBERS (Visit Saudi Style) -->
    <section class="py-24 bg-stone-50">
        <div class="container mx-auto px-6 md:px-12 max-w-7xl">
            <!-- Decorated Title -->
            <div class="mb-16 px-4 text-center">
                <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-4 block">Statistics</span>
                <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 leading-tight">
                    Visit Morocco <span class="italic text-[#C8102E]">in Numbers</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- LEFT COLUMN -->
                <div class="lg:col-span-2 flex flex-col gap-6">

                    <!-- Top Wide Card: 500+ Attractions -->
                    <div
                        class="bg-white rounded-3xl relative overflow-hidden group shadow-sm hover:shadow-md transition-shadow h-[240px]">
                        <!-- Colorful Left Border Strip - RED -->
                        <div
                            class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-[#C8102E] via-[#a00d25] to-[#8B0000] z-20">
                        </div>

                        <!-- Background Image with mask -->
                        <div class="absolute inset-0">
                            <img src="{{ asset('assets/images/morocco_hero_real.png') }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/60 to-transparent"></div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10 h-full flex flex-col justify-center p-10 pl-12 max-w-xl">
                            <div class="flex items-baseline gap-2 mb-3">
                                <span class="text-7xl font-playfair font-black text-stone-900 leading-none">500</span>
                                <span class="text-5xl font-playfair font-black text-[#C8102E] leading-none">+</span>
                            </div>
                            <h3 class="text-2xl font-bold font-outfit text-stone-900 leading-tight">
                                Attractions for You to Discover!
                            </h3>
                        </div>
                    </div>

                    <!-- Bottom Row Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Card 2: 20 Destinations -->
                        <div
                            class="bg-white rounded-3xl p-8 pl-10 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden flex flex-col justify-center h-[240px]">
                            <!-- Colorful Left Border Strip - BLACK -->
                            <div
                                class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-black via-stone-800 to-black z-20">
                            </div>

                            <div class="flex items-baseline gap-1 mb-2">
                                <span class="text-6xl font-playfair font-black text-stone-900">20</span>
                            </div>
                            <h3 class="text-base font-bold font-outfit text-stone-700 leading-tight">
                                Destinations for You to Visit!
                            </h3>
                        </div>

                        <!-- Card 3: 8+ UNESCO -->
                        <div
                            class="bg-white rounded-3xl p-8 pl-10 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden flex flex-col justify-center items-start h-[240px]">
                            <!-- Colorful Left Border Strip - RED -->
                            <div
                                class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-[#8B0000] via-[#C8102E] to-[#a00d25] z-20">
                            </div>

                            <div class="mb-2">
                                <span class="text-6xl font-playfair font-black text-stone-900">8</span>
                                <span class="text-4xl font-playfair font-black text-[#C8102E] align-top">+</span>
                            </div>
                            <h3 class="text-base font-bold font-outfit text-stone-700 leading-tight">
                                UNESCO Sites<br>Included
                            </h3>
                            <!-- Decorative Zellige Opacity -->
                            <div class="absolute inset-0 opacity-5 pointer-events-none"
                                style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 100px;">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT COLUMN: Stories -->
                <div
                    class="lg:col-span-1 bg-white rounded-3xl shadow-sm hover:shadow-md transition-shadow relative overflow-hidden flex flex-col h-[486px]">
                    <!-- Colorful Left Border Strip - BLACK -->
                    <div class="absolute left-0 top-0 bottom-0 w-2 bg-gradient-to-b from-black via-stone-700 to-black z-20">
                    </div>

                    <div class="p-8 pl-10 flex-1 flex flex-col h-full relative z-10">
                        <div class="mb-8">
                            <div class="flex items-baseline gap-1 mb-2">
                                <span class="text-6xl font-playfair font-black text-stone-900">186</span>
                                <span class="text-4xl font-playfair font-black text-[#C8102E] align-top">+</span>
                            </div>
                            <h3 class="text-xl font-bold font-outfit text-stone-900 leading-tight">Stories to Inspire You!
                            </h3>
                        </div>

                        <div class="mt-auto">
                            <h4 class="text-stone-400 font-bold text-[10px] uppercase tracking-widest mb-4">Most Visited
                                Stories pages</h4>
                            <ul class="space-y-2">
                                <li>
                                    <div
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-stone-50 transition-colors cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <span class="text-stone-400 font-bold text-xs font-outfit">01</span>
                                            <span class="text-stone-900 font-medium text-sm font-outfit">The Blue
                                                Pearl</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-xs text-stone-300"></i>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-stone-50 transition-colors cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <span class="text-stone-400 font-bold text-xs font-outfit">02</span>
                                            <span class="text-stone-900 font-medium text-sm font-outfit">Sahara
                                                Nights</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-xs text-stone-300"></i>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-stone-50 transition-colors cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <span class="text-stone-400 font-bold text-xs font-outfit">03</span>
                                            <span class="text-stone-900 font-medium text-sm font-outfit">Currency &
                                                Tips</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-xs text-stone-300"></i>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-stone-50 transition-colors cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <span class="text-stone-400 font-bold text-xs font-outfit">04</span>
                                            <span class="text-stone-900 font-medium text-sm font-outfit">Moroccan
                                                Cuisine</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-xs text-stone-300"></i>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center justify-between p-2 rounded-lg hover:bg-stone-50 transition-colors cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <span class="text-stone-400 font-bold text-xs font-outfit">05</span>
                                            <span class="text-stone-900 font-medium text-sm font-outfit">Atlas
                                                Mountains</span>
                                        </div>
                                        <i class="fas fa-chevron-right text-xs text-stone-300"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    <style>
        .mask-gradient-bottom {
            mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
        }

        .mask-gradient-left {
            mask-image: linear-gradient(to left, black 80%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, black 80%, transparent 100%);
        }
    </style>

    <!-- 7. THINGS TO DO (Redesigned with Moroccan Theme) -->
    <section id="experiences" class="py-10 relative overflow-hidden bg-stone-50">
        <!-- Background Pattern (Zellige) -->
        <div class="absolute inset-0 opacity-5 pointer-events-none"
            style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 400px; transform: rotate(45deg);">
        </div>

        <!-- Decorative Arch Top -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[120%] h-12 bg-white rounded-b-[100%] z-10 shadow-sm"></div>

        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-20 pt-4">
            <div class="text-center mb-4">
                <div class="inline-flex items-center gap-3 mb-4">
                    <span class="h-px w-12 bg-[#C8102E]"></span>
                    <span class="text-[#C8102E] font-bold uppercase tracking-widest text-xs">Unforgettable Moments</span>
                    <span class="h-px w-12 bg-[#C8102E]"></span>
                </div>
                <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 drop-shadow-sm">
                    Experiences <span class="italic text-[#d4af37]">&</span> Adventures
                </h2>
            </div>

            <!-- Swiper Container -->
            <div class="swiper things-swiper w-full pt-4 pb-24 px-4 overflow-visible">
                <div class="swiper-wrapper">

                    <!-- Card 1: Gastronomy -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/morocco_hero_new.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <!-- Content -->
                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-[#C8102E] text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Gastronomy</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Savor the rich spices and flavors of traditional Tagines.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Sahara -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/morocco_hero_real.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-[#d4af37] text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-wind"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Sahara Magic</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Sleep under the stars in the golden dunes of Merzouga.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Blue City -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/morocco_hype.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Blue City</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Wander the dreamy blue streets of Chefchaouen.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Architecture (Using Casa image) -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/casablanca_cityscape.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-[#006233] text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-mosque"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Heritage</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Marvel at the intricately designed mosques and palaces.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5: Sport (Using Stadium) -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/morocco_stadium.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-futbol"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Sport Energy</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Feel the roar of the crowd at world-class events.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 6: Art & Craft (Reusing image/placeholder concept) -->
                    <div class="swiper-slide w-[320px] md:w-[380px] h-[550px] relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-stone-900 rounded-t-[10rem] rounded-b-2xl overflow-hidden shadow-2xl border-[6px] border-white transition-transform duration-500 group-hover:-translate-y-4">
                            <img src="{{ asset('assets/images/zellige_pattern.png') }}"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-90 bg-stone-800">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-8 text-center translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div
                                    class="w-12 h-12 bg-purple-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-paint-brush"></i>
                                </div>
                                <h3 class="text-3xl font-playfair font-bold text-white mb-2">Art & Craft</h3>
                                <p
                                    class="text-white/80 text-sm font-outfit leading-relaxed max-w-[200px] mx-auto opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                    Discover the mastery of Moroccan artisans.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Pagination -->
                <div class="swiper-pagination !bottom-0"></div>
            </div>

        </div>
    </section>

    <!-- 8. TRAVELER REVIEWS (Premium Slider) -->
    <!-- 8. TRAVELER REVIEWS (The "Fluid Minimalist Stream") -->
    <section class="py-32 bg-stone-900 relative overflow-hidden text-white">
        <!-- Background Pattern (Subtle) -->
        <div class="absolute inset-0 opacity-5 pointer-events-none mix-blend-overlay"
            style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px;">
        </div>
        <!-- Vignette -->
        <div
            class="absolute inset-0 block bg-[radial-gradient(circle_at_center,_transparent_0%,_#1c1917_100%)] pointer-events-none z-10">
        </div>

        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-20 mb-16">
            <!-- Minimalist Header -->
            <div class="text-center">
                <span
                    class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-[10px] mb-4 block animate-pulse-slow">Testimonials</span>
                <h2 class="text-4xl md:text-6xl font-playfair font-black text-white leading-tight">
                    Voices of <span
                        class="italic text-transparent bg-clip-text bg-gradient-to-r from-white via-stone-200 to-stone-500">Discovery</span>
                </h2>
            </div>
        </div>

        <!-- FLUID INFINITE STREAM CONTAINER -->
        <div class="relative w-full overflow-hidden z-20 mask-gradient-sides">

            <!-- Marquee Wrapper -->
            <!-- We duplicate the content to ensure seamless loop -->
            <div class="flex gap-8 w-max animate-marquee hover:pause-animation py-10">

                @foreach($comments->merge($comments) as $comment)
                    <!-- Glass Card -->
                    <div class="w-[350px] md:w-[450px] shrink-0 relative group">
                        <!-- Glass Panel -->
                        <div
                            class="bg-white/[0.03] backdrop-blur-sm border border-white/[0.05] rounded-[2rem] p-10 h-full transition-all duration-500 group-hover:bg-white/[0.06] group-hover:border-white/10 group-hover:-translate-y-2 group-hover:shadow-2xl hover:shadow-white/5">

                            <!-- Giant Watermark Quote -->
                            <div
                                class="absolute -top-4 -left-4 text-[120px] font-playfair text-white/[0.03] leading-none select-none group-hover:text-white/[0.05] transition-colors">
                                &ldquo;
                            </div>

                            <!-- Content -->
                            <div class="relative z-10 flex flex-col h-full">

                                <!-- Stars (Minimal Dots) -->
                                <div class="flex gap-1.5 mb-6">
                                    @for($i = 0; $i < 5; $i++)
                                        <div
                                            class="w-1.5 h-1.5 rounded-full bg-[#d4af37] opacity-80 shadow-[0_0_8px_rgba(212,175,55,0.4)]">
                                        </div>
                                    @endfor
                                </div>

                                <!-- Text -->
                                <p
                                    class="text-lg md:text-xl font-outfit font-light text-stone-200 leading-relaxed italic mb-8 flex-1">
                                    "{{ Str::limit($comment->commentaire, 150) }}"
                                </p>

                                <!-- Author -->
                                <div class="flex items-center gap-4 mt-auto border-t border-white/5 pt-6">
                                    @if($comment->photo)
                                        <img src="{{ asset('storage/' . $comment->photo) }}"
                                            class="w-12 h-12 rounded-full object-cover border border-white/10 ring-2 ring-white/5 group-hover:ring-[#d4af37]/50 transition-all">
                                    @else
                                        <div
                                            class="w-12 h-12 rounded-full bg-gradient-to-br from-stone-800 to-stone-900 border border-white/10 flex items-center justify-center text-stone-400 font-bold font-playfair shadow-inner">
                                            {{ strtoupper(substr($comment->prenom, 0, 1)) }}
                                        </div>
                                    @endif

                                    <div>
                                        <h4
                                            class="text-white font-bold font-playfair text-lg tracking-wide group-hover:text-[#d4af37] transition-colors">
                                            {{ $comment->prenom }} {{ $comment->nom }}
                                        </h4>
                                        <span
                                            class="text-stone-500 text-xs uppercase tracking-widest">{{ $comment->created_at->format('M Y') }}
                                            &bull; Traveler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <style>
        /* SMOOTH INFINITE MARQUEE */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            animation: marquee 60s linear infinite;
            /* Very slow, mesmerizing speed */
            will-change: transform;
        }

        .hover\:pause-animation:hover {
            animation-play-state: paused;
        }

        /* SIDE FADE MASKS */
        .mask-gradient-sides {
            mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
        }
    </style>

    <style>
        .things-swiper {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .things-swiper .swiper-slide {
            height: 550px;
            width: auto;
        }
    </style>

    <script>
            document.addEventListener('DOMContentLoaded', f        
                unction () {
                var swiper = new Swiper(".things-swiper", {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    centeredSlides: true,
                    loop: true, /* Try keeping loop but with breakpoints */
                    speed: 800,
                    grabCursor: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1.5, /* Show part of next slide */
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });

                // REVIEWS SWIPER
                var reviewsSwiper = new Swiper(".reviews-swiper", {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    speed: 1000,
                    grabCursor: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                        1280: {
                            slidesPerView: 4,
                            spaceBetween: 30
                        }
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });
            });
        </script>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // LEAFLET MAP LOGIC
        // Using a clean, light map style
        const map = L.map('morocco-map', {
            center: [31.6295, -7.9811], // Initial Focus: Marrakech
            zoom: 6,
            scrollWheelZoom: false, // Prevent accidental scrolling
            zoomControl: true,
            dragging: true // User requested draggable
        });

        // CartoDB Positron (Clean Light Style)
        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);

        // Custom Icon Style
        const moroccoIcon = L.divIcon({
            className: 'custom-div-icon',
            html: "<div style='background-color:#C8102E; width:12px; height:12px; border-radius:50%; border:2px solid white; box-shadow: 0 0 10px rgba(200,16,46,0.5);'></div>",
            iconSize: [20, 20],
            iconAnchor: [10, 10]
        });

        const locations = [
            { lat: 31.6295, lng: -7.9811, title: "Marrakech" },
            { lat: 35.1688, lng: -5.2684, title: "Chefchaouen" },
            { lat: 33.5731, lng: -7.5898, title: "Casablanca" },
            { lat: 31.0802, lng: -4.0134, title: "Merzouga" },
            { lat: 35.7595, lng: -5.8340, title: "Tangier" },
            { lat: 34.0181, lng: -5.0078, title: "Fez" }
        ];

        const markers = [];

        locations.forEach((loc, index) => {
            const marker = L.marker([loc.lat, loc.lng], { icon: moroccoIcon })
                .addTo(map)
                .bindPopup(`<b style="font-family: 'Playfair Display'; color: #850020;">${loc.title}</b>`, {
                    closeButton: false,
                    autoClose: false,
                    closeOnClick: false
                });

            // Open Marrakech popup initially
            if (index === 0) marker.openPopup();

            markers.push(marker);
        });

        // Function to move map
        function focusMap(lat, lng, index) {
            map.flyTo([lat, lng], 10, {
                animate: true,
                duration: 1.5 // Slower cinematic fly
            });

            // Update Cards
            document.querySelectorAll('.destination-card').forEach(el => el.classList.remove('active', 'border-[#C8102E]', 'bg-red-50'));
            const cards = document.querySelectorAll('.destination-card');
            if (cards[index]) {
                cards[index].classList.add('active');
            }

            // Open popup
            markers.forEach(m => m.closePopup());
            if (markers[index]) markers[index].openPopup();
        }


        // HERO VIDEO ANIMATION
        document.addEventListener('DOMContentLoaded', function () {
            // Trigger text animation on page load
            setTimeout(() => {
                const heroContents = document.querySelectorAll('.hero-content');
                heroContents.forEach(el => {
                    el.classList.remove('opacity-0', 'translate-y-4');
                    el.classList.add('opacity-100', 'translate-y-0');
                });
            }, 100);
        });

        // CARD STACK LOGIC
        const stackCards = document.querySelectorAll('.stack-card');
        const prevBtn = document.getElementById('stack-prev');
        const nextBtn = document.getElementById('stack-next');
        let stackIndex = 0;

        function updateStack() {
            stackCards.forEach((card, i) => {
                card.className = 'stack-card'; // Reset
                const diff = (i - stackIndex + stackCards.length) % stackCards.length;

                if (diff === 0) {
                    card.classList.add('active');
                } else if (diff === 1) {
                    card.classList.add('next');
                } else if (diff === 2) {
                    card.classList.add('next-2');
                } else {
                    // For more than 3 cards, or the one just left
                    card.classList.add('leaving');
                }
            });
        }

        if (prevBtn && nextBtn) {
            nextBtn.addEventListener('click', () => {
                stackIndex = (stackIndex + 1) % stackCards.length;
                updateStack();
            });

            prevBtn.addEventListener('click', () => {
                stackIndex = (stackIndex - 1 + stackCards.length) % stackCards.length;
                updateStack();
            });
        }
    </script>
@endsection