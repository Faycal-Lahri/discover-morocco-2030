<footer class="relative bg-[#FAFAFA] text-stone-900 overflow-hidden font-outfit">
    <!-- Top Divider/Pattern -->
    <div class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-stone-200 to-transparent"></div>

    <div class="container mx-auto px-6 md:px-12 pt-16 pb-2 md:pt-24 md:pb-2">
        <div class="grid grid-cols-2 md:grid-cols-12 gap-y-10 gap-x-6 md:gap-12 lg:gap-8">
            
            <!-- Brand Column -->
            <div class="col-span-2 md:col-span-4 flex flex-col items-start md:pr-8">
                <h1 class="text-4xl md:text-6xl font-black tracking-wider uppercase text-black mb-6 md:mb-8 leading-none">
                    Morocco<span class="text-[#C8102E]">.</span>
                </h1>
                
                <div class="space-y-3">
                    <p class="text-[10px] font-bold text-stone-400 uppercase tracking-[0.2em]">Powered by</p>
                    <p class="text-[13px] font-medium text-stone-500 leading-7 max-w-xs">
                        Discover Morocco 2030 is your official production guide, crafted with passion to showcase the Kingdom's magic to the world.
                    </p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-span-1 md:col-span-3 pt-2">
                 <h4 class="font-bold text-[10px] md:text-xs mb-6 md:mb-8 uppercase tracking-[0.15em] text-black">Quick Links</h4>
                 <ul class="space-y-4 md:space-y-5 text-[13px] md:text-[14px] text-stone-600 font-semibold tracking-wide">
                    <li class="relative group w-fit">
                        <a href="/" class="hover:text-black transition-colors">Home</a>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/Mouse_pointer_small_black.svg" class="absolute -right-6 top-0 w-3 h-3 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all duration-300 hidden md:block" alt="cursor">
                    </li>
                    <li><a href="/discover" class="hover:text-black transition-colors">Discover Morocco</a></li>
                    <li><a href="/about" class="hover:text-black transition-colors">About Us</a></li>
                    <li><a href="/faqs" class="hover:text-black transition-colors">FAQs</a></li>
                    <li><a href="/contact" class="hover:text-black transition-colors">Contact Us</a></li>
                    <li><a href="/volunteer" class="text-[#C8102E] hover:text-[#A00C24] transition-colors font-bold">Be a Volunteer</a></li>
                 </ul>
            </div>

            <!-- Partners -->
            <div class="col-span-1 md:col-span-2 pt-2">
                 <h4 class="font-bold text-[10px] md:text-xs mb-6 md:mb-8 uppercase tracking-[0.15em] text-black">Partners</h4>
                <ul class="space-y-4 md:space-y-5 text-[13px] md:text-[14px] text-stone-600 font-semibold tracking-wide">
                    <li><a href="{{ route('partners.hub') }}" class="hover:text-black transition-colors">Content Hub</a></li>
                    <li><a href="{{ route('partners.tools') }}" class="hover:text-black transition-colors">Partner Tools</a></li>
                </ul>
            </div>

            <!-- Call Center -->
            <div class="col-span-2 md:col-span-3 pt-4 md:pt-2 pl-0 md:pl-8 border-t border-stone-100 md:border-t-0 mt-4 md:mt-0">
                <h4 class="font-bold text-[10px] md:text-xs mb-6 md:mb-8 uppercase tracking-[0.15em] text-black mt-6 md:mt-0">Call Center</h4>
                
                <div class="flex gap-5 text-xl text-stone-900 mb-8 md:mb-10">
                    <a href="#" class="w-10 h-10 rounded-full border border-stone-200 flex items-center justify-center hover:bg-black hover:border-black hover:text-white transition-all duration-300">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full border border-stone-200 flex items-center justify-center hover:bg-black hover:border-black hover:text-white transition-all duration-300">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full border border-stone-200 flex items-center justify-center hover:bg-black hover:border-black hover:text-white transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

                <a href="/contact" class="group w-full md:w-auto inline-flex items-center justify-center gap-4 px-8 py-4 bg-white border border-stone-200 rounded-full shadow-[0_2px_10px_rgba(0,0,0,0.03)] hover:shadow-[0_5px_20px_rgba(200,16,46,0.15)] hover:border-[#C8102E]/20 transition-all duration-300">
                    <div class="w-8 h-8 rounded-full bg-[#fef2f2] flex items-center justify-center group-hover:bg-[#C8102E] transition-colors duration-300">
                        <i class="fas fa-headset text-[#C8102E] text-xs group-hover:text-white transition-colors duration-300"></i>
                    </div>
                    <span class="text-sm font-bold text-stone-900 tracking-wide">Contact Support</span>
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-4 pt-4 border-t border-stone-100 flex justify-center">
            <p class="text-[10px] font-bold text-stone-400 uppercase tracking-widest text-center">
                &copy; 2030 Morocco National Tourism Office .
            </p>
        </div>
    </div>
</footer>
