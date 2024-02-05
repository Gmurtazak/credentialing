<?php

namespace App\Repositories\ProjectSale;

use App\Support\Repositories\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

interface IProjectSaleRepository extends IBaseRepository
{
    public function resetStatus();
}
