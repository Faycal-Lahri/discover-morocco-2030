<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Destination;
use App\Models\Volontaire;
use App\Models\Commentaire;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'cities' => City::count(),
            'destinations' => Destination::count(),
            'volontaires' => Volontaire::count(),
            'commentaires' => Commentaire::count(),
            'contacts' => Contact::count(),
            'newsletters' => Newsletter::count(),
        ];

        // Fetch recent activities from Activity log (tracks ALL changes)
        $recent_activities = Activity::with('subject')
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($activity) {
                // Extract model name from subject_type
                $modelName = class_basename($activity->subject_type);
                
                // Map model names to friendly names
                $typeMap = [
                    'City' => 'City',
                    'Destination' => 'Destination',
                    'Volontaire' => 'Volunteer',
                    'Contact' => 'Contact',
                    'Commentaire' => 'Comment',
                    'Newsletter' => 'Newsletter',
                ];
                
                $activity->type = $typeMap[$modelName] ?? $modelName;
                $activity->message = $activity->description;
                
                return $activity;
            });

        // Get day-by-day activity data for the chart
        $activityData = $this->getDailyActivityData();

        return view('admin.dashboard', compact('stats', 'recent_activities', 'activityData'));
    }

    private function getDailyActivityData()
    {
        // Find the earliest date from all models to start the chart
        $earliestDates = [];
        
        $firstCity = City::orderBy('created_at', 'asc')->first();
        if ($firstCity) $earliestDates[] = $firstCity->created_at;
        
        $firstDestination = Destination::orderBy('created_at', 'asc')->first();
        if ($firstDestination) $earliestDates[] = $firstDestination->created_at;
        
        $firstVolontaire = Volontaire::orderBy('created_at', 'asc')->first();
        if ($firstVolontaire) $earliestDates[] = $firstVolontaire->created_at;
        
        $firstContact = Contact::orderBy('created_at', 'asc')->first();
        if ($firstContact) $earliestDates[] = $firstContact->created_at;
        
        $firstCommentaire = Commentaire::orderBy('created_at', 'asc')->first();
        if ($firstCommentaire) $earliestDates[] = $firstCommentaire->created_at;
        
        $firstNewsletter = Newsletter::orderBy('created_at', 'asc')->first();
        if ($firstNewsletter) $earliestDates[] = $firstNewsletter->created_at;
        
        // Use the earliest date found, or today if no data exists
        if (empty($earliestDates)) {
            $startDate = now()->startOfDay();
        } else {
            $startDate = collect($earliestDates)->min()->startOfDay();
        }

        // Get all models counts grouped by day
        $citiesData = City::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        $destinationsData = Destination::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        $volontairesData = Volontaire::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        $contactsData = Contact::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        $commentairesData = Commentaire::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        $newslettersData = Newsletter::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->pluck('count', 'date')
            ->toArray();

        // Build day-by-day data starting from the first activity
        $labels = [];
        $contentData = [];
        $engagementData = [];
        
        $currentDate = $startDate->copy();
        $today = now()->startOfDay();
        
        $contentRunningTotal = 0;
        $engagementRunningTotal = 0;

        // Limit to maximum 30 days for better visualization
        $maxDays = 30;
        $daysSinceStart = $currentDate->diffInDays($today);
        
        // If more than 30 days, start from 30 days ago
        if ($daysSinceStart > $maxDays) {
            $currentDate = $today->copy()->subDays($maxDays - 1);
            $contentRunningTotal = City::where('created_at', '<', $currentDate)->count() + 
                                  Destination::where('created_at', '<', $currentDate)->count();
            $engagementRunningTotal = Volontaire::where('created_at', '<', $currentDate)->count() + 
                                     Contact::where('created_at', '<', $currentDate)->count() + 
                                     Commentaire::where('created_at', '<', $currentDate)->count() + 
                                     Newsletter::where('created_at', '<', $currentDate)->count();
        }

        while ($currentDate <= $today && count($labels) < $maxDays) {
            $dateKey = $currentDate->format('Y-m-d');
            
            // Format label - show day name for recent days, date for older
            if ($currentDate->isToday()) {
                $dayLabel = 'Today';
            } elseif ($currentDate->isYesterday()) {
                $dayLabel = 'Yesterday';
            } elseif ($currentDate->diffInDays($today) <= 7) {
                $dayLabel = $currentDate->format('D, M d');
            } else {
                $dayLabel = $currentDate->format('M d');
            }
            
            $labels[] = $dayLabel;
            
            // Add content items for this day
            $contentToday = ($citiesData[$dateKey] ?? 0) + ($destinationsData[$dateKey] ?? 0);
            $contentRunningTotal += $contentToday;
            $contentData[] = $contentRunningTotal;
            
            // Add engagement items for this day
            $engagementToday = ($volontairesData[$dateKey] ?? 0) + 
                              ($contactsData[$dateKey] ?? 0) + 
                              ($commentairesData[$dateKey] ?? 0) + 
                              ($newslettersData[$dateKey] ?? 0);
            $engagementRunningTotal += $engagementToday;
            $engagementData[] = $engagementRunningTotal;
            
            $currentDate->addDay();
        }

        // Ensure we have at least some data
        if (empty($labels)) {
            $labels = ['Today'];
            $contentData = [0];
            $engagementData = [0];
        }

        return [
            'labels' => $labels,
            'content' => $contentData,
            'engagement' => $engagementData,
        ];
    }
}
