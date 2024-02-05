<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Portal
 *
 * @property int $id
 * @property string $credentialing
 * @property int $clinic
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Portal extends Model
{
	protected $table = 'insurances';

    protected $casts = [
        'is_active' => 'int'
    ];

    protected $fillable = [
        'name',
        'plan_group',
        'phone',
        'is_active'
    ];
}
