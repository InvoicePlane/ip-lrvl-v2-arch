<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models\Clients
 */
class Address extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'addresses';

    // Fillable db fields
    protected $fillable = [
        'client_id',
        'address_block',
        'country_code',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients\Client');
    }

    /**
     * Returns the contacts associated with this address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Clients\Contact', 'address_id');
    }
}
