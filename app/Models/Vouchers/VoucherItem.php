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
        'item_tax_id',
    ];
}
