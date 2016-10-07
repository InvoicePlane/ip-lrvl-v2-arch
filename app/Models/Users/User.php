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
}
