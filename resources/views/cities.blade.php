@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative h-[50vh] min-h-[400px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1539020140153-e479b8c22e70?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover" alt="Moroccan Cities">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center items-center text-center">
        <h1 class="text-5xl md:text-7xl font-playfair font-bold text-white mb-6">Discover Our Cities</h1>
        <p class="text-xl text-stone-200 max-w-2xl font-outfit font-light">Explore the magic of Morocco through its diverse and enchanting cities. From ancient medinas to modern metropolises.</p>
    </div>
</div>

<!-- Cities Grid -->
<div class="bg-stone-50 py-24">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($cities as $city)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                <!-- Image Container -->
                <div class="relative h-72 overflow-hidden">
                    @if($city->image)
                        <img src="{{ asset('storage/' . $city->image) }}" alt="{{ $city->nom }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-stone-200 flex items-center justify-center text-stone-400">
                            <i class="fas fa-city text-4xl"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-80"></div>
                    
                    <!-- Title Overlay -->
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-3xl font-playfair font-bold text-white mb-1">{{ $city->nom }}</h3>
                        <p class="text-[#EAB308] font-bold uppercase tracking-widest text-xs">{{ $city->label ?? 'Destination' }}</p>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="p-8">
                    <p class="text-stone-600 mb-6 line-clamp-3 font-outfit leading-relaxed">
                        {{ $city->description }}
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 text-[#C8102E] font-bold uppercase tracking-widest text-xs group/link">
                        Explore City 
                        <i class="fas fa-arrow-right transform -rotate-45 group-hover/link:rotate-0 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
