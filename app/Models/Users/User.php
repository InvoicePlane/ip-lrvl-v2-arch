<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @package App\Models\Users
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $client_contact_id
 * @property integer $company_id
 * @property boolean $is_disabled
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Contact $clientContact
 * @property-read \App\Models\Settings\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Projects\Project[] $projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Projects\TimeTracking[] $timeTrackings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereClientContactId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Users\User whereDeletedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'users';

    // Fillable db fields
    protected $fillable = [
        'name',
        'email',
        'client_contact_id',
        'company_id',
        'is_disabled',
        'password',
    ];

    // Hidden db fields
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated client contact
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientContact()
    {
        return $this->belongsTo('App\Models\Clients\Contact');
    }

    /**
     * Returns the associated company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Settings\Company');
    }

    /**
     * Returns all authored attachments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment', 'uploader_id');
    }

    /**
     * Returns all authored notes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Note', 'author_id');
    }

    /**
     * Returns all projects where the user is leader
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Projects\Project', 'leader_id');
    }

    /**
     * Returns all authored attachments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timeTrackings()
    {
        return $this->hasMany('App\Models\Projects\TimeTracking', 'user_id');
    }

    /**
     * Returns all authored vouchers
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Models\Vouchers\Voucher', 'user_id');
    }
}
