<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TimeTracking
 * @package App\Models\Projects
 */
class TimeTracking extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'time_trackings';

    // Fillable db fields
    protected $fillable = [
        'task_id',
        'user_id',
        'voucher_id',
        'started_at',
        'ended_at',
    ];
}
