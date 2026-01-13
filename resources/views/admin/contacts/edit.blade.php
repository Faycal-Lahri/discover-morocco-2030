@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Edit Contact Status</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Update the status of this contact message.</p>
    </div>

    <div class="glass-card rounded-2xl p-8 shadow-xl max-w-2xl">
        <form action="{{ route('admin.contacts.update', $contact) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Contact Info (Read-only) -->
            <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                <h3 class="font-bold text-gray-900 dark:text-white mb-2">Contact Information</h3>
                <div class="space-y-1 text-sm">
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Name:</span> {{ $contact->nom_prenom }}</p>
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Email:</span> {{ $contact->email }}</p>
                    <p><span class="font-medium text-gray-600 dark:text-gray-400">Subject:</span> {{ $contact->objet }}</p>
                </div>
            </div>

            <!-- Status Selection -->
            <div x-data="{
                selected: '{{ old('statut', $contact->statut) }}',
                open: false,
                items: [
                    { value: 'non_lu', label: 'Non Lu' },
                    { value: 'en_cours', label: 'En Cours' },
                    { value: 'traite', label: 'Traité' },
                    { value: 'non_valide', label: 'Non Valide' }
                ],
                get label() {
                    const item = this.items.find(i => i.value == this.selected);
                    return item ? item.label : 'Select Status';
                }
            }">
                <label for="statut" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Status *</label>
                <div class="relative">
                    <input type="hidden" name="statut" :value="selected">
                    <button type="button" @click="open = !open" @click.outside="open = false" 
                        class="w-full flex items-center justify-between pl-10 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-primary-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                         class="absolute w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 z-[50] overflow-hidden">
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
                @error('statut')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.contacts.show', $contact) }}" class="px-6 py-3 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors font-medium">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Update Status
                </button>
            </div>
        </form>
    </div>
@endsection
