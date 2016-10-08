<?php

namespace App\Models\CustomFields;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomFieldValue
 * @package App\Models\CustomFields
 */
class CustomFieldValue extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'custom_field_values';

    // Fillable db fields
    protected $fillable = [
        'custom_field_id',
        'model_id',
        'value',
        'author_id',
    ];

    /*
   |--------------------------------------------------------------------------
   | Relations
   |--------------------------------------------------------------------------
   */

    /**
     * Returns the associated custom field
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customfield()
    {
        return $this->belongsTo('App\Models\CustomFields\CustomField', 'custom_field_id');
    }
}
