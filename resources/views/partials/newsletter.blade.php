<section class="py-6 bg-stone-50 pb-10 -mt-6 relative z-30">
    <div class="container mx-auto px-6 md:px-12 max-w-7xl">
        <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row items-center justify-between p-8 md:p-10 gap-8 border border-stone-100">
            <div class="absolute left-0 top-0 bottom-0 w-3 md:w-4 bg-[#006233]">
                <div class="absolute inset-0 opacity-30" style="background-image: url('/assets/images/zellige_pattern.png'); background-size: 50px;"></div>
            </div>
            <div class="flex items-center gap-6 pl-4 md:pl-6 w-full md:w-auto">
                <div class="hidden md:flex w-16 h-16 rounded-full bg-stone-50 items-center justify-center text-[#C8102E] text-2xl shadow-sm border border-stone-100">
                    <i class="far fa-envelope-open"></i>
                </div>
                <div>
                    <h3 class="text-xl md:text-2xl font-playfair font-bold text-[#C8102E] mb-1">Subscribe to our newsletter</h3>
                    <p class="text-sm md:text-base text-stone-500 font-medium">Be the first to receive exclusive updates and stories.</p>
                </div>
            </div>
            <div class="w-full md:w-auto flex-1 max-w-xl">
                <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col md:flex-row gap-3">
                    @csrf
                    <input type="email" name="email" placeholder="Email address" 
                           class="w-full px-6 py-3 bg-stone-50 border border-stone-200 rounded-full focus:outline-none focus:border-[#d4af37] focus:ring-1 focus:ring-[#d4af37] transition-all placeholder-stone-400 text-sm" required>
                    <button type="submit" class="px-8 py-3 bg-[#C8102E] text-white rounded-full font-bold uppercase text-xs tracking-widest hover:bg-[#a00c23] transition-all shadow-md whitespace-nowrap">
                        Subscribe
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>
