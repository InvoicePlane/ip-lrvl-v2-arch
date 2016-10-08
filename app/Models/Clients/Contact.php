<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models\Clients
 */
class Contact extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'contacts';

    // Fillable db fields
    protected $fillable = [
        'title',
        'forename',
        'surname',
        'client_id',
        'address_id',
        'telephone',
        'mobile',
        'fax',
        'email',
        'web',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the contacts associated client
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients\Client');
    }

    /**
     * Returns the contacts address
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->belongsTo('App\Models\Clients\Address');
    }
}
