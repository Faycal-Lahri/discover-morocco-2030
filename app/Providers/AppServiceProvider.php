<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\City;
use App\Models\Destination;
use App\Models\Volontaire;
use App\Models\Contact;
use App\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share recent activities with the admin layout
        View::composer('layouts.admin', function ($view) {
            try {
                $recent_activities = Activity::latest()->take(10)->get()->map(function ($activity) {
                    $activity->message = $activity->description;
                    $activity->type = class_basename($activity->subject_type);
                    return $activity;
                });
                $view->with('global_recent_activities', $recent_activities);
            } catch (\Exception $e) {
                // Fail silently if table doesn't exist yet (migration)
                $view->with('global_recent_activities', collect());
            }
        });

        // Share Cities for Mega Menu (App Layout)
        View::composer('layouts.app', function ($view) {
            try {
                // Eager load destinations for the "Top Experiences" section
                $cities = City::with(['destinations' => function($query) {
                    $query->take(3); // Take top 3 destinations for the menu display if needed
                }])->take(8)->get();
                
                $view->with('megaMenuCities', $cities);
            } catch (\Exception $e) {
                $view->with('megaMenuCities', collect());
            }
        });

        // Register Observers for Activity Logging
        City::observe(\App\Observers\ActivityObserver::class);
        Destination::observe(\App\Observers\ActivityObserver::class);
        Volontaire::observe(\App\Observers\ActivityObserver::class);
        Contact::observe(\App\Observers\ActivityObserver::class);
        \App\Models\Commentaire::observe(\App\Observers\ActivityObserver::class);
        \App\Models\Newsletter::observe(\App\Observers\ActivityObserver::class);
    }
}
