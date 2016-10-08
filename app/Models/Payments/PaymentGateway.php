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

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns all payment methods associated with the payment gateway
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods()
    {
        return $this->hasMany('App\Models\Payments\PaymentMethod', 'payment_gateway_id');
    }

    /**
     * Returns all payments made with this payment gateway
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function payments()
    {
        return $this->hasManyThrough('App\Models\Payments\Payment', 'App\Models\Payments\PaymentMethod');
    }
}
