<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherItemDiscount
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $item_id
 * @property float $discount_amount
 * @property float $discount_percent
 * @property-read \App\Models\Vouchers\VoucherItem $item
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemDiscount whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemDiscount whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemDiscount whereDiscountAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemDiscount whereDiscountPercent($value)
 * @mixin \Eloquent
 */
class VoucherItemDiscount extends Model
{
    // Table definition
    protected $table = 'voucher_item_discounts';

    // Fillable db fields
    protected $fillable = [
        'item_id',
        'discount_amount',
        'discount_percent',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the item for the discount
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Vouchers\VoucherItem', 'item_id');
    }
}
