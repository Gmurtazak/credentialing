<?php

namespace App\Repositories\Right;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class RightRepository extends BaseRepository implements IRightRepository
{
    public function __construct(Model $role)
    {
        parent::__construct($role);
    }
}
