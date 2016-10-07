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
}
