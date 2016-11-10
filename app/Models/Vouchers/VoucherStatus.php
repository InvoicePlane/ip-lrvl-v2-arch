<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherStatus
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $color
 * @property boolean $read_only
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherStatus whereReadOnly($value)
 * @mixin \Eloquent
 */
class VoucherStatus extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'voucher_statuses';

    // Fillable db fields
    protected $fillable = [
        'name',
        'description',
        'type',
        'color',
        'read_only',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns all associated vouchers
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Models\Vouchers\Voucher', 'status_id');
    }
}
