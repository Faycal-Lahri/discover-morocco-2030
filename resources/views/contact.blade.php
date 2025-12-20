@extends('layouts.app')

@section('content')
    <!-- WRAPPER FOR SCROLL ANIMATION -->
    <div class="relative w-full bg-stone-50 pb-0">
        
        <!-- HERO SECTION (Starts Full Width, Shrinks on Scroll) -->
        <style>
            /* Custom Keyframes from About Page */
            @keyframes fadeUpStagger {
                from { opacity: 0; transform: translateY(40px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-title-word {
                display: inline-block;
                opacity: 0;
                animation: fadeUpStagger 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            }
            @keyframes scrollDrop {
                0% { top: -50%; opacity: 0; }
                50% { opacity: 1; }
                100% { top: 100%; opacity: 0; }
            }
            .animate-scroll-drop {
                animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite;
            }
        </style>

        <!-- 1. HERO SECTION (Video Background) -->
        <div id="hero-container" class="relative w-full h-[110vh] overflow-hidden bg-black mx-auto">
             <!-- Video Background -->
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60 scale-105">
                <source src="{{ asset('videos/contact.mp4') }}" type="video/mp4">
            </video>
            
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-black/80"></div>
            
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 z-10 pt-20">
                <!-- Animated Title -->
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-black text-white leading-[0.9] drop-shadow-2xl">
                    <span class="animate-title-word" style="animation-delay: 0.2s;">We're</span>
                    <span class="animate-title-word" style="animation-delay: 0.4s;">Here</span><br>
                    <span class="animate-title-word text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] via-[#f3e5ab] to-[#d4af37]" style="animation-delay: 0.6s;">For You</span>
                </h1>
                
                <p class="mt-8 text-xl md:text-2xl font-light text-stone-200 max-w-2xl mx-auto leading-relaxed opacity-0 animate-[fadeIn_1s_ease-out_1.2s_forwards]">
                    Have questions or want to collaborate? Reach out to the Kingdom of Light.
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

        <!-- MAIN CONTENT (Sticky Layout) -->
        <div class="container mx-auto px-6 md:px-12 -mt-20 relative z-20">
            <div class="bg-white rounded-3xl shadow-2xl border border-stone-100 overflow-hidden flex flex-col lg:flex-row">
                
                <!-- LEFT: FORM (Scrolls) -->
                <div class="lg:w-3/5 p-8 md:p-16">
                    <h3 class="text-4xl font-playfair font-black text-stone-900 mb-2">Send a Message</h3>
                    <p class="text-stone-500 mb-10">Fill out the form below and we'll get back to you shortly.</p>
                    


                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-stone-400">Full Name</label>
                                <input type="text" name="nom_prenom" placeholder="John Doe" class="w-full border-b-2 border-stone-200 py-3 text-lg focus:outline-none focus:border-[#C8102E] bg-transparent transition-colors placeholder-stone-300" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-stone-400">Phone Number</label>
                                <input type="tel" name="telephone" placeholder="+212 ..." class="w-full border-b-2 border-stone-200 py-3 text-lg focus:outline-none focus:border-[#C8102E] bg-transparent transition-colors placeholder-stone-300">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-stone-400">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" class="w-full border-b-2 border-stone-200 py-3 text-lg focus:outline-none focus:border-[#C8102E] bg-transparent transition-colors placeholder-stone-300" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-stone-400">Subject</label>
                            <select name="objet" class="w-full border-b-2 border-stone-200 py-3 text-lg focus:outline-none focus:border-[#C8102E] bg-transparent transition-colors text-stone-600">
                                <option>General Inquiry</option>
                                <option>Tourism Support</option>
                                <option>Press & Media</option>
                                <option>Partnership</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-stone-400">Your Message</label>
                            <textarea name="message" rows="4" placeholder="How can we help you?" class="w-full border-b-2 border-stone-200 py-3 text-lg focus:outline-none focus:border-[#C8102E] bg-transparent transition-colors placeholder-stone-300 resize-none" required></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="px-10 py-4 bg-[#C8102E] text-white rounded-full font-bold uppercase tracking-widest text-xs hover:bg-[#a00c23] transition-all shadow-xl w-full md:w-auto">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- RIGHT: STICKY IMAGE & INFO -->
                <div class="lg:w-2/5 relative bg-stone-900 border-l border-stone-800">
                    <div class="sticky top-0 h-full min-h-[600px] flex flex-col">
                        <!-- Background Image -->
                        <div class="absolute inset-0 opacity-50">
                            <img src="{{ asset('assets/images/morocco_hype.png') }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-[2px]"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="relative z-10 p-12 flex flex-col justify-between h-full text-white">
                            <div>
                                <h4 class="text-3xl font-playfair font-bold mb-8">Contact Info</h4>
                                <ul class="space-y-8">
                                    <li class="flex gap-6 items-start">
                                        <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-[#d4af37] flex-shrink-0 border border-white/20">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <div>
                                            <span class="block text-xs font-bold uppercase tracking-widest opacity-50 mb-1">Headquarters</span>
                                            <p class="text-lg font-light">Angle Rue Oued Al Makhazine,<br>Agdal, Rabat, Morocco</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-6 items-center">
                                         <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-[#d4af37] flex-shrink-0 border border-white/20">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div>
                                            <span class="block text-xs font-bold uppercase tracking-widest opacity-50 mb-1">Phone</span>
                                            <p class="text-lg font-bold font-playfair">+212 537 67 40 13</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-6 items-center">
                                         <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-[#d4af37] flex-shrink-0 border border-white/20">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <div>
                                            <span class="block text-xs font-bold uppercase tracking-widest opacity-50 mb-1">Email</span>
                                            <p class="text-lg font-light">contact@visitmorocco.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Socials -->
                            <div>
                                 <span class="block text-xs font-bold uppercase tracking-widest opacity-50 mb-4">Follow Us</span>
                                 <div class="flex gap-4">
                                     <a href="#" class="w-10 h-10 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black transition-all"><i class="fab fa-facebook-f"></i></a>
                                     <a href="#" class="w-10 h-10 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black transition-all"><i class="fab fa-instagram"></i></a>
                                     <a href="#" class="w-10 h-10 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black transition-all"><i class="fab fa-twitter"></i></a>
                                     <a href="#" class="w-10 h-10 rounded-full border border-white/30 flex items-center justify-center hover:bg-white hover:text-black transition-all"><i class="fab fa-youtube"></i></a>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <style>
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
        @keyframes slowZoom { from { transform: scale(1); } to { transform: scale(1.1); } }
        
        .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        .animate-fade-in { animation: fadeIn 1s ease-out forwards; }
        @keyframes fadeIn { to { opacity: 1; } }
    </style>
@endsection

@section('scripts')
@endsection
