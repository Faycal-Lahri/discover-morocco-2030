<nav id="navbar"
    class="group/nav fixed w-full z-[100] transition-all duration-500 ease-in-out py-6 px-6 md:px-12 top-0 flex justify-between items-center text-white bg-gradient-to-b from-black/80 to-transparent">
    <a href="/" class="flex items-center gap-1 group z-20 relative">
        <div
            class="text-3xl font-black tracking-widest uppercase font-outfit flex items-baseline relative origin-left scale-75 md:scale-100">
            <div class="run-bomb-anim"></div>
            <span class="text-[#C8102E]">M</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 0.42s">O</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 0.84s">R</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 1.26s">O</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 1.71s">C</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 2.13s">C</span><!--
            --><span style="display:inline-block; animation: letterShock 0.3s ease-out 2.55s">O</span><!--
            --><span class="text-[#C8102E] opacity-0" style="animation: fadeIn 0.1s linear 3s forwards">.</span>
        </div>
    </a>
    <!-- Centered Navigation Links - Full Width Container to allow Mega Menu spanning -->
    <div
        class="hidden lg:flex absolute left-1/2 -translate-x-1/2 top-0 h-full items-center gap-8 text-sm font-bold uppercase tracking-wider text-white group-[.scrolled]/nav:text-stone-900 z-10">
        <a href="/"
            class="hover:text-[#C8102E] transition-colors duration-300 group/link h-full flex items-center {{ request()->is('/') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            <span class="relative">
                Home
                <span
                    class="absolute -bottom-1 left-0 h-0.5 bg-[#C8102E] transition-all duration-300 group-hover/link:w-full {{ request()->is('/') ? 'w-full' : 'w-0' }}"></span>
            </span>
        </a>

        <!-- Discover Morocco -->
        <div class="group h-full flex items-center pointer-events-auto" onmouseenter="openDiscoverOverlay()">
            <a href="/cities" class="group-hover:text-[#C8102E] transition-colors duration-300 h-full flex items-center {{ request()->is('cities*') ? 'text-[#C8102E]' : '' }}">
                <span class="relative">
                    Discover Morocco
                    <span class="absolute -bottom-1 left-0 h-0.5 bg-[#C8102E] transition-all duration-300 group-hover:w-full {{ request()->is('cities*') ? 'w-full' : 'w-0' }}"></span>
                </span>
            </a>
        </div>

        <a href="/about"
            class="hover:text-[#C8102E] transition-colors duration-300 group/link h-full flex items-center {{ request()->is('about') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            <span class="relative">
                About Us
                <span
                    class="absolute -bottom-1 left-0 h-0.5 bg-[#C8102E] transition-all duration-300 group-hover/link:w-full {{ request()->is('about') ? 'w-full' : 'w-0' }}"></span>
            </span>
        </a>
        <a href="/contact"
            class="hover:text-[#C8102E] transition-colors duration-300 group/link h-full flex items-center {{ request()->is('contact') ? 'text-[#C8102E]' : '' }} pointer-events-auto">
            <span class="relative">
                Contact Us
                <span
                    class="absolute -bottom-1 left-0 h-0.5 bg-[#C8102E] transition-all duration-300 group-hover/link:w-full {{ request()->is('contact') ? 'w-full' : 'w-0' }}"></span>
            </span>
        </a>
    </div>
    <div class="hidden lg:flex items-center gap-4 z-20 relative">
        <button onclick="openCommentsModal()"
            class="px-6 py-2 border border-white bg-transparent text-white group-[.scrolled]/nav:border-stone-900 group-[.scrolled]/nav:text-stone-900 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-white hover:!text-[#C8102E] transition-all duration-300">Write
            Comments</button>

        <a href="/volunteer"
            class="px-6 py-2 bg-[#C8102E] border border-[#C8102E] rounded-full text-xs font-bold text-white uppercase tracking-widest hover:bg-white hover:!text-[#C8102E] transition-all duration-300 shadow-lg">Want
            Volunteer</a>
    </div>

    <!-- Mobile Menu Button - Only visible on mobile -->
    <button id="apple-menu-btn" onclick="toggleAppleMenu()"
        class="lg:hidden text-2xl z-[10000] relative transition-all duration-300 text-white group-[.scrolled]/nav:text-stone-900 w-8 h-8 flex items-center justify-center">
        <i class="fas fa-bars absolute" id="apple-burger-icon"></i>
        <i class="fas fa-times absolute hidden" id="apple-close-icon"></i>
    </button>
</nav>

<!-- Mobile Menu - Premium Sheet Design -->
<div id="apple-menu"
    class="fixed inset-y-0 right-0 w-full sm:w-[500px] bg-[#C8102E] flex flex-col transform translate-x-full transition-transform duration-[800ms] ease-[cubic-bezier(0.25,1,0.2,1)] z-[10000] lg:hidden shadow-[-40px_0_80px_rgba(0,0,0,0.2)] overflow-hidden">

    <!-- Moroccan Zellige Pattern Overlay (Real Image) -->
    <div class="absolute inset-0 opacity-25 pointer-events-none"
        style="background-image: url('/img/zellige-pattern.png'); background-size: 60px auto; background-repeat: repeat;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-transparent pointer-events-none"></div>

    <!-- Header Section -->
    <div class="relative z-10 px-10 pt-16 pb-24 flex items-start justify-between">
        <div class="text-white">
            <span class="block text-[11px] font-bold tracking-[0.3em] opacity-80 uppercase mb-3">Navigation</span>
            <span
                class="block text-4xl font-playfair font-black italic leading-none tracking-tight">Morocco<br>2030</span>
        </div>
        <button onclick="toggleAppleMenu()"
            class="group h-12 px-5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white hover:text-[#C8102E] transition-all duration-300 flex items-center gap-3">
            <span class="text-[10px] font-black uppercase tracking-widest">Close</span>
            <i class="fas fa-times text-sm group-hover:rotate-180 transition-transform duration-500"></i>
        </button>
    </div>

    <!-- Floating White Sheet Content -->
    <div
        class="relative flex-1 bg-[#FAFAFA] rounded-t-[3.5rem] shadow-[0_-20px_60px_rgba(0,0,0,0.4)] flex flex-col -mt-12 overflow-hidden">

        <!-- Noise Texture -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-0"
            style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 200 200%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noiseFilter%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.65%22 numOctaves=%223%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noiseFilter)%22/%3E%3C/svg%3E');">
        </div>

        <!-- Navigation List -->
        <div class="relative z-10 flex-1 px-8 pt-12 overflow-y-auto">
            <div class="flex flex-col space-y-1 group/menu">

                <!-- 01 HOME -->
                <a href="/"
                    class="group/item relative flex items-center justify-between py-5 border-b border-stone-100 transition-all duration-500 hover:px-4 hover:border-[#C8102E]/20 hover:bg-white rounded-xl">
                    <div class="flex items-baseline gap-5">
                        <span
                            class="text-lg font-playfair italic text-stone-300 group-hover/item:text-[#C8102E] transition-colors">01</span>
                        <span
                            class="text-4xl font-outfit font-black tracking-tighter text-stone-900 group-hover/item:text-black">HOME</span>
                    </div>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-2xl text-stone-200 group-hover/item:text-[#C8102E] group-hover/item:rotate-0 transition-all duration-500"></i>
                </a>

                <!-- 02 DISCOVER -->
                <a href="/cities"
                    class="group/item relative flex items-center justify-between py-5 border-b border-stone-100 transition-all duration-500 hover:px-4 hover:border-[#006233]/20 hover:bg-white rounded-xl">
                    <div class="flex items-baseline gap-5">
                        <span
                            class="text-lg font-playfair italic text-stone-300 group-hover/item:text-[#006233] transition-colors">02</span>
                        <span
                            class="text-4xl font-outfit font-black tracking-tighter text-stone-900 group-hover/item:text-black">DISCOVER</span>
                    </div>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-2xl text-stone-200 group-hover/item:text-[#006233] group-hover/item:rotate-0 transition-all duration-500"></i>
                </a>

                <!-- 03 ABOUT -->
                <a href="/about"
                    class="group/item relative flex items-center justify-between py-5 border-b border-stone-100 transition-all duration-500 hover:px-4 hover:border-[#C8102E]/20 hover:bg-white rounded-xl">
                    <div class="flex items-baseline gap-5">
                        <span
                            class="text-lg font-playfair italic text-stone-300 group-hover/item:text-[#C8102E] transition-colors">03</span>
                        <span
                            class="text-4xl font-outfit font-black tracking-tighter text-stone-900 group-hover/item:text-black">ABOUT</span>
                    </div>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-2xl text-stone-200 group-hover/item:text-[#C8102E] group-hover/item:rotate-0 transition-all duration-500"></i>
                </a>

                <!-- 04 CONTACT -->
                <a href="/contact"
                    class="group/item relative flex items-center justify-between py-5 border-b border-stone-100 transition-all duration-500 hover:px-4 hover:border-[#C8102E]/20 hover:bg-white rounded-xl">
                    <div class="flex items-baseline gap-5">
                        <span
                            class="text-lg font-playfair italic text-stone-300 group-hover/item:text-[#C8102E] transition-colors">04</span>
                        <span
                            class="text-4xl font-outfit font-black tracking-tighter text-stone-900 group-hover/item:text-black">CONTACT</span>
                    </div>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-2xl text-stone-200 group-hover/item:text-[#C8102E] group-hover/item:rotate-0 transition-all duration-500"></i>
                </a>

            </div>

            <!-- Partners Section -->
            <div class="mt-12 mb-8 px-2 space-y-4">
                <div class="h-px w-12 bg-stone-200 mb-6"></div>

                <a href="{{ route('partners.hub') }}"
                    class="group flex items-center gap-3 text-xl font-bold text-stone-400 hover:text-[#C8102E] transition-colors uppercase tracking-widest">
                    <span>Partner Hub</span>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-sm opacity-0 group-hover:opacity-100 transition-opacity"></i>
                </a>

                <a href="{{ route('partners.tools') }}"
                    class="group flex items-center gap-3 text-xl font-bold text-stone-400 hover:text-[#C8102E] transition-colors uppercase tracking-widest">
                    <span>Tools & Resources</span>
                    <i
                        class="fas fa-arrow-right -rotate-45 text-sm opacity-0 group-hover:opacity-100 transition-opacity"></i>
                </a>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="relative z-10 p-8 border-t border-stone-100 bg-[#FAFAFA]">
            <div class="grid grid-cols-2 gap-4">
                <button onclick="openCommentsModal(); toggleAppleMenu();"
                    class="flex-1 py-4 border border-stone-200 rounded-[20px] bg-white text-xs font-black uppercase tracking-[0.15em] text-stone-900 hover:border-stone-900 hover:bg-stone-900 hover:text-white transition-all duration-300">
                    Write Comments
                </button>

                <a href="/volunteer"
                    class="flex-1 py-4 bg-[#C8102E] rounded-[20px] text-xs font-black text-white text-center uppercase tracking-[0.15em] shadow-[0_4px_15px_rgba(200,16,46,0.3)] hover:shadow-[0_8px_25px_rgba(200,16,46,0.4)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                    Volunteer Now
                </a>
            </div>

            <div class="mt-8 flex justify-center opacity-30 grayscale">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Coat_of_arms_of_Morocco.svg/1200px-Coat_of_arms_of_Morocco.svg.png"
                    class="h-6" alt="Maroc">
            </div>
        </div>
    </div>
</div>

<!-- Overlay for mobile menu - Hidden by default -->
<div id="apple-overlay"
    class="fixed inset-0 bg-black/30 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-500 z-[9998] hidden lg:hidden"
    onclick="toggleAppleMenu()"></div>

<script>
    function toggleAppleMenu() {
        const menu = document.getElementById('apple-menu');
        const overlay = document.getElementById('apple-overlay');
        const burger = document.getElementById('apple-burger-icon');
        const close = document.getElementById('apple-close-icon');
        const body = document.body;

        // Toggle Menu Position
        if (menu.classList.contains('translate-x-full')) {
            // Open
            menu.classList.remove('translate-x-full');
            menu.classList.add('translate-x-0');

            // Show Overlay
            overlay.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
            overlay.classList.add('opacity-100', 'pointer-events-auto');

            // Switch Icons
            burger.classList.add('hidden');
            close.classList.remove('hidden');

            // Lock Body
            body.style.overflow = 'hidden';
        } else {
            // Close
            menu.classList.add('translate-x-full');
            menu.classList.remove('translate-x-0');

            // Hide Overlay
            overlay.classList.remove('opacity-100', 'pointer-events-auto');
            overlay.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 500);

            // Switch Icons
            burger.classList.remove('hidden');
            close.classList.add('hidden');

            // Unlock Body
            body.style.overflow = '';
        }
    }
</script>