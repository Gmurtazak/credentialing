<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersRight
 * 
 * @property int $user_id
 * @property int $right_id
 * 
 * @property User $user
 * @property Right $right
 *
 * @package App\Models
 */
class UsersRight extends Model
{
	protected $table = 'users_rights';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'right_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function right()
	{
		return $this->belongsTo(Right::class);
	}
}
