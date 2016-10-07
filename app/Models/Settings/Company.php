<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models\Settings
 */
class Company extends Model
{
    // Table definition
    protected $table = 'companies';

    // Fillable db fields
    protected $fillable = [
        'name',
        'short_name',
        'address_id',
        'is_disabled',
    ];
}
