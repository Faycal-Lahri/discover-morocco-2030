@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Add Destination Content</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Create a new content paragraph for a destination.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-4xl">
        <form action="{{ route('admin.destination-paragraphs.store') }}" method="POST" 
            x-data="{
                selectedCity: '',
                selectedDest: '{{ old('destination_id') }}',
                cityOpen: false,
                destOpen: false,
                cities: [
                    { value: '', label: 'All Cities' },
                    @foreach($cities as $city)
                        { value: '{{ $city->id }}', label: '{{ addslashes($city->nom) }}' },
                    @endforeach
                ],
                destinations: [
                    @foreach($destinations as $dest)
                        { value: '{{ $dest->id }}', label: '{{ addslashes($dest->nom) }}', city_id: '{{ $dest->city_id }}' },
                    @endforeach
                ],
                get filteredDestinations() {
                    if (!this.selectedCity) return this.destinations;
                    return this.destinations.filter(d => d.city_id == this.selectedCity);
                },
                get currentCityLabel() {
                    const c = this.cities.find(x => x.value == this.selectedCity);
                    return c ? c.label : 'All Cities';
                },
                get currentDestLabel() {
                    const d = this.destinations.find(x => x.value == this.selectedDest);
                    return d ? d.label : 'Select a Destination';
                }
            }">
            @csrf

            <div class="space-y-6">
                <!-- City Filter (Optional) -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Filter by City (Optional)</label>
                    <div class="relative">
                        <button type="button" @click="cityOpen = !cityOpen" @click.outside="cityOpen = false" 
                            class="w-full flex items-center justify-between pl-4 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                            <span x-text="currentCityLabel" :class="{'text-gray-500 dark:text-gray-400': !selectedCity, 'text-gray-900 dark:text-white': selectedCity}"></span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': cityOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="cityOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-[60] overflow-hidden max-h-60 overflow-y-auto custom-scrollbar">
                            <div class="py-1">
                                <template x-for="city in cities" :key="city.value">
                                    <div @click="selectedCity = city.value; cityOpen = false; selectedDest = ''" 
                                         class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium flex items-center justify-between"
                                         :class="{'bg-primary-50 dark:bg-primary-900/10 text-primary-600 dark:text-primary-400': selectedCity == city.value}">
                                        <span x-text="city.label"></span>
                                        <svg x-show="selectedCity == city.value" class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Destination Selection -->
                <div>
                    <label for="destination_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Destination *</label>
                    <div class="relative">
                        <input type="hidden" name="destination_id" :value="selectedDest">
                        <button type="button" @click="destOpen = !destOpen" @click.outside="destOpen = false" 
                            class="w-full flex items-center justify-between pl-10 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-primary-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span x-text="currentDestLabel" :class="{'text-gray-500 dark:text-gray-400': !selectedDest, 'text-gray-900 dark:text-white': selectedDest}"></span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': destOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="destOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-[50] overflow-hidden max-h-60 overflow-y-auto custom-scrollbar">
                            <div class="py-1">
                                <template x-for="dest in filteredDestinations" :key="dest.value">
                                    <div @click="selectedDest = dest.value; destOpen = false" 
                                         class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium flex items-center justify-between"
                                         :class="{'bg-primary-50 dark:bg-primary-900/10 text-primary-600 dark:text-primary-400': selectedDest == dest.value}">
                                        <span x-text="dest.label"></span>
                                        <svg x-show="selectedDest == dest.value" class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </template>
                                <div x-show="filteredDestinations.length === 0" class="px-4 py-3 text-sm text-gray-500 italic text-center">
                                    No destinations found
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('destination_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="titre" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Title (Optional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" class="w-full pl-10 has-icon" placeholder="e.g., History, Attractions, Activities">
                    </div>
                    @error('titre')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="contenu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Content *</label>
                    <textarea name="contenu" id="contenu" rows="8" required class="w-full" placeholder="Enter the content paragraph...">{{ old('contenu') }}</textarea>
                    @error('contenu')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.destination-paragraphs.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create Content
                </button>
            </div>
        </form>
    </div>
@endsection
