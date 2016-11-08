<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherItemDiscount
 * @package App\Models\Vouchers
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
