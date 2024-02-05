<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ScheduleDay
 *
 * @property int $id
 * @property int|null $schedule_id
 * @property string|null $working_day
 *
 * @package App\Models
 */
class ScheduleDay extends Model
{
	protected $table = 'schedule_days';
	public $timestamps = false;

	protected $casts = [
		'schedule_id' => 'int'
	];

	protected $fillable = [
		'schedule_id',
		'working_day'
	];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
