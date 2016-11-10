<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TimeTracking
 *
 * @package App\Models\Projects
 * @property integer $id
 * @property integer $task_id
 * @property integer $user_id
 * @property integer $voucher_item_id
 * @property string $started_at
 * @property string $ended_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Projects\Task $task
 * @property-read \App\Models\Users\User $user
 * @property-read \App\Models\Vouchers\VoucherItem $voucherItem
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereVoucherItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereStartedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereEndedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Projects\TimeTracking whereDeletedAt($value)
 * @mixin \Eloquent
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
