<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $old = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function addTask($body)
    {
        $this->tasks()->create(compact('body'));
    }

    // Record activity for a project.
    public function recordActivity($description)
    {
        $this->activity()->create([
            'description' => $description,
                'changes' => $this->activityChanges($description)
            ]);
    }

    public function activityChanges($description)
    {
        if ($description === 'updated') {
            return [
                'before' => Arr::except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

}
