<?php

namespace App\Repositories\Role;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    public function __construct(Model $role)
    {
        parent::__construct($role);
    }
}
