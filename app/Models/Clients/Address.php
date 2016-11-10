<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 *
 * @package App\Models\Clients
 * @property integer $id
 * @property integer $client_id
 * @property string $address_block
 * @property string $country_code
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clients\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereAddressBlock($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Address whereDeletedAt($value)
 * @mixin \Eloquent
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

    /**
     * Get all notes
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'notable');
    }
}
