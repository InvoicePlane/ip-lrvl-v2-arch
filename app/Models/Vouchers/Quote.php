<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quote
 * @package App\Models\Vouchers
 */
class Quote extends Model
{
    // Table definition
    protected $table = 'quotes';

    // Disable timestamps
    public $timestamps = false;

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
     * Returns all attached invoices
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function invoices()
    {
        return $this->belongsToMany('App\Models\Vouchers\Invoices', 'invoice_quotes');
    }
}
