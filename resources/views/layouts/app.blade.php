<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discover Morocco 2030</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Outfit:wght@100..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <!-- Swiper CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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
            0% { transform: scale(0.8) translateY(4px); color: #C8102E; text-shadow: 0 0 10px rgba(200, 16, 46, 0.5); } 
            60% { transform: scale(1.1) translateY(-1px); color: #C8102E; } 
            100% { transform: scale(1); color: inherit; }
        }

        @keyframes bombRun {
            0% { transform: translate(0, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            7% { transform: translate(15px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            14% { transform: translate(30px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            21% { transform: translate(45px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            28% { transform: translate(60px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            35% { transform: translate(75px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            42% { transform: translate(90px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            49% { transform: translate(105px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            57% { transform: translate(120px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            64% { transform: translate(135px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            71% { transform: translate(150px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            78% { transform: translate(165px, -20px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            85% { transform: translate(180px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); }
            92% { transform: translate(190px, -15px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            100% { transform: translate(200px, 20px); opacity: 0; }
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
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }



        /* Scroll Drop Animation */
        @keyframes scrollDrop {
            0% { top: -50%; opacity: 0; }
            50% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
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
        input, textarea, [contenteditable] {
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
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
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

        #chatbot-messages > div {
            animation: slideIn 0.3s ease-out;
        }

        /* Generic Fade In */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>
<body class="antialiased bg-stone-50 text-stone-900 font-outfit overflow-x-hidden selection:bg-[#006233] selection:text-white">

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
    <div id="chatbot-wrapper" class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end gap-2 invisible opacity-0 transition-opacity duration-500">
        <!-- Tooltip Message (Pop Animation) -->
        <div id="chatbot-tooltip" class="bg-stone-900 text-white text-xs font-bold py-3 px-5 rounded-2xl shadow-xl mb-1 whitespace-nowrap origin-bottom-right opacity-0 pointer-events-none">
            Got any question? Ask our assistant
            <!-- Arrow -->
            <div class="absolute bottom-[-6px] right-6 w-3 h-3 bg-stone-900 transform rotate-45"></div>
        </div>

        <button id="chatbot-toggle" onclick="toggleChatbot()" class="w-14 h-14 rounded-full bg-[#C8102E] text-white shadow-[0_10px_40px_-10px_rgba(200,16,46,0.6)] flex items-center justify-center border-2 border-white/20" aria-label="Open Chatbot">
            <!-- Chat Bubble with AI Sparkle -->
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5"></path>
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
            0% { opacity: 0; transform: scale(0) translateY(10px) translateX(10px); }
            10% { opacity: 1; transform: scale(1) translateY(0) translateX(0); }
            90% { opacity: 1; transform: scale(1) translateY(0) translateX(0); }
            100% { opacity: 0; transform: scale(0) translateY(10px) translateX(10px); display: none; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotWrapper = document.getElementById('chatbot-wrapper');
            const chatbotTooltip = document.getElementById('chatbot-tooltip');
            let tooltipShown = false;

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    chatbotWrapper.classList.remove('invisible', 'opacity-0');
                    
                    // Trigger tooltip animation only once when first shown
                    if (!tooltipShown) {
                        setTimeout(() => {
                           chatbotTooltip.classList.add('animate-tooltip-pop');
                        }, 500); // Small delay after button appears
                        tooltipShown = true;
                    }
                } else {
                    chatbotWrapper.classList.add('invisible', 'opacity-0');
                }
            });
        });
    </script>

    <!-- Chatbot Window (Brand Design) -->
    <div id="chatbot-window" class="fixed bottom-24 left-4 right-4 md:left-auto md:right-6 md:w-[380px] h-[600px] max-h-[75vh] bg-stone-50 rounded-2xl shadow-[0_20px_60px_-10px_rgba(0,0,0,0.3)] flex flex-col overflow-hidden border border-[#d4af37]/20 z-[99999]" style="opacity: 0; transform: scale(0.95) translateY(20px); transform-origin: bottom right; pointer-events: none; display: none; transition: opacity 0.3s ease, transform 0.3s ease;">
        
        <!-- Header -->
        <div class="px-5 py-4 bg-white border-b border-stone-100 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full bg-[#C8102E] flex items-center justify-center border border-stone-100 shadow-sm">
                         <!-- Simple Chat Icon -->
                         <i class="fas fa-comment-dots text-white text-lg"></i>
                    </div>
                </div>
                <div>
                     <h3 class="font-bold text-stone-900 text-sm">Morocco Assistant</h3>
                     <span class="text-[10px] text-stone-400 block leading-none">Online</span>
                </div>
            </div>
            <button id="chatbot-close" onclick="toggleChatbot()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-stone-100 text-stone-400 hover:text-[#C8102E] transition-colors">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Messages Container with Pattern (Extended to cover bottom wave) -->
        <div class="flex-1 relative overflow-hidden bg-stone-50 flex flex-col">
             <!-- Zellige Pattern Overlay (Transparent Background) -->
             <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 150px;"></div>
             
             <!-- Scrollable Content -->
             <div id="chatbot-messages" class="flex-1 overflow-y-auto p-5 space-y-4 scroll-smooth z-10 custom-scrollbar pb-8">
                <!-- Welcome Message -->
                <div class="flex justify-start animate-fadeIn">
                    <div class="bg-white px-5 py-4 rounded-2xl rounded-tl-none max-w-[85%] text-sm text-stone-800 shadow-sm border border-stone-100 relative group">
                        <div class="absolute -top-3 -left-3 w-8 h-8 rounded-full bg-stone-50 border border-stone-100 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                             <i class="fas fa-robot text-stone-400 text-xs"></i>
                        </div>
                        <p class="leading-relaxed font-outfit text-[15px]">
                            <span class="text-[#C8102E] font-bold">Marhaba!</span> How can I help you discover Morocco today?
                        </p>
                        <span class="text-[10px] text-stone-300 mt-2 block font-medium">Just now</span>
                    </div>
                </div>
             </div>
             
             <!-- Wavy Separator (Top) -->
             <div class="absolute top-0 left-0 w-full transform -translate-y-full h-6 z-20 overflow-hidden pointer-events-none">
                 <!-- Wave 1 (Slow & Deep) -->
                 <svg class="absolute bottom-0 w-[200%] h-full text-[#C8102E] animate-wave-slow opacity-[0.05]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                     <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="currentColor"></path>
                 </svg>
                 <!-- Wave 2 (Fast & Shallow) -->
                 <svg class="absolute bottom-0 w-[200%] h-full text-[#C8102E] animate-wave-fast opacity-[0.08]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                     <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="currentColor"></path>
                 </svg>
             </div>

            <form id="chatbot-form" onsubmit="sendMessage(event)" class="flex items-center gap-2 relative">
                <div class="relative flex-1 group">
                    <input 
                        type="text" 
                        id="chatbot-input" 
                        placeholder="Ask anything..." 
                        class="w-full bg-stone-50 border-0 rounded-full pl-5 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#C8102E] focus:bg-white placeholder-stone-400 text-stone-900 caret-[#C8102E] transition-all duration-300 shadow-sm group-hover:shadow-md font-outfit"
                        autocomplete="off"
                    >
                    <!-- Subtle inner glow on focus via parent/ring -->
                </div>
                <button 
                    type="submit" 
                    class="w-10 h-10 rounded-full bg-[#C8102E] text-white flex items-center justify-center hover:bg-[#a00d25] transition-all duration-300 hover:scale-105 active:scale-95 shadow-lg shadow-red-900/20 group"
                >
                    <i class="fas fa-paper-plane text-xs transform transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>
                </button>
            </form>
            <div class="text-center mt-2">
                <p class="text-[10px] text-stone-300 font-light items-center justify-center gap-1.5 inline-flex opacity-80 hover:opacity-100 transition-opacity">
                    <i class="fas fa-bolt text-[#C8102E]/60 text-[10px]"></i> <span>Powered by Morocco AI</span>
                </p>
            </div>
        </div>
        
        <style>
            @keyframes wave {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .animate-wave-slow {
                animation: wave 15s linear infinite;
            }
            .animate-wave-fast {
                animation: wave 8s linear infinite reverse;
            }
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background-color: #e5e5e5;
                border-radius: 4px;
            }
        </style>
    </div>



    <!-- MOBILE MENU OVERLAY (Backdrop) -->
    
    <!-- MEGA MENU OVERLAY (Hover Triggered, Global Position) -->
    <div id="discover-overlay" class="fixed top-0 left-0 w-full h-full bg-white z-[90] hidden flex-col border-t border-stone-100 transition-opacity duration-300 opacity-0 pt-[100px]" style="padding-top: 100px;">
        
        <!-- Close Button (Absolute Top Right of the Menu Content) -->
        <button onclick="closeDiscoverOverlay()" class="absolute top-[120px] right-10 z-50 group flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-[#C8102E] transition-colors">
                <span>Close</span>
                <div class="w-8 h-8 border border-stone-300 rounded-full flex items-center justify-center group-hover:border-[#C8102E] transition-colors">
                    <i class="fas fa-times"></i>
                </div>
        </button>

        <!-- Main Content Grid -->
        <div class="flex h-full">
            
            <!-- Left Sidebar (Destinations List) -->
            <div class="w-1/4 min-w-[300px] border-r border-stone-100 bg-stone-50/50 p-12 pt-16 flex flex-col justify-between overflow-y-auto">
                <div class="space-y-10">
                    <div>
                        <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C8102E] mb-3 border-l-2 border-[#C8102E] pl-3">Discover</h3>
                        <h2 class="text-4xl font-playfair font-bold text-stone-900 leading-none">Destinations</h2>
                    </div>

                    <nav class="space-y-4 pl-4">
                        @foreach($megaMenuCities as $index => $city)
                        <a href="javascript:void(0)" 
                           onmouseenter="showMegaContent('{{ $city->id }}')"
                           class="mega-link block text-2xl font-playfair transition-colors duration-300 {{ $index === 0 ? 'font-bold text-stone-900 border-l-4 border-[#C8102E] pl-6 -ml-6 py-1 active-city' : 'text-stone-400 hover:text-[#C8102E]' }}"
                           data-target="{{ $city->id }}">
                           {{ $city->nom }}
                        </a>
                        @endforeach
                    </nav>
                </div>
                
                <a href="{{ route('cities') }}" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[#C8102E] hover:underline">
                    View All Cities <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Right Content (Details) -->
            <div class="flex-1 p-16 pt-16 bg-white overflow-y-auto relative custom-scrollbar">
                <!-- Background Pattern -->
                <div class="absolute inset-0 pointer-events-none opacity-[0.03]" 
                    style="background-image: radial-gradient(#C8102E 1px, transparent 1px); background-size: 20px 20px;">
                </div>
                
                @foreach($megaMenuCities as $index => $city)
                <div id="mega-content-{{ $city->id }}" class="max-w-5xl relative z-10 pt-4 mega-content-pane {{ $index === 0 ? '' : 'hidden' }}">
                    <h1 class="text-7xl font-playfair font-bold text-stone-900 mb-2">{{ $city->nom }}</h1>
                    <p class="text-xl font-light text-[#EAB308] tracking-widest uppercase mb-8">{{ $city->label ?? 'Discover The Magic' }}</p>
                    
                    <div class="mb-12 max-w-3xl">
                        <p class="text-stone-600 leading-relaxed font-outfit">{{ Str::limit($city->description, 200) }}</p>
                    </div>

                    @if($city->destinations->count() > 0)
                    <div class="mb-10 flex items-center gap-6">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-stone-400">Top Experiences</h3>
                        <div class="h-px w-20 bg-stone-200"></div>
                    </div>

                    <!-- Cards Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($city->destinations as $destination)
                        <div class="bg-stone-50 border border-stone-100 p-8 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group cursor-pointer relative overflow-hidden rounded-xl h-full flex flex-col">
                             <div class="absolute top-0 left-0 w-full h-1 bg-[#C8102E] transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                             
                             @if($destination->image)
                             <div class="w-full h-32 mb-6 overflow-hidden rounded-lg">
                                <img src="{{ asset('storage/' . $destination->image) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                             </div>
                             @else
                             <div class="w-10 h-10 rounded bg-[#C8102E]/10 flex items-center justify-center mb-6 text-[#C8102E]">
                                 <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                             @endif

                            <h4 class="font-playfair font-bold text-xl text-stone-900 mb-2">{{ $destination->nom }}</h4>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-stone-400 group-hover:text-[#C8102E] transition-colors mt-auto">{{ $destination->label ?? 'MUST VISIT' }}</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <!-- Fallback if no destinations -->
                        <div class="w-full h-64 rounded-2xl overflow-hidden relative group">
                            @if($city->image)
                                <img src="{{ asset('storage/' . $city->image) }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                <span class="text-white font-playfair italic text-2xl">Explore {{ $city->nom }}</span>
                            </div>
                        </div>
                    @endif
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
            });
            // Show selected content pane
            const target = document.getElementById('mega-content-' + cityId);
            if(target) target.classList.remove('hidden');

            // Update Active Link State
            document.querySelectorAll('.mega-link').forEach(el => {
                // Reset styles
                el.classList.remove('font-bold', 'text-stone-900', 'border-l-4', 'border-[#C8102E]', 'pl-6', '-ml-6', 'py-1', 'active-city');
                el.classList.add('text-stone-400', 'hover:text-[#C8102E]');
                
                // If it's the target link
                if(el.getAttribute('data-target') == cityId) {
                    el.classList.remove('text-stone-400', 'hover:text-[#C8102E]');
                    el.classList.add('font-bold', 'text-stone-900', 'border-l-4', 'border-[#C8102E]', 'pl-6', '-ml-6', 'py-1', 'active-city');
                }
            });
        }
    </script>

    <!-- MOBILE MENU OVERLAY (Backdrop) -->
    <div id="mobile-overlay" onclick="toggleMobileMenu()" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300"></div>

    <!-- MOBILE MENU OVERLAY -->
    <div id="mobile-overlay" onclick="toggleMobileMenu()" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[9998] hidden opacity-0 transition-opacity duration-300"></div>

    <!-- MOBILE MENU SIDEBAR (Fixed Left Sidebar) -->
    <div id="mobile-menu" class="fixed top-0 left-0 w-[85%] max-w-[340px] h-full bg-white z-[9999] shadow-2xl transform -translate-x-full transition-transform duration-300 ease-out flex flex-col font-sans border-r border-stone-100 hidden">
        
        <!-- Left Edge Decorative Border (Gradient) -->
        <div class="absolute top-0 bottom-0 left-0 w-1.5 bg-gradient-to-b from-[#006233] via-green-600 to-[#C8102E]"></div>

        <!-- 1. HEADER section -->
        <div class="px-8 pt-10 pb-4 flex items-start justify-between relative z-10 pl-10">
            <!-- Menu Title with Vertical Line -->
            <div class="flex flex-col border-l-[4px] border-[#006233] pl-4 py-1">
                <h2 class="text-4xl font-bold font-playfair text-stone-900 leading-none">Menu</h2>
                <p class="text-[10px] text-stone-400 mt-1 uppercase tracking-[0.2em]">Discover Morocco</p>
            </div>
            
            <!-- Red Close Button -->
            <button onclick="toggleMobileMenu()" class="w-9 h-9 rounded-full bg-[#C8102E] text-white flex items-center justify-center shadow-lg hover:bg-[#a00d25] transition-transform hover:rotate-90">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        <!-- Decorative Separation Line -->
        <div class="ml-10 h-1 w-16 bg-gradient-to-r from-[#C8102E] to-transparent rounded-full mb-8"></div>

        <!-- 2. NAVIGATION LINKS -->
        <div class="flex-1 overflow-y-auto px-6 space-y-4 relative z-10 pb-6 pl-10">
            
            <a href="{{ url('/') }}" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                    <i class="fas fa-home"></i>
                </div>
                <span class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">Home</span>
            </a>

            <a href="#discover" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                     <i class="fas fa-compass"></i>
                </div>
                <span class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">Discover Morocco</span>
            </a>

            <a href="{{ url('/about') }}" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-stone-50 transition-all group">
                <div class="w-10 h-10 rounded-lg bg-[#F3F4F6] flex items-center justify-center text-stone-600 group-hover:text-black group-hover:bg-white shadow-sm font-bold text-lg">
                    <i class="fas fa-info-circle"></i>
                </div>
                <span class="font-bold text-stone-700 text-sm tracking-wide group-hover:text-black uppercase">About Us</span>
            </a>

            <a href="{{ url('/contact') }}" class="flex items-center gap-4 p-3 rounded-2xl bg-[#FCE8E8] border-l-[4px] border-[#C8102E] transition-all relative overflow-hidden shadow-sm">
                <div class="w-10 h-10 rounded-lg bg-[#FCE8E8] flex items-center justify-center text-stone-800 font-bold text-lg z-10">
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
            <button onclick="openCommentsModal()" class="w-full py-4 rounded-xl border-2 border-stone-200 bg-white text-stone-700 font-bold text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:border-stone-400 hover:text-black transition-all">
                <i class="fas fa-comment-dots text-stone-400"></i>
                Write Comments
            </button>
            <a href="{{ url('/volunteer') }}" class="w-full py-4 rounded-xl bg-[#C8102E] text-white font-bold text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 shadow-lg shadow-red-500/20 hover:bg-[#a00d25] transition-all">
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
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeCommentsModal()"></div>
        
        <!-- Modal Content -->
        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all scale-100 p-8 border border-gray-200">
            
            <!-- Close Button -->
            <button onclick="closeCommentsModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-900 transition-colors z-20 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100">
                <i class="fas fa-times"></i>
            </button>

            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- HEADER: Left Title, Right Photo Input -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8 pb-4 border-b border-gray-100 relative">
                    <div>
                        <h2 class="text-3xl font-bold font-playfair text-gray-900">Leave a Comment</h2>
                        <p class="text-gray-500 text-sm mt-1">Share your experience with us.</p>
                    </div>
                    
                    <!-- Right Side: Photo Input (Pushed down to avoid Close Button) -->
                    <div class="flex flex-col items-start md:items-end mt-6 md:mt-0 md:pr-8">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Photo (Optional)</label>
                        <label class="cursor-pointer inline-flex items-center gap-3 px-4 py-2 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg transition-all group w-full md:w-auto shadow-sm">
                            <i class="fas fa-camera text-gray-400 group-hover:text-[#C8102E] transition-colors" id="modal-photo-icon"></i>
                            <span id="photo-text-mini" class="text-xs font-bold text-gray-600 group-hover:text-gray-900 truncate max-w-[120px]">Select Image</span>
                            <input type="file" name="photo" class="hidden" accept="image/*" onchange="handleModalPhoto(this)">
                        </label>
                    </div>
                </div>

                <!-- FORM FIELDS -->
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">First Name</label>
                            <input type="text" name="prenom" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5" placeholder="First Name" required>
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="nom" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5" placeholder="Last Name" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5" placeholder="name@company.com" required>
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Message</label>
                        <textarea name="comment" rows="4" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#C8102E] focus:border-[#C8102E] block w-full p-2.5 resize-none" placeholder="Write your thoughts here..." required></textarea>
                    </div>
                </div>

                <!-- Footer / Submit (Small & Centered) -->
                <div class="mt-8 flex flex-col items-center">
                    <button type="submit" class="px-8 py-3 text-white bg-[#C8102E] hover:bg-[#a00d25] font-bold rounded-full text-xs uppercase tracking-widest shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                    <p class="text-center text-[10px] text-gray-400 mt-4">By submitting this form, you agree to our privacy policy.</p>
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
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeCommentsModal();
                closeChatbot();
            }
        });

        // CHATBOT FUNCTIONALITY - Make it globally accessible
        window.toggleChatbot = function() {
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
        document.addEventListener('DOMContentLoaded', function() {
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
                closeBtn.addEventListener('click', function(e) {
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
                return "Marhaba! 🌟 Welcome to the Kingdom of Light. Are you planning a trip, looking for history, or just exploring?";
            }
            if (msg.includes('food') || msg.includes('eat') || msg.includes('tagine') || msg.includes('couscous') || msg.includes('restaurant')) {
                return "Ah, the flavors of Morocco! 🍲 You simply must try a Lamb Tagine with prunes, or a traditional Friday Couscous. Are you looking for specific restaurant recommendations in a city?";
            }
            if (msg.includes('visit') || msg.includes('go') || msg.includes('place') || msg.includes('city') || msg.includes('what to do')) {
                return "Morocco has it all! 🕌 For history, go to Fez. For vibrance, Marrakech. For blue serenity, Chefchaouen. What is your travel vibe?";
            }
            if (msg.includes('thank')) {
                return "You are most welcome! 🙏 Always here to help you discover the magic of our country.";
            }
            if (msg.includes('volunteer') || msg.includes('help')) {
                return "That's a noble spirit! 🤝 Check our 'Volunteer' page to see how you can contribute to the Morocco 2030 vision.";
            }
            if (msg.includes('weather') || msg.includes('hot') || msg.includes('cold')) {
                return "It depends on the season! ☀️ Summers in Marrakech are hot, while the Atlas Mountains can see snow. When are you planning to visit?";
            }
            
            return "That's a fascinating topic about Morocco! 🇲🇦 While I'm an AI assistant in training, I'd love to help you find more. Have you checked out our 'Discover' page for in-depth guides?";
        }

        function sendMessage(event) {
            event.preventDefault();
            const input = document.getElementById('chatbot-input');
            const message = input.value.trim();
            
            if (message) {
                addMessage(message, 'user');
                input.value = '';
                
                // Show simulated typing delay
                const delay = Math.min(1000, Math.max(500, message.length * 30)); // Dynamic delay based on reading time
                
                setTimeout(() => {
                    const response = getSmartResponse(message);
                    addMessage(response, 'bot');
                }, delay);
            }
        }

        function sendQuickMessage(message) {
            const input = document.getElementById('chatbot-input');
            input.value = message;
            sendMessage(new Event('submit'));
        }

        function addMessage(message, sender) {
            const messagesContainer = document.getElementById('chatbot-messages');
            const messageDiv = document.createElement('div');
            // Animated bubbles
            messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'} animate-slideInUp mb-2`; 
            
            // Get Time
            const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="max-w-[85%] bg-[#C8102E] text-white rounded-2xl rounded-tr-none px-4 py-3 shadow-md group relative">
                        <p class="text-sm font-medium leading-relaxed">${escapeHtml(message)}</p>
                        <span class="text-[10px] text-white/70 mt-1 block text-right">${time}</span>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                   <div class="max-w-[85%] bg-white text-stone-800 rounded-2xl rounded-tl-none px-4 py-3 shadow-sm border border-stone-100 group relative">
                        <p class="text-sm font-medium leading-relaxed">${escapeHtml(message)}</p>
                         <span class="text-[10px] text-stone-400 mt-1 block">${time}</span>
                   </div>
                `;
            }
            
            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
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
        document.addEventListener('DOMContentLoaded', function() {
            const categories = document.querySelectorAll('.mega-category');
            const contents = document.querySelectorAll('.mega-content');
            
            categories.forEach(category => {
                category.addEventListener('mouseenter', function() {
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
    <div id="arrow-cursor" class="fixed top-0 left-0 pointer-events-none z-[100001] opacity-0 transition-opacity duration-300 hidden sm:block will-change-transform">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transform -rotate-12 origin-top-left drop-shadow-md">
            <!-- Outline for contrast -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z" class="stroke-white dark:stroke-black stroke-[2px] fill-transparent" stroke-linejoin="round"/>
            <!-- Main Color Body -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z" class="transition-colors duration-300 ease-out fill-[#C8102E] dark:fill-white" />
        </svg>
    </div>

    <style>
        /* Hide Default Cursor Globally */
        @media (min-width: 640px) {
            body, a, button, input, textarea, select, label, .btn, .btn-primary, .btn-secondary, [role="button"], .cursor-pointer {
                cursor: none !important;
            }
            *:hover { cursor: none !important; }
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
                    if(el.dataset.cursorAttached) return;
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

        function openDiscoverOverlay() {
            if(!discoverOverlay) return;
            discoverOverlay.classList.remove('hidden');
            // Force reflow
            void discoverOverlay.offsetWidth;
            discoverOverlay.classList.remove('opacity-0');
            discoverOverlay.classList.add('flex', 'opacity-100');
            document.body.style.overflow = 'hidden';
            
            // Close mobile menu if open
            const mobileMenu = document.getElementById('mobile-menu');
            if(mobileMenu && mobileMenu.getAttribute('data-open') === 'true') {
                toggleMobileMenu();
            }
        }

        function closeDiscoverOverlay() {
            if(!discoverOverlay) return;
            discoverOverlay.classList.remove('opacity-100');
            discoverOverlay.classList.add('opacity-0');
            
            setTimeout(() => {
                discoverOverlay.classList.add('hidden');
                discoverOverlay.classList.remove('flex');
                document.body.style.overflow = '';
            }, 300);
        }
    </script>
</body>
</html>
