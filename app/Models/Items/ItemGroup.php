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

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the groups parent group
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentGroup()
    {
        return $this->belongsTo('App\Models\Items\ItemGroup', 'parent_group_id');
    }

    /**
     * Returns all available items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Items\Item', 'group_id');
    }
}
