@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <a href="{{ route('admin.dashboard') }}" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-gray-500">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Activity Log</h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-lg ml-10">Track all platform changes and events.</p>
        </div>
    </div>

    <!-- Filters -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            .flatpickr-calendar {
                border-radius: 16px;
                box-shadow: 0 10px 40px -10px rgba(0,0,0,0.15);
                border: none;
                font-family: 'Plus Jakarta Sans', sans-serif;
                z-index: 9999 !important;
                padding: 10px;
                background: #ffffff;
            }
            .flatpickr-months {
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
                margin-bottom: 10px;
            }
            .flatpickr-prev-month, .flatpickr-next-month {
                position: relative !important;
                top: auto !important;
                height: 28px;
                width: 28px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0;
            }
            .flatpickr-prev-month:hover, .flatpickr-next-month:hover {
                background: #f3f4f6;
            }
            .flatpickr-current-month {
                position: static !important;
                width: auto !important;
                left: auto !important;
                display: flex !important;
                align-items: center;
                justify-content: center;
                padding: 0;
                height: auto;
                transform: none !important;
            }
            .flatpickr-current-month .flatpickr-monthDropdown-months {
                font-weight: 700;
                font-size: 15px;
                padding: 0;
                margin-right: 6px;
                background: transparent;
                border: none;
                appearance: none;
                -moz-appearance: none;
                -webkit-appearance: none;
            }
            .flatpickr-current-month .numInputWrapper {
                width: 55px;
                display: inline-block;
            }
            .flatpickr-current-month input.cur-year {
                font-weight: 700;
                font-size: 15px;
                padding: 0;
                margin: 0;
                height: auto;
                display: inline-block;
            }
            
            /* Black Selected State */
            .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
                background: #000 !important;
                border-color: #000 !important;
            }
        </style>
        
        <form id="filter-form" action="{{ route('admin.activities.index') }}" method="GET" class="glass-card rounded-full p-2 flex items-center bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 shadow-lg w-fit">
            
            <!-- Custom Date Picker -->
            <div class="relative w-64 flex items-center pl-6 group">
                <svg class="w-5 h-5 text-gray-900 dark:text-white mr-3 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <input type="text" id="datePicker" placeholder="Select Date" class="w-full bg-transparent border-none p-2 text-sm focus:ring-0 text-gray-900 dark:text-white font-medium placeholder-gray-500 dark:placeholder-gray-400 cursor-pointer" readonly>
                <input type="hidden" id="hiddenDate" name="date" value="{{ request('date') }}">
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4"></div>

            <!-- Custom Alpine Dropdown for Action -->
            <div class="relative min-w-[140px]" x-data="{ open: false, action: '{{ request('action') }}' }" @click.outside="open = false">
                <button type="button" @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-gray-900 dark:text-white bg-transparent focus:outline-none group">
                    <span x-text="['created', 'updated', 'deleted'].includes(action) ? action.charAt(0).toUpperCase() + action.slice(1) : 'All Actions'">All Actions</span>
                    <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-gray-500 dark:text-gray-400" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <input type="hidden" name="action" :value="action">

                <!-- Dropdown Menu -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                     class="absolute left-0 mt-3 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 z-[100] overflow-hidden text-left origin-top-left">
                    
                    <div class="py-1">
                        <div @click="action = ''; open = false; $nextTick(() => document.getElementById('filter-form').submit())" 
                             class="px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer transition-colors font-medium flex items-center">
                             <span class="w-2 h-2 rounded-full bg-gray-300 mr-2"></span>
                             All Actions
                        </div>
                        <div @click="action = 'created'; open = false; $nextTick(() => document.getElementById('filter-form').submit())" 
                             class="px-4 py-2.5 text-sm text-green-600 hover:bg-green-50 dark:hover:bg-green-900/20 cursor-pointer transition-colors font-medium flex items-center">
                             <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                             Created
                        </div>
                        <div @click="action = 'updated'; open = false; $nextTick(() => document.getElementById('filter-form').submit())" 
                             class="px-4 py-2.5 text-sm text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 cursor-pointer transition-colors font-medium flex items-center">
                             <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
                             Updated
                        </div>
                        <div @click="action = 'deleted'; open = false; $nextTick(() => document.getElementById('filter-form').submit())" 
                             class="px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 cursor-pointer transition-colors font-medium flex items-center">
                             <span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>
                             Deleted
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-gray-300 dark:bg-gray-700 mx-4"></div>

            <button type="submit" class="px-6 py-2 bg-black dark:bg-white text-white dark:text-black hover:bg-gray-800 dark:hover:bg-gray-200 rounded-full text-xs font-bold uppercase transition-transform transform hover:scale-105 shadow-md">
                Filter
            </button>

            @if(request('date') || request('action'))
                <a href="{{ route('admin.activities.index') }}" class="ml-2 p-2 text-gray-400 hover:text-red-500 transition-colors" title="Clear Filters">
                     <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </a>
            @endif
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('#datePicker', {
                dateFormat: 'Y-m-d',
                defaultDate: '{{ request('date') }}',
                theme: 'airbnb',
                disableMobile: true,
                onChange: function(selectedDates, dateStr, instance) {
                    document.getElementById('hiddenDate').value = dateStr;
                    document.getElementById('filter-form').submit();
                }
            });
        });
    </script>

    <!-- Activity List -->
    <div class="glass-card rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700">
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($activities as $activity)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors group">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-bold uppercase tracking-wide {{ $activity->badge_color }}">
                                @if($activity->icon == 'plus')
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                @elseif($activity->icon == 'pencil')
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                @elseif($activity->icon == 'trash')
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                @else
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @endif
                                {{ $activity->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity->description }}</p>
                            @if($activity->properties)
                                <div class="mt-1 text-xs text-gray-500 overflow-hidden text-ellipsis max-w-md">
                                    {{ Str::limit(json_encode($activity->properties), 100) }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                             <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-xs font-bold text-gray-500 dark:text-gray-400">
                                    {{ $activity->causer ? substr($activity->causer->name, 0, 1) : 'S' }}
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity->causer ? $activity->causer->name : 'System' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $activity->created_at->format('M d, Y H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            No activities found matching your filters.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($activities->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/50">
            {{ $activities->withQueryString()->links() }}
        </div>
        @endif
    </div>
@endsection
