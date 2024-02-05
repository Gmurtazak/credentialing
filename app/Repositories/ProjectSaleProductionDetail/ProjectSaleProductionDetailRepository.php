<?php

namespace App\Repositories\ProjectSaleProductionDetail;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectSaleProductionDetailRepository extends BaseRepository implements IProjectSaleProductionDetailRepository
{
    public function __construct(Model $projectSaleProductionDetail)
    {
        parent::__construct($projectSaleProductionDetail);
    }
}
