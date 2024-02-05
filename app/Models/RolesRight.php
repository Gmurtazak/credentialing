<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesRight
 * 
 * @property int $role_id
 * @property int $right_id
 * 
 * @property Role $role
 * @property Right $right
 *
 * @package App\Models
 */
class RolesRight extends Model
{
	protected $table = 'roles_rights';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int',
		'right_id' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class);
	}

	public function right()
	{
		return $this->belongsTo(Right::class);
	}
}
