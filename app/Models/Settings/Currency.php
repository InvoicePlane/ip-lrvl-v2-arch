<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 * @package App\Models
 */
class Currency extends Model
{
    // Table definition
    protected $table = 'currencies';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'name',
        'currency_symbol',
        'symbol_placement',
        'thousand_separator',
        'decimal_separator',
        'decimal_places',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the vouchers associated with the currency
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Models\Vouchers\Voucher');
    }
}
