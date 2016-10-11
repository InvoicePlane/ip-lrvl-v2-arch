<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models\Projects
 */
class Project extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'projects';

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'leader_id',
        'client_id',
        'is_completed',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the projects associated client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients\Client');
    }

    /**
     * Returns the projects leading user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leader()
    {
        return $this->belongsTo('App\Models\Users\User');
    }

    /**
     * Returns all associated tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Projects\Task', 'project_id');
    }

    /**
     * Returns all time trackings for tasks associated with the project
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function timeTrackings()
    {
        return $this->hasManyThrough('App\Models\Projects\TimeTracking', 'App\Models\Projects\Task');
    }

    /**
     * Get all attachments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'commentable');
    }

    /**
     * Get all notes
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'notable');
    }
}
