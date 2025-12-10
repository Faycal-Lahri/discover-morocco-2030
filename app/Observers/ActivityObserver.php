<?php

namespace App\Observers;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ActivityObserver
{
    public function created(Model $model)
    {
        $this->log($model, 'created', "Created new " . $this->getModelName($model));
    }

    public function updated(Model $model)
    {
        // Avoid logging if only timestamps changed
        if ($model->wasChanged()) {
            $this->log($model, 'updated', "Updated " . $this->getModelName($model));
        }
    }

    public function deleted(Model $model)
    {
        $this->log($model, 'deleted', "Deleted " . $this->getModelName($model));
    }

    protected function log(Model $model, string $action, string $description)
    {
        $user = Auth::user();
        $userName = $user ? $user->name : 'System';
        
        // Enhance description with name/title if available
        $name = $model->nom ?? $model->title ?? $model->name ?? $model->email ?? null;
        if ($name) {
            $description .= ": {$name}";
        }

        Activity::create([
            'subject_type' => get_class($model),
            'subject_id' => $model->id,
            'action' => $action,
            'description' => $description,
            // If we had a causer_id column, we'd add it here.
            // For now, relies on description or future schema updates.
        ]);
    }

    protected function getModelName(Model $model)
    {
        return class_basename($model);
    }
}
