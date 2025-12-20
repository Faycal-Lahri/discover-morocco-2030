@if($paginatedItems->count() > 0)
    <input type="hidden" id="hidden-total-count" value="{{ $paginatedItems->total() }}">
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-6">
        @foreach($paginatedItems as $index => $item)
            <!-- Card Item -->
            <!-- Click handler to open Modal -->
            <div @click="openModal({{ json_encode($item) }})"
                 class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden bg-stone-200 cursor-zoom-in animate-fade-in-up hover:z-20 transform transition-all duration-300 hover:shadow-2xl {{ $item->type == 'video' ? 'col-span-2 sm:col-span-1' : 'col-span-1' }}" 
                 style="animation-delay: {{ $index * 50 }}ms">
                
                <!-- Media Content -->
                @if($item->type == 'video')
                    <video class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" loop muted playsinline onmouseover="this.play()" onmouseout="this.pause(); this.currentTime=0;">
                        <source src="{{ $item->url }}" type="video/mp4">
                    </video>
                    <!-- Video Indicator -->
                    <div class="absolute top-4 right-4 w-8 h-8 bg-black/40 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/20 z-10">
                        <i class="fas fa-play text-[10px] ml-0.5"></i>
                    </div>
                @else
                    <img src="{{ $item->url }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" loading="lazy">
                @endif
                
                <!-- Gradient Overlay (Always slight, deepens on hover) -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/0 via-transparent to-black/60 opacity-60 group-hover:opacity-90 transition-opacity duration-500"></div>

                <!-- Content Overlay -->
                <div class="absolute bottom-0 left-0 w-full p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 ease-out">
                    
                    <div class="flex items-center justify-between mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#d4af37] bg-black/30 backdrop-blur-sm px-2 py-1 rounded-md">
                            {{ $item->category }}
                        </span>
                        
                        <!-- Download Button (Small) which stops propagation -->
                        <a href="{{ $item->url }}" download @click.stop class="w-8 h-8 rounded-full bg-white text-stone-900 flex items-center justify-center hover:bg-[#C8102E] hover:text-white transition-colors shadow-lg">
                            <i class="fas fa-arrow-down text-xs"></i>
                        </a>
                    </div>

                    <h3 class="text-white font-playfair font-bold text-xl leading-tight drop-shadow-md">
                        {{ $item->title }}
                    </h3>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination (Apple Style) -->
    <div class="mt-20 flex justify-center">
        {{ $paginatedItems->links('pagination::tailwind') }}
    </div>
@else
    <!-- No Results State -->
    <div class="min-h-[400px] flex flex-col items-center justify-center text-center animate-fade-in-up">
        <div class="w-24 h-24 bg-stone-100 rounded-full flex items-center justify-center mb-6 animate-bounce-slow">
            <i class="fas fa-search text-stone-400 text-3xl"></i>
        </div>
        <h3 class="text-2xl font-playfair font-bold text-stone-800 mb-2">No moments found</h3>
        <p class="text-stone-500 mb-8 max-w-md">We couldn't find any media matching your current filters. Try selecting a different city or clearing your selection.</p>
        <button onclick="filterContent({city_id: '', destination_id: '', type: ''})" class="px-8 py-3 bg-stone-900 text-white rounded-full font-bold uppercase text-xs tracking-widest hover:bg-[#C8102E] transition-colors shadow-xl">
            Clear All Filters
        </button>
    </div>
@endif
