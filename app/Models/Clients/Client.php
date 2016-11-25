<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App\Models\Clients
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property integer $main_contact_id
 * @property integer $main_address_id
 * @property integer $language_id
 * @property integer $company_id
 * @property string $telephone
 * @property string $fax
 * @property string $email
 * @property string $web
 * @property boolean $is_company
 * @property boolean $is_vendor
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Contact $mainContact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clients\Contact[] $contacts
 * @property-read \App\Models\Clients\Address $mainAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clients\Address[] $addresses
 * @property-read \App\Models\Settings\Language $language
 * @property-read \App\Models\Settings\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereShortName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereMainContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereMainAddressId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereLanguageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereWeb($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereIsCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereIsVendor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Client whereDeletedAt($value)
 * @mixin \Eloquent
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
        'company_id',
        'telephone',
        'fax',
        'email',
        'web',
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

    /**
     * Returns the client language
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne('App\Models\Settings\Language');
    }

    /**
     * Returns the company the client is attached to
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->hasOne('App\Models\Settings\Company');
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
}
