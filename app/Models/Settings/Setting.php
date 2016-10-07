<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models\Settings
 */
class Setting extends Model
{
    // Table definition
    protected $table = 'settings';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'key',
        'value',
        'company_id',
        'user_id',
    ];
}
