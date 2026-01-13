@extends('layouts.app')

@section('content')
<!-- Cinematic Hero Section -->
<div class="relative w-full h-screen overflow-hidden bg-black">
    <div class="absolute inset-0">
        @if($city->video)
            <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom">
                <source src="{{ Str::startsWith($city->video, 'http') ? $city->video : asset('storage/' . $city->video) }}" type="video/mp4">
            </video>
        @elseif($city->image)
            <img src="{{ Str::startsWith($city->image, 'http') ? $city->image : (Str::startsWith($city->image, 'images/') ? asset($city->image) : asset('storage/' . $city->image)) }}" class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom">
        @else
            <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom">
        @endif
        <!-- Multi-layer Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-stone-950"></div>
        <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-stone-950 to-transparent"></div>
    </div>

    <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 px-6">
        <div class="overflow-hidden mb-4">
            <span class="text-[#d4af37] font-outfit font-medium tracking-[0.5em] uppercase text-sm md:text-base block animate-reveal-up">Explore the Empire</span>
        </div>
        
        <h1 class="text-7xl md:text-[12rem] font-playfair font-black text-white leading-none mb-8 tracking-tighter drop-shadow-2xl animate-reveal-up-delay uppercase">
            {{ $city->nom }}
        </h1>

        <div class="overflow-hidden">
            <p class="text-lg md:text-2xl text-stone-300 font-playfair italic max-w-2xl animate-reveal-up-delay-2">
                "{{ $city->titre ?? 'A journey through history and soul' }}"
            </p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 flex flex-col items-center gap-6 z-20">
        <div class="w-px h-24 bg-gradient-to-b from-[#d4af37] via-[#d4af37]/50 to-transparent animate-pulse"></div>
    </div>
</div>

<!-- Editorial Section: The Heart of the City -->
<section class="py-40 bg-stone-950 relative overflow-hidden">
    <!-- Texture & Depth -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/black-paper.png')] opacity-20 pointer-events-none"></div>
    
    <div class="container mx-auto px-6 lg:px-20 relative z-10">
        <div class="flex flex-col items-center mb-40 animate-on-scroll">
            <h2 class="text-5xl md:text-8xl font-playfair font-black text-white text-center leading-[0.9] mb-12">
                The Soul of <br><span class="text-[#d4af37] italic uppercase tracking-tighter">{{ $city->nom }}</span>
            </h2>
            <div class="w-24 h-px bg-[#d4af37]/50 mb-12"></div>
            <p class="text-stone-300 text-xl md:text-3xl font-outfit font-light max-w-4xl text-center leading-relaxed italic opacity-80">
                "{{ $city->description }}"
            </p>
        </div>

        <!-- Alternating Editorial Paragraphs -->
        @if($city->paragraphs->count() > 0)
            <div class="space-y-64">
                @foreach($city->paragraphs as $index => $paragraph)
                    @php
                        // Cycle through destinations to get images
                        $destinationImage = null;
                        if($city->destinations->count() > 0) {
                            $destIndex = $index % $city->destinations->count();
                            $dest = $city->destinations->get($destIndex);
                            $destinationImage = $dest->image ?? ($dest->destinationImages->first() ? $dest->destinationImages->first()->image : null);
                        }
                    @endphp

                    <div class="flex flex-col {{ $index % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-20 lg:gap-32 animate-on-scroll">
                        <!-- Content Side -->
                        <div class="w-full lg:w-[45%] group px-4">
                            <div class="relative mb-10 overflow-hidden">
                                <span class="text-[12rem] font-playfair font-black text-white/5 absolute -top-24 -left-10 select-none pointer-events-none">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="flex items-center gap-4 mb-8 relative z-10">
                                    <div class="h-px w-12 bg-[#d4af37]"></div>
                                    <span class="text-[#d4af37] font-bold uppercase tracking-[0.3em] text-xs">Chapter</span>
                                </div>
                                <h3 class="text-4xl md:text-6xl font-playfair font-bold text-white mb-10 leading-tight relative z-10">
                                    {{ $paragraph->titre }}
                                </h3>
                            </div>
                            <div class="text-stone-400 text-lg md:text-xl font-outfit font-light leading-loose space-y-8 border-l border-white/10 pl-10 group-hover:border-[#d4af37]/50 transition-colors duration-700">
                                {!! nl2br(e($paragraph->contenu)) !!}
                            </div>
                        </div>

                        <!-- Image Side (Cinematic Frame) -->
                        <div class="w-full lg:w-[55%] relative">
                            <div class="relative rounded-[1rem] overflow-hidden aspect-[16/10] shadow-[0_50px_100px_-20px_rgba(0,0,0,0.5)] bg-stone-900">
                                @if($destinationImage)
                                    <img src="{{ Str::startsWith($destinationImage, 'http') ? $destinationImage : (Str::startsWith($destinationImage, 'images/') ? asset($destinationImage) : asset('storage/' . $destinationImage)) }}" 
                                         class="w-full h-full object-cover scale-100 hover:scale-110 transition-transform duration-[3s] ease-out">
                                @else
                                    @php
                                        $fallbackImg = $city->image ? (Str::startsWith($city->image, 'http') ? $city->image : (Str::startsWith($city->image, 'images/') ? asset($city->image) : asset('storage/' . $city->image))) : asset('assets/images/morocco_hero_real.png');
                                    @endphp
                                    <img src="{{ $fallbackImg }}" 
                                         class="w-full h-full object-cover opacity-50 grayscale">
                                @endif
                                <!-- Frame Soft Glow -->
                                <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-black/80 to-transparent"></div>
                                <div class="absolute bottom-6 left-6 px-4 py-2 bg-black/40 backdrop-blur-md border border-white/10 rounded-full">
                                    <span class="text-white/70 text-[10px] uppercase font-bold tracking-[0.2em]">Featured Experience</span>
                                </div>
                            </div>
                            <!-- Background Decor -->
                            <div class="absolute -bottom-10 {{ $index % 2 == 0 ? '-right-10' : '-left-10' }} w-64 h-64 bg-[#d4af37]/5 opacity-20 blur-3xl pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Immersive Museum Gallery (Must-Visit Spots) -->
@if($city->destinations->count() > 0)
<section class="py-60 bg-white relative overflow-hidden">
    <!-- Sophisticated Background Pattern -->
    <div class="absolute inset-0 bg-[url('{{ asset('assets/images/zellige_pattern.png') }}')] opacity-[0.02] pointer-events-none"></div>
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-stone-200 to-transparent"></div>

    <div class="container mx-auto px-6 lg:px-20 mb-32 relative z-10 flex flex-col md:flex-row items-baseline justify-between gap-10">
        <div class="animate-on-scroll">
            <span class="text-[#8B0000] font-black uppercase tracking-[0.8em] text-[10px] mb-8 block">The Collection</span>
            <h2 class="text-8xl md:text-[12rem] font-playfair font-black text-stone-900 tracking-tighter leading-none">
                Must Visit <span class="text-stone-200 italic">Spots</span>
            </h2>
        </div>
        <div class="max-w-xs animate-on-scroll delay-200">
            <p class="text-stone-400 font-outfit font-light text-sm italic leading-relaxed border-l-2 border-[#d4af37]/30 pl-8">
                "A curated selection of landmarks that define the very soul of this imperial realm."
            </p>
        </div>
    </div>

    <!-- Horizontal Museum Scroll -->
    <div class="relative w-full">
        <div class="flex overflow-x-auto overflow-y-hidden scrollbar-hide snap-x snap-mandatory gap-12 px-6 lg:px-20 pb-20">
            @foreach($city->destinations as $index => $destination)
                <div class="flex-none w-[90vw] md:w-[600px] snap-center animate-on-scroll" style="transition-delay: {{ $index * 150 }}ms">
                    <a href="{{ route('destinations.show', $destination) }}" class="group block relative h-full">
                        <div class="relative aspect-[16/10] md:aspect-[16/11] overflow-hidden rounded-[1rem] bg-stone-100 shadow-[0_60px_100px_-40px_rgba(0,0,0,0.2)] transition-all duration-1000 ease-[cubic-bezier(0.2,1,0.2,1)] group-hover:shadow-[0_80px_150px_-50px_rgba(0,0,0,0.4)] group-hover:-translate-y-4">
                            @php
                                $dImg = $destination->image ?? ($destination->destinationImages->first() ? $destination->destinationImages->first()->image : null);
                                $dUrl = $dImg ? (Str::startsWith($dImg, 'http') ? $dImg : (Str::startsWith($dImg, 'images/') ? asset($dImg) : asset('storage/' . $dImg))) : asset('assets/images/morocco_hero.png');
                            @endphp
                            <img src="{{ $dUrl }}" class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-[3s] ease-out brightness-90 group-hover:brightness-105">

                            <!-- Internal Multi-layer Info -->
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                            
                            <!-- Floating Header on Card -->
                            <div class="absolute top-10 inset-x-10 flex justify-between items-start">
                                <span class="px-5 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[9px] uppercase font-black tracking-widest opacity-0 group-hover:opacity-100 transition-all duration-700 -translate-y-4 group-hover:translate-y-0">Vol. 0{{ $index + 1 }}</span>
                                <div class="w-12 h-12 rounded-full border border-white/30 flex items-center justify-center group-hover:bg-[#d4af37] group-hover:border-[#d4af37] transition-all duration-500">
                                    <i class="fas fa-plus text-white text-[10px]"></i>
                                </div>
                            </div>

                            <!-- Bottom Content with Mask Effect -->
                            <div class="absolute inset-x-10 bottom-10">
                                <h3 class="text-4xl md:text-6xl font-playfair font-black text-white leading-none tracking-tighter mb-4 transform transition-all duration-700 group-hover:scale-105 origin-left">
                                    {{ $destination->nom }}
                                </h3>
                                <div class="h-1 w-0 bg-[#d4af37] group-hover:w-full transition-all duration-[1.5s] ease-out"></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="flex-none w-[10vw]"></div>
        </div>
    </div>
</section>
@endif

<!-- Cinematic Realm Explorer (Other Empires) -->
<section class="py-60 bg-[#050505] overflow-hidden relative">
    <!-- Atmospheric Lighting -->
    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] h-[80vh] bg-[#d4af37]/5 rounded-full blur-[150px] pointer-events-none opacity-30"></div>

    <div class="container mx-auto px-6 lg:px-20 mb-32 relative z-10 text-center animate-on-scroll">
        <span class="text-[#d4af37] font-black uppercase tracking-[1.2em] text-[10px] mb-12 block">The Grand Anthology</span>
        <h2 class="text-7xl md:text-[14rem] font-playfair font-black text-white/10 tracking-[0.2em] leading-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none pointer-events-none uppercase">Relics</h2>
        <h2 class="text-6xl md:text-9xl font-playfair font-black text-white relative z-10 leading-none">
            Choose Your <br><span class="italic text-stone-600">Legend</span>
        </h2>
    </div>

    <!-- Scrollable Portal Gallery -->
    <div class="relative w-full">
        <div class="flex overflow-x-auto overflow-y-hidden scrollbar-hide snap-x snap-mandatory gap-8 px-6 lg:px-20 pb-32">
            @foreach($otherCities as $index => $other)
                <div class="flex-none w-[80vw] md:w-[450px] snap-center animate-on-scroll" style="transition-delay: {{ $index * 100 }}ms">
                    <a href="{{ route('cities.show', $other) }}" class="group relative block aspect-[4/5.5] overflow-hidden rounded-[2rem] bg-stone-900 border border-white/5 transition-all duration-1000 ease-[cubic-bezier(0.165,0.84,0.44,1)] group-hover:shadow-[0_0_80px_rgba(212,175,55,0.1)] group-hover:scale-[0.98]">
                        @php
                            $oUrl = $other->image ? (Str::startsWith($other->image, 'http') ? $other->image : (Str::startsWith($other->image, 'images/') ? asset($other->image) : asset('storage/' . $other->image))) : asset('assets/images/morocco_hero.png');
                        @endphp
                        <img src="{{ $oUrl }}" class="w-full h-full object-cover transition-all duration-[2.5s] ease-out brightness-50 group-hover:brightness-100 scale-110 group-hover:scale-100">
                        
                        <!-- Portal Frame Effect -->
                        <div class="absolute inset-0 ring-[20px] ring-black/20 group-hover:ring-black/0 transition-all duration-1000 pointer-events-none"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>
                        
                        <!-- Floating City Label -->
                        <div class="absolute inset-x-0 bottom-0 p-12 text-center">
                            <h3 class="text-4xl md:text-5xl font-playfair font-black text-white mb-6 uppercase tracking-tighter transition-all duration-700 group-hover:text-[#d4af37] group-hover:-translate-y-4">
                                {{ $other->nom }}
                            </h3>
                            <div class="w-12 h-px bg-[#d4af37] mx-auto opacity-0 group-hover:opacity-100 transition-all duration-1000 transform scale-x-0 group-hover:scale-x-[3]"></div>
                            <span class="text-[10px] text-white/40 font-black uppercase tracking-[0.6em] mt-8 block opacity-0 group-hover:opacity-60 transition-all duration-700 delay-200">Invoke History</span>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="flex-none w-[15vw]"></div>
        </div>
    </div>
</section>

<style>
    /* Premium Logic for Scroll Experience */
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* Animation Enhancement */
    .animate-on-scroll { 
        opacity: 0; 
        transform: translateY(40px) skewY(2deg); 
        transition: all 1.2s cubic-bezier(0.2, 1, 0.2, 1); 
        filter: blur(10px);
    }
    .animate-on-scroll.is-visible { 
        opacity: 1; 
        transform: translateY(0) skewY(0deg); 
        filter: blur(0);
    }
</style>

<style>
    @keyframes slowZoom {
        from { transform: scale(1.05); }
        to { transform: scale(1.15); }
    }
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }

    @keyframes revealUp {
        from { transform: translateY(100%); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    .animate-reveal-up { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-reveal-up-delay { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards; opacity: 0; }
    .animate-reveal-up-delay-2 { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards; opacity: 0; }

    /* Intersection Observer Styles */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .animate-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
});
</script>
@endsection
