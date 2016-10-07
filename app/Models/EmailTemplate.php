<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmailTemplate
 * @package App\Models
 */
class EmailTemplate extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'email_templates';

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'from_mail',
        'from_name',
        'to',
        'cc',
        'bcc',
        'content_template',
        'is_disabled',
    ];
}
