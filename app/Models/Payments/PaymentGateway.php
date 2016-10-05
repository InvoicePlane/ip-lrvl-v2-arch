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
}
