<?php

namespace App\Models\CustomFields;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CustomFieldValue
 *
 * @package App\Models\CustomFields
 * @property integer $id
 * @property integer $custom_field_id
 * @property integer $model_id
 * @property string $value
 * @property integer $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\CustomFields\CustomField $customfield
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereCustomFieldId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereModelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomFields\CustomFieldValue whereDeletedAt($value)
 * @mixin \Eloquent
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
