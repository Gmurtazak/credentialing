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
 * @property int $accounts_id
 *
 * @property User $user
 * @property Accounts $accounts
 *
 * @package App\Models
 */
class UsersAccounts extends Model
{
	protected $table = 'users_accounts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'accounts_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function accounts()
	{
		return $this->belongsTo(Account::class);
	}
}
