<?php

namespace App\Repositories\BusinessType;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BusinessTypeRepository extends BaseRepository implements IBusinessTypeRepository
{
    public function __construct(Model $business_type)
    {
        parent::__construct($business_type);
    }
}
