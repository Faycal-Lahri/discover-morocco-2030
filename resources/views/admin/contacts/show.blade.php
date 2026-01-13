@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white">Message Details</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1">View and manage contact message.</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
            Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Message Content -->
        <div class="lg:col-span-2 glass-card rounded-2xl p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ $contact->objet }}</h3>
            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                {!! nl2br(e($contact->message)) !!}
            </div>
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-gray-400">
                Sent on {{ $contact->created_at->format('F d, Y \a\t H:i') }}
            </div>
        </div>

        @if($contact->response)
        <!-- Workflow Response -->
        <div class="lg:col-span-2 glass-card rounded-2xl p-6 mt-6 border-l-4 border-primary-500">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Workflow Response</h3>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400">
                    {{ $contact->response->response_date ? \Carbon\Carbon::parse($contact->response->response_date)->format('F d, Y \a\t H:i') : 'Date N/A' }}
                </span>
            </div>
            
            @if($contact->response->objet)
            <div class="mb-3">
                <span class="text-xs uppercase tracking-wide text-gray-400 font-bold">Subject</span>
                <p class="font-medium text-gray-800 dark:text-gray-200">{{ $contact->response->objet }}</p>
            </div>
            @endif

            <div>
                <span class="text-xs uppercase tracking-wide text-gray-400 font-bold">Response</span>
                <div class="mt-2 prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-900/50 p-4 rounded-xl">
                    {!! nl2br(e($contact->response->response)) !!}
                </div>
            </div>
        </div>
        @endif

        <!-- Sender Info & Actions -->
        <div class="space-y-6">
            <div class="glass-card rounded-2xl p-6">
                <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Sender Information</h4>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs text-gray-400">Name</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->nom_prenom }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400">Email</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400">Phone</label>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->telephone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">Status</h4>
                <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" x-data="{ 
                    selected: '{{ $contact->statut }}',
                    open: false, 
                    labels: {
                        'non_lu': 'Non Lu',
                        'en_cours': 'En Cours',
                        'traite': 'Traité',
                        'non_valide': 'Non Valide'
                    }
                }">
                    @csrf
                    @method('PUT')
                    <div class="relative">
                        <input type="hidden" name="statut" :value="selected">
                        <button type="button" @click="open = !open" @click.outside="open = false" 
                            class="w-full flex items-center justify-between px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500 transition-all shadow-sm">
                            <span x-text="labels[selected]" class="text-gray-900 dark:text-white"></span>
                            <svg class="w-5 h-5 text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                        <div x-show="open" class="absolute z-10 w-full mt-2 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                            <template x-for="(label, key) in labels" :key="key">
                                <div @click="selected = key; $el.closest('form').submit()" 
                                     class="px-6 py-3.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer font-medium"
                                     x-text="label"></div>
                            </template>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
