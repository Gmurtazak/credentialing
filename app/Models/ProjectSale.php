<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectSale
 *
 * @property int $id
 * @property string $project_name
 * @property int $project_type_id
 * @property string|null $project_details
 * @property int|null $client_id
 * @property int|null $team_id
 * @property string|null $country
 * @property float|null $project_price
 * @property float|null $our_bid
 * @property string|null $contact_date
 * @property bool|null $is_meeting_requested
 * @property string|null $meeting_datetime
 * @property bool|null $meeting_status
 * @property string|null $comments
 * @property bool|null $is_convertion
 * @property string|null $reason
 * @property string|null $reason_details
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProjectSale extends Model
{
    /**
     * @var string
     */
    protected $table = 'project_sales';
    /**
     *
     */
    const resetDays = 5;

    /**
     * @var string[]
     */
    protected $casts = [
		'project_type_id' => 'int',
		'client_id' => 'int',
		'project_price' => 'float',
		'our_bid' => 'float',
		'is_meeting_requested' => 'bool',
		'meeting_status' => 'bool',
		'is_convertion' => 'bool',
        'team_id' => 'int',
		'is_active' => 'bool'
	];

    /**
     * @var string[]
     */
    protected $fillable = [
		'project_name',
		'project_type_id',
		'project_details',
		'client_id',
        'team_id',
		'country',
		'project_price',
		'our_bid',
		'contact_date',
		'is_meeting_requested',
		'meeting_datetime',
		'meeting_status',
		'comments',
		'is_convertion',
		'reason',
		'reason_details',
		'is_active'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function projectSaleDetail()
    {
        return $this->hasOne(ProjectSaleDetail::class, 'project_sale_id')->latestOfMany('id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectSaleAgentDetail()
    {
        return $this->hasMany(ProjectSaleAgentDetail::class, 'project_sale_id')->orderBy('id','DESC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function projectSaleAgentDetailForTeam()
    {
        return $this->hasOne(ProjectSaleAgentDetail::class, 'project_sale_id')->latestOfMany('id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectSaleProductionDetail()
    {
        return $this->hasMany(ProjectSaleProductionDetail::class, 'project_sale_id')->orderBy('id','DESC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectSaleLog()
    {
        return $this->hasMany(projectSaleLog::class,'project_sale_id')->orderBy('id', 'DESC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
