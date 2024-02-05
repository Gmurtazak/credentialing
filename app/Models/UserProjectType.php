<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProjectType
 * 
 * @property int $user_id
 * @property int $project_type_id
 * 
 * @property ProjectType $project_type
 * @property User $user
 *
 * @package App\Models
 */
class UserProjectType extends Model
{
	protected $table = 'user_project_types';
	protected $primaryKey = 'user_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'project_type_id' => 'int'
	];

	protected $fillable = [
		'project_type_id'
	];

	public function project_type()
	{
		return $this->belongsTo(ProjectType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
