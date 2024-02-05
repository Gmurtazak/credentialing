<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PortalTargets
 *
 * @property int $id;
 * @property string|null $year;
 * @property int $target;
 * @property int $revised_target;
 * @property string|null $revised_target_date;
 * @property string $reason;
 * @property Carbon|null $created_at


 * @package App\Models
 */
class PortalTargets extends Model
{
	protected $table = 'portal_targets';

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'year',
		'target',
		'revised_target',
        'revised_target_date',
        'reason',
        'created_at',
	];


}
