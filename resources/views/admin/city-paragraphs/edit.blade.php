@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit City Content</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update the content paragraph.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-4xl">
        <form action="{{ route('admin.city-paragraphs.update', $cityParagraph) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- City Selection -->
                <!-- City Selection -->
                <div x-data="{
                    selected: '{{ old('city_id', $cityParagraph->city_id) }}',
                    open: false,
                    items: [
                        { value: '', label: 'Select a City' },
                        @foreach($cities as $city)
                            { value: '{{ $city->id }}', label: '{{ addslashes($city->nom) }}' },
                        @endforeach
                    ],
                    get label() {
                        const item = this.items.find(i => i.value == this.selected);
                        return item ? item.label : 'Select a City';
                    }
                }">
                    <label for="city_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">City *</label>
                    <div class="relative">
                        <input type="hidden" name="city_id" :value="selected">
                        <button type="button" @click="open = !open" @click.outside="open = false" 
                            class="w-full flex items-center justify-between pl-10 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-primary-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span x-text="label" :class="{'text-gray-500 dark:text-gray-400': !selected, 'text-gray-900 dark:text-white': selected}"></span>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                             class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-[50] overflow-hidden max-h-60 overflow-y-auto custom-scrollbar">
                            <div class="py-1">
                                <template x-for="item in items" :key="item.value">
                                    <div @click="selected = item.value; open = false" 
                                         class="px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium flex items-center justify-between"
                                         :class="{'bg-primary-50 dark:bg-primary-900/10 text-primary-600 dark:text-primary-400': selected == item.value}">
                                        <span x-text="item.label"></span>
                                        <svg x-show="selected == item.value" class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    @error('city_id')
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
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $cityParagraph->titre) }}" class="w-full pl-10 has-icon" placeholder="e.g., History, Culture, Tourism">
                    </div>
                    @error('titre')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="contenu" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Content *</label>
                    <textarea name="contenu" id="contenu" rows="8" required class="w-full" placeholder="Enter the content paragraph...">{{ old('contenu', $cityParagraph->contenu) }}</textarea>
                    @error('contenu')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.city-paragraphs.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Content
                </button>
            </div>
        </form>
    </div>
@endsection
