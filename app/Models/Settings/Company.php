<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models\Settings
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
