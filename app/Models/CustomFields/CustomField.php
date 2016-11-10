<?php

namespace App\Models\CustomFields;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomField
 *
 * @package App\Models\CustomFields
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $available_values
 * @property string $default_value
 * @property string $related_model
 * @property boolean $is_disabled
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CustomFields\CustomFieldValue[] $values
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereAvailableValues($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereDefaultValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereRelatedModel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomField whereIsDisabled($value)
 * @mixin \Eloquent
 */
class CustomField extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'custom_fields';

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

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns all custom field values
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany('App\Models\CustomFields\CustomFieldValue', 'custom_field_id');
    }
}
