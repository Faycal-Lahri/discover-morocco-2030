@extends('layouts.app')

@section('content')
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Accordion Animation */
        .faq-answer { display: grid; grid-template-rows: 0fr; transition: grid-template-rows 0.4s ease-out; }
        .faq-answer.open { grid-template-rows: 1fr; }
        .faq-inner { overflow: hidden; }
        
        /* Hero Animation */
        .hero-reveal-text { clip-path: polygon(0 100%, 100% 100%, 100% 100%, 0 100%); opacity: 0; transform: translateY(20px); }

        /* Video Hero Animations */
        @keyframes fadeUpStagger { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        .animate-title-word { display: inline-block; opacity: 0; animation: fadeUpStagger 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
        @keyframes scrollDrop { 0% { top: -50%; opacity: 0; } 50% { opacity: 1; } 100% { top: 100%; opacity: 0; } }
        .animate-scroll-drop { animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite; }
        
        .zellige-pattern {
            background-image: url('{{ asset('assets/images/zellige_pattern.png') }}');
            background-repeat: repeat-x;
            background-size: 60px;
        }
    </style>

    <!-- HERO SECTION (Mindblowing) -->
    <!-- Concept: Split Screen Reveal. Image on left, Pattern/Text on right, then merge. -->
    <!-- HERO SECTION (Video Background) -->
    <div id="hero-container" class="relative w-full h-[110vh] overflow-hidden bg-black mx-auto">
         <!-- Video Background -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60 scale-105">
            <source src="{{ asset('videos/faqs.mp4') }}" type="video/mp4">
        </video>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/80"></div>
        
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 z-10 pt-20">
            <!-- Animated Title -->
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-black text-white leading-[0.9] drop-shadow-2xl">
                <span class="animate-title-word" style="animation-delay: 0.2s;">Help</span>
                <span class="animate-title-word text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] via-[#f3e5ab] to-[#d4af37]" style="animation-delay: 0.4s;">Center</span>
            </h1>
            
            <p class="mt-8 text-xl md:text-2xl font-light text-stone-200 max-w-2xl mx-auto leading-relaxed opacity-0 animate-[fadeIn_1s_ease-out_1.2s_forwards]">
                Everything you need to know for your journey to the Kingdom of Light.
            </p>
        </div>
        
         <!-- Scroll Indicator (Premium Drop Line) -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-20">
            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
            <div class="w-[1px] h-16 bg-gradient-to-b from-white/10 to-transparent relative overflow-hidden rounded-full">
                <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-white animate-scroll-drop"></div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="relative z-20 -mt-20 container mx-auto px-6 md:px-12 pb-10">
        
        <div x-data="{ activeCategory: '{{ Str::slug($categoryList->first()) }}' }" class="bg-stone-50 rounded-3xl shadow-xl overflow-hidden border border-stone-100 flex flex-col md:flex-row min-h-[800px]">
            
            <!-- MOBILE: Horizontal Scroll Categories -->
            <div class="md:hidden w-full bg-stone-50 p-4 border-b border-stone-100 overflow-x-auto no-scrollbar">
                <div class="flex space-x-3 w-max px-2">
                    @foreach($categoryList as $catName)
                    <button 
                        @click="activeCategory = '{{ Str::slug($catName) }}'"
                        :class="activeCategory === '{{ Str::slug($catName) }}' ? 'bg-[#C8102E] text-white shadow-lg shadow-red-500/30' : 'bg-white text-stone-600 border border-stone-200 hover:border-[#C8102E]'"
                        class="px-5 py-3 rounded-full text-xs font-bold uppercase tracking-wider whitespace-nowrap transition-all"
                    >
                        {{ $catName }}
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- LEFT: Sidebar Navigation (Sticky) -->
            <div class="md:w-1/4 bg-stone-50 p-8 border-r border-stone-100 hidden md:block">
                <div class="sticky top-8">
                    <h3 class="font-bold text-xs uppercase tracking-[0.2em] text-stone-400 mb-8 pl-2">Categories</h3>
                    <div class="flex flex-col space-y-2">
                        @foreach($categoryList as $catName)
                        <button 
                            @click="activeCategory = '{{ Str::slug($catName) }}'"
                            :class="activeCategory === '{{ Str::slug($catName) }}' ? 'text-white bg-[#C8102E] shadow-lg shadow-red-500/30 transform scale-105' : 'text-stone-500 hover:text-[#C8102E] hover:bg-white hover:shadow-sm'"
                            class="px-5 py-4 text-sm font-bold transition-all rounded-xl block text-left w-full flex justify-between items-center group"
                        >
                            {{ $catName }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT: Content Area -->
            <div class="md:w-3/4 p-8 md:p-12">
                
                @forelse($categories as $categoryName => $faqs)
                <div x-show="activeCategory === '{{ Str::slug($categoryName) }}'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="mb-16">
                    <div class="mb-10 flex items-center gap-4">
                        <h2 class="text-3xl font-playfair font-bold text-stone-900">{{ $categoryName }}</h2>
                    </div>

                    <div class="space-y-4">
                        @foreach($faqs as $faq)
                        <!-- FAQ Item -->
                        <div class="group border border-stone-200 rounded-2xl overflow-hidden hover:border-[#C8102E] transition-colors cursor-pointer faq-item shadow-sm" onclick="toggleFaq(this)">
                            <div class="p-6 flex justify-between items-center bg-white z-10 relative">
                                <h4 class="font-bold text-lg text-stone-900 group-hover:text-[#C8102E] transition-colors pr-8">{{ $faq->question }}</h4>
                                <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-stone-400 group-hover:bg-[#C8102E] group-hover:text-white transition-all shrink-0">
                                    <i class="fas fa-plus text-xs icon-toggle transition-transform duration-300"></i>
                                </div>
                            </div>
                            <div class="faq-answer bg-stone-50">
                                <div class="faq-inner px-6 pb-6 text-stone-600 leading-relaxed text-base pt-2">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="text-center py-20">
                    <p class="text-stone-500 text-lg">Detailed FAQs coming soon!</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- STILL HAVE QUESTIONS (Rounded Corners Fixed) -->
    <!-- STILL HAVE QUESTIONS (Edge to Edge Section) -->
    <section class="py-24 bg-[#0a0a0a] relative w-full overflow-hidden text-white">
         <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 100px;"></div>
        
        <div class="container mx-auto px-6 md:px-12 relative z-10 text-center">
            <div class="max-w-2xl mx-auto">
                <span class="text-[#d4af37] font-bold uppercase tracking-widest text-[10px] mb-3 block">Here to Help 24/7</span>
                <h2 class="text-3xl md:text-4xl font-playfair font-black mb-4">Still have questions?</h2>
                <p class="text-stone-400 text-sm md:text-base font-light mb-8">
                    Our dedicated support team is ready to assist you with any inquiries regarding your travel plans.
                </p>
                <a href="/contact" class="inline-flex items-center gap-2 px-8 py-3 bg-[#C8102E] text-white text-sm font-bold uppercase tracking-widest rounded-full hover:bg-white hover:text-[#C8102E] transition-all transform hover:-translate-y-1 shadow-lg hover:shadow-red-500/50">
                    <span>Contact Support</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ZELLIGE BAND -->
    <div class="w-full h-6 bg-[#006233] relative overflow-hidden flex items-center">
        <div class="absolute inset-0 w-full h-full opacity-30 zellige-pattern"></div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script>
        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        // Hero Reveal
        gsap.to("#hero-title", { opacity: 1, y: 0, duration: 1.2, ease: "power4.out", delay: 0.2 });
        gsap.to("#hero-subtitle", { opacity: 1, y: 0, duration: 1, ease: "power4.out", delay: 0.5 });
        gsap.to("#hero-bg", { scale: 1, duration: 20, ease: "none", repeat: -1, yoyo: true }); // Slow breath

        // Accordion Logic
        function toggleFaq(element) {
            const answer = element.querySelector('.faq-answer');
            const icon = element.querySelector('.icon-toggle');
            
            // Close others (Optional, strict accordion)
            // document.querySelectorAll('.faq-answer').forEach(el => { if(el !== answer) el.classList.remove('open'); });

            answer.classList.toggle('open');
            
            if (answer.classList.contains('open')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
                icon.style.transform = 'rotate(180deg)';
                element.classList.add('border-[#C8102E]');
            } else {
                icon.classList.add('fa-plus');
                icon.classList.remove('fa-minus');
                icon.style.transform = 'rotate(0deg)';
                element.classList.remove('border-[#C8102E]');
            }
        }
    </script>
@endsection
