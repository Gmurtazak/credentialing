<?php

namespace App\Repositories\User;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements IUserRepository
{
    /**
     * UserRepository constructor.
     * @param Model $user
     */
    public function __construct(Model $user)
    {
        parent::__construct($user);
    }

    public function forgotEmail($email){
        return $this->model->where('email', $email)->update(['remember_token'=>\Str::random(60)]);
    }
}
