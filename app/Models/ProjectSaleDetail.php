<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectSaleDetail
 *
 * @property int $id
 * @property int $project_sale_id
 * @property int|null $account_id
 * @property string|null $date
 * @property float|null $sale_amount
 * @property int|null $portal_id
 * @property float|null $portal_fee_percentage
 * @property float|null $portal_fee
 * @property string|null $connect_uses
 * @property float|null $amount_due
 * @property float|null $amount_received
 * @property float|null $amount_refund
 * @property bool|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProjectSaleDetail extends Model
{
	protected $table = 'project_sale_details';

	protected $casts = [
		'project_sale_id' => 'int',
		'account_id' => 'int',
		'sale_amount' => 'float',
		'portal_id' => 'int',
		'portal_fee_percentage' => 'float',
        'portal_fee' => 'float',
		'connect_uses' => 'string',
		'amount_due' => 'float',
        'amount_received' => 'float',
        'amount_refund' => 'float',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'project_sale_id',
		'account_id',
		'date',
		'sale_amount',
		'portal_id',
		'portal_fee_percentage',
		'portal_fee',
        'connect_uses',
		'amount_due',
        'amount_received',
        'amount_refund',
		'is_active'
	];
    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }
    public function portal()
    {
        return $this->belongsTo(Portal::class,'portal_id');
    }
}
