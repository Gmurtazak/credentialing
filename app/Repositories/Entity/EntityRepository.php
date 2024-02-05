<?php

namespace App\Repositories\Entity;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class EntityRepository extends BaseRepository implements IEntityRepository
{
    public function __construct(Model $entity)
    {
        parent::__construct($entity);
    }
}
