<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App\Models\Projects
 */
class TaskStatus extends Model
{
    // Table definition
    protected $table = 'task_statuses';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'type',
        'color',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns all tasks for the current status
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Projects\Task', 'status_ud');
    }
}
