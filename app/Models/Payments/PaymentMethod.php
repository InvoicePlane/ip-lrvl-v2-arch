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
