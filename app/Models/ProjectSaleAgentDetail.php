<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectSaleAgentDetail
 *
 * @property int $id
 * @property int|null $project_sale_id
 * @property int|null $bidder_id
 * @property int|null $closer_id
 * @property int|null $caller_id
 * @property int|null $sale_shared_to
 * @property int|null $team_id
 * @property string|null $contract_id
 * @property bool|null $is_active
 *
 * @package App\Models
 */
class ProjectSaleAgentDetail extends Model
{
	protected $table = 'project_sale_agent_details';
	public $timestamps = false;

	protected $casts = [
		'project_sale_id' => 'int',
		'bidder_id' => 'int',
		'closer_id' => 'int',
		'caller_id' => 'int',
		'sale_shared_to' => 'int',
		'team_id' => 'int',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'project_sale_id',
		'bidder_id',
		'closer_id',
		'caller_id',
		'sale_shared_to',
		'team_id',
		'contract_id',
		'is_active'
	];

    public function projectSale()
    {
        return $this->belongsTo(ProjectSale::class, 'project_sale_id');
    }
    public function bidder()
    {
        return $this->belongsTo(User::class, 'bidder_id');
    }
    public function closer()
    {
        return $this->belongsTo(User::class, 'closer_id');
    }
    public function caller()
    {
        return $this->belongsTo(User::class, 'caller_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
