<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Voucher
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property string $voucher_number
 * @property integer $company_id
 * @property integer $voucher_group_id
 * @property integer $status_id
 * @property integer $user_id
 * @property integer $client_id
 * @property integer $currency_id
 * @property integer $language_id
 * @property integer $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Settings\Company $company
 * @property-read \App\Models\Vouchers\VoucherGroup $voucherGroup
 * @property-read \App\Models\Vouchers\VoucherStatus $voucherStatus
 * @property-read \App\Models\Users\User $user
 * @property-read \App\Models\Clients\Client $client
 * @property-read \App\Models\Settings\Currency $currency
 * @property-read \App\Models\Settings\Language $language
 * @property-read \App\Models\Projects\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\VoucherItem[] $items
 * @property-read \App\Models\Vouchers\VoucherAmounts $amounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Taxrate[] $taxes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereVoucherNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereVoucherGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereLanguageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\Voucher whereDeletedAt($value)
 * @mixin \Eloquent
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
