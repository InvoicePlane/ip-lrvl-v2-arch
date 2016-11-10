<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @package App\Models\Settings
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property integer $address_id
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Clients\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clients\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Users\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereShortName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereAddressId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    // Table definition
    protected $table = 'companies';

    // Fillable db fields
    protected $fillable = [
        'name',
        'short_name',
        'address_id',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the company address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo('App\Models\Clients\Address');
    }

    /**
     * Returns the vouchers associated with the company
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Clients\Client');
    }

    /**
     * Returns the company users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\Users\User');
    }

    /**
     * Returns the vouchers associated with the company
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Models\Vouchers\Voucher');
    }
}
