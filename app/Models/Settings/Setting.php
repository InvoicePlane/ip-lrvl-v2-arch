<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @package App\Models\Settings
 * @property integer $id
 * @property string $key
 * @property mixed $value
 * @property integer $company_id
 * @property integer $user_id
 * @property-read \App\Models\Users\User $company
 * @property-read \App\Models\Users\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Setting whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Setting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Setting whereCompanyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Settings\Setting whereUserId($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    // Table definition
    public $timestamps = false;

    // Disable timestamps
    protected $table = 'settings';

    // Fillable db fields
    protected $fillable = [
        'key',
        'value',
        'company_id',
        'user_id',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * Returns the associated company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Users\User');
    }

    /**
     * Returns the associated user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }
}
