<?php

namespace App\Repositories\File;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class FileRepository extends BaseRepository implements IFileRepository
{
    public function __construct(Model $file)
    {
        parent::__construct($file);
    }
}
