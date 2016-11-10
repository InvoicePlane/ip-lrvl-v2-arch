<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $voucher_id
 * @property-read \App\Models\Vouchers\Voucher $voucher
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Quote[] $quotes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Invoice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Invoice whereVoucherId($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'invoices';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated voucher
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucher()
    {
        return $this->belongsTo('App\Models\Vouchers\Voucher');
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

    /**
     * Returns all attached quotes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quotes()
    {
        return $this->belongsToMany('App\Models\Vouchers\Quote', 'invoice_quotes');
    }
}
