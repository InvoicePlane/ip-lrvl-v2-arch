<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 *
 * @package App\Models
 * @property integer $id
 * @property integer $notable_id
 * @property string $notable_type
 * @property string $content
 * @property integer $author_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $attachable
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereNotableId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereNotableType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Note extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'notes';

    // Fillable db fields
    protected $fillable = [
        'notable_id',
        'notable_type',
        'content',
        'author_id',
    ];


    /**
     * Return all attachable models
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
