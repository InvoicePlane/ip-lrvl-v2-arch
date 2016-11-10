<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmailTemplate
 *
 * @package App\Models
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $from_mail
 * @property string $from_name
 * @property string $to
 * @property string $cc
 * @property string $bcc
 * @property string $content_template
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereFromMail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereFromName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereCc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereBcc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereContentTemplate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\EmailTemplate whereDeletedAt($value)
 * @mixin \Eloquent
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
