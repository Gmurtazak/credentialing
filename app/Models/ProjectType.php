<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectType
 *
 * @property int $id
 * @property string $type
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProjectType extends Model
{
    protected $table = 'project_types';
    public $incrementing = false;

    protected $casts = [
        'id' => 'int',
        'is_active' => 'int'
    ];

    protected $fillable = [
        'type',
        'is_active'
    ];
}
