<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50 dark:bg-gray-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - Morocco 2030</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@100..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                        },
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1)',
                        'slide-up': 'slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1)',
                        'scale-in': 'scaleIn 0.4s cubic-bezier(0.16, 1, 0.3, 1)',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.95)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/premium-modal.js') }}"></script>
    <style>
        [x-cloak] { display: none !important; }
        
        /* HIDE SCROLLBAR GLOBALLY */
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
            display: none;
        }
        
        /* HIDE SCROLLBAR BUT ALLOW SCROLLING */
        * {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        


        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .dark .glass {
            background: rgba(17, 24, 39, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-card {
            background: white;
            border: 1px solid #f3f4f6;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .dark .glass-card {
            background: #1f2937;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.2);
        }
        
        /* Premium Inputs */
        .form-input-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="number"], 
        input[type="password"], 
        input[type="date"], 
        input[type="tel"], 
        input[type="url"], 
        input[type="search"], 
        textarea, 
        select {
            width: 100%;
            padding: 0.875rem 1.5rem;
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            transition: all 0.2s ease;
            font-size: 0.95rem;
            color: #1f2937;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        
        select {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3e%3c/svg%3e") !important;
            background-position: right 1rem center !important;
            background-repeat: no-repeat !important;
            background-size: 1.25em 1.25em !important;
            padding-right: 2.5rem !important;
        }
        .dark input, .dark textarea, .dark select {
            background-color: #1f2937;
            border-color: #374151;
            color: #f3f4f6;
            box-shadow: none;
        }
        .dark select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%239ca3af'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3e%3c/svg%3e") !important;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #b91c1c;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(185, 28, 28, 0.1);
            outline: none;
        }

        /* Fix for icons overlapping text */
        .has-icon {
            padding-left: 3rem !important;
        }
        .dark input:focus, .dark textarea:focus, .dark select:focus {
            background-color: #111827;
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
        }

        /* Custom Checkbox as Tags */
        .checkbox-tag input:checked + div {
            background-color: #fef2f2;
            border-color: #b91c1c;
            color: #991b1b;
        }
        .dark .checkbox-tag input:checked + div {
            background-color: rgba(185, 28, 28, 0.1);
            border-color: #ef4444;
            color: #fca5a5;
        }
        .checkbox-tag div {
            transition: all 0.2s ease;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            font-weight: 600;
            letter-spacing: 0.025em;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.25);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(185, 28, 28, 0.35);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            font-weight: 600;
            letter-spacing: 0.025em;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .dark .btn-secondary {
            background: #374151;
            color: #f3f4f6;
            border-color: #4b5563;
        }
        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #9ca3af;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .dark .btn-secondary:hover {
            background: #4b5563;
            border-color: #6b7280;
        }
        .btn-secondary:active {
            transform: translateY(0);
        }

        /* Print Styles for Report */
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; color: black !important; }
            .glass-card { box-shadow: none !important; border: 1px solid #ddd !important; break-inside: avoid; }
            .print-only { display: block !important; }
            /* Hide Sidebar and Header */
            nav, header, .sidebar { display: none !important; }
            main { margin: 0 !important; padding: 0 !important; }
            /* Expand content */
            .max-w-7xl { max-width: none !important; }
        }

        /* Bombing Dot Animation */
        @keyframes bombRun {
            0% { transform: translate(0, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Start on M */
            7% { transform: translate(15px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); } /* Peak */
            14% { transform: translate(30px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit o */
            21% { transform: translate(45px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            28% { transform: translate(60px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit r */
            35% { transform: translate(75px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            42% { transform: translate(90px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit o */
            49% { transform: translate(105px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            57% { transform: translate(120px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit c */
            64% { transform: translate(135px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            71% { transform: translate(150px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit c */
            78% { transform: translate(165px, -25px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            85% { transform: translate(180px, 0); animation-timing-function: cubic-bezier(0.33, 1, 0.68, 1); } /* Hit o */
            92% { transform: translate(190px, -15px); animation-timing-function: cubic-bezier(0.32, 0, 0.67, 0); }
            100% { transform: translate(200px, 20px); opacity: 0; } /* Drop down to dot/floor */
        }
        
        .letter-react {
            display: inline-block;
            transform-origin: bottom center;
        }
        .run-bomb-anim {
            animation: bombRun 3s linear forwards;
            position: absolute;
            left: 5px;
            top: 2px; /* Top of letters */
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #8B0000;
            z-index: 10;
        }
        .dark .run-bomb-anim { background-color: #ef4444; }
        
        @keyframes letterShock {
            0% { transform: scale(0.8) translateY(4px); color: #8B0000; text-shadow: 0 0 10px rgba(139, 0, 0, 0.5); } /* Instant squash & red */
            60% { transform: scale(1.1) translateY(-1px); color: #8B0000; } /* Rebound */
            100% { transform: scale(1); color: inherit; }
        }
        
        .zellige-pattern {
            background-image: url('/img/zellige-pattern.png');
            background-repeat: repeat;
            background-size: 300px auto; /* Adjust scale */
        }
        .dark .zellige-pattern {
            filter: invert(1) opacity(0.5); /* Make it white in dark mode */
        }
    </style>
</head>
<body class="h-full font-sans antialiased text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-black selection:bg-primary-500 selection:text-white select-none" x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
    
    <!-- Content Protection Script -->
    <script>
        // Disable Image Dragging
        document.addEventListener('dragstart', function(e) {
            if (e.target.nodeName === 'IMG') {
                e.preventDefault();
            }
        });
    </script>
    <style>
        /* Allow selection in inputs */
        input, textarea, [contenteditable] {
            user-select: text !important;
            -webkit-user-select: text !important;
        }
        /* Disable dragging for visuals */
        img {
            -webkit-user-drag: none;
            user-drag: none;
        }
    </style>
    
    <!-- Notifications Toast -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                background: localStorage.getItem('darkMode') === 'true' ? '#111827' : '#fff',
                color: localStorage.getItem('darkMode') === 'true' ? '#fff' : '#000'
            })
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                background: localStorage.getItem('darkMode') === 'true' ? '#111827' : '#fff',
                color: localStorage.getItem('darkMode') === 'true' ? '#fff' : '#000'
            })
        });
    </script>
    @endif

    <div class="h-screen flex overflow-hidden">
        
        <!-- Mobile Sidebar Backdrop -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/80 z-40 lg:hidden glass no-print" @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="sidebar fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-gray-900 transition-transform duration-300 ease-in-out lg:translate-x-0 no-print flex flex-col">
            <div class="relative flex items-center justify-center h-24 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 flex-shrink-0 overflow-hidden">
                <!-- Sidebar Header Zellige Background -->
                <div class="absolute inset-0 zellige-pattern opacity-[0.03] dark:opacity-[0.08] pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col items-end justify-center px-4">
                    <div class="relative">
                        <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-widest uppercase flex items-baseline relative" style="font-family: 'Outfit', sans-serif;">
                            <div class="run-bomb-anim"></div>
                            <span class="letter-react text-[#C8102E] dark:text-red-500">M</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 0.42s">O</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 0.84s">R</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 1.26s">O</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 1.71s">C</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 2.13s">C</span><!--
                            --><span class="letter-react" style="animation: letterShock 0.3s ease-out 2.55s">O</span><!--
                            --><span class="letter-react text-[#C8102E] dark:text-red-500 opacity-0" style="animation: fadeIn 0.1s linear 3s forwards">.</span>
                        </h1>
                    </div>
                    <div class="text-[10px] font-bold text-[#8B0000] dark:text-red-500 tracking-[0.5em] uppercase pl-1 opacity-0" style="animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 3.2s forwards, pulse 3s cubic-bezier(0.4, 0, 0.6, 1) 4s infinite;">
                        2030
                    </div>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5 border-r border-gray-200 dark:border-gray-800" style="scrollbar-width: thin;">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                <div class="pt-6 pb-3">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Content</p>
                </div>

                <a href="{{ route('admin.cities.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.cities.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.cities.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Cities
                </a>

                <a href="{{ route('admin.destinations.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.destinations.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.destinations.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Destinations
                </a>

                <a href="{{ route('admin.media.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.media.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.media.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Media Manager
                </a>

                <div class="pt-6 pb-3">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Content</p>
                </div>

                <a href="{{ route('admin.city-paragraphs.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.city-paragraphs.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.city-paragraphs.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    City Content
                </a>

                <a href="{{ route('admin.destination-paragraphs.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.destination-paragraphs.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.destination-paragraphs.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Destination Content
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.faqs.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.faqs.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    FAQs
                </a>

                <div class="pt-6 pb-3">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Community</p>
                </div>

                <a href="{{ route('admin.volontaires.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.volontaires.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.volontaires.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Volunteers
                </a>

                <a href="{{ route('admin.commentaires.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.commentaires.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.commentaires.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    Comments
                </a>

                <div class="pt-6 pb-3">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Inbox</p>
                </div>

                <a href="{{ route('admin.contacts.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.contacts.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.contacts.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contacts
                </a>
                
                <a href="{{ route('admin.newsletters.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.newsletters.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.newsletters.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Newsletter
                </a>

                <div class="pt-6 pb-3">
                    <p class="px-4 text-xs font-bold text-gray-400 uppercase tracking-widest">System</p>
                </div>

                <a href="{{ route('admin.activities.index') }}" class="group flex items-center px-4 py-3.5 text-sm font-medium rounded-2xl transition-all duration-200 {{ request()->routeIs('admin.activities.*') ? 'bg-primary-50 text-primary-700 dark:bg-primary-900/20 dark:text-primary-400 shadow-sm ring-1 ring-primary-200 dark:ring-primary-800' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-white' }}">
                    <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->routeIs('admin.activities.*') ? 'text-primary-600 dark:text-primary-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Activity Log
                </a>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden lg:ml-72">
            <!-- Fixed Header -->
            <header class="fixed top-0 w-full lg:pl-72 z-40 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 pl-3 pr-10 h-24 flex items-center justify-between no-print relative">
                <!-- Header Zellige Background -->
                <div class="absolute inset-0 zellige-pattern opacity-[0.03] dark:opacity-[0.08] pointer-events-none"></div>
                <div class="flex items-center relative z-10">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none mr-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <!-- Breadcrumbs -->
                    <div class="hidden md:flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 lg:-ml-48 relative z-50">
                        <span class="hover:text-gray-900 dark:hover:text-white transition-colors cursor-default">Admin</span>
                        <svg class="h-4 w-4 mx-2 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-900 dark:text-white">{{ ucfirst(request()->segment(2) ?? 'Dashboard') }}</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4 relative z-50">
                    <!-- Notifications (Activity Feed) -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2.5 rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors relative focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @if(isset($global_recent_activities) && $global_recent_activities->count() > 0)
                            <span class="absolute top-2.5 right-2.5 h-2.5 w-2.5 bg-primary-500 rounded-full border-2 border-white dark:border-black animate-pulse"></span>
                            @endif
                        </button>
                        
                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 z-50 overflow-hidden">
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                            </div>
                            <div class="max-h-64 overflow-y-auto">
                                @if(isset($global_recent_activities))
                                    @forelse($global_recent_activities as $activity)
                                    <div class="px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors border-b border-gray-50 dark:border-gray-800 last:border-0 flex items-start gap-3">
                                        <div class="mt-1.5 flex-shrink-0">
                                            @if($activity->action == 'created')
                                                <div class="h-2 w-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
                                            @elseif($activity->action == 'updated')
                                                <div class="h-2 w-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]"></div>
                                            @elseif($activity->action == 'deleted')
                                                <div class="h-2 w-2 rounded-full bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]"></div>
                                            @else
                                                <div class="h-2 w-2 rounded-full bg-gray-500"></div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-300 leading-snug">{{ $activity->description }}</p>
                                            <span class="text-xs text-gray-400 mt-1 block">{{ $activity->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="px-4 py-3 text-center text-gray-500">No recent activity</div>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Theme Toggle -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" class="p-2.5 rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors focus:outline-none">
                        <svg x-show="!darkMode" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="darkMode" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-900 p-4 md:p-8 pt-24" style="scrollbar-width: thin;">
                <div class="max-w-7xl mx-auto animate-fade-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @if(request()->routeIs('admin.dashboard'))
    <!-- Apple-Style Cinematic Loader -->
    <div id="global-loader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black transition-all duration-800 ease-in-out"
         style="background: radial-gradient(circle at center, #500e0e 0%, #1a0202 100%);">
        
        <div class="relative flex flex-col items-center">
            <!-- Icon Container -->
            <div class="relative w-32 h-32 mb-10 flex items-center justify-center">
                <!-- Shockwave Ring (Triggers on finish) -->
                <div class="absolute inset-0 border border-white/20 rounded-full scale-50 opacity-0 animate-shockwave"></div>
                
                <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-lg z-10" style="filter: drop-shadow(0 0 15px rgba(255,255,255,0.15));">
                    <!-- Perfect Continuous Path -->
                    <path class="animate-liquid-draw" 
                          d="M50 5 L80.9 95 L2 38 L98 38 L19.1 95 L50 5" 
                          fill="none" 
                          stroke="white" 
                          stroke-width="2" 
                          stroke-linecap="round" 
                          stroke-linejoin="round" />
                </svg>
            </div>

            <!-- Masked Typography -->
            <div class="text-center z-10">
                <!-- Title Mask -->
                <div class="overflow-hidden mb-3 h-16 flex items-end justify-center">
                    <h1 class="font-display font-black text-6xl text-white tracking-[0.2em] uppercase transform translate-y-full opacity-0 animate-slide-up-reveal leading-none">
                        Morocco
                    </h1>
                </div>
                
                <!-- Subtitle Fade -->
                <div class="flex items-center justify-center gap-4 opacity-0 animate-fade-in">
                    <div class="h-[1px] w-8 bg-white/40"></div>
                    <span class="font-sans font-medium text-white/60 tracking-[0.5em] text-sm">2030</span>
                    <div class="h-[1px] w-8 bg-white/40"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* 1. Liquid Drawing Animation */
        .animate-liquid-draw {
            stroke-dasharray: 600;
            stroke-dashoffset: 600;
            animation: liquidDraw 2s cubic-bezier(0.65, 0, 0.35, 1) forwards;
        }

        @keyframes liquidDraw {
            0% { stroke-dashoffset: 600; opacity: 0; }
            10% { opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 1; }
        }

        /* 2. Shockwave Ripple */
        .animate-shockwave {
            animation: shockwave 1s ease-out 1.8s forwards;
        }

        @keyframes shockwave {
            0% { transform: scale(0.5); opacity: 0; border-width: 2px; }
            50% { opacity: 0.5; }
            100% { transform: scale(2); opacity: 0; border-width: 0; }
        }

        /* 3. Masked Slide Up (Premium Feel) */
        .animate-slide-up-reveal {
            animation: slideUpReveal 1.2s cubic-bezier(0.16, 1, 0.3, 1) 1.5s forwards;
        }

        @keyframes slideUpReveal {
            from { transform: translateY(110%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* 4. Subtle Fade In */
        .animate-fade-in {
            animation: fadeIn 1s ease-out 2s forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>

    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('global-loader');
            
            // Timing: 3.5s total
            setTimeout(() => {
                // Apple-style dissolution
                loader.style.transition = 'opacity 0.8s ease, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1)';
                loader.style.opacity = '0';
                loader.style.transform = 'scale(1.02)'; // Slight expansion on exit
                loader.style.pointerEvents = 'none';

                setTimeout(() => {
                    loader.style.display = 'none';
                }, 800);
            }, 3500);
        });
    </script>
    @endif
    
    
    <!-- Global Delete Confirmation Script -->
    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Confirm delete',
                html: 'Are you sure you want to delete this item?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'No, keep it',
                confirmButtonColor: '#ef4444',
                background: localStorage.getItem('darkMode') === 'true' ? '#1f2937' : '#ffffff',
                width: '450px',
                padding: '2rem',
                customClass: {
                    popup: 'rounded-xl shadow-xl border-0',
                    title: 'text-2xl font-normal text-left text-gray-800 dark:text-white p-0 mb-4',
                    htmlContainer: 'text-left text-gray-500 dark:text-gray-400 text-base p-0 mb-8',
                    actions: 'flex items-center justify-start gap-4 p-0 mt-2 w-full',
                    confirmButton: 'bg-red-500 hover:bg-red-600 text-white rounded-full px-6 py-2.5 text-sm font-medium shadow-none m-0',
                    cancelButton: 'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 text-sm font-medium m-0 hover:bg-transparent shadow-none border-0 px-2'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            })
            return false;
        }
    </script>

    <!-- Success Toast Notification -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: false,
                background: 'transparent', // We handle background in the html container
                customClass: {
                    popup: '!bg-transparent !shadow-none !p-0 !border-0 !overflow-visible !w-auto',
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });

            Toast.fire({
                html: `
                    <div class="flex items-center gap-4 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 px-6 py-4 mx-auto mt-4" style="min-width: 300px; max-width: 400px;">
                        <div class="flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-green-50 dark:bg-green-900/20">
                            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <p class="text-sm font-bold text-gray-900 dark:text-white leading-tight">{{ session('success') }}</p>
                        </div>
                    </div>
                `
            });
        });
    </script>
    @endif
    <!-- End Success Toast -->
    <!-- ========================================== -->
    <!--       THEME-AWARE ARROW CURSOR             -->
    <!-- ========================================== -->

    <!-- The angled arrow container -->
    <div id="arrow-cursor" class="fixed top-0 left-0 pointer-events-none z-[99999] opacity-0 transition-opacity duration-300 hidden sm:block will-change-transform">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transform -rotate-12 origin-top-left drop-shadow-md">
            <!-- Outline for contrast -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z" class="stroke-white dark:stroke-black stroke-[2px] fill-transparent" stroke-linejoin="round"/>
            <!-- Main Color Body -->
            <path d="M5.5 3.2L16.2 8.3L8.7 10L7 17.5L5.5 3.2Z" class="transition-colors duration-300 ease-out fill-[#8B0000] dark:fill-white" />
        </svg>
    </div>

    <style>
        /* Hide Default Cursor */
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
            const selectors = 'a, button, input, textarea, select, [role="button"], .btn, .cursor-pointer, label, tr, .hover-trigger, .swal2-confirm, .swal2-cancel, .swal2-close';
            
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
</body>
</html>
</body>
</html>
