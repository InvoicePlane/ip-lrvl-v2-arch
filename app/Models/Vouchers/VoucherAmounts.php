<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherAmounts
 * @package App\Models\Vouchers
 */
class VoucherAmounts extends Model
{
    // Table definition
    protected $table = 'voucher_amounts';

    // Disable timestamps
    public $timestamps = false;

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
