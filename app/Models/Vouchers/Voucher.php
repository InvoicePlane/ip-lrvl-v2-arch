<?php

namespace App\Models\Vouchers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Voucher
 * @package App\Models\Vouchers
 */
class Voucher extends Model
{
    use SoftDeletes;

    // Table definition
    protected $table = 'vouchers';

    // Fillable db fields
    protected $fillable = [
        'voucher_number',
        'company_id',
        'voucher_group_id',
        'status_id',
        'user_id',
        'client_id',
        'currency_id',
        'language_id',
        'project_id',
    ];
}
