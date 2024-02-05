<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Insurance
 *
 * @property int $id
 * @property string $credentialing
 * @property int $clinic
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Insurance extends Model
{
	protected $table = 'credentialingset';

    protected $casts = [
        'clinic' => 'int'
    ];

    protected $fillable = [
        'clinic',
        'credentialing'
    ];
}
