<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 *
 * @package App\Models\Items
 * @property integer $id
 * @property string $sku
 * @property string $sku_type
 * @property string $title
 * @property string $description
 * @property float $purchase_price
 * @property float $sales_price
 * @property integer $stock
 * @property integer $group_id
 * @property boolean $is_disabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Items\ItemGroup $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attachment[] $attachments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereSku($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereSkuType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item wherePurchasePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereSalesPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereStock($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Items\Item whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'items';

    // Fillable db fields
    protected $fillable = [
        'sku',
        'sku_type',
        'title',
        'description',
        'purchase_price',
        'sales_price',
        'stock',
        'group_id',
        'is_disabled',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the items associated group
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Items\ItemGroup', 'group_id');
    }

    /**
     * Get all attachments
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'commentable');
    }

    /**
     * Get all notes
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes()
    {
        return $this->morphMany('App\Models\Note', 'notable');
    }
}
