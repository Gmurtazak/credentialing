<?php

namespace App\Repositories\ProjectSaleAgentDetail;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectSaleAgentDetailRepository extends BaseRepository implements IProjectSaleAgentDetailRepository
{
    public function __construct(Model $projectSaleAgentDetail)
    {
        parent::__construct($projectSaleAgentDetail);
    }
}
