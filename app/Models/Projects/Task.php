<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 * @package App\Models\Projects
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
}
