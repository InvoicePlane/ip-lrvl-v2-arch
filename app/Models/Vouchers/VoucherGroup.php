<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VoucherGroup
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $identifier_template
 * @property integer $next_id
 * @property boolean $is_disabled
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereIdentifierTemplate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereNextId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherGroup whereDeletedAt($value)
 * @mixin \Eloquent
 */
class VoucherGroup extends Model
{
    use SoftDeletes;

    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'voucher_groups';

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'identifier_template',
        'next_id',
        'is_disabled',
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
        return $this->hasMany('App\Models\Vouchers\Voucher', 'voucher_group_id');
    }
}
