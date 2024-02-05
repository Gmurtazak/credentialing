<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamTargets
 *
 * @property int $id
 * @property int $team_id
 * @property int $target;
 * @property string $month;
 * @property int $revised_target;
 * @property string|null $revised_target_date;
 * @property string $reason;
 * @property Carbon|null $created_at


 * @package App\Models
 */
class TeamTargets extends Model
{
	protected $table = 'team_targets';

	protected $casts = [
		'team_id' => 'int'
	];
	protected $fillable = [
		'team_id',
        'target',
		'month',
		'revised_target',
        'revised_target_date',
        'reason'
	];
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
