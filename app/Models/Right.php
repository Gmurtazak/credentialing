<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Right
 * 
 * @property int $id
 * @property string $right
 * 
 * @property Collection|Role[] $roles
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Right extends Model
{
	protected $table = 'rights';
	public $timestamps = false;

	protected $fillable = [
		'right'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'roles_rights');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_rights');
	}
}
