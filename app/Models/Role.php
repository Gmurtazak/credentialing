<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property int $id
 * @property string $role
 * @property string $target
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Right[] $rights
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $casts = [
		'is_active' => 'int'
	];

	protected $fillable = [
		'role',
        'target',
		'is_active'
	];

	public function rights()
	{
		return $this->belongsToMany(Right::class, 'roles_rights');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_roles');
	}
}
