<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherDiscount
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $voucher_id
 * @property float $discount_amount
 * @property float $discount_percent
 * @property-read \App\Models\Vouchers\Voucher $voucher
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherDiscount whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherDiscount whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherDiscount whereDiscountAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherDiscount whereDiscountPercent($value)
 * @mixin \Eloquent
 */
class VoucherDiscount extends Model
{
    // Table definition
    protected $table = 'voucher_discounts';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
        'discount_amount',
        'discount_percent',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the voucher for the discount
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo('App\Models\Vouchers\Voucher', 'voucher_id');
    }
}
