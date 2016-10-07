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
}
