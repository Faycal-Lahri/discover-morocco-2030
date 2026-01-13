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

    <!-- 4. INTRO (MARHABA) - PREMIUM CINEMATIC REDESIGN -->
    <!-- 4. INTRO (MARHABA) - WARM EDITORIAL REDESIGN -->
    <section class="min-h-screen relative overflow-hidden flex items-center justify-center bg-[#FDFCF8] text-[#292524]">
        
        <!-- Subtle Paper Texture -->
        <div class="absolute inset-0 opacity-[0.4]" 
             style="background-image: url('https://www.transparenttextures.com/patterns/cream-paper.png'); mix-blend-mode: multiply;">
        </div>

        <!-- Huge Background Watermark 'MARHABA' -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full text-center pointer-events-none overflow-hidden select-none">
            <span class="text-[20vw] font-playfair font-black text-[#C8102E]/[0.03] leading-none tracking-tighter whitespace-nowrap animate-pulse-slow">
                MARHABA
            </span>
        </div>

        <div class="container mx-auto px-6 md:px-12 max-w-6xl relative z-10 flex flex-col items-center">
            
            <!-- Top Label -->
            <div class="mb-10 flex flex-col items-center gap-4 animate-fade-in-up">
                <div class="w-px h-16 bg-[#C8102E]"></div>
                <span class="font-outfit text-xs font-bold tracking-[0.4em] uppercase text-[#C8102E]">The Kingdom</span>
            </div>

            <!-- Main Title: Editorial Style -->
            <h2 class="text-7xl md:text-9xl font-playfair font-black text-center text-[#292524] leading-[0.85] tracking-tight mb-16 relative animate-fade-in-up delay-100 mix-blend-multiply">
                TIMELESS <br> 
                <span class="italic font-serif text-[#C8102E]">MOROCCAN</span> SOUL
            </h2>

            <!-- Paragraph with Side Lines -->
            <div class="relative max-w-2xl text-center mb-20 animate-fade-in-up delay-200">
                <span class="absolute top-0 left-0 -ml-12 text-6xl text-[#C8102E]/20 font-serif">“</span>
                <p class="text-2xl md:text-3xl font-light font-outfit text-[#57534e] leading-snug">
                    A land where ancient history meets modern luxury. Let the winds of the Sahara guide your next adventure.
                </p>
                <span class="absolute bottom-0 right-0 -mr-12 text-6xl text-[#C8102E]/20 font-serif translate-y-8">”</span>
            </div>

            <!-- New "Something Else": Animated Signature / Calligraphy -->
            <div class="relative w-64 h-32 flex items-center justify-center animate-fade-in-up delay-300 group cursor-pointer" onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">
                <!-- SVG Signature Animation -->
                <svg width="250" height="100" viewBox="0 0 300 150" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                     <!-- A stylized 'Morocco' path -->
                     <path d="M40 80 C 60 50, 80 120, 100 80 S 140 40, 160 80 S 220 120, 260 60" 
                           stroke="#C8102E" stroke-width="4" stroke-linecap="round" stroke-dasharray="400" stroke-dashoffset="400"
                           class="animate-draw-signature group-hover:stroke-[#8B0000] transition-colors" />
                     <circle cx="260" cy="60" r="3" fill="#C8102E" class="animate-bounce-delay" />
                </svg>
                
                <span class="absolute bottom-0 text-[10px] font-bold uppercase tracking-[0.3em] text-[#a8a29e] group-hover:text-[#C8102E] transition-colors">
                    Start Journey
                </span>
            </div>

        </div>

    </section>



    <style>
        .animate-draw-signature {
            animation: drawSignature 3s cubic-bezier(0.77, 0, 0.175, 1) forwards infinite;
        }
        @keyframes drawSignature {
            0% { stroke-dashoffset: 400; opacity: 0; }
            10% { opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 1; }
        }
        .animate-bounce-delay {
            animation: bounce 1s infinite 2.5s; /* Delays until line is drawn */
        }
    </style>

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

            <!-- Right: Immersive Cards -->
            <div class="w-full lg:w-2/3 flex flex-col md:flex-row gap-8">
                
                <!-- Card 1: Sahara (Immersive) -->
                <a href="{{ route('offers.sahara') }}" class="group relative w-full md:w-1/2 h-[500px] rounded-[2.5rem] overflow-hidden cursor-pointer shadow-2xl block">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-60 transition-opacity duration-500 group-hover:opacity-80"></div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute top-6 right-6 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-widest z-20">
                        30% Off
                    </div>

                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 w-full p-8 z-20 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="block text-[#d4af37] font-playfair italic text-lg mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Limited Time</span>
                        <h3 class="text-3xl md:text-4xl font-playfair font-black text-white mb-2 leading-none">Sahara<br>Retreats</h3>
                        <p class="text-stone-300 font-outfit text-sm leading-relaxed max-w-xs opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto transition-all duration-500 delay-200">
                            Book 6 nights at Desert Rock and experience the silence of the dunes.
                        </p>
                        
                        <!-- Action Arrow -->
                        <div class="mt-6 flex items-center gap-3 text-white/50 group-hover:text-white transition-colors">
                            <span class="text-[10px] uppercase tracking-[0.3em]">Explore</span>
                            <i class="fas fa-arrow-right transform -translate-x-2 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300"></i>
                        </div>
                    </div>
                </a>

                <!-- Card 2: RAM (Immersive) -->
                <a href="{{ route('offers.flight') }}" class="group relative w-full md:w-1/2 h-[500px] rounded-[2.5rem] overflow-hidden cursor-pointer shadow-2xl block">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('assets/images/casablanca_cityscape.png') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 grayscale-[30%] group-hover:grayscale-0">
                        <div class="absolute inset-0 bg-blue-900/30 mix-blend-multiply transition-colors duration-500 group-hover:bg-blue-900/50"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute top-6 right-6 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-widest z-20">
                        Partner
                    </div>

                    <!-- Center Icon for visual drama -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-20 group-hover:opacity-0 transition-opacity duration-500 scale-150 transform">
                         <i class="fas fa-plane-departure text-white text-9xl"></i>
                    </div>

                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 w-full p-8 z-20">
                         <span class="block text-white/60 font-outfit font-bold uppercase tracking-widest text-[10px] mb-2 group-hover:text-[#d4af37] transition-colors">Royal Air Maroc</span>
                        <h3 class="text-3xl md:text-4xl font-playfair font-black text-white mb-2 leading-none">Fly &<br>Protect</h3>
                        <p class="text-stone-300 font-outfit text-sm leading-relaxed max-w-xs mt-4 group-hover:text-white transition-colors">
                            Complimentary travel insurance included with all international flights.
                        </p>
                         <!-- Action Line -->
                        <div class="w-full h-px bg-white/20 mt-6 relative overflow-hidden">
                            <div class="absolute inset-0 bg-white transform -translate-x-full group-hover:translate-x-0 transition-transform duration-700"></div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- 5. KNOW THE DESTINATIONS (MAP) -->
    <section class="py-24 bg-stone-50 relative">
        <!-- Background Separator REMOVED -->
        
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
                                    class="fas fa-cloud-sun"></i> 28Â°C</span>
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
                                    class="fas fa-sun"></i> 24Â°C</span>
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
                                    class="fas fa-wind"></i> 22Â°C</span>
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
                                    class="fas fa-sun"></i> 32Â°C</span>
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
                                    class="fas fa-water"></i> 23Â°C</span>
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
                                    class="fas fa-landmark"></i> 30Â°C</span>
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

    <!-- 6. DID YOU KNOW (Cinematic Living Background) -->
    <section class="py-32 relative overflow-hidden bg-[#FFF8F0]">
        
        <!-- LIVING BACKGROUND -->
        <!-- 1. Warm Golden Gradient Base -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#FFF8F0] via-[#F5E6D3] to-[#E3D5C5]"></div>
        
        <!-- 2. ANIMATED: Giant Rotating Mandala (The "Clock" of History) -->
        <div class="absolute -left-[20%] top-[10%] w-[1000px] h-[1000px] opacity-[0.08] pointer-events-none animate-spin-slow">
            <img src="{{ asset('assets/images/zellige_pattern.png') }}" class="w-full h-full object-cover rounded-full mix-blend-multiply mask-radial-fade">
        </div>
        
        <!-- 3. ANIMATED: Floating Dust Particles (Gold) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="particle p1"></div>
            <div class="particle p2"></div>
            <div class="particle p3"></div>
            <div class="particle p4"></div>
            <div class="particle p5"></div>
        </div>

        <!-- 4. Static Vignettes -->
        <div class="absolute -top-[200px] right-0 w-[800px] h-[800px] bg-[radial-gradient(circle_at_center,_rgba(255,255,255,0.8),_transparent_70%)] blur-[80px] opacity-60 mix-blend-soft-light pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#d4af37] opacity-[0.05] blur-[150px] rounded-full pointer-events-none"></div>

        <div class="container mx-auto px-6 md:px-12 relative z-10 perspective-container">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-32">
                
                <!-- LEFT: Content -->
                <div class="w-full lg:w-5/12 relative">
                    <!-- Background Splash for Text -->
                    <div class="absolute -left-20 -top-20 w-[140%] h-[140%] bg-[radial-gradient(closest-side,_rgba(255,255,255,0.8),_transparent)] blur-xl -z-10"></div>

                    <div class="inline-flex items-center gap-4 mb-8">
                        <div class="w-16 h-[2px] bg-[#C8102E]"></div>
                        <span class="text-xs font-bold uppercase tracking-[0.4em] text-[#C8102E]">Moroccan <span class="text-stone-400">Secrets</span></span>
                    </div>
                    
                    <h2 class="text-6xl md:text-8xl font-playfair font-black text-[#292524] mb-8 leading-[0.9] drop-shadow-sm">
                        Hidden <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C8102E] to-[#8B0000] italic pr-4">Truths.</span>
                    </h2>
                    
                    <p class="text-2xl text-[#57534e] leading-relaxed mb-12 font-playfair italic max-w-md">
                        "Morocco is a tree whose roots lie in Africa but whose leaves breathe in Europe."
                    </p>

                    <p class="text-sm font-outfit uppercase tracking-widest text-[#78716c] mb-8 border-l border-[#C8102E] pl-4">
                        Swipe to discover the legends
                    </p>

                    <div class="flex gap-6">
                        <button id="deck-prev" class="group relative w-16 h-16 flex items-center justify-center rounded-full border-2 border-[#E7E5E4] hover:border-[#C8102E] transition-all bg-[#FAF9F6] shadow-md hover:shadow-xl hover:shadow-[#C8102E]/10 hover:-translate-y-1">
                            <i class="fas fa-arrow-left text-[#78716c] group-hover:text-[#C8102E] transition-colors text-lg"></i>
                        </button>
                        <button id="deck-next" class="group relative w-16 h-16 flex items-center justify-center rounded-full border-2 border-[#E7E5E4] hover:border-[#C8102E] transition-all bg-[#FAF9F6] shadow-md hover:shadow-xl hover:shadow-[#C8102E]/10 hover:-translate-y-1">
                            <i class="fas fa-arrow-right text-[#78716c] group-hover:text-[#C8102E] transition-colors text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- RIGHT: 3D Deck -->
                <div class="w-full lg:w-7/12 h-[650px] relative deck-container flex items-center justify-center perspective-[2500px]">
                    
                    <!-- The Deck -->
                    <div id="card-deck" class="relative w-full max-w-[340px] md:max-w-[440px] h-[500px] md:h-[600px] preserve-3d transition-transform duration-500 cubic-bezier(0.2, 1, 0.4, 1)">
                        
                        <!-- CARD 1: University (Porcelain Style) -->
                        <div class="deck-card absolute inset-0 bg-[#FFFFFF] rounded-[2.5rem] shadow-[0_30px_80px_-20px_rgba(50,40,30,0.2),0_0_0_1px_rgba(0,0,0,0.03)] overflow-hidden" style="transform: translateZ(0px);">
                            <!-- Image Watermark (Subtle Back layer) -->
                            <div class="absolute top-0 right-0 w-full h-[60%] opacity-[0.08] mix-blend-multiply pointer-events-none">
                                <img src="{{ asset('assets/images/morocco_hero_new.png') }}" class="w-full h-full object-cover mask-gradient-bottom">
                            </div>
                            
                            <!-- Content Container -->
                            <div class="relative h-full w-full p-10 flex flex-col justify-between">
                                <!-- Top Seal -->
                                <div class="flex justify-between items-start">
                                    <div class="w-16 h-16 rounded-full border-[3px] border-[#F5F5F4] bg-white flex items-center justify-center shadow-inner text-[#006233]">
                                        <i class="fas fa-university text-2xl"></i>
                                    </div>
                                    <span class="text-9xl font-playfair font-black text-[#F5F5F4] absolute -top-4 -right-4 -z-10 select-none">01</span>
                                </div>

                                <!-- Middle -->
                                <div class="mt-4">
                                     <span class="text-[#006233] font-bold uppercase tracking-[0.2em] text-xs mb-3 block">Education & History</span>
                                     <h3 class="text-5xl font-playfair font-black text-[#292524] mb-6 leading-[0.9]">
                                        World's First <br>
                                        <span class="text-[#006233] italic decorative-underline">Institute</span>
                                     </h3>
                                     <p class="text-[#57534e] font-outfit text-lg leading-relaxed">
                                        Established 859 AD. <strong class="text-[#292524]">Al Quaraouiyine</strong> in Fez predates Oxford by centuries, founded by a visionary woman.
                                     </p>
                                </div>

                                <!-- Bottom -->
                                <div class="pt-8 border-t border-[#F5F5F4] flex justify-between items-center">
                                    <span class="text-4xl font-playfair font-black text-[#E7E5E4]">859</span>
                                    <div class="px-4 py-2 bg-[#F5F5F4] rounded-full text-[10px] font-bold uppercase tracking-widest text-[#57534e]">
                                        Unesco Site
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 2: Cinema (Porcelain Style) -->
                        <div class="deck-card absolute inset-0 bg-[#FFFFFF] rounded-[2.5rem] shadow-[0_30px_80px_-20px_rgba(50,40,30,0.2),0_0_0_1px_rgba(0,0,0,0.03)] overflow-hidden" 
                             style="transform: translateZ(-60px) translateY(40px) translateX(25px); opacity: 0; pointer-events: none;">
                             <!-- Image Watermark -->
                            <div class="absolute top-0 right-0 w-full h-[60%] opacity-[0.08] mix-blend-multiply pointer-events-none">
                                <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover mask-gradient-bottom">
                            </div>

                             <div class="relative h-full w-full p-10 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div class="w-16 h-16 rounded-full border-[3px] border-[#F5F5F4] bg-white flex items-center justify-center shadow-inner text-[#d4af37]">
                                        <i class="fas fa-film text-2xl"></i>
                                    </div>
                                    <span class="text-9xl font-playfair font-black text-[#F5F5F4] absolute -top-4 -right-4 -z-10 select-none">02</span>
                                </div>

                                <div class="mt-4">
                                     <span class="text-[#d4af37] font-bold uppercase tracking-[0.2em] text-xs mb-3 block">Cinema & Arts</span>
                                     <h3 class="text-5xl font-playfair font-black text-[#292524] mb-6 leading-[0.9]">
                                        Hollywood's <br>
                                        <span class="text-[#d4af37] italic decorative-underline">Canvas</span>
                                     </h3>
                                     <p class="text-[#57534e] font-outfit text-lg leading-relaxed">
                                        The Atlas Studios in Ouarzazate are the silent stars of <strong class="text-[#292524]">Gladiator</strong>, <strong class="text-[#292524]">The Mummy</strong>, and epic tales.
                                     </p>
                                </div>

                                <div class="pt-8 border-t border-[#F5F5F4] flex justify-between items-center">
                                    <span class="text-4xl font-playfair font-black text-[#E7E5E4]">CLA</span>
                                    <div class="px-4 py-2 bg-[#F5F5F4] rounded-full text-[10px] font-bold uppercase tracking-widest text-[#57534e]">
                                        Ouarzazate
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD 3: Tea (Porcelain Style) -->
                        <div class="deck-card absolute inset-0 bg-[#FFFFFF] rounded-[2.5rem] shadow-[0_30px_80px_-20px_rgba(50,40,30,0.2),0_0_0_1px_rgba(0,0,0,0.03)] overflow-hidden" 
                             style="transform: translateZ(-120px) translateY(80px) translateX(50px); opacity: 0; pointer-events: none;">
                             <!-- Image Watermark -->
                            <div class="absolute top-0 right-0 w-full h-[60%] opacity-[0.08] mix-blend-multiply pointer-events-none">
                                <img src="{{ asset('assets/images/zellige_pattern.png') }}" class="w-full h-full object-cover mask-gradient-bottom">
                            </div>

                             <div class="relative h-full w-full p-10 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div class="w-16 h-16 rounded-full border-[3px] border-[#F5F5F4] bg-white flex items-center justify-center shadow-inner text-[#C8102E]">
                                        <i class="fas fa-mug-hot text-2xl"></i>
                                    </div>
                                    <span class="text-9xl font-playfair font-black text-[#F5F5F4] absolute -top-4 -right-4 -z-10 select-none">03</span>
                                </div>

                                <div class="mt-4">
                                     <span class="text-[#C8102E] font-bold uppercase tracking-[0.2em] text-xs mb-3 block">Culture & Hospitality</span>
                                     <h3 class="text-5xl font-playfair font-black text-[#292524] mb-6 leading-[0.9]">
                                        The Sacred <br>
                                        <span class="text-[#C8102E] italic decorative-underline">Pour</span>
                                     </h3>
                                     <p class="text-[#57534e] font-outfit text-lg leading-relaxed">
                                        The "High Pour" aerates the tea creates the <strong class="text-[#292524]">"Rezza"</strong> foam. A symbol of welcome you cannot refuse.
                                     </p>
                                </div>

                                <div class="pt-8 border-t border-[#F5F5F4] flex justify-between items-center">
                                    <span class="text-4xl font-playfair font-black text-[#E7E5E4]">Tea</span>
                                    <div class="px-4 py-2 bg-[#F5F5F4] rounded-full text-[10px] font-bold uppercase tracking-widest text-[#57534e]">
                                        Maghreb
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <style>
            .decorative-underline { text-decoration: underline; text-decoration-color: currentColor; text-decoration-thickness: 3px; text-underline-offset: 6px; }
            .mask-gradient-bottom { mask-image: linear-gradient(to bottom, black 0%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 0%, transparent 100%); }
            
            /* Rotating Mandala Animation */
            @keyframes spin-slow {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            .animate-spin-slow {
                animation: spin-slow 120s linear infinite; /* Very slow rotation */
            }

            /* Floating Particles */
            .particle {
                position: absolute;
                border-radius: 50%;
                background: linear-gradient(to bottom, #d4af37, transparent);
                opacity: 0;
                pointer-events: none;
            }
            .p1 { width: 4px; height: 4px; top: 20%; left: 10%; animation: float 15s infinite; animation-delay: 0s; }
            .p2 { width: 6px; height: 6px; top: 60%; left: 80%; animation: float 20s infinite; animation-delay: 2s; }
            .p3 { width: 3px; height: 3px; top: 40%; left: 40%; animation: float 12s infinite; animation-delay: 4s; }
            .p4 { width: 5px; height: 5px; top: 80%; left: 20%; animation: float 18s infinite; animation-delay: 1s; }
            .p5 { width: 4px; height: 4px; top: 10%; left: 70%; animation: float 16s infinite; animation-delay: 3s; }

            @keyframes float {
                0% { transform: translateY(0) translateX(0); opacity: 0; }
                10% { opacity: 0.6; }
                50% { transform: translateY(-50px) translateX(20px); opacity: 0.4; }
                90% { opacity: 0.6; }
                100% { transform: translateY(-100px) translateX(40px); opacity: 0; }
            }

            .mask-radial-fade {
                mask-image: radial-gradient(circle, black 40%, transparent 70%);
                -webkit-mask-image: radial-gradient(circle, black 40%, transparent 70%);
            }

            .preserve-3d { transform-style: preserve-3d; }
            .deck-card { transition: all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1); }
        </style>
    </section>

    <!-- 7. MOROCCO IN NUMBERS (Clean & Minimal) -->
    <section class="py-24 md:py-32 bg-[#F9F9F7] relative overflow-hidden">
        <!-- Background Pattern (Subtle) -->
         <div class="absolute top-0 right-0 w-1/3 h-full opacity-[0.03] bg-repeat pointer-events-none" 
              style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 200px;">
        </div>

        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-10">
            <!-- Decorated Title -->
            <div class="mb-16 md:mb-24 px-4 text-center">
                <span class="text-[#C8102E] font-medium uppercase tracking-[0.4em] text-[10px] mb-6 block">Our Scale</span>
                <h2 class="text-4xl md:text-7xl font-playfair font-black text-[#292524] leading-none tracking-tight">
                    Morocco <span class="italic text-[#C8102E] font-serif">by the Numbers</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- LEFT COLUMN Cards (Span 7) -->
                <div class="lg:col-span-7 flex flex-col gap-6">

                    <!-- Top Wide Card: 500+ Attractions -->
                    <div class="bg-white p-0 relative overflow-hidden group transition-all duration-500 h-[320px] border border-stone-100 hover:border-stone-200">
                        <div class="absolute inset-0">
                            <img src="{{ asset('assets/images/morocco_hero_real.png') }}"
                                class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-105 filter grayscale transition-all duration-700 group-hover:grayscale-0">
                            <!-- Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-r from-stone-900/90 via-stone-900/40 to-transparent mix-blend-multiply"></div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10 h-full flex flex-col justify-center p-12 max-w-lg">
                            <span class="text-white/80 font-medium tracking-[0.2em] text-xs uppercase mb-2">Experiences</span>
                            <div class="flex items-baseline gap-1 mb-4">
                                <span class="text-6xl md:text-8xl font-playfair font-black text-white leading-none tracking-tighter">500</span>
                                <span class="text-4xl md:text-6xl font-playfair font-normal text-[#C8102E] leading-none">+</span>
                            </div>
                            <h3 class="text-2xl font-light font-outfit text-white/90 leading-tight max-w-md">
                                Unique attractions waiting for your discovery.
                            </h3>
                        </div>
                    </div>

                    <!-- Bottom Row Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Card 2: 20 Destinations -->
                        <div class="bg-white p-10 transition-all duration-300 relative overflow-hidden flex flex-col justify-between h-[280px] group border border-stone-100 hover:border-[#C8102E]/20">
                            <div class="absolute top-0 right-0 p-6 opacity-[0.03] font-playfair text-[10rem] text-stone-900 leading-none pointer-events-none select-none transition-transform duration-700 group-hover:scale-110 group-hover:rotate-12">20</div>
                            
                            <div class="relative z-10 h-full flex flex-col justify-end">
                                <div class="mb-2 overflow-hidden">
                                     <span class="text-7xl font-playfair font-black text-[#292524] block transform group-hover:-translate-y-full transition-transform duration-500">20</span>
                                     <span class="text-7xl font-playfair font-black text-[#C8102E] block absolute top-0 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">20</span>
                                </div>
                                <h3 class="text-sm font-bold font-outfit text-[#78716c] uppercase tracking-widest leading-relaxed border-t border-stone-100 pt-4 group-hover:border-[#C8102E] transition-colors">
                                    Curated<br>Destinations
                                </h3>
                            </div>
                        </div>

                        <!-- Card 3: 8+ UNESCO -->
                        <div class="bg-[#292524] p-10 transition-all duration-300 relative overflow-hidden flex flex-col justify-between h-[280px] group">
                            
                            <div class="relative z-10 mt-auto">
                                <div class="mb-4 flex items-start">
                                    <span class="text-7xl font-playfair font-black text-white">8</span>
                                    <span class="text-5xl font-playfair font-normal text-[#C8102E]">+</span>
                                </div>
                                <h3 class="text-sm font-bold font-outfit text-stone-400 uppercase tracking-widest leading-relaxed">
                                    UNESCO World<br>Heritage Sites
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT COLUMN: Stories (Span 5) -->
                <div class="lg:col-span-5 bg-white p-12 transition-all duration-300 relative overflow-hidden flex flex-col h-full border border-stone-100">
                    
                    <div class="flex-1 flex flex-col h-full relative z-10">
                        <div class="mb-12 border-b border-stone-100 pb-8">
                            <div class="flex items-baseline gap-1 mb-2">
                                <span class="text-6xl md:text-8xl font-playfair font-black text-[#292524]">186</span>
                                <span class="text-4xl md:text-6xl font-playfair font-light text-[#C8102E] align-top">+</span>
                            </div>
                            <h3 class="text-lg font-medium font-outfit text-[#57534e] leading-tight mt-4">Travel stories shared by our community.</h3>
                        </div>

                        <div class="mt-auto">
                            <h4 class="text-[#a8a29e] font-bold text-[10px] uppercase tracking-[0.2em] mb-8">Trending Topics</h4>
                            <ul class="space-y-0 divide-y divide-stone-100">
                                @php
                                    $stories = [
                                        'The Blue Pearl',
                                        'Sahara Nights',
                                        'Currency & Tips',
                                        'Moroccan Cuisine',
                                        'Atlas Mountains'
                                    ];
                                @endphp

                                @foreach($stories as $index => $story)
                                <li class="group/item py-6 first:pt-0 last:pb-0 border-b border-stone-100 last:border-0">
                                    <div class="flex items-center justify-between cursor-pointer">
                                        <div class="flex items-center gap-8">
                                            <span class="text-[#e5e5e5] font-playfair font-bold text-2xl w-8 group-hover/item:text-[#C8102E] transition-colors duration-500">0{{ $index + 1 }}</span>
                                            <span class="text-[#292524] font-medium text-xl font-playfair group-hover/item:translate-x-2 transition-transform duration-500">{{ $story }}</span>
                                        </div>
                                        
                                        <!-- Animated Arrow -->
                                        <div class="opacity-0 -translate-x-4 group-hover/item:opacity-100 group-hover/item:translate-x-0 transition-all duration-500 text-[#C8102E]">
                                            <i class="fas fa-long-arrow-alt-right text-xl"></i>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
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

    <!-- 7. THINGS TO DO (Cinematic Accordion) -->
    <section id="experiences" class="py-24 bg-stone-900 relative overflow-hidden">
        <!-- Background Pattern & Vignette (Matched to Testimonials) -->
        <div class="absolute inset-0 opacity-5 pointer-events-none mix-blend-overlay" 
             style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px;">
        </div>
        <div class="absolute inset-0 block bg-[radial-gradient(circle_at_center,_transparent_0%,_#1c1917_100%)] pointer-events-none z-10"></div>

        <div class="container mx-auto px-0 md:px-12 max-w-[1600px] relative z-20">
            
             <!-- Minimalist Header -->
             <div class="text-center mb-16 px-6">
                <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-[10px] mb-4 block">Curated Journeys</span>
                <h2 class="text-4xl md:text-5xl font-playfair font-black text-white leading-tight">
                    Choose Your <span class="italic text-stone-500">Path</span>
                </h2>
            </div>
            
            <style>
                .accordion-container {
                    display: flex;
                    gap: 10px;
                    height: 500px;
                    width: 100%;
                }
                .accordion-item {
                    position: relative;
                    flex: 1;
                    border-radius: 40px;
                    overflow: hidden;
                    cursor: pointer;
                    transition: flex 0.7s cubic-bezier(0.16, 1, 0.3, 1);
                    filter: grayscale(100%);
                }
                .accordion-item:hover, .accordion-item.active {
                    flex: 5; /* Expand factor */
                    filter: grayscale(0%);
                }
                /* Vertical Label when collapsed */
                .accordion-label {
                    position: absolute;
                    bottom: 40px;
                    left: 20px;
                    transform: rotate(-90deg);
                    transform-origin: 0% 100%;
                    white-space: nowrap;
                    opacity: 1;
                    transition: opacity 0.3s;
                    color: white;
                    font-family: 'Playfair Display', serif;
                    font-size: 1.5rem;
                    font-weight: 900;
                    letter-spacing: 2px;
                }
                .accordion-item.active .accordion-label {
                    opacity: 0;
                }
                /* Full Content when expanded */
                .accordion-content {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    padding: 3rem;
                    background: linear-gradient(to top, rgba(0,0,0,1), transparent);
                    opacity: 0;
                    transform: translateY(20px);
                    transition: all 0.5s ease 0.2s;
                    pointer-events: none;
                }
                .accordion-item.active .accordion-content {
                    opacity: 1;
                    transform: translateY(0);
                }
                .accordion-item img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform 1s ease;
                }
                .accordion-item.active img {
                    transform: scale(1.1);
                }
                
                @media (max-width: 768px) {
                    .accordion-container {
                        flex-direction: column;
                        height: 800px;
                    }
                    .accordion-item {
                        flex: 1;
                    }
                    .accordion-item:hover, .accordion-item.active {
                        flex: 3;
                    }
                    .accordion-label {
                        transform: rotate(0);
                        top: 20px;
                        left: 20px;
                        bottom: auto;
                    }
                }
            </style>

            <div class="accordion-container">
                
                <!-- GASTROMONY -->
                <div class="accordion-item active">
                    <img src="{{ asset('assets/images/morocco_hero_new.png') }}" loading="lazy">
                    <div class="accordion-label">GASTRONOMY</div>
                    <div class="accordion-content">
                        <div class="text-[#C8102E] tracking-widest text-xs font-bold uppercase mb-2">Taste Culture</div>
                        <h3 class="text-4xl md:text-5xl font-playfair font-black text-white mb-4">Culinary Soul</h3>
                        <p class="text-stone-300 font-outfit text-sm md:text-base max-w-md">Embark on a flavor odyssey through rich tagines, sweet pastries, and the aromatic spice markets of Marrakesh.</p>
                    </div>
                </div>

                <!-- SAHARA -->
                <div class="accordion-item">
                    <img src="{{ asset('assets/images/morocco_hero_real.png') }}" loading="lazy">
                    <div class="accordion-label">ADVENTURE</div>
                    <div class="accordion-content">
                        <div class="text-[#d4af37] tracking-widest text-xs font-bold uppercase mb-2">Golden Dunes</div>
                        <h3 class="text-4xl md:text-5xl font-playfair font-black text-white mb-4">Sahara Magic</h3>
                        <p class="text-stone-300 font-outfit text-sm md:text-base max-w-md">Sleep under a canopy of stars in Merzouga, where the silence of the desert speaks louder than words.</p>
                    </div>
                </div>

                <!-- BLUE CITY -->
                <div class="accordion-item">
                    <img src="{{ asset('assets/images/morocco_hype.png') }}" loading="lazy">
                    <div class="accordion-label">SERENITY</div>
                    <div class="accordion-content">
                        <div class="text-blue-400 tracking-widest text-xs font-bold uppercase mb-2">Chefchaouen</div>
                        <h3 class="text-4xl md:text-5xl font-playfair font-black text-white mb-4">The Blue Pearl</h3>
                        <p class="text-stone-300 font-outfit text-sm md:text-base max-w-md">Lose yourself in the endless blue maze of the Rif Mountains, a photographer's dream come true.</p>
                    </div>
                </div>

                <!-- HERITAGE -->
                <div class="accordion-item">
                    <img src="{{ asset('assets/images/casablanca_cityscape.png') }}" loading="lazy">
                    <div class="accordion-label">HISTORY</div>
                    <div class="accordion-content">
                        <div class="text-[#006233] tracking-widest text-xs font-bold uppercase mb-2">Imperial Cities</div>
                        <h3 class="text-4xl md:text-5xl font-playfair font-black text-white mb-4">Timeless Heritage</h3>
                        <p class="text-stone-300 font-outfit text-sm md:text-base max-w-md">Walk the ramparts of history in Fez, Meknes, and Rabat, where every stone tells a story of empires.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Init Scripts for Improved Sliders -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. CARD STACK LOGIC (Did You Know)
            // ==================================
            const stackCards = document.querySelectorAll('.stack-card');
            const prevBtn = document.getElementById('stack-prev');
            const nextBtn = document.getElementById('stack-next');
            let activeIndex = 0;
            const totalCards = stackCards.length;

            function updateStack() {
                stackCards.forEach((card, index) => {
                    // Reset classes
                    card.className = 'stack-card';
                    card.style.transform = '';
                    card.style.opacity = '';
                    
                    // Calculate relative position based on the "loop"
                    // We want: 0 (active), 1 (next), 2 (next-2), etc.
                    let relativeDiff = (index - activeIndex + totalCards) % totalCards;
                    
                    if (relativeDiff === 0) {
                        card.classList.add('active');
                    } else if (relativeDiff === 1) {
                         card.classList.add('next');
                    } else if (relativeDiff === 2) {
                        card.classList.add('next-2');
                    } else {
                        // Hidden cards in the back
                         card.style.opacity = 0;
                         card.style.zIndex = -1;
                         card.style.transform = 'translate3d(0, 0, -200px)';
                    }
                });
            }

            // Next Click
            nextBtn.addEventListener('click', () => {
                const currentCard = stackCards[activeIndex];
                // Animate Throw Away
                currentCard.classList.add('leaving');
                
                // Wait for animation then switch index
                setTimeout(() => {
                    currentCard.classList.remove('leaving');
                    activeIndex = (activeIndex + 1) % totalCards;
                    updateStack();
                }, 250); // Faster reaction
            });

            // Prev Click
            prevBtn.addEventListener('click', () => {
                activeIndex = (activeIndex - 1 + totalCards) % totalCards;
                updateStack();
            });

            // Init
            updateStack();


            // 2. SWIPER INIT (Experiences)
            // ============================
            // Assuming Swiper is loaded globally (from layout layout)
            if (typeof Swiper !== 'undefined') {
                new Swiper('.things-swiper', {
                    slidesPerView: 'auto',
                    spaceBetween: 24,
                    centeredSlides: false, // Start from left
                    grabCursor: true,
                    loop: false,
                    speed: 800,
                    navigation: {
                        nextEl: '.swiper-next-btn',
                        prevEl: '.swiper-prev-btn',
                    },
                    breakpoints: {
                        640: {
                            spaceBetween: 32,
                        }
                    }
                });
            }
        });
    </script>

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
                    <div class="w-[85vw] md:w-[450px] shrink-0 relative group">
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
        document.addEventListener('DOMContentLoaded', function() {


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

        // 3D GLASS DECK LOGIC (Did You Know)
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.perspective-container');
            const deck = document.getElementById('card-deck');
            const cards = document.querySelectorAll('.deck-card');
            const nextBtn = document.getElementById('deck-next');
            const prevBtn = document.getElementById('deck-prev');
            let activeIndex = 0;
            
            if(cards.length > 0) {
                const totalCards = cards.length;

                function updateDeck() {
                    cards.forEach((card, index) => {
                        let diff = index - activeIndex; 
                        // Handle wrap-around math for 3 cards logic visual
                        // We map real index to relative visual slot: 0=front, 1=middle, 2=back
                        // Simplified wrap calculation
                        let relativePos = (index - activeIndex + totalCards) % totalCards;

                        card.style.opacity = '1';
                        
                        if (relativePos === 0) {
                            // FRONT CARD
                            card.style.transform = 'translateZ(0px) translateY(0px) scale(1)';
                            card.style.zIndex = 30;
                            card.style.opacity = 1;
                            card.style.filter = 'none';
                            card.style.pointerEvents = 'auto'; 
                        } 
                        else if (relativePos === 1) { // 2nd card
                             card.style.transform = 'translateZ(-60px) translateY(30px) scale(0.95)';
                             card.style.zIndex = 20;
                             card.style.opacity = 0.6;
                             card.style.filter = 'blur(1px) brightness(70%)';
                             card.style.pointerEvents = 'none';
                        } 
                        else { // 3rd card (or others)
                             card.style.transform = 'translateZ(-120px) translateY(60px) scale(0.9)';
                             card.style.zIndex = 10;
                             card.style.opacity = 0.3;
                             card.style.filter = 'blur(3px) brightness(50%)';
                             card.style.pointerEvents = 'none';
                        }
                    });
                }

                // Mouse Tilt Effect
                if(container && deck) {
                    container.addEventListener('mousemove', (e) => {
                        const rect = container.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        
                        // Normalize -1 to 1
                        const xPct = (x / rect.width - 0.5) * 2; 
                        const yPct = (y / rect.height - 0.5) * 2;
                        
                        // Tilt deck slightly
                        deck.style.transform = `rotateY(${xPct * 8}deg) rotateX(${yPct * -8}deg)`;
                    });
                    
                    container.addEventListener('mouseleave', () => {
                        deck.style.transform = `rotateY(0deg) rotateX(0deg)`;
                    });
                }

                // Navigation
                if(nextBtn) {
                     nextBtn.addEventListener('click', () => {
                        activeIndex = (activeIndex + 1) % totalCards;
                        updateDeck();
                    });
                }

                if(prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        activeIndex = (activeIndex - 1 + totalCards) % totalCards;
                        updateDeck();
                    });
                }

                // Init
                updateDeck();
            }

            // ACCORDION LOGIC (Experiences)
            const accordionItems = document.querySelectorAll('.accordion-item');
            accordionItems.forEach(item => {
                item.addEventListener('mouseenter', () => {
                    accordionItems.forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                });
                
                // Touch support for mobile
                item.addEventListener('click', () => {
                   accordionItems.forEach(i => i.classList.remove('active'));
                   item.classList.add('active');
                });
            });
        });

    </script>
@endsection