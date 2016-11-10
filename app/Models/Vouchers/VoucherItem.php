<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VoucherItem
 *
 * @package App\Models\Vouchers
 * @property integer $id
 * @property integer $voucher_id
 * @property string $title
 * @property string $description
 * @property integer $item_order
 * @property integer $original_item_id
 * @property integer $task_id
 * @property integer $item_tax_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\Models\Vouchers\VoucherItemAmounts $amounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\VoucherItemDiscount[] $discounts
 * @property-read \App\Models\Items\Item $originalItem
 * @property-read \App\Models\Projects\Task $task
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Taxrate[] $taxes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereItemOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereOriginalItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereItemTaxId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Vouchers\VoucherItem whereDeletedAt($value)
 * @mixin \Eloquent
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
     * Returns all associated voucher item amonts
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function amounts()
    {
        return $this->hasOne('App\Models\Vouchers\VoucherItemAmounts', 'item_id');
    }

    /**
     * Returns all discounts for the item
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discounts()
    {
        return $this->hasMany('App\Models\Vouchers\VoucherItemDiscount', 'item_id');
    }

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
        return $this->belongsToMany('App\Models\Taxrate', 'tax_rate_voucher_item');
    }
}
