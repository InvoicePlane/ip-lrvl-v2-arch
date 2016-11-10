<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherItemAmounts
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $item_id
 * @property float $item_amount
 * @property float $item_purchase_price
 * @property float $item_sales_price
 * @property float $item_subtotal
 * @property float $item_discount_total
 * @property float $item_tax_total
 * @property float $item_total
 * @property-read \App\Models\Items\Item $item
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemPurchasePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemSalesPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemSubtotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemDiscountTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemTaxTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItemAmounts whereItemTotal($value)
 * @mixin \Eloquent
 */
class VoucherItemAmounts extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'voucher_item_amounts';

    // Fillable db fields
    protected $fillable = [
        'item_id',
        'item_amount',
        'item_purchase_price',
        'item_sales_price',
        'item_subtotal',
        'item_discount_amount',
        'item_discount_percent',
        'item_discount_total',
        'item_tax_total',
        'item_total',
    ];

    /*
   |--------------------------------------------------------------------------
   | Relations
   |--------------------------------------------------------------------------
   */

    /**
     * Returns the associated item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\Items\Item', 'item_id');
    }
}
