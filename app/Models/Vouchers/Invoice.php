<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * @package App\Models\Vouchers
 */
class Invoice extends Model
{
    // Table definition
    protected $table = 'invoices';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
    ];
}
