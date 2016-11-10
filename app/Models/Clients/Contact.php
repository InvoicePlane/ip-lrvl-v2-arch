<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 *
 * @package App\Models\Clients
 * @property integer $id
 * @property string $title
 * @property string $forename
 * @property string $surname
 * @property integer $client_id
 * @property integer $address_id
 * @property string $telephone
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Client $client
 * @property-read \App\Models\Clients\Address $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereForename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereSurname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereAddressId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereTelephone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereMobile($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereFax($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Clients\Contact whereDeletedAt($value)
 * @mixin \Eloquent
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
