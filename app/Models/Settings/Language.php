<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * @package App\Models\Settings
 */
class Language extends Model
{
    // Table definition
    protected $table = 'languages';

    // Disable timestamps
    public $timestamps = false;

    // Fillable db fields
    protected $fillable = [
        'title',
        'lang_code',
        'country_code',
        'is_disabled',
        'last_update',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the vouchers associated with the language
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Clients\Client');
    }

    /**
     * Returns the vouchers associated with the language
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Models\Vouchers\Voucher');
    }
}
