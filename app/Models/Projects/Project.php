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
}
