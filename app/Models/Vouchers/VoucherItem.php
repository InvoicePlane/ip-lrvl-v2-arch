<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VoucherItem
 * @package App\Models\Vouchers
 */
class VoucherItem extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'voucher_items';

    // Fillable db fields
    protected $fillable = [
        'voucher_id',
        'title',
        'description',
        'item_order',
        'original_item_id',
        'task_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the original item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originalItem()
    {
        return $this->belongsTo('App\Models\Items\Item', 'original_item_id');
    }

    /**
     * Returns the associated task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Projects\Task', 'task_id');
    }

    /**
     * Returns all associated taxes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function taxes()
    {
        return $this->belongsToMany('App\Models\Taxrate', 'voucher_item_tax_rates');
    }
}
