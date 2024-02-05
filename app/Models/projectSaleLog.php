<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectSaleLog extends Model
{
    use HasFactory;

    protected $table = 'project_sale_logs';
    public function projectSale()
    {
        return $this->belongsTo(ProjectSale::class,'project_sale_id');
    }
}
