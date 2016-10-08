<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models\Clients
 */
class Client extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'clients';

    // Fillable db fields
    protected $fillable = [
        'name',
        'short_name',
        'main_contact_id',
        'main_address_id',
        'language_id',
        'is_company',
        'is_vendor',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns main contact person
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainContact()
    {
        return $this->hasOne('App\Models\Clients\Contact');
    }

    /**
     * Returns all available contacts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Clients\Contact', 'client_id');
    }

    /**
     * Returns the main address
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainAddress()
    {
        return $this->hasOne('App\Models\Clients\Address');
    }

    /**
     * Returns all available addresses
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function addresses()
    {
        return $this->hasMany('App\Models\Clients\Address', 'client_id');
    }
}
