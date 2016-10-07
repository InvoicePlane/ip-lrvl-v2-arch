<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taxrate
 * @package App\Models
 */
class Taxrate extends Model
{
    // Table definition
    protected $table = 'tax_rates';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'identifier',
        'percentage',
        'is_disabled',
    ];
}
