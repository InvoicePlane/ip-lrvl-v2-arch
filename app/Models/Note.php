<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 * @package App\Models
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
