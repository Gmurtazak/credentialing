<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property int $id
 * @property string $name
 * @property string|null $expiry_from
 * @property string|null $expiry_to
 * @property string|null $schedule_hours_day
 * @property string|null $total_working_days
 * @property int|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Schedule extends Model
{
	protected $table = 'schedules';

	protected $casts = [
		'is_active' => 'int'
	];

	protected $fillable = [
		'name',
		//'expiry_from',
		//'expiry_to',
		'schedule_hours_day',
		'total_working_days',
		'is_active'
	];

    public function scheduleDays()
    {
        return $this->hasMany(ScheduleDay::class, 'schedule_id');
    }
}
