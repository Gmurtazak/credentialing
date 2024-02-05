<?php

namespace App\Repositories\Category;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function __construct(Model $category)
    {
        parent::__construct($category);
    }
}
