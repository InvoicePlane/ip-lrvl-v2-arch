<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxrate
 * @package App\Models
 */
class Taxrate extends Model
{
    // Table definition
    protected $table = 'tax_rates';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'identifier',
        'percentage',
        'is_disabled',
    ];

    /*
   |--------------------------------------------------------------------------
   | Relations
   |--------------------------------------------------------------------------
   */

    /**
     * Returns all associated vouchers
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vouchers()
    {
        return $this->belongsToMany('App\Models\Vouchers\Voucher', 'tax_rate_voucher');
    }

    /**
     * Returns all associated voucher items
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function voucherItems()
    {
        return $this->belongsToMany('App\Models\Vouchers\VoucherItem', 'tax_rate_voucher_item');
    }
}
