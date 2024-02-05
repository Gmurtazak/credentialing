<?php

namespace App\Repositories\PortalTargets;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class PortalTargetsRepository extends BaseRepository implements IPortalTargetsRepository
{
    public function __construct(Model $portaltargets)
    {
        parent::__construct($portaltargets);
    }

}
