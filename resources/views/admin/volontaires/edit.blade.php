@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit Volunteer</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update volunteer information.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-4xl">
        <form action="{{ route('admin.volontaires.update', $volontaire) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Last Name -->
                <div>
                    <label for="nom" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Last Name *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $volontaire->nom) }}" required class="w-full pl-10 has-icon">
                    </div>
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- First Name -->
                <div>
                    <label for="prenom" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">First Name *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $volontaire->prenom) }}" required class="w-full pl-10 has-icon">
                    </div>
                    @error('prenom')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="date_naissance" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Birth Date</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $volontaire->date_naissance ? $volontaire->date_naissance->format('Y-m-d') : '') }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('date_naissance')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ID Number -->
                <div>
                    <label for="identite" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">ID Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <input type="text" name="identite" id="identite" value="{{ old('identite', $volontaire->identite) }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('identite')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email', $volontaire->email) }}" required class="w-full pl-10 has-icon">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="telephone" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Phone</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $volontaire->telephone) }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('telephone')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Country -->
                <div>
                    <label for="pays" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Country</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="text" name="pays" id="pays" value="{{ old('pays', $volontaire->pays) }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('pays')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label for="ville" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">City</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" name="ville" id="ville" value="{{ old('ville', $volontaire->ville) }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('ville')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="adresse" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Address</label>
                    <textarea name="adresse" id="adresse" rows="2" class="w-full">{{ old('adresse', $volontaire->adresse) }}</textarea>
                    @error('adresse')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Volunteer City -->
                <div>
                    <label for="ville_volontariat" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Volunteer City</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" name="ville_volontariat" id="ville_volontariat" value="{{ old('ville_volontariat', $volontaire->ville_volontariat) }}" class="w-full pl-10 has-icon">
                    </div>
                    @error('ville_volontariat')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Education Level -->
                <div>
                    <label for="niveau_etudes" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Education Level</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <input type="text" name="niveau_etudes" id="niveau_etudes" value="{{ old('niveau_etudes', $volontaire->niveau_etudes) }}" class="w-full pl-10 has-icon" placeholder="e.g., Bachelor's, Master's, etc.">
                    </div>
                    @error('niveau_etudes')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Languages -->
                <div class="md:col-span-2">
                    <label for="langues" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Languages (comma-separated)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                            </svg>
                        </div>
                        <input type="text" name="langues" id="langues" value="{{ old('langues', is_array($volontaire->langues) ? implode(', ', $volontaire->langues) : $volontaire->langues) }}" class="w-full pl-10 has-icon" placeholder="e.g., Arabic, French, English">
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Enter languages separated by commas</p>
                    @error('langues')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Skills -->
                <div class="md:col-span-2">
                    <label for="competences" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Skills & Competences</label>
                    <textarea name="competences" id="competences" rows="4" class="w-full">{{ old('competences', $volontaire->competences) }}</textarea>
                    @error('competences')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Availability -->
                <div class="md:col-span-2">
                    <label for="disponibilite" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Availability</label>
                    <textarea name="disponibilite" id="disponibilite" rows="3" class="w-full">{{ old('disponibilite', $volontaire->disponibilite) }}</textarea>
                    @error('disponibilite')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.volontaires.index') }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Volunteer
                </button>
            </div>
        </form>
    </div>
@endsection
