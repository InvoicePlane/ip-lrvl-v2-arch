<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 *
 * @package App\Models\Settings
 * @property integer $id
 * @property string $title
 * @property string $lang_code
 * @property string $country_code
 * @property boolean $is_disabled
 * @property string $last_update
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Clients\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vouchers\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereLangCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereIsDisabled($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Language whereLastUpdate($value)
 * @mixin \Eloquent
 */
class Language extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'languages';

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
