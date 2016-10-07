<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App\Models\Payments
 */
class PaymentMethod extends Model
{
    // Table definition
    protected $table = 'payment_methods';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'payment_gateway_id',
        'is_disabled',
    ];
}
