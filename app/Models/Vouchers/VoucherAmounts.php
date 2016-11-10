<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherAmounts
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $voucher_id
 * @property float $item_subtotal
 * @property float $item_discount_total
 * @property float $item_tax_total
 * @property float $item_total
 * @property float $voucher_discount_amount
 * @property float $voucher_discount_percent
 * @property float $voucher_tax_total
 * @property float $voucher_total
 * @property float $voucher_paid
 * @property float $voucher_balance
 * @property-read \App\Models\Vouchers\Voucher $voucher
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereItemSubtotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereItemDiscountTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereItemTaxTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereItemTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherDiscountAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherDiscountPercent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherTaxTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherPaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherAmounts whereVoucherBalance($value)
 * @mixin \Eloquent
 */
class VoucherAmounts extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'voucher_amounts';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
        'item_subtotal',
        'item_discount_total',
        'item_tax_total',
        'item_total',
        'voucher_discount_amount',
        'voucher_discount_percent',
        'voucher_tax_total',
        'voucher_total',
        'voucher_paid',
        'voucher_balance',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated voucher
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo('App\Models\Vouchers\Voucher');
    }
}
