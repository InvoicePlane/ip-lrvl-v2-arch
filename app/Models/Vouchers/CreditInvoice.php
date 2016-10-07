<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditInvoice
 * @package App\Models\Vouchers
 */
class CreditInvoice extends Model
{
    // Table definition
    protected $table = 'credit_invoices';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
    ];
}
