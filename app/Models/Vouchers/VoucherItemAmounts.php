<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherItemAmounts
 * @package App\Models\Vouchers
 */
class VoucherItemAmounts extends Model
{
    // Table definition
    protected $table = 'voucher_item_amounts';

    // Disable timestamps
    public $timestamps = false;

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
