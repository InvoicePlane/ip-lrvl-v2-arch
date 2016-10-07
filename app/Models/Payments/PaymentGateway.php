<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentGateway
 * @package App\Models\Payments
 */
class PaymentGateway extends Model
{
    // Table definition
    protected $table = 'payment_gateways';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'identifier',
        'client_key',
        'client_secret',
        'testing_enabled',
    ];
}
