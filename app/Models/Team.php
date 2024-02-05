<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 *
 * @property int $id
 * @property string $name
 * @property string $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'clinic';

	/*protected $casts = [
		'is_active' => 'int',

	];*/

	protected $fillable = [
		'name',
		'is_active'
	];

	/*public function teamLead()
	{
		return $this->belongsTo(User::class, 'team_lead_id');
	}

    public function users()
    {
        return $this->hasMany(User::class, 'team_id');
    }*/
}
