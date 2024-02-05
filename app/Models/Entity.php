<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 * 
 * @property int $id
 * @property string $entity
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Entity extends Model
{
	protected $table = 'entities';

	protected $casts = [
		'is_active' => 'int'
	];

	protected $fillable = [
		'entity',
		'is_active'
	];
}
