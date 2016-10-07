<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models\Payments
 */
class Payment extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'payments';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
        'payment_method_id',
        'paid_amount',
        'op_transaction_id',
        'op_message',
    ];
}
