<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 *
 * @package App\Models\Projects
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $project_id
 * @property integer $author_id
 * @property integer $assignee_id
 * @property integer $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Projects\Project $project
 * @property-read \App\Models\Users\User $author
 * @property-read \App\Models\Users\User $assignee
 * @property-read \App\Models\Projects\TaskStatus $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereAssigneeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\Task whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'tasks';

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'author_id',
        'assignee_id',
        'status_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the related project of the task
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Projects\Project');
    }

    /**
     * Returns the user that added this task
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Users\User', 'author_id');
    }

    /**
     * Returns the user that is currently assigned to the task
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function assignee()
    {
        return $this->belongsTo('App\Models\Users\User', 'assignee_id');
    }

    /**
     * Returns the tasks status
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Projects\TaskStatus', 'status_id');
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
