<?php

namespace App\Repositories\Team;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TeamRepository extends BaseRepository implements ITeamRepository
{
    public function __construct(Model $team)
    {
        parent::__construct($team);
    }

}
