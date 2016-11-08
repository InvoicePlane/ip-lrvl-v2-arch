<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherDiscount
 * @package App\Models\Vouchers
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
