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
}
