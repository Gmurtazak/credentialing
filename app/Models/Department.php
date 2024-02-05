<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @property int $id
 * @property string|null $name
 * @property int $is_active
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $owner_id
 * @property int $team_id
 * @property string|null $logo
 *
 * @property User $user
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'departments';

	protected $casts = [
		'is_active' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
		'owner_id' => 'int'
	];

	protected $fillable = [
		'name',
		'is_active',
		'created_by',
		'updated_by',
		'owner_id',
		'logo'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
	{
		return $this->belongsTo(User::class, 'owner_id');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
