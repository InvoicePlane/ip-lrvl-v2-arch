<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Item
 * @package App\Models\Items
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
}
