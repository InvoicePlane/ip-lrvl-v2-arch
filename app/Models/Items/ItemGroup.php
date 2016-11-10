<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ItemGroup
 *
 * @package App\Models\Items
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $parent_group_id
 * @property string $deleted_at
 * @property-read \App\Models\Items\ItemGroup $parentGroup
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Items\Item[] $items
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\ItemGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\ItemGroup whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\ItemGroup whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\ItemGroup whereParentGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\ItemGroup whereDeletedAt($value)
 * @mixin \Eloquent
 */
class ItemGroup extends Model
{
    use SoftDeletes;

    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'item_groups';

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
