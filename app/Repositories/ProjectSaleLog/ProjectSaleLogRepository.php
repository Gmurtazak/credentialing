<?php

namespace App\Repositories\ProjectSaleLog;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectSaleLogRepository extends BaseRepository implements IProjectSaleLogRepository
{
    public function __construct(Model $projectSaleLog)
    {
        parent::__construct($projectSaleLog);
    }
}
