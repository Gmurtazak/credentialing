<?php

namespace App\Repositories\Insurance;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class InsuranceRepository extends BaseRepository implements IInsuranceRepository
{
    public function __construct(Model $insurance)
    {
        parent::__construct($insurance);
    }
}
