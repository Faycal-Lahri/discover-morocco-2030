@extends('layouts.app')

@section('content')
<!-- Hero: Immersive Apple TV Style -->
<section class="relative w-full h-[90vh] overflow-hidden bg-black">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/morocco_hero_real.png') }}" class="w-full h-full object-cover opacity-70 animate-slow-scale">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-end pb-32">
        <div class="max-w-4xl animate-slide-up">
            <span class="inline-block py-1 px-3 border border-white/30 rounded-full text-[10px] font-bold uppercase tracking-widest text-[#d4af37] bg-black/30 backdrop-blur-md mb-6">
                Signature Collection
            </span>
            <h1 class="text-7xl md:text-9xl font-playfair font-black text-white leading-tight mb-6">
                Sahara <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#d4af37] to-[#f8f5e4]">Sanctuary</span>
            </h1>
            <p class="text-xl md:text-2xl text-white/80 font-outfit font-light max-w-2xl leading-relaxed">
                Disconnect from the world. A 6-night curated journey into the absolute silence of the Merzouga dunes.
            </p>
        </div>
    </div>
</section>

<!-- Main Content Grid -->
<section class="bg-black text-white py-32">
    <div class="container mx-auto px-6 md:px-12">
        <div class="flex flex-col lg:flex-row gap-20">
            
            <!-- Left: Editorial Content -->
            <div class="w-full lg:w-5/12 space-y-20">
                
                <!-- Bento Grid for Amenities -->
                <div class="space-y-8">
                    <h2 class="text-3xl font-playfair font-bold">The Experience</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Card 1 -->
                        <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <div class="w-12 h-12 bg-[#d4af37]/20 rounded-full flex items-center justify-center text-[#d4af37] mb-4 text-xl">
                                <i class="fas fa-moon"></i>
                            </div>
                            <h3 class="font-bold text-lg mb-2">6 Nights</h3>
                            <p class="text-sm text-white/60">Stay at the exclusive Desert Rock Resort with private dune access.</p>
                        </div>
                        
                        <!-- Card 2 -->
                        <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <div class="w-12 h-12 bg-[#d4af37]/20 rounded-full flex items-center justify-center text-[#d4af37] mb-4 text-xl">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h3 class="font-bold text-lg mb-2">Private Chef</h3>
                            <p class="text-sm text-white/60">Full board dining featuring curated Moroccan gastronomy.</p>
                        </div>

                         <!-- Card 3 -->
                         <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <div class="w-12 h-12 bg-[#d4af37]/20 rounded-full flex items-center justify-center text-[#d4af37] mb-4 text-xl">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3 class="font-bold text-lg mb-2">Guided Treks</h3>
                            <p class="text-sm text-white/60">Sunrise camel trekking and 4x4 dune bashing included.</p>
                        </div>

                         <!-- Card 4 -->
                         <div class="bg-white/5 p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors duration-300">
                            <div class="w-12 h-12 bg-[#d4af37]/20 rounded-full flex items-center justify-center text-[#d4af37] mb-4 text-xl">
                                <i class="fas fa-spa"></i>
                            </div>
                            <h3 class="font-bold text-lg mb-2">Dune Spa</h3>
                            <p class="text-sm text-white/60">Complimentary Hammam and massage session for two.</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-[#d4af37] text-black">
                    <h3 class="font-bold text-2xl font-playfair mb-2">Exclusive Offer</h3>
                    <p class="font-outfit opacity-80 mb-6">Book before Feb 2026 to receive a complimentary upgrade to the Royal Suite.</p>
                    <div class="text-4xl font-bold font-playfair">30% OFF</div>
                </div>

            </div>

            <!-- Right: Sticky iOS Style Form -->
            <div class="w-full lg:w-7/12">
                <div class="sticky top-12">
                    <div class="bg-[#1c1c1e] p-10 md:p-14 rounded-[3rem] shadow-2xl border border-white/10 relative overflow-hidden">
                        
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold mb-2">Reserve Availability</h3>
                            <p class="text-white/50 mb-8 font-outfit">No payment required. Free cancellation up to 48h.</p>

                             <!-- System Feedback -->
                            @if(session('success'))
                                <div class="mb-8 p-4 bg-green-500/10 border border-green-500/20 rounded-2xl flex items-center gap-3 text-green-400">
                                    <i class="fas fa-check-circle"></i>
                                    <span class="font-medium">{{ session('success') }}</span>
                                </div>
                            @endif

                            <form action="{{ route('offers.sahara.store') }}" method="POST" class="space-y-6">
                                @csrf
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label class="block text-xs font-bold text-white/40 uppercase tracking-widest mb-2 ml-4">Full Name</label>
                                        <input type="text" name="full_name" required placeholder="John Doe"
                                            class="w-full bg-[#2c2c2e] text-white rounded-[1.5rem] px-6 py-4 border-2 border-transparent focus:border-[#d4af37] focus:bg-[#3a3a3c] transition-all outline-none placeholder-white/20">
                                    </div>
                                    <div class="group">
                                        <label class="block text-xs font-bold text-white/40 uppercase tracking-widest mb-2 ml-4">Email</label>
                                        <input type="email" name="email" required placeholder="john@example.com"
                                            class="w-full bg-[#2c2c2e] text-white rounded-[1.5rem] px-6 py-4 border-2 border-transparent focus:border-[#d4af37] focus:bg-[#3a3a3c] transition-all outline-none placeholder-white/20">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-xs font-bold text-white/40 uppercase tracking-widest mb-2 ml-4">Check In</label>
                                        <input type="date" name="check_in" required
                                            class="w-full bg-[#2c2c2e] text-white rounded-[1.5rem] px-6 py-4 border-2 border-transparent focus:border-[#d4af37] focus:bg-[#3a3a3c] transition-all outline-none [&::-webkit-calendar-picker-indicator]:invert">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-white/40 uppercase tracking-widest mb-2 ml-4">Guests</label>
                                        <div class="relative">
                                            <select name="guests" class="w-full bg-[#2c2c2e] text-white rounded-[1.5rem] px-6 py-4 border-2 border-transparent focus:border-[#d4af37] focus:bg-[#3a3a3c] transition-all outline-none appearance-none">
                                                <option>2 Guests</option>
                                                <option>1 Guest</option>
                                                <option>Family (3-4)</option>
                                                <option>Group (5+)</option>
                                            </select>
                                            <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-white/40 pointer-events-none"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-white/40 uppercase tracking-widest mb-2 ml-4">Special Requests</label>
                                    <textarea name="notes" rows="3" placeholder="Dietary restrictions, special occasions..."
                                        class="w-full bg-[#2c2c2e] text-white rounded-[1.5rem] px-6 py-4 border-2 border-transparent focus:border-[#d4af37] focus:bg-[#3a3a3c] transition-all outline-none placeholder-white/20 resize-none"></textarea>
                                </div>

                                <button type="submit" class="w-full bg-white text-black font-bold text-lg rounded-[1.5rem] py-5 hover:scale-[1.02] active:scale-[0.98] transition-transform duration-200">
                                    Request to Book
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .animate-slow-scale { animation: scaleUp 20s infinite alternate ease-in-out; }
    @keyframes scaleUp { from { transform: scale(1); } to { transform: scale(1.1); } }
    .animate-slide-up { animation: slideUp 1s ease-out forwards; opacity: 0; transform: translateY(30px); }
    @keyframes slideUp { to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
