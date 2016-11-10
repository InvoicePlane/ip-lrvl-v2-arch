<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentGateway
 *
 * @package App\Models\Payments
 * @property integer $id
 * @property string $identifier
 * @property string $client_key
 * @property string $client_secret
 * @property boolean $testing_enabled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payments\PaymentMethod[] $paymentMethods
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payments\Payment[] $payments
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentGateway whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentGateway whereIdentifier($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentGateway whereClientKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentGateway whereClientSecret($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentGateway whereTestingEnabled($value)
 * @mixin \Eloquent
 */
class PaymentGateway extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'payment_gateways';

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
