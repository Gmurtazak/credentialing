<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProject
 * 
 * @property int $user_id
 * @property int $project_id
 * 
 * @property User $user
 * @property Project $project
 *
 * @package App\Models
 */
class UserProject extends Model
{
	protected $table = 'user_projects';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'project_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function project()
	{
		return $this->belongsTo(Project::class);
	}
}
