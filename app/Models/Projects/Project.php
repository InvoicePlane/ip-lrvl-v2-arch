<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 *
 * @package App\Models\Projects
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $leader_id
 * @property integer $client_id
 * @property boolean $is_completed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Client $client
 * @property-read \App\Models\Users\User $leader
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Projects\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Projects\TimeTracking[] $timeTrackings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereLeaderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereIsCompleted($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Project whereDeletedAt($value)
 * @mixin \Eloquent
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
