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
}
