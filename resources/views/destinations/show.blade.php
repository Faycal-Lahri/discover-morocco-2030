@extends('layouts.app')

@section('content')
    <!-- Cinematic Hero Section -->
    <div class="relative w-full h-screen overflow-hidden bg-black">
        <div class="absolute inset-0">
            @if($destination->video)
                <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom">
                    <source src="{{ Str::startsWith($destination->video, 'http') ? $destination->video : asset('storage/' . $destination->video) }}" type="video/mp4">
                </video>
            @else
                @php
                    $hImg = $destination->image ?? ($destination->destinationImages->first() ? $destination->destinationImages->first()->image : null);
                    $hUrl = $hImg ? (Str::startsWith($hImg, 'http') ? $hImg : (Str::startsWith($hImg, 'images/') ? asset($hImg) : asset('storage/' . $hImg))) : asset('assets/images/morocco_hero_real.png');
                @endphp
                <img src="{{ $hUrl }}" class="w-full h-full object-cover opacity-60 scale-105 animate-slow-zoom">
            @endif
            
            <!-- Multi-layer Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-stone-950"></div>
            <div class="absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-stone-950 to-transparent"></div>
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 z-10 pt-20">
            <div class="mb-8 animate-reveal-up">
                <a href="{{ route('cities.show', $destination->city) }}" class="group inline-flex items-center gap-4 px-6 py-2 rounded-full border border-white/10 bg-white/5 backdrop-blur-md text-white hover:bg-white hover:text-black transition-all duration-500">
                    <i class="fas fa-arrow-left text-[10px] group-hover:-translate-x-1 transition-transform"></i>
                    <span class="text-[9px] font-bold uppercase tracking-[0.4em]">{{ $destination->city->nom }}</span>
                </a>
            </div>
            
            <h1 class="text-6xl md:text-9xl font-playfair font-black text-white leading-[0.85] tracking-tighter mb-10 max-w-5xl animate-reveal-up-delay">
                {{ $destination->nom }}
                <div class="h-1 w-24 bg-[#d4af37] mx-auto mt-8 rounded-full"></div>
            </h1>
            
            @if($destination->label)
                <div class="flex items-center gap-6 animate-reveal-up-delay-2">
                    <div class="h-px w-10 bg-white/20"></div>
                    <span class="text-[#d4af37] text-xs font-black uppercase tracking-[0.6em]">{{ $destination->label }}</span>
                    <div class="h-px w-10 bg-white/20"></div>
                </div>
            @endif
        </div>

        <!-- Scroll Progress Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-4 z-20">
             <span class="text-[8px] font-bold uppercase tracking-[0.5em] text-white/30">Scroll to Explore</span>
             <div class="w-px h-20 bg-gradient-to-b from-white/40 via-white/10 to-transparent"></div>
        </div>
    </div>

    <!-- Editorial Discovery (The Soul) -->
    <section class="py-40 bg-stone-950 relative overflow-hidden">
        <!-- Living Background Texture -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/black-paper.png')] opacity-30 pointer-events-none"></div>
        <div class="absolute -top-1/4 -right-1/4 w-[800px] h-[800px] bg-[#d4af37]/[0.03] blur-[150px] rounded-full pointer-events-none"></div>
        
        <div class="container mx-auto px-6 lg:px-20 relative z-10">
            <div class="flex flex-col items-center mb-40 animate-on-scroll">
                <div class="flex items-center gap-6 mb-10">
                    <span class="text-[#d4af37] font-bold uppercase tracking-[0.5em] text-[10px]">The Essence</span>
                    <div class="h-px w-24 bg-[#d4af37]/30"></div>
                </div>
                <h2 class="text-5xl md:text-8xl font-playfair font-black text-white text-center leading-[0.9] mb-12">
                    The Soul of <br><span class="text-[#d4af37] italic uppercase tracking-tighter">{{ $destination->nom }}</span>
                </h2>
                <div class="max-w-3xl">
                    <p class="text-2xl md:text-3xl font-light text-stone-400 text-center leading-relaxed font-outfit italic">
                        "{{ $destination->description }}"
                    </p>
                </div>
            </div>

            <!-- Alternating Story Blocks -->
            @if($destination->paragraphs->count() > 0)
                <div class="space-y-64 pb-20">
                    @foreach($destination->paragraphs as $index => $paragraph)
                        <div class="flex flex-col {{ $index % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-16 lg:gap-32 animate-on-scroll">
                            <!-- Text Content -->
                            <div class="w-full lg:w-[45%] group">
                                <div class="relative">
                                    <span class="text-[15rem] font-playfair font-black text-white/[0.03] absolute -top-40 -left-12 select-none group-hover:text-[#d4af37]/[0.05] transition-colors duration-700">0{{ $index + 1 }}</span>
                                    <h3 class="text-4xl md:text-6xl font-playfair font-black text-white mb-10 relative z-10 leading-tight">
                                        {{ $paragraph->titre }}
                                    </h3>
                                    <p class="text-xl text-stone-400 leading-relaxed font-outfit font-light mb-12">
                                        {{ $paragraph->contenu }}
                                    </p>
                                    <div class="h-px w-0 bg-[#d4af37] group-hover:w-full transition-all duration-1000 ease-out"></div>
                                </div>
                            </div>
                            
                            <!-- Large Cinematic Image Frame -->
                            <div class="w-full lg:w-[55%] relative">
                                    @php
                                        $pImgObj = $destination->destinationImages->skip($index)->first();
                                        $pUrl = $pImgObj ? (Str::startsWith($pImgObj->image, 'http') ? $pImgObj->image : (Str::startsWith($pImgObj->image, 'images/') ? asset($pImgObj->image) : asset('storage/' . $pImgObj->image))) : asset('assets/images/morocco_hero.png');
                                    @endphp
                                    @if($pImgObj)
                                        <img src="{{ $pUrl }}" 
                                             class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-[3s] ease-out brightness-90 group-hover:brightness-105"
                                             alt="{{ $paragraph->titre }}">
                                    @else
                                        <img src="{{ asset('assets/images/morocco_hero.png') }}" class="w-full h-full object-cover opacity-30 grayscale grayscale-0">
                                    @endif
                                    
                                    <!-- Frame Glow -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                                    <div class="absolute inset-x-10 bottom-10">
                                        <div class="flex items-center gap-4 text-white/40">
                                            <span class="text-[9px] font-bold uppercase tracking-widest">{{ $destination->nom }}</span>
                                            <div class="h-px w-8 bg-white/20"></div>
                                            <span class="text-[9px] font-bold uppercase tracking-widest">Perspective 0{{ $index + 1 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Outer Halo -->
                                <div class="absolute -inset-10 bg-[#d4af37]/[0.02] blur-3xl -z-10 rounded-full"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Art Gallery (Horizontal Scroll/Grid Mix) -->
    @if($destination->destinationImages->count() > 0)
        <section class="py-40 bg-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('{{ asset('assets/images/zellige_pattern.png') }}')] opacity-[0.03] pointer-events-none"></div>
            
            <div class="container mx-auto px-6 lg:px-20 relative z-10">
                <div class="mb-32 animate-on-scroll flex flex-col items-center">
                    <span class="text-stone-900 font-bold uppercase tracking-[0.5em] text-[10px] mb-8">Visual Archive</span>
                    <h2 class="text-6xl md:text-9xl font-playfair font-black text-stone-900 tracking-tighter text-center">
                        The Gallery of <br><span class="italic text-stone-400">Legacy</span>
                    </h2>
                </div>
                
                @php
                    $allGalleryImages = collect();
                    
                    // Source 1: destinationImages relation
                    foreach($destination->destinationImages as $di) {
                        $allGalleryImages->push((Str::startsWith($di->image, 'http')) ? $di->image : (Str::startsWith($di->image, 'images/') ? asset($di->image) : asset('storage/' . $di->image)));
                    }
                    
                    // Source 2: polymorphic media relation
                    foreach($destination->media as $m) {
                        if(Str::startsWith($m->file_type, 'image')) {
                             $allGalleryImages->push(asset('storage/' . $m->file_path));
                        }
                    }
                    
                    // Source 3: name-matched galleryMedia from controller
                    if(isset($galleryMedia)) {
                        foreach($galleryMedia as $gm) {
                             $allGalleryImages->push(asset('storage/' . $gm->file_path));
                        }
                    }
                    
                    $uniqueImages = $allGalleryImages->unique()->take(12);
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-20">
                    @foreach($uniqueImages as $index => $imgUrl)
                        <div class="group relative aspect-square overflow-hidden rounded-[2rem] shadow-2xl animate-on-scroll" style="transition-delay: {{ $index * 100 }}ms">
                            <img src="{{ $imgUrl }}" 
                                 class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-[2.5s] ease-out brightness-90 group-hover:brightness-105">
                            
                            <!-- Gallery Info Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700">
                                <div class="absolute bottom-10 inset-x-10 flex justify-between items-end">
                                    <div class="flex flex-col gap-2">
                                        <span class="text-[#d4af37] text-[9px] font-black uppercase tracking-widest">{{ $destination->nom }}</span>
                                        <h4 class="text-white text-xl font-playfair font-bold">Relic Perspective</h4>
                                    </div>
                                    <div class="w-10 h-10 rounded-full border border-white/30 flex items-center justify-center text-white">
                                        <i class="fas fa-expand text-[10px]"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Discover More in the Empire -->
    @if($relatedDestinations->count() > 0)
        <section class="py-40 bg-stone-950 relative overflow-hidden border-t border-white/5">
            <div class="absolute inset-x-0 top-0 h-64 bg-gradient-to-b from-black to-transparent"></div>
             
             <div class="container mx-auto px-6 lg:px-20 relative z-10">
                <div class="flex flex-col items-center mb-32 animate-on-scroll">
                    <span class="text-[#d4af37] font-bold uppercase tracking-[0.4em] text-[10px] mb-8 block">Continue Your Journey</span>
                    <h2 class="text-5xl md:text-8xl font-playfair font-black text-white text-center leading-none tracking-tighter">
                        Other Relics in <br><span class="italic text-stone-500">{{ $destination->city->nom }}</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 lg:gap-24">
                    @foreach($relatedDestinations as $other)
                        <a href="{{ route('destinations.show', $other) }}" class="group block animate-on-scroll">
                            <div class="relative overflow-hidden mb-10 bg-stone-900 aspect-[16/11] rounded-2xl group-hover:-translate-y-4 transition-all duration-700 ease-out">
                                @php
                                    $rImg = $other->image ?? ($other->destinationImages->first() ? $other->destinationImages->first()->image : null);
                                    $rUrl = $rImg ? (Str::startsWith($rImg, 'http') ? $rImg : (Str::startsWith($rImg, 'images/') ? asset($rImg) : asset('storage/' . $rImg))) : asset('assets/images/morocco_hero.png');
                                @endphp
                                <img src="{{ $rUrl }}" class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-[1.5s]">
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950 via-transparent to-transparent opacity-60"></div>
                            </div>
                            <div class="flex items-end justify-between border-b border-white/10 pb-6 group-hover:border-[#d4af37] transition-all duration-500">
                                <h3 class="text-3xl font-playfair font-bold text-white group-hover:text-[#d4af37] transition-colors">{{ $other->nom }}</h3>
                                <div class="text-[#d4af37] transition-all transform group-hover:translate-x-2">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
             </div>
        </section>
    @endif

    <style>
        @keyframes slowZoom {
            from { transform: scale(1.05); }
            to { transform: scale(1.15); }
        }
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate linear; }

        @keyframes revealUp {
            from { transform: translateY(60px) rotate(2deg); opacity: 0; }
            to { transform: translateY(0) rotate(0deg); opacity: 1; }
        }
        .animate-reveal-up { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-reveal-up-delay { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards; opacity: 0; }
        .animate-reveal-up-delay-2 { animation: revealUp 1.5s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards; opacity: 0; }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(40px) skewY(2deg);
            filter: blur(5px);
            transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0) skewY(0deg);
            filter: blur(0px);
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    });
    </script>
@endsection
