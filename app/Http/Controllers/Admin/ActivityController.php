<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::query()->latest();

        // Filter by Date
        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter by Action Type (create, update, delete)
        if ($request->has('action') && $request->action) {
            // Mapping action names to descriptions if needed, but assuming logs have 'created', 'updated', 'deleted' in description or similar.
            // Since we don't have a strict 'action' column, we might filter by description content or subject_type
            // Let's check if we can filter by description string
            $action = $request->action;
            $query->where('description', 'like', "%{$action}%"); 
        }

        $activities = $query->paginate(20);

        // Process activities for display
        $activities->getCollection()->transform(function ($activity) {
            $modelName = class_basename($activity->subject_type);
            $typeMap = [
                'City' => 'City',
                'Destination' => 'Destination',
                'Volontaire' => 'Volunteer',
                'Contact' => 'Contact',
                'Commentaire' => 'Comment',
                'Newsletter' => 'Newsletter',
            ];
            $activity->type = $typeMap[$modelName] ?? $modelName;
            
            // Determine badge color based on action
            $desc = strtolower($activity->description);
            if (str_contains($desc, 'created') || str_contains($desc, 'added')) {
                $activity->badge_color = 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400';
                $activity->icon = 'plus';
            } elseif (str_contains($desc, 'updated') || str_contains($desc, 'modified')) {
                $activity->badge_color = 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400';
                $activity->icon = 'pencil';
            } elseif (str_contains($desc, 'deleted') || str_contains($desc, 'removed')) {
                $activity->badge_color = 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400';
                $activity->icon = 'trash';
            } else {
                $activity->badge_color = 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-400';
                $activity->icon = 'info';
            }

            return $activity;
        });

        return view('admin.activities.index', compact('activities'));
    }
}
