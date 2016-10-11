<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package App\Models\Settings
 */
class Setting extends Model
{
    // Table definition
    protected $table = 'settings';

    // Disable timestamps
    public $timestamps = false;

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
