<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attachment
 *
 * @package App\Models
 * @property integer $id
 * @property integer $attachable_id
 * @property string $attachable_type
 * @property integer $uploader_id
 * @property string $title
 * @property string $file_name
 * @property string $file_extension
 * @property integer $file_size
 * @property string $original_file_name
 * @property string $original_file_extension
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Clients\Client $user
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $attachable
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereAttachableId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereAttachableType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereUploaderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereFileExtension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereFileSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereOriginalFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereOriginalFileExtension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attachment whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Attachment extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'attachments';

    // Fillable db fields
    protected $fillable = [
        'attachable_id',
        'attachable_type',
        'uploader_id',
        'title',
        'file_name',
        'file_extension',
        'file_size',
        'original_file_name',
        'original_file_extension',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the author
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Clients\Client', 'uploader_id');
    }

    /**
     * Return all attachable models
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
