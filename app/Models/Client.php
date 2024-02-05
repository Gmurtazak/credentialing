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
 * @property string $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Right[] $rights
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Client extends Model
{
	protected $table = 'provider';

	/*protected $casts = [
		'is_active' => 'int'
	];*/

	protected $fillable = [
		'name',
		'is_active'
	];

	/*public function rights()
	{
		return $this->belongsToMany(Right::class, 'roles_rights');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_roles');
	}*/
}
