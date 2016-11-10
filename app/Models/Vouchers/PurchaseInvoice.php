<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseInvoice
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $voucher_id
 * @property-read \App\Models\Vouchers\Voucher $voucher
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\PurchaseInvoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\PurchaseInvoice whereVoucherId($value)
 * @mixin \Eloquent
 */
class PurchaseInvoice extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'purchase_invoices';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
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
