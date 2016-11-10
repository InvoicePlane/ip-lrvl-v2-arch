<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 *
 * @package App\Models\Payments
 * @property integer $id
 * @property integer $voucher_id
 * @property integer $payment_method_id
 * @property float $paid_amount
 * @property string $op_transaction_id
 * @property string $op_message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Payments\PaymentMethod $paymentMethod
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment wherePaidAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereOpTransactionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereOpMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Payments\Payment whereDeletedAt($value)
 * @mixin \Eloquent
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

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated payment method
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\Payments\PaymentMethod', 'payment_method_id');
    }

    /**
     * Get all attachments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'commentable');
    }

    /**
     * Get all notes
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'notable');
    }
}
