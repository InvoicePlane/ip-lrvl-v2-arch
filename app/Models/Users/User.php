<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models\Users
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
        return $this->hasMany('App\Models\Projects\TimeTrackings', 'user_id');
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
