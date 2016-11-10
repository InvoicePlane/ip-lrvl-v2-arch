<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 *
 * @package App\Models\Payments
 * @property integer $id
 * @property string $title
 * @property integer $payment_gateway_id
 * @property boolean $is_disabled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payments\Payment[] $payments
 * @property-read \App\Models\Payments\PaymentGateway $gateway
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentMethod whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentMethod wherePaymentGatewayId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\PaymentMethod whereIsDisabled($value)
 * @mixin \Eloquent
 */
class PaymentMethod extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'payment_methods';

    // Fillable db fields
    protected $fillable = [
        'title',
        'payment_gateway_id',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns all payments associated with the payment method
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Models\Payments\Payment', 'payment_method_id');
    }

    /**
     * Returns the associated payment gateway for online payments
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway()
    {
        return $this->belongsTo('App\Models\Payments\PaymentGateway', 'payment_gateway_id');
    }
}
