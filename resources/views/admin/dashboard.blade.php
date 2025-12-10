@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 no-print">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Dashboard</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Overview of Morocco 2030 platform.</p>
        </div>
        <button onclick="openReportModal()" class="btn-primary shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
             Download Report 
        </button>
    </div>

    <!-- Report Preview Modal -->
    <div id="reportModal" class="fixed inset-0 z-[9999] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" onclick="closeReportModal()"></div>

        <!-- Centered Container -->
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <!-- Modal Panel -->
            <div class="bg-white dark:bg-gray-800 w-full max-w-3xl rounded-2xl shadow-2xl flex flex-col max-h-[90vh] relative z-10 animate-scale-in">
                
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between flex-shrink-0 bg-white dark:bg-gray-800 rounded-t-2xl">
                    <div>
                        <h3 class="text-lg font-display font-bold text-gray-900 dark:text-white">
                            Official Report Preview
                        </h3>
                    </div>
                    <button onclick="closeReportModal()" type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="flex-1 overflow-hidden relative bg-gray-50 dark:bg-gray-900">
                    <iframe id="reportFrame" src="" class="w-full h-full border-0" frameborder="0" style="min-height: 500px;"></iframe>
                    
                    <!-- Loading State -->
                    <div id="loadingReport" class="absolute inset-0 flex items-center justify-center bg-gray-50 dark:bg-gray-900 z-10 hover:cursor-wait">
                        <div class="flex flex-col items-center">
                            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-red-800 mb-3"></div>
                            <span class="text-gray-500 text-xs font-bold tracking-widest uppercase">Generating PDF</span>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-b-2xl flex-shrink-0 flex justify-end gap-3">
                    <button type="button" onclick="closeReportModal()" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Cancel
                    </button>
                    <a href="{{ route('admin.report.generate', ['download' => 'true']) }}" class="px-4 py-2 rounded-xl bg-red-900 text-sm font-bold text-white hover:bg-red-800 shadow-md transition-all flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Report
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openReportModal() {
            const modal = document.getElementById('reportModal');
            const frame = document.getElementById('reportFrame');
            const loader = document.getElementById('loadingReport');
            
            // Show modal
            modal.classList.remove('hidden');
            
            // Set source if not already set or refresh
            // Cache bust to ensure fresh data
            frame.src = "{{ route('admin.report.generate') }}?t=" + new Date().getTime();
            
            // Handle loading state
            loader.classList.remove('hidden');
            frame.onload = function() {
                loader.classList.add('hidden');
            };
        }

        function closeReportModal() {
            const modal = document.getElementById('reportModal');
            const frame = document.getElementById('reportFrame');
            
            modal.classList.add('hidden');
            frame.src = 'about:blank';
        }
    </script>

    <!-- Print-friendly PDF Report -->
    <div class="hidden print-only">
        @php
            $contentTotal = max($stats['cities'] + $stats['destinations'], 1);
            $engagementTotal = $stats['volontaires'] + $stats['contacts'] + $stats['commentaires'] + $stats['newsletters'];
            $cityPercent = round(($stats['cities'] / $contentTotal) * 100, 1);
            $destPercent = round(($stats['destinations'] / $contentTotal) * 100, 1);

            $channels = [
                'Volunteers' => $stats['volontaires'],
                'Contacts' => $stats['contacts'],
                'Comments' => $stats['commentaires'],
                'Subscribers' => $stats['newsletters'],
            ];
            arsort($channels);
            $topChannel = array_key_first($channels);
            $topChannelValue = $channels[$topChannel];
        @endphp

        <style>
            @page { size: A4; margin: 0; }
            .print-page { page-break-after: always; padding: 2.5cm 2cm 2cm 2cm; min-height: 29.7cm; background: white; color: #111827; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
            .print-page:last-child { page-break-after: auto; }
            .cover {
                background: linear-gradient(135deg, #991b1b 0%, #111827 100%);
                color: white;
                padding: 2.5rem;
                margin: -2.5cm -2cm 2rem -2cm;
                border-bottom: 6px solid #f59e0b;
            }
            .cover h1 { font-size: 2.4rem; margin: 0; letter-spacing: 0.04em; }
            .cover p { margin: 0.35rem 0; font-size: 0.95rem; opacity: 0.9; }
            .pill { display: inline-block; padding: 0.35rem 0.75rem; background: rgba(255,255,255,0.14); border: 1px solid rgba(255,255,255,0.18); border-radius: 999px; font-size: 0.8rem; margin-top: 0.75rem; }
            .section-title { font-size: 1.1rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em; margin: 0 0 0.75rem 0; color: #991b1b; }
            .lead { font-size: 0.95rem; line-height: 1.6; color: #1f2937; margin-bottom: 1.25rem; }
            .kpi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin: 1rem 0 1.75rem 0; }
            .kpi-card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 1rem; background: #f9fafb; }
            .kpi-label { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280; margin-bottom: 0.35rem; }
            .kpi-value { font-size: 1.8rem; font-weight: 800; color: #991b1b; }
            .kpi-note { font-size: 0.8rem; color: #374151; margin-top: 0.35rem; }
            .bar-row { display: flex; align-items: center; gap: 0.5rem; margin: 0.35rem 0; }
            .bar-label { width: 42%; font-weight: 600; font-size: 0.85rem; color: #111827; }
            .bar-track { flex: 1; height: 14px; background: #e5e7eb; border-radius: 999px; overflow: hidden; }
            .bar-fill { height: 100%; background: linear-gradient(90deg, #991b1b, #f59e0b); }
            .bar-value { width: 48px; text-align: right; font-size: 0.85rem; color: #111827; }
            .card { border: 1px solid #e5e7eb; border-radius: 12px; padding: 1.25rem; background: white; margin-bottom: 1.25rem; }
            .two-col { display: grid; grid-template-columns: 1.2fr 1fr; gap: 1rem; }
            .list { margin: 0.5rem 0 0 0; padding-left: 1.1rem; color: #1f2937; }
            .list li { margin: 0.25rem 0; }
            .table { width: 100%; border-collapse: collapse; margin-top: 0.75rem; font-size: 0.85rem; }
            .table th { text-align: left; padding: 0.5rem; background: #991b1b; color: white; letter-spacing: 0.03em; font-size: 0.78rem; }
            .table td { padding: 0.45rem 0.5rem; border-bottom: 1px solid #e5e7eb; color: #111827; }
            .muted { color: #6b7280; font-size: 0.83rem; }
            .tag { display: inline-block; padding: 0.25rem 0.6rem; border-radius: 8px; background: #ecfeff; color: #0ea5e9; font-weight: 700; font-size: 0.78rem; letter-spacing: 0.02em; }
            .footer { text-align: center; margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #e5e7eb; font-size: 0.78rem; color: #6b7280; }
        </style>

        <!-- Page 1: Cover + Executive Summary -->
        <div class="print-page">
            <div class="cover">
                <h1>Morocco 2030 — Performance Report</h1>
                <p>FIFA World Cup Edition · Generated {{ now()->format('F d, Y \\a\\t H:i') }}</p>
                <p class="pill">Reporting window: Last 30 days</p>
            </div>

            <h3 class="section-title">Executive Summary</h3>
            <p class="lead">
                The platform now carries <strong>{{ $stats['cities'] }}</strong> host cities and <strong>{{ $stats['destinations'] }}</strong> curated destinations,
                combining for <strong>{{ $contentTotal }}</strong> content items. Community engagement totals <strong>{{ $engagementTotal }}</strong> interactions,
                led by <strong>{{ $topChannel }}</strong> ({{ $topChannelValue }}). Coverage skews {{ $cityPercent }}% toward cities and
                {{ $destPercent }}% toward destinations, indicating balanced storytelling across host locations and attractions.
            </p>

            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-label">Content Footprint</div>
                    <div class="kpi-value">{{ $contentTotal }}</div>
                    <div class="kpi-note">Cities: {{ $stats['cities'] }} · Destinations: {{ $stats['destinations'] }}</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Engagement Volume</div>
                    <div class="kpi-value">{{ $engagementTotal }}</div>
                    <div class="kpi-note">Volunteers, contacts, comments, subscribers combined</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Top Channel</div>
                    <div class="kpi-value">{{ $topChannelValue }}</div>
                    <div class="kpi-note">{{ $topChannel }} lead current engagement mix</div>
                </div>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Content Coverage</div>
                <div class="bar-row">
                    <div class="bar-label">Host Cities</div>
                    <div class="bar-track"><div class="bar-fill" style="width: {{ $cityPercent }}%;"></div></div>
                    <div class="bar-value">{{ $cityPercent }}%</div>
                </div>
                <div class="bar-row">
                    <div class="bar-label">Tourist Destinations</div>
                    <div class="bar-track"><div class="bar-fill" style="width: {{ $destPercent }}%; background: linear-gradient(90deg,#0ea5e9,#22c55e);"></div></div>
                    <div class="bar-value">{{ $destPercent }}%</div>
                </div>
                <p class="lead" style="margin-top: 0.75rem;">
                    City-led stories remain the core of the experience, while destination content closes the gap. Maintaining this mix keeps both
                    host-city readiness and cultural discovery visible to visitors.
                </p>
            </div>
        </div>

        <!-- Page 2: Engagement & Narrative -->
        <div class="print-page">
            <h3 class="section-title">Engagement Narrative</h3>
            <div class="two-col">
                <div class="card">
                    <p class="lead" style="margin-bottom: 0.8rem;">
                        Engagement is paced by <strong>{{ $topChannel }}</strong>, indicating strong interest through that channel. Contacts and comments
                        provide a healthy feedback loop, while newsletter subscribers form a nurture pool for future volunteer conversion.
                    </p>
                    <ul class="list">
                        <li><strong>Volunteers:</strong> {{ $stats['volontaires'] }} applications; keep the onboarding flow short and clear.</li>
                        <li><strong>Contacts:</strong> {{ $stats['contacts'] }} inquiries; add quick-response templates for faster follow-up.</li>
                        <li><strong>Comments:</strong> {{ $stats['commentaires'] }} community inputs; highlight top comments on destination pages.</li>
                        <li><strong>Subscribers:</strong> {{ $stats['newsletters'] }} readers; schedule a weekly “Road to 2030” digest.</li>
                    </ul>
                </div>
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Channel</th>
                                <th>Count</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Volunteers</td><td>{{ $stats['volontaires'] }}</td><td>Operational workforce</td></tr>
                            <tr><td>Contacts</td><td>{{ $stats['contacts'] }}</td><td>Service & partnerships</td></tr>
                            <tr><td>Comments</td><td>{{ $stats['commentaires'] }}</td><td>On-page signal</td></tr>
                            <tr><td>Subscribers</td><td>{{ $stats['newsletters'] }}</td><td>Nurture & re-engage</td></tr>
                            <tr><td><strong>Total</strong></td><td><strong>{{ $engagementTotal }}</strong></td><td><span class="tag">Healthy</span></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Platform Momentum</div>
                <p class="lead" style="margin-bottom: 0.4rem;">
                    The platform’s momentum is anchored by consistent content growth and multi-channel engagement. Converting high-intent
                    channels ({{ $topChannel }}) into deeper actions (volunteering and city discovery) should be prioritized.
                </p>
                <ul class="list">
                    <li>Pair new destination drops with a “nearby city” call-to-action to cross-pollinate traffic.</li>
                    <li>Use subscribers as a retargeting audience for volunteer drives and host-city updates.</li>
                    <li>Keep a weekly cadence of destination highlights to balance the {{ $cityPercent }}% city focus.</li>
                </ul>
            </div>

            <div class="card">
                <div class="section-title" style="margin-bottom: 0.5rem;">Recent Activity Snapshot</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>When</th>
                            <th>Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_activities->take(5) as $activity)
                            <tr>
                                <td>{{ $activity->created_at->format('M d, H:i') }}</td>
                                <td>{{ $activity->message }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="2" class="muted">No recent activity logged.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="footer">
                Morocco 2030 Platform · Confidential — {{ now()->year }} · Generated {{ now()->format('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>

    <!-- Screen View (Dashboard) -->
    <div class="screen-only">
        <!-- Stats Grid -->
        <!-- Stats Grid (Redesigned) -->
        <!-- Stats Grid (Simple & Premium) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
            <!-- Cities -->
            <a href="{{ route('admin.cities.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M19 2H5C3.89543 2 3 2.89543 3 4V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V4C21 2.89543 20.1046 2 19 2ZM11 20H5V4H11V20ZM19 20H13V4H19V20Z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Cities</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['cities'] }}">0</h3>
                </div>
            </a>

            <!-- Destinations -->
            <a href="{{ route('admin.destinations.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Destinations</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['destinations'] }}">0</h3>
                </div>
            </a>

            <!-- Volunteers -->
            <a href="{{ route('admin.volontaires.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                     <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Volunteers</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['volontaires'] }}">0</h3>
                </div>
            </a>

            <!-- Comments -->
            <a href="{{ route('admin.commentaires.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Comments</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['commentaires'] }}">0</h3>
                </div>
            </a>

            <!-- Contacts -->
            <a href="{{ route('admin.contacts.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Contacts</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['contacts'] }}">0</h3>
                </div>
            </a>

            <!-- Newsletters -->
            <a href="{{ route('admin.newsletters.index') }}" class="glass-card relative overflow-hidden rounded-2xl p-6 group block">
                <div class="card-icon-bg text-gray-900 dark:text-white">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"></path></svg>
                </div>
                <div class="relative z-10">
                    <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">Subscribers</p>
                    <h3 class="text-3xl font-extrabold text-gray-900 dark:text-white counter-number" data-target="{{ $stats['newsletters'] }}">0</h3>
                </div>
            </a>
        </div>

        <!-- New Charts Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Top Cities Chart -->
            <div class="glass-card rounded-2xl p-6 md:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Top Hosting Cities</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Cities with the most destinations</p>
                    </div>
                    <div class="p-2 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg">
                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    </div>
                </div>
                <div style="height: 300px;">
                    <canvas id="topCitiesChart"></canvas>
                </div>
            </div>

            <!-- Contact Status Chart -->
            <div class="glass-card rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Inbox Status</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Message response tracking</p>
                    </div>
                    <div class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    </div>
                </div>
                <div class="flex items-center justify-center" style="height: 300px;">
                    <canvas id="contactStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Charts / Visuals -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Content Distribution Pie Chart -->
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Content Distribution</h3>
                <div class="flex items-center justify-center" style="height: 280px;">
                    <canvas id="contentPieChart"></canvas>
                </div>
            </div>

            <!-- Engagement Bar Chart -->
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Community Engagement</h3>
                <div style="height: 280px;">
                    <canvas id="engagementBarChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Two Charts Side by Side - Content & Community -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
            <!-- Content Activity Chart -->
            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Content Activity</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Last 5 days - Cities and destinations added</p>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xs font-medium text-gray-600 dark:text-gray-400">Updated {{ now()->format('H:i') }}</span>
                    </div>
                </div>
                <div style="height: 450px;">
                    <canvas id="contentActivityChart"></canvas>
                </div>
            </div>

            <!-- Community Engagement Chart -->
            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Community Engagement</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Last 5 days - Community interactions and signups</p>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-xs font-medium text-gray-600 dark:text-gray-400">Updated {{ now()->format('H:i') }}</span>
                    </div>
                </div>
                <div style="height: 450px;">
                    <canvas id="communityEngagementChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity Feed (Limited to 5) -->
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Track platform changes</p>
                </div>
                <a href="{{ route('admin.activities.index') }}" class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 text-xs font-bold uppercase tracking-wide transition-colors flex items-center gap-2">
                    See All Activities
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
            <div class="space-y-4">
                @forelse($recent_activities->take(5) as $activity)
                    <div class="flex items-start space-x-4 pb-4 border-b border-gray-100 dark:border-gray-800 last:border-0 last:pb-0 group">
                        <div class="h-10 w-10 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center shrink-0 group-hover:bg-primary-100 dark:group-hover:bg-primary-900/30 transition-colors">
                            @if($activity->type == 'City')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            @elseif($activity->type == 'Destination')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            @elseif($activity->type == 'Contact')
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            @else
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $activity->message }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400 py-8">No recent activity.</p>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        /* Modern Animations */
        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fade-in-delay {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        @keyframes floating-orb {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(10px, -10px) rotate(120deg);
            }
            66% {
                transform: translate(-5px, 5px) rotate(240deg);
            }
        }
        
        @keyframes morph {
            0%, 100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
            50% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }
        }
        
        @keyframes glow-pulse {
            0%, 100% {
                box-shadow: 0 0 20px rgba(153, 27, 27, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(153, 27, 27, 0.6);
            }
        }
        
        @keyframes stat-card-enter {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .animate-slide-in {
            animation: slide-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .animate-fade-in-delay {
            animation: fade-in-delay 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }
        
        .floating-orb {
            animation: floating-orb 8s ease-in-out infinite;
        }
        
        .stat-card {
            animation: stat-card-enter 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .stat-card:hover .floating-orb {
            animation: morph 4s ease-in-out infinite, floating-orb 8s ease-in-out infinite;
        }
        
        .progress-bar {
            transition: width 1.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Glassmorphism enhanced */
        .glass-card {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .dark .glass-card {
            background: rgba(17, 24, 39, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(153, 27, 27, 0.1);
            border-color: rgba(153, 27, 27, 0.2);
        }

        .dark .glass-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
            border-color: rgba(220, 38, 38, 0.3);
            background: rgba(17, 24, 39, 0.8);
        }
        
        /* Chart specific improvements */
        canvas {
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.05));
        }
        .dark canvas {
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));
        }

        /* Card Icon decoration */
        .card-icon-bg {
            position: absolute;
            right: -10px;
            bottom: -10px;
            opacity: 0.05;
            transition: all 0.5s ease;
            transform: rotate(-10deg) scale(1.5);
        }
        .glass-card:hover .card-icon-bg {
            opacity: 0.1;
            transform: rotate(0deg) scale(1.8);
            right: 10px;
            bottom: 10px;
        }
        .dark .card-icon-bg {
            opacity: 0.05;
            color: white;
        }

        @media print {
            .no-print, .screen-only { display: none !important; }
            .print-only { display: block !important; }
            body { background: white; color: black; }
        }
        @media screen {
            .print-only { display: none; }
            .screen-only { display: block; }
        }
    </style>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animated Counter for Stats Numbers
            const counters = document.querySelectorAll('.counter-number');
            
            const animateCounter = (element, target, duration = 2000) => {
                const start = 0;
                const startTime = performance.now();
                
                const updateCounter = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    
                    // Easing function for smooth animation
                    const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                    const current = Math.floor(start + (target - start) * easeOutQuart);
                    
                    element.textContent = current.toLocaleString();
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        element.textContent = target.toLocaleString();
                    }
                };
                
                requestAnimationFrame(updateCounter);
            };
            
            // Animate each counter with a slight delay for staggered effect
            counters.forEach((counter, index) => {
                const target = parseInt(counter.getAttribute('data-target')) || 0;
                setTimeout(() => {
                    animateCounter(counter, target, 2000);
                }, index * 150);
            });
            
            const isDark = document.documentElement.classList.contains('dark') || localStorage.getItem('darkMode') === 'true';
            
            // Dynamic colors based on theme
            const textColor = isDark ? '#f3f4f6' : '#374151';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
            const axisColor = isDark ? '#9ca3af' : '#6b7280';
            const tooltipBg = isDark ? 'rgba(17, 24, 39, 0.95)' : 'rgba(255, 255, 255, 0.95)';
            const tooltipBorder = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';
            
            // Morocco Colors
            const moroccoRed = '#991b1b';
            const moroccoRedLight = '#dc2626'; // Brighter red for charts
            const moroccoGrey = '#4b5563';
            const moroccoGreyLight = '#9ca3af';
            const moroccoWhite = '#ffffff';
            
            // Chart fill colors
            const fillOpacity = isDark ? '40' : '20'; // Hex opacity
            
            // Common Chart Options
            const commonOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: textColor,
                            font: { family: "'Inter', sans-serif", size: 12, weight: 600 },
                            usePointStyle: true,
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        backgroundColor: tooltipBg,
                        titleColor: textColor,
                        bodyColor: textColor,
                        borderColor: tooltipBorder,
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: { family: "'Inter', sans-serif", size: 13, weight: 600 },
                        bodyFont: { family: "'Inter', sans-serif", size: 12 },
                        displayColors: true,
                        boxPadding: 4,
                        callbacks: {
                            labelColor: function(context) {
                                return {
                                    borderColor: context.dataset.borderColor,
                                    backgroundColor: context.dataset.backgroundColor,
                                    borderWidth: 2,
                                    borderRadius: 2,
                                };
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        grid: { color: gridColor, drawBorder: false },
                        ticks: { color: axisColor, font: { size: 11 } },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: axisColor, font: { size: 11, weight: 600 } },
                        border: { display: false }
                    }
                }
            };
            
            // Content Distribution Pie Chart
            const pieCtx = document.getElementById('contentPieChart');
            if (pieCtx) {
                new Chart(pieCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Cities', 'Destinations'],
                        datasets: [{
                            data: [{{ $stats['cities'] }}, {{ $stats['destinations'] }}],
                            backgroundColor: [moroccoRedLight, moroccoGreyLight],
                            borderColor: isDark ? '#1f2937' : '#ffffff',
                            borderWidth: 2,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        ...commonOptions,
                        plugins: {
                            ...commonOptions.plugins,
                            tooltip: {
                                ...commonOptions.plugins.tooltip,
                                callbacks: {
                                    label: function(context) {
                                        const total = {{ $stats['cities'] + $stats['destinations'] }};
                                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        },
                        scales: { x: { display: false }, y: { display: false } }
                    }
                });
            }
            
            // Community Engagement Bar Chart
            const barCtx = document.getElementById('engagementBarChart');
            if (barCtx) {
                new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Volunteers', 'Contacts', 'Comments', 'Subscribers'],
                        datasets: [{
                            label: 'Total Count',
                            data: [
                                {{ $stats['volontaires'] }},
                                {{ $stats['contacts'] }},
                                {{ $stats['commentaires'] }},
                                {{ $stats['newsletters'] }}
                            ],
                            backgroundColor: [moroccoRedLight, moroccoGreyLight, '#3b82f6', '#10b981'],
                            borderColor: [moroccoRedLight, moroccoGreyLight, '#3b82f6', '#10b981'],
                            borderWidth: 0,
                            borderRadius: 4,
                            barPercentage: 0.6
                        }]
                    },
                    options: {
                       ...commonOptions,
                       plugins: {
                           ...commonOptions.plugins,
                           legend: { display: false }
                       }
                    }
                });
            }
            
            // Content Activity Chart - Minimalist Design
            const contentCtx = document.getElementById('contentActivityChart');
            if (contentCtx) {
                const activityLabels = @json($activityData['labels'] ?? []);
                const citiesData = @json($activityData['content']['cities'] ?? []);
                const destinationsData = @json($activityData['content']['destinations'] ?? []);
                
                new Chart(contentCtx, {
                    type: 'line',
                    data: {
                        labels: activityLabels,
                        datasets: [
                            {
                                label: 'Cities',
                                data: citiesData,
                                borderColor: isDark ? '#dc2626' : '#991b1b',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: isDark ? '#dc2626' : '#991b1b',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            },
                            {
                                label: 'Destinations',
                                data: destinationsData,
                                borderColor: isDark ? '#f59e0b' : '#d97706',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: isDark ? '#f59e0b' : '#d97706',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'end',
                                labels: {
                                    color: textColor,
                                    font: { family: "'Inter', sans-serif", size: 11, weight: 500 },
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    boxWidth: 6,
                                    boxHeight: 6,
                                    padding: 15
                                }
                            },
                            tooltip: {
                                enabled: true,
                                backgroundColor: isDark ? 'rgba(15, 23, 42, 0.95)' : 'rgba(255, 255, 255, 0.95)',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)',
                                borderWidth: 1,
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: { family: "'Inter', sans-serif", size: 12, weight: 600 },
                                bodyFont: { family: "'Inter', sans-serif", size: 11, weight: 400 },
                                displayColors: true,
                                boxPadding: 6,
                                intersect: false,
                                mode: 'index',
                                callbacks: {
                                    title: function(context) {
                                        return context[0].label;
                                    },
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y + ' added';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { 
                                    color: isDark ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.04)', 
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                ticks: { 
                                    color: isDark ? '#9ca3af' : '#6b7280', 
                                    font: { size: 10, weight: 400 },
                                    padding: 8,
                                    precision: 0
                                },
                                border: { display: false }
                            },
                            x: {
                                grid: { display: false, drawBorder: false },
                                ticks: { 
                                    color: isDark ? '#9ca3af' : '#6b7280', 
                                    font: { size: 10, weight: 500 },
                                    padding: 8
                                },
                                border: { display: false }
                            }
                        },
                        layout: {
                            padding: { top: 10, right: 10, bottom: 10, left: 10 }
                        }
                    }
                });
            }

            // Community Engagement Chart - Minimalist Design
            const communityCtx = document.getElementById('communityEngagementChart');
            if (communityCtx) {
                const activityLabels = @json($activityData['labels'] ?? []);
                const volontairesData = @json($activityData['community']['volontaires'] ?? []);
                const contactsData = @json($activityData['community']['contacts'] ?? []);
                const commentairesData = @json($activityData['community']['commentaires'] ?? []);
                const newslettersData = @json($activityData['community']['newsletters'] ?? []);
                
                // Debug: Check if we have subscribers data
                console.log('Subscribers Data:', newslettersData);
                console.log('Volunteers Data:', volontairesData);
                console.log('Contacts Data:', contactsData);
                console.log('Comments Data:', commentairesData);
                
                new Chart(communityCtx, {
                    type: 'line',
                    data: {
                        labels: activityLabels,
                        datasets: [
                            {
                                label: 'Volunteers',
                                data: volontairesData,
                                borderColor: '#8b5cf6',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: '#8b5cf6',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            },
                            {
                                label: 'Contacts',
                                data: contactsData,
                                borderColor: '#3b82f6',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: '#3b82f6',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            },
                            {
                                label: 'Comments',
                                data: commentairesData,
                                borderColor: '#10b981',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: '#10b981',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            },
                            {
                                label: 'Subscribers',
                                data: newslettersData,
                                borderColor: '#f59e0b',
                                backgroundColor: 'transparent',
                                borderWidth: 2,
                                fill: false,
                                tension: 0.3,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                                pointBorderColor: '#f59e0b',
                                pointBackgroundColor: isDark ? '#1f2937' : '#ffffff',
                                pointBorderWidth: 2,
                                pointHoverBorderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'end',
                                labels: {
                                    color: textColor,
                                    font: { family: "'Inter', sans-serif", size: 11, weight: 500 },
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    boxWidth: 6,
                                    boxHeight: 6,
                                    padding: 15
                                }
                            },
                            tooltip: {
                                enabled: true,
                                backgroundColor: isDark ? 'rgba(15, 23, 42, 0.95)' : 'rgba(255, 255, 255, 0.95)',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)',
                                borderWidth: 1,
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: { family: "'Inter', sans-serif", size: 12, weight: 600 },
                                bodyFont: { family: "'Inter', sans-serif", size: 11, weight: 400 },
                                displayColors: true,
                                boxPadding: 6,
                                intersect: false,
                                mode: 'index',
                                callbacks: {
                                    title: function(context) {
                                        return context[0].label;
                                    },
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y + ' new';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { 
                                    color: isDark ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.04)', 
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                ticks: { 
                                    color: isDark ? '#9ca3af' : '#6b7280', 
                                    font: { size: 10, weight: 400 },
                                    padding: 8,
                                    precision: 0
                                },
                                border: { display: false }
                            },
                            x: {
                                grid: { display: false, drawBorder: false },
                                ticks: { 
                                    color: isDark ? '#9ca3af' : '#6b7280', 
                                    font: { size: 10, weight: 500 },
                                    padding: 8
                                },
                                border: { display: false }
                            }
                        },
                        layout: {
                            padding: { top: 10, right: 10, bottom: 10, left: 10 }
                        }
                    }
                });
            }

            // Top Cities Horizontal Bar Chart
            const citiesCtx = document.getElementById('topCitiesChart');
            if (citiesCtx) {
                const topCities = @json($topCitiesData);
                
                // Check if we have data, otherwise standard fallback
                const cityLabels = topCities.labels && topCities.labels.length ? topCities.labels : ['No Data'];
                const cityData = topCities.data && topCities.data.length ? topCities.data : [0];

                new Chart(citiesCtx, {
                    type: 'bar', // 'bar' type with indexAxis 'y' creates horizontal bar
                    data: {
                        labels: cityLabels,
                        datasets: [{
                            label: 'Destinations',
                            data: cityData,
                            backgroundColor: moroccoRedLight + fillOpacity,
                            borderColor: moroccoRedLight,
                            borderWidth: 2,
                            borderRadius: 4,
                            barPercentage: 0.6
                        }]
                    },
                    options: {
                        indexAxis: 'y', // CRITICAL: This flips the axes to make it horizontal
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: tooltipBg,
                                titleColor: textColor,
                                bodyColor: textColor,
                                titleFont: { family: "'Inter', sans-serif", size: 13, weight: 600 },
                                bodyFont: { family: "'Inter', sans-serif", size: 12 },
                                padding: 10,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        scales: {
                            x: {
                                grid: { color: gridColor, drawBorder: false },
                                ticks: { color: axisColor, font: { size: 10 } },
                                border: { display: false }, 
                                beginAtZero: true
                            },
                            y: {
                                grid: { display: false },
                                ticks: { color: textColor, font: { size: 11, weight: 600 } },
                                border: { display: false }
                            }
                        }
                    }
                });
            }

            // Contact Status Doughnut Chart
            const contactCtx = document.getElementById('contactStatusChart');
            if (contactCtx) {
                const contactData = @json($contactStatusData);
                
                new Chart(contactCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Processed', 'In Progress', 'Unread'],
                        datasets: [{
                            data: [contactData.traite, contactData.en_cours, contactData.non_lu],
                            backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                            borderColor: isDark ? '#1f2937' : '#ffffff',
                            borderWidth: 2,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        ...commonOptions,
                        cutout: '75%',
                        plugins: {
                            ...commonOptions.plugins,
                            legend: {
                                ...commonOptions.plugins.legend,
                                position: 'right'
                            }
                        },
                        scales: { x: { display: false }, y: { display: false } }
                    }
                });
            }

        });
    </script>
@endsection
