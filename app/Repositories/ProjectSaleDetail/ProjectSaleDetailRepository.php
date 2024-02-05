<?php

namespace App\Repositories\ProjectSaleDetail;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectSaleDetailRepository extends BaseRepository implements IProjectSaleDetailRepository
{
    public function __construct(Model $projectSaleDetail)
    {
        parent::__construct($projectSaleDetail);
    }
}
