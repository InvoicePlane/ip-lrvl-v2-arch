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
}
