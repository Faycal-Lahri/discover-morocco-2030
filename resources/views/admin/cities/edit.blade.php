@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit City</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update details for {{ $city->nom }}.</p>
        </div>
        <a href="{{ route('admin.cities.index') }}" class="btn-secondary">
            Cancel
        </a>
    </div>

    <div class="glass-card rounded-2xl p-8 max-w-5xl mx-auto shadow-xl">
        <form action="{{ route('admin.cities.update', $city) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Name -->
                <div>
                    <label for="nom" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Name <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $city->nom) }}" required placeholder="e.g. Marrakech" class="pl-10 w-full has-icon">
                    </div>
                    @error('nom') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="titre" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Title <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $city->titre) }}" required placeholder="e.g. The Red City" class="pl-10 w-full has-icon">
                    </div>
                    @error('titre') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>

                <!-- Size -->
                <div x-data="{
                    selected: '{{ old('size', $city->size) }}',
                    open: false,
                    items: [
                        { value: 'big', label: 'Big City' },
                        { value: 'small', label: 'Small Town' }
                    ],
                    get label() {
                        const item = this.items.find(i => i.value == this.selected);
                        return item ? item.label : 'Select Size...';
                    }
                }">
                    <label for="size" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Size <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="hidden" name="size" :value="selected">
                        <button type="button" @click="open = !open" @click.outside="open = false" 
                            class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
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
                             class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-[50] overflow-hidden">
                            <div class="py-1">
                                <template x-for="item in items" :key="item.value">
                                    <div @click="selected = item.value; open = false" 
                                         class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium flex items-center justify-between"
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
                    @error('size') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>

                <!-- Label -->
                <div>
                    <label for="label" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Label</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <input type="text" name="label" id="label" value="{{ old('label', $city->label) }}" placeholder="e.g. Historic, Coastal, Popular" class="pl-10 w-full has-icon">
                    </div>
                    @error('label') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Categories -->
            <div>
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3">Categories</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach($available_categories as $category)
                    <label class="checkbox-tag cursor-pointer relative">
                        <input type="checkbox" name="categories[]" value="{{ $category }}" class="sr-only" {{ in_array($category, old('categories', $current_categories)) ? 'checked' : '' }}>
                        <div class="px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 hover:border-primary-500 dark:hover:border-primary-500 text-center text-sm font-medium text-gray-600 dark:text-gray-400 select-none">
                            {{ ucfirst($category) }}
                        </div>
                    </label>
                    @endforeach
                </div>
                @error('categories') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                <textarea name="description" id="description" rows="5" placeholder="Write a detailed description..." class="w-full">{{ old('description', $city->description) }}</textarea>
                @error('description') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Image Upload -->
                <div x-data="{ imagePreview: '{{ $city->image ? Storage::url($city->image) : '' }}' }">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Cover Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-700 border-dashed rounded-2xl hover:border-primary-500 dark:hover:border-primary-500 transition-colors relative overflow-hidden bg-gray-50 dark:bg-gray-900/50 group cursor-pointer">
                        <input type="file" name="image" id="image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                        
                        <div class="space-y-2 text-center" x-show="!imagePreview">
                            <div class="mx-auto h-16 w-16 text-gray-400 group-hover:text-primary-500 transition-colors">
                                <svg class="h-full w-full" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-center">
                                <span class="relative bg-transparent rounded-md font-bold text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                    Upload a file
                                </span>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                        
                        <div x-show="imagePreview" class="absolute inset-0 flex items-center justify-center bg-gray-100 dark:bg-gray-800" x-cloak>
                            <img :src="imagePreview" class="max-h-full max-w-full object-contain">
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <p class="text-white font-bold">Change Image</p>
                            </div>
                        </div>
                    </div>
                    @error('image') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>

                <!-- Video Upload -->
                <div x-data="{ videoName: '{{ $city->video ? basename($city->video) : '' }}' }">
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Promotional Video</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-700 border-dashed rounded-2xl hover:border-primary-500 dark:hover:border-primary-500 transition-colors relative overflow-hidden bg-gray-50 dark:bg-gray-900/50 group cursor-pointer">
                        <input type="file" name="video" id="video" accept="video/mp4,video/avi,video/mpeg" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="videoName = $event.target.files[0].name">
                        
                        <div class="space-y-2 text-center">
                            <div class="mx-auto h-16 w-16 text-gray-400 group-hover:text-primary-500 transition-colors">
                                <svg class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-center">
                                <span class="relative bg-transparent rounded-md font-bold text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                    Upload a video
                                </span>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-500" x-show="!videoName">
                                MP4, AVI, MPEG up to 50MB
                            </p>
                            <p class="text-sm font-bold text-primary-600 dark:text-primary-400 mt-2" x-text="videoName" x-show="videoName"></p>
                        </div>
                    </div>
                    @error('video') <p class="mt-2 text-sm text-red-500 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t border-gray-200 dark:border-gray-800">
                <button type="submit" class="btn-primary">
                    Update City
                </button>
            </div>
        </form>
    </div>
@endsection
