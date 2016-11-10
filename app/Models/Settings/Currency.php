<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property string $currency_symbol
 * @property boolean $symbol_placement
 * @property string $thousand_separator
 * @property string $decimal_separator
 * @property boolean $decimal_places
 * @property boolean $is_disabled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereSymbolPlacement($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereThousandSeparator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereDecimalSeparator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereDecimalPlaces($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Currency whereIsDisabled($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'currencies';

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
