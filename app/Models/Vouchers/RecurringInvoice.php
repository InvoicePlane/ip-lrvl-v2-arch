<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RecurringInvoice
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $base_invoice_id
 * @property integer $base_voucher_id
 * @property string $base_invoice_type
 * @property boolean $is_disabled
 * @property string $interval
 * @property string $next_date
 * @property string $end_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Vouchers\Voucher $baseVoucher
 * @property-read \App\Models\Vouchers\Invoice $baseInvoice
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereBaseInvoiceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereBaseVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereBaseInvoiceType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereInterval($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereNextDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\RecurringInvoice whereDeletedAt($value)
 * @mixin \Eloquent
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
