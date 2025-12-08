@extends('layouts.admin')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4 no-print">
        <div>
            <h2 class="text-3xl font-display font-bold text-gray-900 dark:text-white tracking-tight">Dashboard</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-lg">Overview of Morocco 2030 platform.</p>
        </div>
        <button onclick="window.print()" class="btn-primary shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download PDF Report
        </button>
    </div>

    <!-- Ultra-Professional Print Report -->
    <div class="hidden print-only">
        <style>
            @page {
                size: A4;
                margin: 0;
            }
            .print-page {
                page-break-after: always;
                padding: 2cm 1.5cm;
                min-height: 29.7cm;
                background: white;
            }
            .print-page:last-child {
                page-break-after: auto;
            }
            .report-header {
                background: #991b1b;
                color: white;
                padding: 2rem 1.5rem;
                margin: -2cm -1.5cm 1.5cm -1.5cm;
                text-align: center;
                border-bottom: 4px solid #6b7280;
            }
            .stat-box {
                border: 1px solid #d1d5db;
                border-radius: 6px;
                padding: 1rem;
                background: #f9fafb;
                position: relative;
                overflow: hidden;
            }
            .stat-box::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 4px;
                height: 100%;
                background: #991b1b;
            }
            .section-title {
                font-size: 1.125rem;
                font-weight: 700;
                color: #991b1b;
                margin-bottom: 1rem;
                padding-bottom: 0.5rem;
                border-bottom: 3px solid #991b1b;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin: 1rem 0;
                font-size: 0.75rem;
                border: 1px solid #d1d5db;
            }
            .data-table thead {
                background: #991b1b;
                color: white;
            }
            .data-table th {
                padding: 0.5rem 0.75rem;
                text-align: left;
                font-weight: 600;
                font-size: 0.7rem;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                border-bottom: 2px solid #6b7280;
            }
            .data-table td {
                padding: 0.5rem 0.75rem;
                border-bottom: 1px solid #e5e7eb;
                font-size: 0.75rem;
                color: #374151;
            }
            .data-table tbody tr:nth-child(even) {
                background: #f9fafb;
            }
            .data-table tbody tr:nth-child(odd) {
                background: white;
            }
            .metric-card {
                background: white;
                border: 2px solid #991b1b;
                border-radius: 6px;
                padding: 0.875rem;
                box-shadow: 0 2px 4px rgba(153, 27, 27, 0.1);
            }
            .metric-value {
                font-size: 1.75rem;
                font-weight: 700;
                color: #991b1b;
                line-height: 1;
            }
            .metric-label {
                font-size: 0.7rem;
                color: #6b7280;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-top: 0.375rem;
            }
            .progress-bar {
                height: 18px;
                background: #e5e7eb;
                border-radius: 9px;
                overflow: hidden;
                position: relative;
                border: 1px solid #d1d5db;
            }
            .progress-fill {
                height: 100%;
                background: #991b1b;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding-right: 0.5rem;
                color: white;
                font-weight: 600;
                font-size: 0.65rem;
            }
            .insight-box {
                background: #fef3c7;
                border-left: 4px solid #991b1b;
                padding: 0.75rem 1rem;
                margin: 0.75rem 0;
                border-radius: 3px;
                font-size: 0.75rem;
                color: #374151;
            }
            .footer-bar {
                background: #374151;
                color: white;
                padding: 1rem 1.5rem;
                margin: 1.5cm -1.5cm -2cm -1.5cm;
                text-align: center;
                font-size: 0.7rem;
                border-top: 4px solid #991b1b;
            }
            .grid-2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }
            .grid-3 {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1rem;
            }
            .badge {
                display: inline-block;
                padding: 0.125rem 0.5rem;
                border-radius: 9999px;
                font-size: 0.65rem;
                font-weight: 600;
            }
            .badge-success { background: #d1fae5; color: #065f46; }
            .badge-warning { background: #fef3c7; color: #92400e; }
            .badge-info { background: #dbeafe; color: #1e40af; }
        </style>

        <!-- Page 1: Cover & Executive Summary -->
        <div class="print-page">
            <div class="report-header">
                <div style="font-size: 2rem; font-weight: 700; margin-bottom: 0.375rem;">MOROCCO 2030</div>
                <div style="font-size: 1.25rem; font-weight: 300; margin-bottom: 1rem;">Platform Performance Report</div>
                <div style="font-size: 0.875rem; opacity: 0.9;">FIFA World Cup Edition</div>
                <div style="margin-top: 1.25rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,0.3);">
                    <div style="font-size: 0.75rem;">Report Generated: {{ now()->format('F d, Y') }} at {{ now()->format('H:i') }}</div>
                    <div style="font-size: 0.75rem; margin-top: 0.25rem;">Reporting Period: {{ now()->subDays(30)->format('M d') }} - {{ now()->format('M d, Y') }}</div>
                </div>
            </div>

            <h2 class="section-title">Executive Summary</h2>
            
            <div class="grid-3" style="margin-bottom: 1.5rem;">
                <div class="metric-card">
                    <div class="metric-value">{{ $stats['cities'] }}</div>
                    <div class="metric-label">Host Cities</div>
                    <div style="margin-top: 0.5rem; font-size: 0.65rem; color: #059669;">
                        ▲ Active Locations
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">{{ $stats['destinations'] }}</div>
                    <div class="metric-label">Destinations</div>
                    <div style="margin-top: 0.5rem; font-size: 0.65rem; color: #059669;">
                        ▲ Tourist Attractions
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-value">{{ $stats['cities'] + $stats['destinations'] }}</div>
                    <div class="metric-label">Total Content</div>
                    <div style="margin-top: 0.5rem; font-size: 0.65rem; color: #6b7280;">
                        ● Platform Coverage
                    </div>
                </div>
            </div>

            <div class="insight-box">
                <strong>Key Insight:</strong> The platform currently features {{ $stats['cities'] }} major cities hosting the 2030 FIFA World Cup, 
                with {{ $stats['destinations'] }} curated destinations showcasing Morocco's rich cultural heritage and tourist attractions.
            </div>

            <h2 class="section-title" style="margin-top: 2rem;">Community Engagement Metrics</h2>

            <div class="grid-2">
                <div class="stat-box">
                    <div style="padding-left: 0.75rem;">
                        <div style="font-size: 0.7rem; color: #6b7280; margin-bottom: 0.375rem;">VOLUNTEER APPLICATIONS</div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #1e3a8a;">{{ $stats['volontaires'] }}</div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($stats['volontaires'] / 100) * 100, 100) }}%;">
                                    {{ $stats['volontaires'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat-box">
                    <div style="padding-left: 0.75rem;">
                        <div style="font-size: 0.7rem; color: #6b7280; margin-bottom: 0.375rem;">CONTACT MESSAGES</div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #1e3a8a;">{{ $stats['contacts'] }}</div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($stats['contacts'] / 150) * 100, 100) }}%;">
                                    {{ $stats['contacts'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid-2" style="margin-top: 1rem;">
                <div class="stat-box">
                    <div style="padding-left: 0.75rem;">
                        <div style="font-size: 0.7rem; color: #6b7280; margin-bottom: 0.375rem;">USER COMMENTS</div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #1e3a8a;">{{ $stats['commentaires'] }}</div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($stats['commentaires'] / 80) * 100, 100) }}%;">
                                    {{ $stats['commentaires'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat-box">
                    <div style="padding-left: 0.75rem;">
                        <div style="font-size: 0.7rem; color: #6b7280; margin-bottom: 0.375rem;">NEWSLETTER SUBSCRIBERS</div>
                        <div style="font-size: 1.5rem; font-weight: 700; color: #1e3a8a;">{{ $stats['newsletters'] }}</div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ min(($stats['newsletters'] / 200) * 100, 100) }}%;">
                                    {{ $stats['newsletters'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="section-title" style="margin-top: 2rem;">Content Distribution Analysis</h2>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Content Type</th>
                        <th style="text-align: right;">Count</th>
                        <th style="text-align: right;">Percentage</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $contentTotal = max($stats['cities'] + $stats['destinations'], 1);
                        $cityPercent = round(($stats['cities'] / $contentTotal) * 100, 1);
                        $destPercent = round(($stats['destinations'] / $contentTotal) * 100, 1);
                    @endphp
                    <tr>
                        <td style="font-weight: 600;">Host Cities</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['cities'] }}</td>
                        <td style="text-align: right;">{{ $cityPercent }}%</td>
                        <td style="text-align: center;"><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Tourist Destinations</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['destinations'] }}</td>
                        <td style="text-align: right;">{{ $destPercent }}%</td>
                        <td style="text-align: center;"><span class="badge badge-success">Active</span></td>
                    </tr>
                    <tr style="background: #f3f4f6; font-weight: 700;">
                        <td>TOTAL CONTENT</td>
                        <td style="text-align: right; color: #1e3a8a;">{{ $contentTotal }}</td>
                        <td style="text-align: right;">100%</td>
                        <td style="text-align: center;"><span class="badge badge-info">Complete</span></td>
                    </tr>
                </tbody>
            </table>

            <h2 class="section-title" style="margin-top: 2rem;">Engagement Performance Matrix</h2>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Engagement Channel</th>
                        <th style="text-align: right;">Total Count</th>
                        <th style="text-align: center;">Performance</th>
                        <th style="text-align: center;">Trend</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 600;">Volunteer Applications</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['volontaires'] }}</td>
                        <td style="text-align: center;">
                            <span class="badge {{ $stats['volontaires'] > 50 ? 'badge-success' : ($stats['volontaires'] > 20 ? 'badge-warning' : 'badge-info') }}">
                                {{ $stats['volontaires'] > 50 ? 'Excellent' : ($stats['volontaires'] > 20 ? 'Good' : 'Growing') }}
                            </span>
                        </td>
                        <td style="text-align: center; color: #059669; font-weight: 600; font-size: 0.7rem;">▲ Positive</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Contact Inquiries</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['contacts'] }}</td>
                        <td style="text-align: center;">
                            <span class="badge {{ $stats['contacts'] > 100 ? 'badge-success' : ($stats['contacts'] > 30 ? 'badge-warning' : 'badge-info') }}">
                                {{ $stats['contacts'] > 100 ? 'High' : ($stats['contacts'] > 30 ? 'Active' : 'Moderate') }}
                            </span>
                        </td>
                        <td style="text-align: center; color: #059669; font-weight: 600; font-size: 0.7rem;">▲ Increasing</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">User Comments</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['commentaires'] }}</td>
                        <td style="text-align: center;">
                            <span class="badge {{ $stats['commentaires'] > 50 ? 'badge-success' : 'badge-warning' }}">
                                {{ $stats['commentaires'] > 50 ? 'Engaged' : 'Building' }}
                            </span>
                        </td>
                        <td style="text-align: center; color: #059669; font-weight: 600; font-size: 0.7rem;">▲ Steady</td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600;">Newsletter Subscriptions</td>
                        <td style="text-align: right; font-weight: 700; color: #1e3a8a;">{{ $stats['newsletters'] }}</td>
                        <td style="text-align: center;">
                            <span class="badge {{ $stats['newsletters'] > 100 ? 'badge-success' : 'badge-warning' }}">
                                {{ $stats['newsletters'] > 100 ? 'Strong' : 'Growing' }}
                            </span>
                        </td>
                        <td style="text-align: center; color: #059669; font-weight: 600; font-size: 0.7rem;">▲ Growing</td>
                    </tr>
                    <tr style="background: #f3f4f6; font-weight: 700;">
                        <td>TOTAL ENGAGEMENT</td>
                        <td style="text-align: right; color: #1e3a8a;">{{ $stats['volontaires'] + $stats['contacts'] + $stats['commentaires'] + $stats['newsletters'] }}</td>
                        <td style="text-align: center;"><span class="badge badge-success">Healthy</span></td>
                        <td style="text-align: center; color: #059669; font-size: 0.7rem;">▲ Positive</td>
                    </tr>
                </tbody>
            </table>

            <div class="insight-box" style="margin-top: 1.5rem;">
                <strong>Strategic Recommendation:</strong> The platform demonstrates strong engagement across all channels. 
                Continue to enhance content quality and user experience to maintain positive growth trajectory. 
                Focus on converting newsletter subscribers into active volunteers for the 2030 World Cup.
            </div>

            <div class="footer-bar">
                <div style="font-weight: 600; margin-bottom: 0.375rem;">MOROCCO 2030 PLATFORM - CONFIDENTIAL</div>
                <div style="opacity: 0.8; font-size: 0.65rem;">This report contains proprietary information. © {{ now()->year }} Morocco 2030. All rights reserved.</div>
                <div style="opacity: 0.8; margin-top: 0.375rem; font-size: 0.65rem;">Generated: {{ now()->format('Y-m-d H:i:s') }}</div>
            </div>
        </div>
    </div>

    <!-- Screen View (Dashboard) -->
    <div class="screen-only">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
            @foreach($stats as $key => $value)
            <div class="glass-card rounded-2xl p-6 hover:shadow-lg transition-shadow duration-300">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">{{ ucfirst($key) }}</p>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white counter-number" data-target="{{ $value }}">0</h3>
            </div>
            @endforeach
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

        <!-- Full Width Line Chart -->
        <div class="glass-card rounded-2xl p-6 mb-8">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Platform Activity Overview</h3>
            <div style="height: 300px;">
                <canvas id="activityLineChart"></canvas>
            </div>
        </div>

        <!-- Recent Activity Feed (Limited to 5) -->
        <div class="glass-card rounded-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-3 py-1 rounded-full">Last 5 activities</span>
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
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }
        
        .dark .glass-card {
            background-color: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(55, 65, 81, 0.3);
        }
        
        /* Chart visibility improvements for dark mode */
        canvas {
            max-width: 100%;
            height: auto;
        }
        
        .dark canvas {
            filter: brightness(1.1) contrast(1.05);
        }
        
        /* Ensure chart containers are visible */
        #contentPieChart,
        #engagementBarChart,
        #activityLineChart {
            position: relative;
        }
        
        .dark #contentPieChart,
        .dark #engagementBarChart,
        .dark #activityLineChart {
            background: transparent;
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
            
            const isDark = localStorage.getItem('darkMode') === 'true';
            const textColor = isDark ? '#f3f4f6' : '#374151';
            const gridColor = isDark ? 'rgba(75, 85, 99, 0.3)' : '#e5e7eb';
            const axisColor = isDark ? '#9ca3af' : '#6b7280';
            
            // Morocco Colors - adjusted for dark mode visibility
            const moroccoRed = '#991b1b';
            const moroccoRedLight = isDark ? '#dc2626' : '#991b1b';
            const moroccoGrey = '#6b7280';
            const moroccoGreyLight = isDark ? '#9ca3af' : '#6b7280';
            const moroccoWhite = '#ffffff';
            const accentBlue = isDark ? '#60a5fa' : '#3b82f6';
            const accentGreen = isDark ? '#34d399' : '#10b981';
            const accentYellow = '#f59e0b';
            
            // Chart fill colors with better opacity for dark mode
            const fillOpacity = isDark ? '40' : '20';
            
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
                            borderColor: isDark ? '#1f2937' : moroccoWhite,
                            borderWidth: 3,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: textColor,
                                    font: { size: 13, weight: '600' },
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: isDark ? '#1f2937' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: gridColor,
                                borderWidth: 1,
                                padding: 12,
                                displayColors: true,
                                callbacks: {
                                    label: function(context) {
                                        const total = {{ $stats['cities'] + $stats['destinations'] }};
                                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        }
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
                            backgroundColor: [moroccoRedLight, moroccoGreyLight, accentBlue, accentGreen],
                            borderColor: [moroccoRedLight, moroccoGreyLight, accentBlue, accentGreen],
                            borderWidth: 2,
                            borderRadius: 8,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: isDark ? '#111827' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? '#374151' : '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                titleFont: { size: 13, weight: '600' },
                                bodyFont: { size: 12 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11 }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            },
                            x: {
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11, weight: '600' }
                                },
                                grid: { display: false },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            }
                        }
                    }
                });
            }
            
            // Platform Activity Line Chart
            const lineCtx = document.getElementById('activityLineChart');
            if (lineCtx) {
                const activityLabels = @json($activityData['labels'] ?? []);
                const contentData = @json($activityData['content'] ?? []);
                const engagementData = @json($activityData['engagement'] ?? []);
                
                new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: activityLabels,
                        datasets: [
                            {
                                label: 'Content Items',
                                data: contentData,
                                borderColor: moroccoRedLight,
                                backgroundColor: moroccoRedLight + fillOpacity,
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: moroccoRedLight,
                                pointBorderColor: isDark ? '#111827' : moroccoWhite,
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7,
                                pointHoverBackgroundColor: moroccoRedLight,
                                pointHoverBorderColor: isDark ? '#f3f4f6' : moroccoWhite
                            },
                            {
                                label: 'Community Engagement',
                                data: engagementData,
                                borderColor: moroccoGreyLight,
                                backgroundColor: moroccoGreyLight + fillOpacity,
                                borderWidth: 3,
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: moroccoGreyLight,
                                pointBorderColor: isDark ? '#111827' : moroccoWhite,
                                pointBorderWidth: 2,
                                pointRadius: 5,
                                pointHoverRadius: 7,
                                pointHoverBackgroundColor: moroccoGreyLight,
                                pointHoverBorderColor: isDark ? '#f3f4f6' : moroccoWhite
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: textColor,
                                    font: { size: 13, weight: '600' },
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                backgroundColor: isDark ? '#111827' : '#ffffff',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: isDark ? '#374151' : '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                titleFont: { size: 13, weight: '600' },
                                bodyFont: { size: 12 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11 }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false,
                                    lineWidth: 1
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            },
                            x: {
                                ticks: {
                                    color: axisColor,
                                    font: { size: 11, weight: '600' }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false
                                },
                                border: {
                                    color: axisColor,
                                    width: 1
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
