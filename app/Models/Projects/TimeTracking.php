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
        'voucher_item_id',
        'started_at',
        'ended_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated task
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Projects\Task');
    }

    /**
     * Returns the user that added the time tracking
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }

    /**
     * Returns the voucher item in which the time tracking is referenced
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function voucherItem()
    {
        return $this->belongsTo('App\Models\Vouchers\VoucherItem', 'voucher_item_id');
    }
}
