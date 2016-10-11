<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RecurringInvoice
 * @package App\Models\Vouchers
 */
class RecurringInvoice extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'recurring_invoices';

    // Fillable db fields
    protected $fillable = [
        'base_invoice_id',
        'base_voucher_id',
        'base_invoice_type',
        'is_disabled',
        'interval',
        'next_date',
        'end_date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the base voucher
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baseVoucher()
    {
        return $this->belongsTo('App\Models\Vouchers\Voucher', 'base_voucher_id');
    }

    /**
     * Returns the base invoice
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function baseInvoice()
    {
        return $this->belongsTo('App\Models\Vouchers\Invoice', 'base_invoice_id');
    }
}
