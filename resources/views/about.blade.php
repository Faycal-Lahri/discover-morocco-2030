@extends('layouts.app')

@section('content')
    <style>
        /* Custom Keyframes */
        @keyframes fadeUpStagger {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-title-word {
            display: inline-block;
            opacity: 0;
            animation: fadeUpStagger 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        /* Scroll Drop Animation (Same as Home) */
        @keyframes scrollDrop {
            0% { top: -50%; opacity: 0; }
            50% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }
        .animate-scroll-drop {
            animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite;
        }
    </style>

    <!-- 1. CINEMATIC HERO SECTION (VIDEO BACKGROUND) -->
    <section id="hero-container" class="relative w-full h-screen overflow-hidden bg-black mx-auto">
        <!-- Video Background -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60 scale-105">
            <source src="{{ asset('videos/about.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-transparent to-black/90"></div>
        
        <!-- Hero Content -->
        <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4 pt-20">
            <!-- Animated Title -->
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-black text-white leading-[0.9] drop-shadow-2xl">
                <span class="animate-title-word" style="animation-delay: 0.2s;">Discover</span>
                <span class="animate-title-word" style="animation-delay: 0.4s;">The</span><br>
                <span class="animate-title-word text-transparent bg-clip-text bg-gradient-to-r from-[#C8102E] via-[#ff4d6d] to-[#C8102E]" style="animation-delay: 0.6s;">True</span>
                <span class="animate-title-word" style="animation-delay: 0.8s;">Morocco</span>
            </h1>
            
            <p class="mt-8 text-xl md:text-2xl font-light text-stone-200 max-w-3xl mx-auto leading-relaxed opacity-0 animate-[fadeIn_1s_ease-out_1.2s_forwards]">
                More than a destination. A journey through time, colors, and soul.
            </p>
        </div>

        <!-- Scroll Indicator (Premium Drop Line) -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-20">
            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
            <div class="w-[1px] h-16 bg-gradient-to-b from-white/10 to-transparent relative overflow-hidden rounded-full">
                <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-white animate-scroll-drop"></div>
            </div>
        </div>
    </section>

    <!-- 2. MISSION SECTION (Split Layout) -->
    <section class="py-32 bg-stone-50 overflow-hidden relative">
        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                
                <!-- Left: Text Content -->
                <div class="lg:w-1/2">
                    <span class="text-[#C8102E] font-bold uppercase tracking-[0.25em] text-xs mb-4 block">Our Mission</span>
                    <h2 class="text-5xl md:text-6xl font-playfair font-black text-stone-900 mb-8 leading-[1.1]">
                        Simplifying the <span class="italic text-[#006233]">Complex</span>
                    </h2>
                    
                    <div class="space-y-6 text-lg text-stone-600 font-light leading-relaxed">
                        <p>
                            Morocco is a symphony of senses—vibrant, chaotic, and profoundly beautiful. Yet, navigating the "Red City" or finding silence in the Sahara can often feel overwhelming for the uninitiated.
                        </p>
                        <p>
                            We saw a gap between the glossy brochures and the reality on the ground. 
                            <strong class="font-bold text-stone-900">Discover Morocco 2030</strong> isn't just a portal; it's a curated pathway. Born from a desire to demystify the Kingdom, we bridge the gap between your wanderlust and the authentic Moroccan experience.
                        </p>
                    </div>

                    <!-- Creator Quote Card -->
                    <div class="mt-12 p-8 bg-white rounded-3xl shadow-xl border border-stone-100 relative group hover:-translate-y-2 transition-transform duration-500">
                        <span class="absolute top-2 left-6 text-8xl font-playfair font-black text-[#C8102E]/10 leading-none">"</span>
                        <p class="italic text-stone-700 font-medium relative z-10 pl-4">
                            "We are not just a travel guide. We are a team of locals, historians, and dreamers who want to show you the Morocco that smells of mint tea at 4 PM and sounds like the Atlas winds."
                        </p>
                        <div class="mt-6 flex items-center gap-4 pl-4 border-t border-stone-100 pt-4">
                            <div class="w-10 h-10 bg-[#006233] text-white rounded-full flex items-center justify-center font-bold text-sm">AT</div>
                            <div>
                                <h4 class="font-bold text-stone-900 text-sm">Amine & The Team</h4>
                                <span class="text-[10px] text-stone-400 uppercase tracking-wider">Creators of DM2030</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual Collage -->
                <div class="lg:w-1/2 relative">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl h-[600px] w-full group">
                        <img src="{{ asset('img/about.jpg') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <!-- Overlay Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-10 bg-gradient-to-t from-black/90 via-black/50 to-transparent text-white">
                            <h3 class="text-3xl font-playfair font-bold">Curating the Chaos</h3>
                            <p class="text-white/80 mt-2 font-light">From legal texts to simple guides, we handle the details.</p>
                        </div>
                    </div>
                    <!-- Decorative Element -->
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-[#C8102E]/10 rounded-full blur-3xl -z-10"></div>
                     <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#006233]/10 rounded-full blur-3xl -z-10"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. CORE VALUES (Cards Grid - Redesigned) -->
    <section class="py-20 md:py-32 bg-stone-900 text-white relative overflow-hidden">
        <!-- Zellige Pattern Overlay -->
        <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 150px;"></div>

        <div class="container mx-auto px-6 md:px-12 max-w-7xl relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-12 md:mb-20 text-center md:text-left">
                <div class="w-full md:w-auto">
                   <span class="text-[#d4af37] font-bold uppercase tracking-widest text-xs mb-4 block">Our DNA</span>
                   <h2 class="text-4xl md:text-6xl font-playfair font-black">Values That <br class="md:hidden"> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] to-[#f3e5ab]">Define Us</span></h2>
                </div>
                <!-- Decorative Line -->
                <div class="hidden md:block w-32 h-1 bg-[#d4af37]/30 rounded-full mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Value 1 -->
                <div class="relative bg-white/5 backdrop-blur-md rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 border border-white/10 overflow-hidden group hover:border-[#C8102E]/50 transition-all duration-500 hover:-translate-y-2">
                    <!-- Large Number Background -->
                    <span class="absolute -right-2 -top-2 md:-right-4 md:-top-4 text-[8rem] md:text-[12rem] font-playfair font-black text-white/5 leading-none group-hover:text-[#C8102E]/10 transition-colors duration-500 select-none">01</span>
                    
                    <div class="relative z-10 pt-16 md:pt-20">
                         <h3 class="text-2xl md:text-3xl font-playfair font-bold mb-4 md:mb-6 group-hover:text-[#C8102E] transition-colors">Unfiltered Authenticity</h3>
                         <p class="text-stone-300 font-light leading-relaxed text-base md:text-lg">
                            Beyond the postcards. We connect you with the artisans, the storytellers, and the hidden Riads defining the soul of the Kingdom.
                        </p>
                    </div>
                    <!-- Hover Line -->
                     <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#C8102E] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>

                <!-- Value 2 -->
                <div class="relative bg-white/5 backdrop-blur-md rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 border border-white/10 overflow-hidden group hover:border-[#006233]/50 transition-all duration-500 hover:-translate-y-2">
                    <span class="absolute -right-2 -top-2 md:-right-4 md:-top-4 text-[8rem] md:text-[12rem] font-playfair font-black text-white/5 leading-none group-hover:text-[#006233]/10 transition-colors duration-500 select-none">02</span>
                    
                    <div class="relative z-10 pt-16 md:pt-20">
                         <h3 class="text-2xl md:text-3xl font-playfair font-bold mb-4 md:mb-6 group-hover:text-[#006233] transition-colors">Conscious Exploration</h3>
                         <p class="text-stone-300 font-light leading-relaxed text-base md:text-lg">
                            Tourism that gives back. From eco-lodges in the High Atlas to supporting local cooperatives, we champion travel that honors the land.
                        </p>
                    </div>
                     <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#006233] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>

                <!-- Value 3 -->
                <div class="relative bg-white/5 backdrop-blur-md rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 border border-white/10 overflow-hidden group hover:border-[#d4af37]/50 transition-all duration-500 hover:-translate-y-2">
                    <span class="absolute -right-2 -top-2 md:-right-4 md:-top-4 text-[8rem] md:text-[12rem] font-playfair font-black text-white/5 leading-none group-hover:text-[#d4af37]/10 transition-colors duration-500 select-none">03</span>
                    
                    <div class="relative z-10 pt-16 md:pt-20">
                         <h3 class="text-2xl md:text-3xl font-playfair font-bold mb-4 md:mb-6 group-hover:text-[#d4af37] transition-colors">Future Forward</h3>
                         <p class="text-stone-300 font-light leading-relaxed text-base md:text-lg">
                            More than a guide, a digital ecosystem preparing the world for the 2030 World Cup—blending heritage with cutting-edge innovation.
                        </p>
                    </div>
                     <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-[#d4af37] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. TIMELINE RELOADED (Premium Glass Scroll) -->
    <section class="relative">
        <!-- Scroll Container -->
        <div class="relative w-full">
            
            <!-- Sticky Background Layer -->
            <div class="sticky top-0 h-screen w-full overflow-hidden z-0">
                <img src="{{ asset('img/scroll.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                <!-- Gentle Overlay to unify image tone -->
                <div class="absolute inset-0 bg-stone-900/20"></div>
            </div>

            <!-- Scrolling Content Layer -->
            <div class="relative z-10 -mt-[100vh]">
                
                <!-- Step 1 -->
                <div class="min-h-screen flex items-center justify-center p-6">
                     <div class="max-w-2xl w-full bg-white/80 backdrop-blur-xl p-10 md:p-14 rounded-[3rem] shadow-2xl border border-white/40 transform transition-all hover:scale-105 duration-500">
                        <span class="text-[#C8102E] font-black text-6xl md:text-8xl opacity-10 absolute top-4 right-8 select-none">01</span>
                        <div class="relative z-10">
                            <h3 class="text-sm font-bold uppercase tracking-[0.3em] text-[#C8102E] mb-3">The Beginning</h3>
                            <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-6">Curating the Chaos</h2>
                            <p class="text-stone-600 text-lg leading-relaxed font-light">
                                We started by mapping out the most confusing aspects of travel: Transport, Visa, and Etiquette. Turning complex laws into simple guides.
                            </p>
                        </div>
                     </div>
                </div>

                <!-- Step 2 -->
                <div class="min-h-screen flex items-center justify-center p-6">
                    <div class="max-w-2xl w-full bg-white/80 backdrop-blur-xl p-10 md:p-14 rounded-[3rem] shadow-2xl border border-white/40 transform transition-all hover:scale-105 duration-500">
                        <span class="text-[#006233] font-black text-6xl md:text-8xl opacity-10 absolute top-4 right-8 select-none">02</span>
                        <div class="relative z-10">
                            <h3 class="text-sm font-bold uppercase tracking-[0.3em] text-[#006233] mb-3">The Expansion</h3>
                            <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-6">Visual Storytelling</h2>
                            <p class="text-stone-600 text-lg leading-relaxed font-light">
                                Words weren't enough. We launched a visual archive, capturing the vibrant colors of the souks and the silence of the Sahara.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="min-h-screen flex items-center justify-center p-6">
                    <div class="max-w-2xl w-full bg-white/80 backdrop-blur-xl p-10 md:p-14 rounded-[3rem] shadow-2xl border border-white/40 transform transition-all hover:scale-105 duration-500">
                        <span class="text-[#d4af37] font-black text-6xl md:text-8xl opacity-10 absolute top-4 right-8 select-none">03</span>
                        <div class="relative z-10">
                            <h3 class="text-sm font-bold uppercase tracking-[0.3em] text-[#d4af37] mb-3">The Future</h3>
                            <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-6">Vision 2030</h2>
                            <p class="text-stone-600 text-lg leading-relaxed font-light">
                                With the World Cup on the horizon, we are preparing the ultimate digital ecosystem for millions of future visitors.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Spacer to allow last item to scroll away fully if needed, or transition to next section -->
                <div class="h-20"></div>

            </div>
        </div>
    </section>

    <!-- 5. CTA SECTION (Wallpaper Style) -->
    <!-- 5. CTA SECTION (Wallpaper Style) -->
    <section class="py-24 relative flex items-center justify-center overflow-hidden bg-fixed" style="background-image: url('{{ asset('assets/images/morocco_hero_cinematic.png') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/80"></div>
        <div class="absolute inset-0 opacity-10 pointer-events-none mix-blend-overlay" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 150px;"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl">
            <h2 class="text-4xl md:text-6xl font-playfair font-black text-white mb-6">
                Your Gateway to the Kingdom
            </h2>
            <p class="text-lg md:text-xl text-stone-200 font-light mb-10 leading-relaxed">
                We make it easy to discover the real Morocco—from the grand imperial cities to the hidden villages. Everything you need to know is right here, supported by our team <strong>24/7</strong>.
            </p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                <a href="{{ url('discover') }}" class="px-8 py-3 text-sm bg-[#C8102E] text-white rounded-full font-bold uppercase tracking-widest hover:bg-[#a00c23] transition-all shadow-2xl hover:scale-105">
                    Start Exploring
                </a>
                <a href="{{ url('contact') }}" class="px-8 py-3 text-sm bg-white text-stone-900 rounded-full font-bold uppercase tracking-widest hover:bg-stone-100 transition-all shadow-xl hover:scale-105 flex items-center gap-2">
                    <i class="fas fa-headset text-[#C8102E]"></i> Support 24/7
                </a>
            </div>
        </div>
    </section>
    
    <!-- Spacer for Newsletter -->
    <!-- Spacer Removed -->
@endsection

@section('scripts')
   <!-- Global Scripts Handle Animation Now -->
@endsection
