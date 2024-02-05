<?php

namespace App\Services\User;

use App\Dto\UserData;
use App\Models\User;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class UserService
{
    /**
     * @var
     */
    protected $repository;

    /**
     * UserService constructor.
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @param int $user_id
     * @return Model|null
     */
    public function getById(int $user_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($user_id);
    }

    /**
     * @param int $user_id
     * @return Model|null
     */
    public function find(int $user_id): ?Model
    {
        return $this->repository->with('roles')->find($user_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->sortBy('name','ASC')->all();
    }

    /**
     * @param $typeId
     * @return Collection
     */
    public function byType($typeId): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->findAllByAttribute('user_type_id', $typeId);
    }

    /**
     * @param $email
     * @return Model|null
     */
    public function findByEmail($email): ?Model
    {
        return $this->repository->findByAttribute('email', $email);
    }

    /**
     * @param $attr
     * @param $value
     * @return Model|null
     */
    public function findByAttribute($attr,$value): ?Model
    {
        return $this->repository->findByAttribute($attr, $value);
    }

    /**
     * @param array $userData
     * @return Model|null
     */
    public function authenticate(Array $userData)
    {
        $user = \Auth::attempt($userData);
        if($user){
            return $this->find(\Auth::id());
        } else{
            return false;
        }
    }

    /**
     * @param UserData $userData
     * @return Model|null
     */
    public function create(UserData $userData): ?Model
    {
        $userData->setCreatedAt(now());
        $upload_file_path = 'user/';
        if($userData->getFile()) {
            $new_file_name = time() . '.' . $userData->getFile()->getClientOriginalExtension();
            $userData->setImage($new_file_name);
            $userData->getFile()->storeAs($upload_file_path, $new_file_name);
        }
        $user = $this->repository->create($userData->except('id','role_id','project','file','project_type','accounts_id')->toArray());
        $user?->roles()->sync($userData->role_id);

        if($userData->accounts_id){
            $projects = explode(',',$userData->accounts_id);
            $userProject = [];
            foreach($projects as $ind=>$prj){
                $data['user_id'] = $user->id;
                $data['accounts_id'] = $prj;
                array_push($userProject,$data);
            }
            \DB::table('users_accounts')->insert($userProject);
        }
//
//        if($userData->project_type){
//            $projectTypes = explode(',',$userData->project_type);
//            $userProjectTypes = [];
//            foreach($projectTypes as $ind=>$prjT){
//                $data['user_id'] = $user->id;
//                $data['project_type_id'] = $prjT;
//                array_push($userProjectTypes,$data);
//            }
//            \DB::table('user_project_types')->insert($userProjectTypes);
//        }
        return $user;
    }

    /**
     * @param UserData $userData
     * @return Model|null
     */
    public function update(UserData $userData): ?Model
    {
        //dd($userData->accounts_id);
        $upload_file_path = 'user/';
        $userData->setUpdatedAt(now());
        if($userData->getFile()){
            $new_file_name = time() . '.' . $userData->getFile()->getClientOriginalExtension();
            $userData->setImage($new_file_name);
            $userData->getFile()->storeAs($upload_file_path, $new_file_name);
        }

        $user = $this->repository->update($userData->getId(), $userData->except('id', 'created_at','role_id','employee_id','project','file','project_type','password','accounts_id')->toArray());
        $user?->roles()->sync($userData->role_id);
        if($userData->account_id){
            $projects = explode(',',$userData->account_id);
            $userProject = [];
            foreach($projects as $ind=>$prj){
                $data['user_id'] = $user->id;
                $data['accounts_id'] = $prj;
                array_push($userProject,$data);
            }
            \DB::table('users_accounts')->insert($userProject);
        }
        return $user;
        //dd($userData->id);


//        $user?->roles()->sync($userData->role_id);
//        if($userData->project){
//            \DB::table('user_projects')->where('user_id',$userData->getId())->delete();
//            $projects = explode(',',$userData->project);
//            $userProject = [];
//            $data = [];
//            $projects = array_unique($projects);
//            foreach($projects as $ind=>$prj){
//                $data['user_id'] = $userData->getId();
//                $data['project_id'] = $prj;
//                array_push($userProject,$data);
//            }
//            \DB::table('user_projects')->insert($userProject);
//        }
//
//        if($userData->project_type){
//            \DB::table('user_project_types')->where('user_id',$userData->getId())->delete();
//            $projectTypes = explode(',',$userData->project_type);
//            $userProjectTypes = [];
//            $data = [];
//            $projectTypes = array_unique($projectTypes);
//            foreach($projectTypes as $ind=>$prjT){
//                $data['user_id'] = $userData->getId();
//                $data['project_type_id'] = $prjT;
//                array_push($userProjectTypes,$data);
//            }
//            \DB::table('user_project_types')->insert($userProjectTypes);
//        }

    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData,$ids=null): mixed
    {
        //dd($listViewData);
        $perPage = $listViewData->perPage;
        if($ids){
            if ($listViewData->query) {

                return $this->repository->with('department','team','report','roles')->in(['name', 'email', 'team'])->whereHas('team', 'id', 5)->search($listViewData->query)->findInListWhereIn('id',$ids)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all();
            } else {

                return $this->repository->with('department','team','report','roles')->findInListWhereIn('id',$ids)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all();
            }
        } else{
            if ($listViewData->query) {

                //->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all());

                $res = $this->repository->with('department','team','report','roles')
                    ->in(['name', 'email'])->search($listViewData->query)->withPagination($perPage)
                    ->whereHas('team', 'id', $listViewData->team)
                    ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all();
                return $res;
            } else {
                if($listViewData->team){
                    $res = $this->repository->with('department','team','report','roles')
                        ->in(['name', 'email'])->withPagination($perPage)
                        ->whereHas('team', 'id', $listViewData->team)
                        ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all();
                    return $res;
                }else{
                return $this->repository->with('department','team','report','roles')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->whereNotNull('report_to')->all();
            }
            }
        }

    }

    /**
     * @param $email
     * @return false|Model
     */
    public function forgotPassword($email)
    {
        $user = $this->findByEmail($email);
        if($user){
            $this->repository->forgotEmail($email);
            return $user;
        } else{
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function resetPassword($data): bool
    {
        $user = $this->findByAttribute('remember_token',$data['token']);
        if($user){
            $this->repository->update($user->id,['remember_token'=>null,'password'=>bcrypt($data['password'])]);
            return true;
        } else{
            return false;
        }
    }

    /**
     * @param $projectType
     * @return mixed
     */
    public function getAllUsersByProjectType($projectType): mixed
    {
        return \DB::table('user_project_types')->join('users','users.id','=','user_project_types.user_id')->where('project_type_id',$projectType)->pluck('name','id');;
    }

    /**
     * @param $projectId
     * @return mixed
     */
    public function getAllUsersByProject($projectId): mixed
    {
        return \DB::table('user_projects')->join('users','users.id','=','user_projects.user_id')->where('project_id',$projectId)->pluck('name','id');;
    }

    /**
     * @param $teamId
     * @return mixed
     */
    public function getAllUsersByTeam($teamId): mixed
    {
        return \DB::table('users')->where('team_id',$teamId)->pluck('name','id');;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function getAllUsersByAccount($userId): mixed
    {
        $user = \DB::table('users_accounts')->where('user_id',$userId)->get()->except('id','accounts_id')->toArray();
        return $user;
    }

}
