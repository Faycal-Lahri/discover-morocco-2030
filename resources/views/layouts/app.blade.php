<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discover Morocco 2030</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Outfit:wght@100..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        .font-display {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Swiper CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Mega Menu Hover Effect */
        .group:hover .mega-menu-dropdown {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            transform: translateY(0) !important;
        }

        /* Logo Animation Keyframes (from Admin) */
        @keyframes letterShock {
            0% {
                transform: scale(0.8) translateY(4px);
                color: #C8102E;
                text-shadow: 0 0 10px rgba(200, 16, 46, 0.5);
            }

            60% {
                transform: scale(1.1) translateY(-1px);
                color: #C8102E;
            }

            100% {
                transform: scale(1);
                color: inherit;
            }
        }

        @keyframes bombRun {
            0% {
                transform: translate(0, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            7% {
                transform: translate(15px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            14% {
                transform: translate(30px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            21% {
                transform: translate(45px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            28% {
                transform: translate(60px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            35% {
                transform: translate(75px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            42% {
                transform: translate(90px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            49% {
                transform: translate(105px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            57% {
                transform: translate(120px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            64% {
                transform: translate(135px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            71% {
                transform: translate(150px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            78% {
                transform: translate(165px, -20px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            85% {
                transform: translate(180px, 0);
                animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1);
            }

            92% {
                transform: translate(190px, -15px);
                animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0);
            }

            100% {
                transform: translate(200px, 20px);
                opacity: 0;
            }
        }

        .run-bomb-anim {
            animation: bombRun 3s linear forwards;
            position: absolute;
            left: 5px;
            top: 5px;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #C8102E;
            z-index: 10;
            pointer-events: none;
        }

        /* LEGACY SCROLLBAR HIDDEN */
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
            display: none;
        }

        /* HIDE SCROLLBAR BUT ALLOW SCROLLING */
        html {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
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

        /* DISABLE SELECTION & DRAGGING GLOBALLY */
        body {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        img {
            pointer-events: none;
            user-drag: none;
            -webkit-user-drag: none;
        }

        /* Allow selection in inputs */
        input,
        textarea,
        [contenteditable] {
            user-select: text !important;
            -webkit-user-select: text !important;
            -moz-user-select: text !important;
            -ms-user-select: text !important;
        }

        /* Chatbot Animations */
        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        #chatbot-toggle {
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #chatbot-toggle:hover {
            transform: scale(1.1);
        }

        #chatbot-messages::-webkit-scrollbar {
            width: 6px;
        }

        #chatbot-messages::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        #chatbot-messages::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #C8102E, #a00d25);
            border-radius: 10px;
        }

        #chatbot-messages::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #a00d25, #8B0000);
        }

        /* Message Animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #chatbot-messages>div {
            animation: slideIn 0.3s ease-out;
        }

        /* Generic Fade In */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>

<body
    class="antialiased bg-stone-50 text-stone-900 font-outfit overflow-x-hidden selection:bg-[#006233] selection:text-white">

    <!-- NAVIGATION (Included from partial) -->
    @include('partials.header')

    <!-- Content -->
    @yield('content')

    <!-- NEWSLETTER (Included from partial) -->
    @unless(View::hasSection('hide_newsletter'))
        @include('partials.newsletter')
    @endunless

    <!-- FOOTER (Included from partial) -->
    @include('partials.footer')

    <!-- MOROCCAN CHATBOT -->
    <!-- Floating Chatbot Button -->
    <!-- Floating Chatbot Button -->
    <!-- Floating Chatbot Button -->
    <!-- MOROCCAN CHATBOT -->
    <!-- MOROCCAN CHATBOT -->
    <div id="chatbot-wrapper"
        class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end gap-2 transition-opacity duration-500">
        <!-- Tooltip Message (Pop Animation) -->
        <div id="chatbot-tooltip"
            class="bg-stone-900 text-white text-xs font-bold py-3 px-5 rounded-2xl shadow-xl mb-1 whitespace-nowrap origin-bottom-right opacity-0 pointer-events-none">
            Got any question? Ask our assistant
            <!-- Arrow -->
            <div class="absolute bottom-[-6px] right-6 w-3 h-3 bg-stone-900 transform rotate-45"></div>
        </div>

        <button id="chatbot-toggle" onclick="toggleChatbot()"
            class="w-14 h-14 rounded-full bg-[#C8102E] text-white shadow-[0_10px_40px_-10px_rgba(200,16,46,0.6)] flex items-center justify-center border-2 border-white/20"
            aria-label="Open Chatbot">
            <!-- Chat Bubble with AI Sparkle -->
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5">
                </path>
                <path d="M18 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"></path>
                <path d="M19.5 6.5L16.5 9.5" stroke-width="1.5"></path>
                <path d="M16.5 6.5L19.5 9.5" stroke-width="1.5"></path>
            </svg>
        </button>
    </div>

    <style>
        .animate-tooltip-pop {
            animation: tooltipPop 5s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }

        @keyframes tooltipPop {
            0% {
                opacity: 0;
                transform: scale(0) translateY(10px) translateX(10px);
            }

            10% {
                opacity: 1;
                transform: scale(1) translateY(0) translateX(0);
            }

            90% {
                opacity: 1;
                transform: scale(1) translateY(0) translateX(0);
            }

            100% {
                opacity: 0;
                transform: scale(0) translateY(10px) translateX(10px);
                display: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatbotTooltip = document.getElementById('chatbot-tooltip');
            
            // Show tooltip after a short delay on page load
            setTimeout(() => {
                chatbotTooltip.classList.add('animate-tooltip-pop');
            }, 3000); 
        });
    </script>

    <!-- Chatbot Window (Refined Premium Design) -->
    <div id="chatbot-window" class="fixed bottom-24 left-4 right-4 md:left-auto md:right-6 md:w-[340px] h-[520px] max-h-[70vh] bg-white/95 backdrop-blur-xl rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] flex flex-col overflow-hidden border border-white/50 z-[99999]" style="opacity: 0; transform: scale(0.95) translateY(20px); transform-origin: bottom right; pointer-events: none; display: none; transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);">
        
        <!-- Header (Premium Gradient - Compact) -->
        <div class="px-5 py-4 bg-gradient-to-r from-[#C8102E] to-[#960a22] text-white flex items-center justify-between shrink-0 shadow-md relative overflow-hidden">
            <!-- Subtle Noise/Pattern -->
            <div class="absolute inset-0 opacity-10" style="background-image: url('{{ asset('assets/images/noise.png') }}');"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full blur-2xl -mr-8 -mt-8 pointer-events-none"></div>

            <div class="flex items-center gap-3 relative z-10">
                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center border border-white/20 shadow-sm backdrop-blur-sm">
                     <i class="fas fa-map-location-dot text-white text-sm"></i>
                </div>
                <div class="flex flex-col">
                     <h3 class="font-bold text-white text-[14px] leading-tight font-playfair tracking-wide">Concierge 2030</h3>
                     <span class="text-[9px] font-medium text-white/80 uppercase tracking-widest flex items-center gap-1.5 mt-0.5">
                        <span class="w-1 h-1 rounded-full bg-[#4ADE80] shadow-[0_0_5px_#4ADE80]"></span> Online
                     </span>
                </div>
            </div>
            
            <button id="chatbot-close" onclick="toggleChatbot()" class="relative z-10 w-7 h-7 flex items-center justify-center rounded-full hover:bg-white/10 transition-all text-white/80 hover:text-white">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 relative bg-[#F9FAFB]/90 flex flex-col min-h-0">
             
             <!-- Pattern -->
             <div class="absolute inset-0 pointer-events-none opacity-[0.04] bg-repeat mix-blend-multiply" 
                  style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 250px;">
             </div>

             <div id="chatbot-messages" class="flex-1 overflow-y-auto p-4 space-y-4 scroll-smooth z-10 custom-scrollbar">
                
                <!-- Welcome Message -->
                <div class="flex justify-start animate-fadeIn">
                    <div class="max-w-[85%] flex gap-2.5">
                        <div class="w-6 h-6 rounded-full bg-[#C8102E] flex items-center justify-center shrink-0 border border-white shadow-sm mt-1">
                            <i class="fas fa-headset text-white text-[10px]"></i>
                        </div>
                        <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none border border-stone-100 shadow-[0_2px_10px_rgba(0,0,0,0.03)] text-stone-800">
                             <p class="leading-relaxed font-outfit text-[12px] text-stone-600">
                                <span class="text-[#C8102E] font-bold block mb-1">Welcome to Morocco! 🇲🇦</span>
                                Need travel tips or history info? I'm here to guide you.
                            </p>
                        </div>
                    </div>
                </div>

             </div>
             
             <!-- Input Area -->
             <div class="p-4 bg-white border-t border-stone-100 shrink-0 z-20">
                <form id="chatbot-form" onsubmit="sendMessage(event)" class="relative flex items-center gap-2.5">
                    <input 
                        type="text" 
                        id="chatbot-input" 
                        placeholder="Type your question..." 
                        class="flex-1 bg-stone-50 border border-stone-200 rounded-xl pl-4 pr-3 py-2.5 text-[12px] focus:outline-none focus:border-[#C8102E]/50 focus:bg-white transition-all text-stone-800 font-outfit placeholder-stone-400 shadow-inner"
                        autocomplete="off"
                    >
                    <button 
                        type="submit" 
                        class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#C8102E] to-[#D9381E] text-white flex items-center justify-center hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 shrink-0 shadow-md"
                    >
                        <i class="fas fa-paper-plane text-xs"></i>
                    </button>
                </form>
                <div class="text-center mt-2.5">
                     <p class="text-[8px] text-stone-400 font-medium tracking-wider uppercase opacity-70">
                        AI Vision 2030 Support
                    </p>
                </div>
            </div>
        </div>

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #d1d5db;
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(5px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
            }
        </style>
    </div>



    <!-- MOBILE MENU OVERLAY (Backdrop) -->

    <!-- MEGA MENU OVERLAY (Hover Triggered, Global Position) -->
    <div id="discover-overlay"
        onmouseenter="openDiscoverOverlay()"
        onmouseleave="closeDiscoverOverlay()"
        class="fixed top-0 left-0 w-full h-full bg-white z-[90] hidden flex-col transition-opacity duration-300 opacity-0 pt-[100px]"
        style="padding-top: 100px;">

        <!-- Pattern Overlay -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-0" 
             style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px;">
        </div>



        <!-- Main Content Grid -->
        <div class="flex flex-col lg:flex-row h-full relative z-10">

            <!-- Left Sidebar (Navigation) -->
            <div class="w-full lg:w-[320px] bg-white border-r border-gray-100 flex flex-col z-20 h-auto lg:h-full relative shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
                
                <!-- Header Logo/Title -->
                <div class="px-10 pt-12 pb-8 flex-shrink-0">
                    <h2 class="text-4xl font-playfair font-black text-stone-900 tracking-tight">Cities</h2>
                    <div class="h-1 w-12 bg-[#D4AF37] mt-4"></div>
                </div>

                <!-- Navigation List (Centered vertically) -->
                <nav class="flex-1 flex flex-col justify-center px-6 space-y-1 overflow-y-auto custom-scrollbar">
                    @foreach($megaMenuCities->take(8) as $index => $city)
                        <a href="{{ route('cities.show', $city->id) }}"
                            onmouseenter="showMegaContent('{{ $city->id }}')"
                            class="mega-link group/link flex items-center gap-4 px-4 py-3.5 rounded-lg transition-all duration-300 cursor-pointer relative overflow-hidden
                            {{ $index === 0 ? 'active-city' : '' }}"
                            data-target="{{ $city->id }}"
                        >
                            <!-- Number -->
                            <span class="text-[10px] font-bold font-outfit text-stone-300 transition-colors duration-300 w-4 group-hover/link:text-[#C8102E] number-indicator">
                                0{{ $index + 1 }}
                            </span>
                            
                            <!-- City Name -->
                            <span class="text-sm font-outfit uppercase tracking-[0.2em] font-bold text-stone-400 transition-all duration-300 name-text group-hover/link:translate-x-1 group-hover/link:text-stone-900">
                                {{ $city->nom }}
                            </span>

                            <!-- Active Indicator (Background Slide) -->
                            <div class="absolute inset-0 bg-gradient-to-r from-stone-100 to-white -z-10 translate-x-[-100%] transition-transform duration-300 bg-indicator"></div>
                            
                            <!-- Active Border -->
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-[#C8102E] opacity-0 transition-opacity duration-300 border-indicator shadow-[0_0_10px_rgba(200,16,46,0.5)]"></div>
                        </a>
                    @endforeach
                </nav>

                <!-- Footer Link -->
                <div class="p-8 pb-12 flex-shrink-0 border-t border-gray-50">
                    <a href="{{ route('cities') }}"
                        class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400 hover:text-[#C8102E] transition-colors flex items-center gap-3 group w-fit">
                        <span>View All Cities</span>
                        <div class="w-6 h-6 rounded-full border border-stone-200 flex items-center justify-center group-hover:border-[#C8102E] transition-colors">
                            <i class="fas fa-arrow-right transform group-hover:-rotate-45 transition-transform duration-300 text-[8px]"></i>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Right Content (Showcase) -->
            <div class="flex-1 h-full relative bg-[#FAFAFA] overflow-hidden flex flex-col">
                
                @foreach($megaMenuCities as $index => $city)
                    <div id="mega-content-{{ $city->id }}"
                        class="mega-content-pane absolute inset-0 flex flex-col h-full w-full {{ $index === 0 ? '' : 'hidden opacity-0' }} transition-opacity duration-500 ease-in-out">
                        
                        <!-- Top Section: Header Info (50% height) -->
                        <div class="h-[50%] flex-shrink-0 flex flex-col justify-center px-12 lg:px-20 relative bg-white z-20">
                            <!-- Watermark -->
                            <h1 class="absolute top-1/2 -translate-y-1/2 right-0 text-[12rem] lg:text-[18rem] font-playfair font-black text-stone-900 uppercase select-none pointer-events-none opacity-5 leading-none z-0 tracking-tighter overflow-hidden whitespace-nowrap">
                                {{ substr($city->nom, 0, 3) }}
                            </h1>

                            <div class="relative z-10 max-w-3xl">
                                <div class="flex items-center gap-4 mb-6 animate-fade-in-up">
                                    <span class="w-8 h-0.5 bg-[#C8102E]"></span>
                                    <span class="text-[11px] font-bold uppercase tracking-[0.3em] text-[#C8102E]">Travel Guide</span>
                                </div>
                                
                                <h1 class="text-7xl lg:text-9xl font-playfair font-black text-stone-900 mb-6 leading-[0.85] tracking-tight animate-fade-in-up delay-[100ms]">
                                    {{ $city->nom }}
                                </h1>
                                
                                <p class="text-xl lg:text-2xl font-playfair italic text-stone-500 max-w-2xl leading-relaxed mb-8 line-clamp-2 animate-fade-in-up delay-[200ms]">
                                    "{{ Str::limit($city->description, 180) }}"
                                </p>
                                
                                <a href="{{ route('cities.show', $city->id) }}" class="inline-flex items-center gap-4 group animate-fade-in-up delay-[300ms]">
                                    <span class="w-10 h-10 rounded-full border border-stone-200 flex items-center justify-center group-hover:border-[#C8102E] group-hover:bg-[#C8102E] group-hover:text-white transition-all duration-300">
                                        <i class="fas fa-arrow-right transform -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                                    </span>
                                    <span class="text-xs font-bold uppercase tracking-widest text-stone-900 group-hover:text-[#C8102E] transition-colors">Start Exploring</span>
                                </a>
                            </div>
                        </div>

                        <!-- Bottom Section: Gallery (50% height) -->
                        <div class="h-[50%] flex-1 bg-stone-50 grid md:grid-cols-3 gap-6 px-12 pb-12 pt-4">
                             
                            @php
                                $displayDestinations = $city->destinations->take(3);
                            @endphp

                            <!-- Real Destinations -->
                            @foreach($displayDestinations as $dIndex => $destination)
                                <a href="{{ route('destinations.show', $destination->id) }}" 
                                   class="group relative overflow-hidden h-full block cursor-pointer bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500">
                                    
                                    @php
                                        $rImg = $destination->image ?? ($destination->destinationImages->first() ? $destination->destinationImages->first()->image : null);
                                        $imgPath = $rImg ? (Str::startsWith($rImg, 'http') ? $rImg : (Str::startsWith($rImg, 'images/') ? asset($rImg) : asset('storage/' . $rImg))) : asset('assets/images/morocco_hero_real.png');
                                    @endphp

                                    <img src="{{ $imgPath }}"
                                        class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110 ease-out">
                                    
                                    <!-- Refined Gradient Overlay -->
                                    <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-500"></div>
                                    
                                    <!-- Content -->
                                    <div class="absolute bottom-0 left-0 p-8 w-full z-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-700 ease-out">
                                        <div class="overflow-hidden mb-3">
                                            <div class="flex items-center gap-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 delay-[50ms]">
                                                <span class="text-[10px] font-bold uppercase tracking-[0.25em] text-[#D4AF37]">
                                                    0{{ $dIndex + 1 }}
                                                </span>
                                                <span class="h-px w-8 bg-[#D4AF37]"></span>
                                            </div>
                                        </div>
                                        <h3 class="text-3xl font-playfair font-medium text-white leading-[0.9] mb-4 drop-shadow-lg">
                                            {{ $destination->nom }}
                                        </h3>
                                        <p class="text-stone-300 text-xs font-outfit line-clamp-2 max-w-[90%] opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-[100ms] leading-relaxed">
                                            {{ $destination->description ?? 'Explore the unique beauty and history of this destination.' }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Script to Handle Dynamic Content Switching -->
    <script>
        function showMegaContent(cityId) {
            // Hide all content panes
            document.querySelectorAll('.mega-content-pane').forEach(el => {
                el.classList.add('hidden');
                el.classList.remove('animate-fadeIn'); 
            });
            // Show selected
            const target = document.getElementById('mega-content-' + cityId);
            if (target) {
                target.classList.remove('hidden');
                void target.offsetWidth; // Trigger reflow
                target.classList.add('animate-fadeIn');
            }

            // Update Active Link State
            // Update Active Link State
            // Update Active Link State
            document.querySelectorAll('.mega-link').forEach(el => {
                const number = el.querySelector('.number-indicator');
                const name = el.querySelector('.name-text');
                const bg = el.querySelector('.bg-indicator');
                const border = el.querySelector('.border-indicator');

                if (el.getAttribute('data-target') == cityId) {
                    // Active State
                    el.classList.add('active-city');
                    
                    if(number) {
                        number.classList.remove('text-stone-300', 'group-hover/link:text-[#C8102E]');
                        number.classList.add('text-[#C8102E]');
                    }
                    if(name) {
                        name.classList.remove('text-stone-400', 'group-hover/link:text-stone-900');
                        name.classList.add('text-stone-900');
                    }
                    if(bg) {
                        bg.classList.remove('translate-x-[-100%]');
                        bg.classList.add('translate-x-0');
                    }
                    if(border) {
                        border.classList.remove('opacity-0');
                        border.classList.add('opacity-100');
                    }

                } else {
                    // Inactive State
                    el.classList.remove('active-city');

                    if(number) {
                        number.classList.add('text-stone-300', 'group-hover/link:text-[#C8102E]');
                        number.classList.remove('text-[#C8102E]');
                    }
                    if(name) {
                        name.classList.add('text-stone-400', 'group-hover/link:text-stone-900');
                        name.classList.remove('text-stone-900');
                    }
                    if(bg) {
                        bg.classList.add('translate-x-[-100%]');
                        bg.classList.remove('translate-x-0');
                    }
                    if(border) {
                        border.classList.add('opacity-0');
                        border.classList.remove('opacity-100');
                    }
                }
            });
        }
    </script>

    <!-- MOBILE MENU OVERLAY (Backdrop) -->
    <div id="mobile-overlay" onclick="toggleMobileMenu()"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300">
    </div>

    <!-- MOBILE MENU OVERLAY -->
    <div id="mobile-overlay" onclick="toggleMobileMenu()"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[9998] hidden opacity-0 transition-opacity duration-300">
    </div>

    <!-- MOBILE MENU SIDEBAR (Fixed Left Sidebar) -->
    <div id="mobile-menu"
        class="fixed top-0 left-0 w-[85%] max-w-[340px] h-full bg-white z-[9999] shadow-2xl transform -translate-x-full transition-transform duration-300 ease-out flex flex-col font-sans border-r border-stone-100 hidden">

        <!-- Left Edge Decorative Border (Gradient) -->
        <div class="absolute top-0 bottom-0 left-0 w-1.5 bg-gradient-to-b from-[#006233] via-green-600 to-[#C8102E]">
        </div>

        <!-- 1. HEADER section -->
        <div class="px-8 pt-10 pb-4 flex items-start justify-between relative z-10 pl-10">
            <!-- Menu Title with Vertical Line -->
            <div class="flex flex-col border-l-[4px] border-[#006233] pl-4 py-1">
                <h2 class="text-4xl font-bold font-playfair text-stone-900 leading-none">Menu</h2>
                <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-[0.2em]">Discover Morocco</p>
            </div>

            <!-- Red Close Button -->
            <button onclick="toggleMobileMenu()"
                class="w-9 h-9 rounded-full bg-[#C8102E] text-white flex items-center justify-center shadow-lg hover:bg-[#a00d25] transition-transform hover:rotate-90">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Decorative Separation Line -->
        <div class="ml-10 h-1 w-16 bg-gradient-to-r from-[#C8102E] to-transparent rounded-full mb-8"></div>

        <!-- 2. NAVIGATION LINKS -->
        <div class="flex-1 overflow-y-auto px-6 space-y-4 relative z-10 pb-6 pl-10">

            <a href="{{ url('/') }}"
                class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div
                    class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                    <i class="fas fa-home"></i>
                </div>
                <span
                    class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">Home</span>
            </a>

            <a href="#discover" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div
                    class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                    <i class="fas fa-compass"></i>
                </div>
                <span class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">Discover
                    Morocco</span>
            </a>

            <a href="{{ url('/about') }}"
                class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div
                    class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                    <i class="fas fa-info-circle"></i>
                </div>
                <span class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">About
                    Us</span>
            </a>

            <a href="{{ url('/contact') }}"
                class="flex items-center gap-4 p-3 rounded-2xl bg-[#FCE8E8] border-l-[4px] border-[#C8102E] transition-all relative overflow-hidden shadow-sm">
                <div
                    class="w-10 h-10 rounded-lg bg-[#FCE8E8] flex items-center justify-center text-stone-800 font-bold text-lg z-10">
                    <i class="fas fa-envelope"></i>
                </div>
                <span class="font-bold text-[#C8102E] text-sm tracking-wide uppercase z-10">Contact Us</span>
            </a>

            <div class="flex items-center justify-center py-6 opacity-60">
                <div class="flex gap-1.5 px-3">
                    <div class="w-1.5 h-1.5 bg-[#C8102E] rotate-45"></div>
                    <div class="w-1.5 h-1.5 bg-[#006233] rotate-45"></div>
                </div>
            </div>

        </div>

        <!-- 3. FOOTER BUTTONS -->
        <div class="p-6 space-y-4 bg-white relative z-10 border-t border-stone-100 pl-10">
            <button onclick="openCommentsModal()"
                class="w-full py-4 rounded-xl border-2 border-stone-200 bg-white text-stone-700 font-bold text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:border-stone-400 hover:text-black transition-all">
                <i class="fas fa-comment-dots text-stone-400"></i>
                Write Comments
            </button>
            <a href="{{ url('/volunteer') }}"
                class="w-full py-4 rounded-xl bg-[#C8102E] text-white font-bold text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 shadow-lg shadow-red-500/20 hover:bg-[#a00d25] transition-all">
                <i class="fas fa-hand-holding-heart text-sm"></i>
                Want Volunteer
            </a>
            <div class="flex justify-center pt-2 pb-2">
                <i class="fas fa-star text-[8px] text-[#C8102E]"></i>
            </div>
        </div>
    </div>

    <!-- COMMENTS MODAL - REVISED v2 -->
    <div id="comments-modal" class="hidden fixed inset-0 flex items-center justify-center p-4 z-[99999]">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeCommentsModal()">
        </div>

        <!-- Modal Content -->
        <div
            class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all scale-100 p-8 border border-gray-200">

            <!-- Close Button -->
            <button onclick="closeCommentsModal()"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-900 transition-colors z-20 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100">
                <i class="fas fa-times"></i>
            </button>

            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- HEADER: Left Title, Right Photo Input -->
                <div
                    class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 pb-4 border-b border-gray-100 relative">
                    <div>
                        <h2 class="text-3xl font-bold font-playfair text-gray-900">Leave a Comment</h2>
                        <p class="text-gray-500 text-sm mt-1">Share your experience with us.</p>
                    </div>

                    <!-- Right Side: Photo Input (Pushed down to avoid Close Button) -->
                    <div class="flex flex-col items-start md:items-end mt-6 md:mt-0 md:pr-8">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Photo
                            (Optional)</label>
                        <label
                            class="cursor-pointer inline-flex items-center gap-3 px-4 py-2 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg transition-all group w-full md:w-auto shadow-sm">
                            <i class="fas fa-camera text-gray-400 group-hover:text-[#C8102E] transition-colors"
                                id="modal-photo-icon"></i>
                            <span id="photo-text-mini"
                                class="text-xs font-bold text-gray-600 group-hover:text-gray-900 truncate max-w-[120px]">Select
                                Image</span>
                            <input type="file" name="photo" class="hidden" accept="image/*"
                                onchange="handleModalPhoto(this)">
                        </label>
                    </div>
                </div>

                <!-- FORM FIELDS -->
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">First Name</label>
                            <input type="text" name="prenom"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5"
                                placeholder="First Name" required>
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="nom"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5"
                                placeholder="Last Name" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5"
                            placeholder="name@company.com" required>
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Message</label>
                        <textarea name="comment" rows="4"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5 resize-none"
                            placeholder="Write your thoughts here..." required></textarea>
                    </div>
                </div>

                <!-- Footer / Submit (Small & Centered) -->
                <div class="mt-8 flex flex-col items-center">
                    <button type="submit"
                        class="px-8 py-3 text-white bg-[#C8102E] hover:bg-[#a00d25] font-bold rounded-full text-xs uppercase tracking-widest shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                    <p class="text-center text-[10px] text-gray-400 mt-4">By submitting this form, you agree to our
                        privacy policy.</p>
                </div>

            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Modal Logic
        function openCommentsModal() {
            const modal = document.getElementById('comments-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeCommentsModal() {
            const modal = document.getElementById('comments-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Handle Photo Upload Feedback
        function handleModalPhoto(input) {
            const textSpan = document.getElementById('photo-text-mini');
            const icon = document.getElementById('modal-photo-icon');

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                // Truncate if too long (e.g. "my-vacati...")
                const shortName = fileName.length > 12 ? fileName.substring(0, 10) + '..' : fileName;

                textSpan.textContent = shortName;
                textSpan.classList.add('text-[#C8102E]');

                icon.className = "fas fa-check-circle text-green-500 relative z-10";
            } else {
                textSpan.textContent = 'Add Photo';
                textSpan.classList.remove('text-[#C8102E]');
                icon.className = "fas fa-camera text-stone-400 group-hover:text-[#C8102E] relative z-10 transition-colors";
            }
        }

        // Close on Escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") {
                closeCommentsModal();
                closeChatbot();
            }
        });

        // CHATBOT FUNCTIONALITY - Make it globally accessible
        window.toggleChatbot = function () {
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotToggle = document.getElementById('chatbot-toggle');

            if (!chatbotWindow) return;

            // check inline style
            const isHidden = chatbotWindow.style.display === 'none' || chatbotWindow.style.display === '';

            if (isHidden) {
                // OPEN
                chatbotWindow.style.display = 'flex';
                chatbotWindow.style.pointerEvents = 'auto'; // CRITICAL: Enable interactions

                // Force layout reflow
                void chatbotWindow.offsetWidth;

                setTimeout(() => {
                    chatbotWindow.style.opacity = '1';
                    chatbotWindow.style.transform = 'scale(1) translateY(0)';
                }, 10);

                if (chatbotToggle) chatbotToggle.style.transform = 'scale(0.9)';
            } else {
                // CLOSE
                chatbotWindow.style.opacity = '0';
                chatbotWindow.style.transform = 'scale(0.95) translateY(20px)';
                chatbotWindow.style.pointerEvents = 'none'; // Disable interactions

                setTimeout(() => {
                    chatbotWindow.style.display = 'none';
                }, 300);

                if (chatbotToggle) chatbotToggle.style.transform = 'scale(1)';
            }
        };

        // Ensure chatbot button is visible on page load (Logic Moved to Scroll)
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('chatbot-toggle');

            // Initial Scroll Check
            handleScrollChatbot();

            // Scroll Event Listener
            window.addEventListener('scroll', handleScrollChatbot);

            function handleScrollChatbot() {
                if (!toggle) return;

                // Show button after scrolling down 300px
                if (window.scrollY > 300) {
                    toggle.classList.remove('opacity-0', 'translate-y-12', 'scale-0', 'rotate-90', 'pointer-events-none');
                    toggle.classList.add('opacity-100', 'translate-y-0', 'scale-100', 'rotate-0');
                } else {
                    // Hide if at top, BUT keep visible if chat window is OPEN
                    const chatbotWindow = document.getElementById('chatbot-window');
                    const isOpen = chatbotWindow && chatbotWindow.style.display !== 'none' && chatbotWindow.style.opacity !== '0';

                    if (!isOpen) {
                        toggle.classList.add('opacity-0', 'translate-y-12', 'scale-0', 'rotate-90', 'pointer-events-none');
                        toggle.classList.remove('opacity-100', 'translate-y-0', 'scale-100', 'rotate-0');
                    }
                }
            }

            const closeBtn = document.getElementById('chatbot-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    toggleChatbot();
                });
            }
        });

        function closeChatbot() {
            const chatbotWindow = document.getElementById('chatbot-window');
            if (chatbotWindow && !chatbotWindow.classList.contains('hidden')) {
                toggleChatbot();
            }
        }

        function getSmartResponse(message) {
            const msg = message.toLowerCase();

            if (msg.includes('hello') || msg.includes('hi') || msg.includes('salam') || msg.includes('marhaba') || msg.includes('hey')) {
                return "Marhaba! ðŸŒŸ Welcome to the Kingdom of Light. Are you planning a trip, looking for history, or just exploring?";
            }
            if (msg.includes('food') || msg.includes('eat') || msg.includes('tagine') || msg.includes('couscous') || msg.includes('restaurant')) {
                return "Ah, the flavors of Morocco! ðŸ² You simply must try a Lamb Tagine with prunes, or a traditional Friday Couscous. Are you looking for specific restaurant recommendations in a city?";
            }
            if (msg.includes('visit') || msg.includes('go') || msg.includes('place') || msg.includes('city') || msg.includes('what to do')) {
                return "Morocco has it all! ðŸ•Œ For history, go to Fez. For vibrance, Marrakech. For blue serenity, Chefchaouen. What is your travel vibe?";
            }
            if (msg.includes('thank')) {
                return "You are most welcome! ðŸ™ Always here to help you discover the magic of our country.";
            }
            if (msg.includes('volunteer') || msg.includes('help')) {
                return "That's a noble spirit! ðŸ¤ Check our 'Volunteer' page to see how you can contribute to the Morocco 2030 vision.";
            }
            if (msg.includes('weather') || msg.includes('hot') || msg.includes('cold')) {
                return "It depends on the season! â˜€ï¸ Summers in Marrakech are hot, while the Atlas Mountains can see snow. When are you planning to visit?";
            }

            return "That's a fascinating topic about Morocco! ðŸ‡²ðŸ‡¦ While I'm an AI assistant in training, I'd love to help you find more. Have you checked out our 'Discover' page for in-depth guides?";
        }

        async function sendMessage(event) {
            event.preventDefault();
            const input = document.getElementById('chatbot-input');
            const message = input.value.trim();

            if (message) {
                // Add USER message
                addMessage(message, 'user');
                input.value = '';
                
                // Show loading state
                const loadingDiv = showTypingIndicator();

                try {
                    // Send to Laravel API
                    const response = await fetch("{{ route('chat.send') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: message })
                    });

                    const data = await response.json();

                    // Remove loading
                    if(loadingDiv) loadingDiv.remove();

                    if (response.ok && data.reply) {
                        addMessage(data.reply, 'bot');
                    } else {
                        addMessage("Sorry, I'm having trouble connecting to the kingdom right now. Please try again later.", 'bot');
                        console.error('Chat Error:', data.error);
                    }
                } catch (error) {
                    if(loadingDiv) loadingDiv.remove();
                    addMessage("Connection error. Please check your internet.", 'bot');
                    console.error('Fetch Error:', error);
                }
            }
        }

        function showTypingIndicator() {
            const messagesContainer = document.getElementById('chatbot-messages');
            const typingDiv = document.createElement('div');
            typingDiv.id = 'typing-indicator';
            typingDiv.className = 'flex justify-start animate-fadeIn mb-2';
            typingDiv.innerHTML = `
                <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100">
                     <div class="flex gap-1">
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                     </div>
                </div>
            `;
            messagesContainer.appendChild(typingDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
            return typingDiv;
        }

        function sendQuickMessage(message) {
            const input = document.getElementById('chatbot-input');
            input.value = message;
            // Manually trigger submit
            const event = new Event('submit', {
                'bubbles': true,
                'cancelable': true
            });
            document.getElementById('chatbot-form').dispatchEvent(event);
        }

        function addMessage(message, sender) {
            const messagesContainer = document.getElementById('chatbot-messages');
            const messageDiv = document.createElement('div');
            // Animated bubbles
            messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'} animate-fadeIn mb-2`; 
            
            // Get Time
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            // Format the message (handle bold, newlines, etc.)
            const formattedMessage = formatMessage(message);

            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="max-w-[85%] bg-[#C8102E] text-white rounded-2xl rounded-tr-none px-4 py-3 shadow-md group relative">
                        <p class="text-sm font-medium leading-relaxed font-outfit text-white">${formattedMessage}</p>
                        <span class="text-[10px] text-white/70 mt-1 block text-right">${time}</span>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                   <div class="max-w-[85%] bg-white text-gray-800 rounded-2xl rounded-tl-none px-4 py-3 shadow-sm border border-gray-100 group relative">
                        <div class="text-sm font-medium leading-relaxed font-outfit prose prose-sm max-w-none text-gray-800">
                            ${formattedMessage}
                        </div>
                        <span class="text-[10px] text-gray-400 mt-1 block">${time}</span>
                   </div>
                `;
            }

            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            // Re-replace protected characters if needed, but textContent handles the dangerous ones
            return div.innerHTML;
        }

        function formatMessage(text) {
            if (!text) return '';
            
            // 1. HTML Escape to prevent XSS (Security First)
            let safeText = escapeHtml(text);
            
            // 2. Bold: **text** -> <strong>text</strong>
            safeText = safeText.replace(/\*\*(.*?)\*\*/g, '<strong class="font-bold text-black">$1</strong>');
            
            // 3. Italic: *text* -> <em>text</em>
            safeText = safeText.replace(/\*(.*?)\*/g, '<em class="italic">$1</em>');
            
            // 4. Headers: ### Title -> <h3...>Title</h3> (Simple support)
            safeText = safeText.replace(/^### (.*$)/gim, '<h3 class="font-bold text-base mt-2 mb-1">$1</h3>');
            
            // 5. Lists: - item -> â€¢ item
            safeText = safeText.replace(/(?:^|\n)- (.*)/g, '<br>â€¢ $1');

            // 6. Newlines: \n -> <br>
            safeText = safeText.replace(/\n/g, '<br>');

            return safeText;
        }

        // Mobile Menu Toggle - v2.0 (Simplified)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const burgerIcon = document.getElementById('burger-icon');
        const closeIcon = document.getElementById('close-icon');

        // Set initial state
        if (mobileMenu) {
            mobileMenu.setAttribute('data-open', 'false');
        }

        function toggleMobileMenu() {
            if (!mobileMenu || !mobileOverlay || !burgerIcon || !closeIcon) return;

            const isOpen = mobileMenu.getAttribute('data-open') === 'true';

            if (isOpen) {
                // CLOSE MENU
                mobileMenu.setAttribute('data-open', 'false');
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('-translate-x-full'); // Move Left (Hide)

                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                }, 300);

                mobileOverlay.classList.remove('opacity-100');
                mobileOverlay.classList.add('opacity-0');
                setTimeout(() => mobileOverlay.classList.add('hidden'), 300);

                // Show burger, hide X
                burgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');

                document.body.style.overflow = '';
            } else {
                // OPEN MENU
                mobileMenu.setAttribute('data-open', 'true');
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');

                // Force Reflow
                void mobileMenu.offsetWidth;

                mobileMenu.classList.remove('-translate-x-full');
                mobileMenu.classList.add('translate-x-0'); // Move to 0 (Show)

                mobileOverlay.classList.remove('hidden');
                // Force Reflow
                void mobileOverlay.offsetWidth;
                mobileOverlay.classList.remove('opacity-0');
                mobileOverlay.classList.add('opacity-100');

                // Hide burger, show X
                burgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');

                document.body.style.overflow = 'hidden';
            }
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        }

        // Close menu when clicking on links
        if (mobileMenu) {
            const menuLinks = mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (mobileMenu.getAttribute('data-open') === 'true') {
                        toggleMobileMenu();
                    }
                });
            });
        }

        // Mega Menu Category Switching
        document.addEventListener('DOMContentLoaded', function () {
            const categories = document.querySelectorAll('.mega-category');
            const contents = document.querySelectorAll('.mega-content');

            categories.forEach(category => {
                category.addEventListener('mouseenter', function () {
                    const targetCategory = this.getAttribute('data-category');

                    // Remove active class from all categories
                    categories.forEach(cat => {
                        cat.classList.remove('active', 'border-[#C8102E]');
                        cat.classList.add('border-transparent');
                        cat.querySelector('span').classList.remove('text-stone-900');
                        cat.querySelector('span').classList.add('text-stone-700');
                    });

                    // Add active class to current category
                    this.classList.add('active', 'border-[#C8102E]');
                    this.classList.remove('border-transparent');
                    this.querySelector('span').classList.add('text-stone-900');
                    this.querySelector('span').classList.remove('text-stone-700');

                    // Hide all content sections
                    contents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('active');
                    });

                    // Show target content
                    const targetContent = document.querySelector(`.mega-content[data-content="${targetCategory}"]`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('active');
                    }
                });
            });
        });

        // Global Navbar Scroll Logic
        const navbar = document.getElementById('navbar');
        if (navbar) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled', 'bg-black/95', 'py-4');
                    navbar.classList.remove('bg-gradient-to-b', 'from-black/80', 'to-transparent', 'py-6');
                } else {
                    navbar.classList.remove('scrolled', 'bg-black/95', 'py-4');
                    navbar.classList.add('bg-gradient-to-b', 'from-black/80', 'to-transparent', 'py-6');
                }
            });
        }
    </script>
    @yield('scripts')
    <!-- ========================================== -->
    <!--          APPLE-STYLE CINEMATIC LOADER      -->


    <!-- ========================================== -->
    <!-- ========================================== -->
    <!--       THEME-AWARE ARROW CURSOR             -->
    <!-- ========================================== -->

    <!-- The angled arrow container -->
    <div id="arrow-cursor"
        class="fixed top-0 left-0 pointer-events-none z-[100001] opacity-0 transition-opacity duration-300 hidden sm:block will-change-transform">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6 transform -rotate-12 origin-top-left drop-shadow-md">
            <!-- Outline for contrast -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z"
                class="stroke-white dark:stroke-black stroke-[2px] fill-transparent" stroke-linejoin="round" />
            <!-- Main Color Body -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z"
                class="transition-colors duration-300 ease-out fill-[#C8102E] dark:fill-white" />
        </svg>
    </div>

    <style>
        /* Hide Default Cursor Globally */
        @media (min-width: 640px) {

            body,
            a,
            button,
            input,
            textarea,
            select,
            label,
            .btn,
            .btn-primary,
            .btn-secondary,
            [role="button"],
            .cursor-pointer {
                cursor: none !important;
            }

            *:hover {
                cursor: none !important;
            }
        }

        /* Cursor Movement */
        #arrow-cursor {
            /* Start centered for the effect, but pointers usually have hotspot at top-left (0,0) of the SVG */
            /* We translate -2px -2px to align the tip perfectly */
            transform: translate(-2px, -2px);
        }

        /* Hover State: Slight Bounce/Scale */
        body.is-hovering #arrow-cursor svg {
            transform: rotate(-12deg) scale(1.2);
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Click State: Tap */
        body.is-clicking #arrow-cursor svg {
            transform: rotate(-12deg) scale(0.9);
            transition: transform 0.1s;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.innerWidth < 640) return;

            const cursor = document.getElementById('arrow-cursor');
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;

            // Physics variables
            let cursorX = mouseX;
            let cursorY = mouseY;

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                cursor.style.opacity = '1';
            });

            function animate() {
                // Smooth Lag Coefficient (0.2 is snappy but smooth)
                cursorX += (mouseX - cursorX) * 0.2;
                cursorY += (mouseY - cursorY) * 0.2;

                cursor.style.left = `${cursorX}px`;
                cursor.style.top = `${cursorY}px`;

                requestAnimationFrame(animate);
            }
            animate();

            // Interactions
            const selectors = 'a, button, input, textarea, select, [role="button"], .btn, .btn-primary, .cursor-pointer, .hover-trigger, label, tr';

            function attachListeners() {
                document.querySelectorAll(selectors).forEach(el => {
                    if (el.dataset.cursorAttached) return;
                    el.addEventListener('mouseenter', () => document.body.classList.add('is-hovering'));
                    el.addEventListener('mouseleave', () => document.body.classList.remove('is-hovering'));
                    el.dataset.cursorAttached = "true";
                });
            }
            attachListeners();
            new MutationObserver(() => attachListeners()).observe(document.body, { childList: true, subtree: true });

            document.addEventListener('mousedown', () => document.body.classList.add('is-clicking'));
            document.addEventListener('mouseup', () => document.body.classList.remove('is-clicking'));
        });
    </script>
    <!-- GLOBAL SCROLL ANIMATIONS (GSAP) -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger);

            const hero = document.querySelector("#hero-container");
            const navbar = document.querySelector("#navbar");

            if (navbar) {
                // Fluid Scroll Animation Timeline (Global)
                let tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: "body",
                        start: "top top",
                        end: "+=300",
                        scrub: 1,
                    }
                });

                // 1. Hero Animation (Only if exists)
                if (hero) {
                    tl.to(hero, {
                        width: "96%",
                        borderRadius: "0 0 3rem 3rem",
                        y: 0,
                        ease: "power2.out"
                    }, 0);
                }

                // 2. Navbar Animation (White Mode)
                tl.to(navbar, {
                    width: "90%",
                    left: "5%",
                    top: "20px",
                    borderRadius: "50px",
                    backgroundColor: "#ffffff",
                    backgroundImage: "none",
                    boxShadow: "0 10px 30px rgba(0,0,0,0.1)",
                    paddingTop: "15px",
                    paddingBottom: "15px",
                    border: "none",
                    ease: "power2.out"
                }, 0);

                // 3. Navbar Text & Elements Color Change
                tl.to("#navbar, #navbar a, #navbar button, #navbar .font-outfit", {
                    color: "#1c1917", // Stone-900
                    borderColor: "#e7e5e4",
                    ease: "power2.out"
                }, 0);

                tl.to("#navbar button", {
                    borderColor: "#1c1917",
                    ease: "power2.out"
                }, 0);
            }
        });
    </script>
    <!-- TOAST NOTIFICATION CONTAINER -->
    <div id="toast-container" class="fixed top-24 right-6 z-[100000] flex flex-col gap-3 pointer-events-none"></div>

    <script>
        // Start Toast Logic
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');

            // Icon & Color Logic
            const isSuccess = type === 'success';
            const iconClass = isSuccess ? 'fa-check-circle' : 'fa-exclamation-circle'; // Changed to Exclamation for error
            const iconColor = isSuccess ? 'text-[#006233]' : 'text-[#C8102E]';

            // Styling
            toast.className = `
                pointer-events-auto
                flex items-center gap-3 px-5 py-3 
                bg-white border border-stone-100 
                shadow-[0_8px_30px_rgb(0,0,0,0.08)] 
                rounded-full
                transform transition-all duration-500 ease-out 
                translate-x-10 opacity-0
            `;

            toast.innerHTML = `
                <i class="fas ${iconClass} ${iconColor} text-sm"></i>
                <span class="text-xs font-bold text-stone-800 uppercase tracking-widest">${message}</span>
            `;

            container.appendChild(toast);

            // Animate In (Delay slightly to ensure DOM paint)
            setTimeout(() => {
                toast.classList.remove('translate-x-10', 'opacity-0');
            }, 50);

            // Remove after 3s
            setTimeout(() => {
                toast.classList.add('translate-x-10', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }

        // Check for Session Messages & Validation Errors
        document.addEventListener('DOMContentLoaded', () => {
            @if(session('success'))
                showToast("{{ session('success') }}", 'success');
            @endif

            @if(session('error'))
                showToast("{{ session('error') }}", 'error');
            @endif

            @if($errors->any())
                showToast("{{ $errors->first() }}", 'error');
            @endif
        });
    </script>
    </script>
    <script>
        // DISCOVER OVERLAY LOGIC
        const discoverOverlay = document.getElementById('discover-overlay');
        let discoverCloseTimeout;

        function openDiscoverOverlay() {
            if (!discoverOverlay) return;
            
            // Clear any pending close timeout
            if (discoverCloseTimeout) {
                clearTimeout(discoverCloseTimeout);
                discoverCloseTimeout = null;
            }

            discoverOverlay.classList.remove('hidden');
            // Force reflow
            void discoverOverlay.offsetWidth;
            discoverOverlay.classList.remove('opacity-0');
            discoverOverlay.classList.add('flex', 'opacity-100');
            document.body.style.overflow = 'hidden';

            // Close mobile menu if open
            if (typeof toggleAppleMenu === 'function') {
                const appleMenu = document.getElementById('apple-menu');
                if (appleMenu && appleMenu.classList.contains('translate-x-0')) {
                    toggleAppleMenu();
                }
            }
        }

        function closeDiscoverOverlay() {
            if (!discoverOverlay) return;
            
            // If already pending close, don't start another one
            if (discoverCloseTimeout) return;

            discoverOverlay.classList.remove('opacity-100');
            discoverOverlay.classList.add('opacity-0');

            discoverCloseTimeout = setTimeout(() => {
                discoverOverlay.classList.add('hidden');
                discoverOverlay.classList.remove('flex');
                document.body.style.overflow = '';
                discoverCloseTimeout = null;
            }, 300);
        }
    </script>
</body>

</html>