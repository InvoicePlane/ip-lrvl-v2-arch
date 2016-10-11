<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Voucher
 * @package App\Models\Vouchers
 */
class Voucher extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'vouchers';

    // Fillable db fields
    protected $fillable = [
        'voucher_number',
        'company_id',
        'voucher_group_id',
        'status_id',
        'user_id',
        'client_id',
        'currency_id',
        'language_id',
        'project_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Settings\Company');
    }

    /**
     * Returns the associated voucher group
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherGroup()
    {
        return $this->belongsTo('App\Models\Vouchers\VoucherGroup');
    }

    /**
     * Returns the associated voucher status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function voucherStatus()
    {
        return $this->belongsTo('App\Models\Vouchers\VoucherStatus', 'status_id');
    }

    /**
     * Returns the associated user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }

    /**
     * Returns the associated client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients\Client');
    }

    /**
     * Returns the associated currency
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Settings\Currency');
    }

    /**
     * Returns the associated language
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Settings\Language');
    }

    /**
     * Returns the associated project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Projects\Project');
    }

    /**
     * Returns all associated voucher items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Vouchers\VoucherItem', 'voucher_id');
    }

    /**
     * Returns all associated voucher amounts
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function amounts()
    {
        return $this->hasOne('App\Models\Vouchers\VoucherAmounts');
    }

    /**
     * Returns all associated voucher items
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function taxes()
    {
        return $this->belongsToMany('App\Models\Taxrate', 'tax_rate_voucher');
    }
}
