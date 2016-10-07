<?php

namespace App\Models\CustomFields;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomField
 * @package App\Models\CustomFields
 */
class CustomField extends Model
{
    // Table definition
    protected $table = 'custom_fields';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'type',
        'available_values',
        'default_value',
        'related_model',
        'is_disabled',
    ];
}
