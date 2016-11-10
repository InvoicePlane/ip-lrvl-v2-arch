<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @package App\Models\Projects
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $color
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Projects\Task[] $tasks
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TaskStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TaskStatus whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TaskStatus whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TaskStatus whereColor($value)
 * @mixin \Eloquent
 */
class TaskStatus extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'task_statuses';

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
