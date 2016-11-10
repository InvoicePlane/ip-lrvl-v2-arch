<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxrate
 *
 * @package App\Models
 * @property integer $id
 * @property string $title
 * @property string $identifier
 * @property float $percentage
 * @property boolean $is_disabled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\VoucherItem[] $voucherItems
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Taxrate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Taxrate whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Taxrate whereIdentifier($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Taxrate wherePercentage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Taxrate whereIsDisabled($value)
 * @mixin \Eloquent
 */
class Taxrate extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'tax_rates';

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
