<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Attachment
 * @package App\Models
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
