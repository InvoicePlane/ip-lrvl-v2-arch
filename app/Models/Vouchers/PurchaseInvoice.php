<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseInvoice
 * @package App\Models\Vouchers
 */
class PurchaseInvoice extends Model
{
    // Table definition
    protected $table = 'purchase_invoices';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
    ];
}
