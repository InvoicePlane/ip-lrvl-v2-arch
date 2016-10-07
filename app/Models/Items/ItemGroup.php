<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ItemGroup
 * @package App\Models\Items
 */
class ItemGroup extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'item_groups';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'description',
        'parent_group_id',
    ];
}
