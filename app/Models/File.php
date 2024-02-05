<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @property int $id
 * @property string $file_name
 * @property int $dos_count
 * @property int $pages
 * @property Carbon $received_on
 * @property string $file_link
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';

	protected $casts = [
		'dos_count' => 'int',
		'pages' => 'int',
		'is_active' => 'int'
	];

//	protected $dates = [
//		'received_on'
//	];

	protected $fillable = [
		'file_name',
		'dos_count',
		'pages',
		'received_on',
		'file_link',
		'is_active'
	];
}
