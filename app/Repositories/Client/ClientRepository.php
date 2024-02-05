<?php

namespace App\Repositories\Client;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ClientRepository extends BaseRepository implements IClientRepository
{
    public function __construct(Model $client)
    {
        parent::__construct($client);
    }
}
