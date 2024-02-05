<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectSaleProductionDetail
 *
 * @property int $id
 * @property int|null $project_sale_id
 * @property string|null $production_type
 * @property int|null $assigned_to
 * @property string|null $project_status
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProjectSaleProductionDetail extends Model
{
	protected $table = 'project_sale_production_details';

	protected $casts = [
		'project_sale_id' => 'int',
		'assigned_to' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'project_sale_id',
		'production_type',
		'assigned_to',
		'project_status',
		'is_active'
	];

    public function projectSale()
    {
        return $this->belongsTo(ProjectSale::class, 'project_sale_id');
    }
}
