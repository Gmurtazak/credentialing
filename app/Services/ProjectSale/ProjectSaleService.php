<?php

namespace App\Services\ProjectSale;

use App\Dto\ProjectSaleAgentDetailData;
use App\Dto\ProjectSaleData;
use App\Dto\ProjectSaleDetailData;
use App\Dto\ProjectSaleLogData;
use App\Dto\ProjectSaleProductionDetailData;
use App\Models\ProjectSale;
use App\Models\ProjectSaleAgentDetail;
use App\Models\User;
use App\Repositories\ProjectSale\IProjectSaleRepository;
use App\Repositories\ProjectSaleAgentDetail\IProjectSaleAgentDetailRepository;
use App\Repositories\ProjectSaleDetail\IProjectSaleDetailRepository;
use App\Repositories\ProjectSaleLog\IProjectSaleLogRepository;
use App\Repositories\ProjectSaleProductionDetail\IProjectSaleProductionDetailRepository;
use App\Support\Dto\ListViewData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

/**
 *
 */
class ProjectSaleService
{
    /**
     * @var
     */
    protected $repository;
    /**
     * @var IProjectSaleDetailRepository
     */
    protected $projectSaleDetail;
    /**
     * @var IProjectSaleAgentDetailRepository
     */
    protected $projectSaleAgentDetail;
    /**
     * @var IProjectSaleProductionDetailRepository
     */
    protected $projectSaleProductionDetail;
    /**
     * @var IProjectSaleLogRepository
     */
    protected $projectSaleLog;

    /**
     * @param IProjectSaleRepository $projectSaleRepository
     * @param IProjectSaleDetailRepository $projectSaleDetailRepository
     * @param IProjectSaleAgentDetailRepository $projectSaleAgentDetailRepository
     * @param IProjectSaleProductionDetailRepository $projectSaleProductionDetailRepository
     * @param IProjectSaleLogRepository $projectSaleLogRepository
     */
    public function __construct(IProjectSaleRepository $projectSaleRepository, IProjectSaleDetailRepository $projectSaleDetailRepository, IProjectSaleAgentDetailRepository $projectSaleAgentDetailRepository, IProjectSaleProductionDetailRepository $projectSaleProductionDetailRepository, IProjectSaleLogRepository $projectSaleLogRepository)
    {
        $this->repository = $projectSaleRepository;
        $this->projectSaleDetail = $projectSaleDetailRepository;
        $this->projectSaleAgentDetail = $projectSaleAgentDetailRepository;
        $this->projectSaleProductionDetail = $projectSaleProductionDetailRepository;
        $this->projectSaleLog = $projectSaleLogRepository;
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
     * @param int $projectSaleId
     * @return Model|null
     */
    public function find(int $projectSaleId): ?Model
    {
        return $this->repository->with('projectSaleDetail', 'projectSaleAgentDetail', 'projectSaleProductionDetail', 'client')->find($projectSaleId);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy')->sortBy('id', 'desc')->all();
    }
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function nonSaleProject(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy')
            ->where('is_convertion',0)
            ->sortBy('id', 'desc')->all();
    }

    public function getcurrentproject(int $user_id): mixed
    {
        return $this->repository->getCurrentProject($user_id);
    }
    public function getallproject(): mixed
    {
        $s = $this->repository->getallproject();
        return $s;
    }
    public function getprojectprice(): mixed
    {
        $s = $this->repository->getprojectprice();
        return $s;
    }
    public function getsaleamount(): mixed
    {
        $s = $this->repository->getsaleamount();
        return $s;
    }
    public function getamountreceived(): mixed
    {
        $s = $this->repository->getamountreceived();
        return $s;
    }
    public function getamountdue(): mixed
    {
        $s = $this->repository->getamountdue();
        return $s;
    }

    /**
     * @param $attr
     * @param $value
     * @return Model|null
     */
    public function findByAttribute($attr, $value): ?Model
    {
        return $this->repository->findByAttribute($attr, $value);
    }

    /**
     * @param ProjectSaleData $projectSaleData
     * @return Model|null
     */
    public function create(ProjectSaleData $projectSaleData): ?Model
    {
        $projectSaleData->setCreatedAt(now());
        return $this->repository->create($projectSaleData->except('id')->toArray());
    }

    /**
     * @param ProjectSaleData $projectSaleData
     * @param ProjectSaleDetailData|null $projectSaleDetailData
     * @param ProjectSaleAgentDetailData|null $projectSaleAgentDetailData
     * @param ProjectSaleProductionDetailData|null $projectSaleProductionDetailData
     * @param $projectSaleLogData
     * @return Model|null
     */
    public function update(ProjectSaleData $projectSaleData, ProjectSaleDetailData $projectSaleDetailData = null, ProjectSaleAgentDetailData $projectSaleAgentDetailData = null, ProjectSaleProductionDetailData $projectSaleProductionDetailData = null, $projectSaleLogData = null): ?Model
    {
        // dd($projectSaleLogData);
        if ($projectSaleLogData != "") {
            $projectSaleLogData->setCreatedAt(now());
            $this->projectSaleLog->create($projectSaleLogData->except('id')->toArray());
        }
        $projectSaleData->setUpdatedAt(now());

        if ($projectSaleDetailData->account_id) {
            //Project Sale Detail
            $projectSaleDetailData->setProjectSaleId($projectSaleData->getId());
            $projectSaleDetailData->setCreatedAt(now());
            $projectSaleDetailData->setUpdatedAt(now());
            $projectSaleDetailData->setIsActive(true);
            $this->projectSaleDetail->create($projectSaleDetailData->except('id')->toArray());
        }

        if ($projectSaleAgentDetailData->bidder_id) {
            //Project Sale Agent Detail
            $projectSaleAgentDetailData->setProjectSaleId($projectSaleData->getId());
            $projectSaleAgentDetailData->setIsActive(true);
            $this->projectSaleAgentDetail->create($projectSaleAgentDetailData->except('id')->toArray());
        }

        if ($projectSaleProductionDetailData->production_type) {
            //Project Sale Production Detail
            $projectSaleProductionDetailData->setProjectSaleId($projectSaleData->getId());
            $projectSaleProductionDetailData->setIsActive(true);
            $projectSaleProductionDetailData->setCreatedAt(now());
            $projectSaleProductionDetailData->setUpdatedAt(now());
            $this->projectSaleProductionDetail->create($projectSaleProductionDetailData->except('id')->toArray());
        }

        return $this->repository->update($projectSaleData->getId(), $projectSaleData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData, $sale) //: mixed
    {
        // ghulam

        $perPage = $listViewData->perPage;
        $bidder= isBidder($listViewData->userId);
        $userTeamId = userTeamId($listViewData->userId);
        $dateSS = Carbon::now()->startOfMonth()->subMonth(0);
        $dateEE = Carbon::today()->format('Y-m-d');
        if ($bidder){
            return $this->repository->where('is_convertion', 0)
                ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->search($listViewData->query)
                //->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)
                ->where('created_by',$listViewData->userId)
                ->whereBetween('contact_date',[$dateSS,$dateEE])
                ->all();


        }
        $bidder= isCloser($listViewData->userId);
        if ($bidder){
            return $this->repository
                ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->search($listViewData->query)
                //->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)
                ->where('created_by',$listViewData->userId)
                ->whereBetween('created_at',[$dateSS,$dateEE])
                ->all();

        }


        if ($sale == '1') {

            if (userRole($listViewData->userId) == 'administrator') {

                if ($listViewData->bidder) {
                    return $this->repository->where('created_by', $listViewData->bidder)
                        ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                        //->search($listViewData->bidder)
                        ->withPagination($perPage)
                        ->where('is_convertion', 0)
                        ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)
                        ->all();
                }else{
                    return $query = $this->repository->where('is_convertion', 0)
                        ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                        ->in(['project_name'])
                    //->withPagination(50)
                        ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
                    if ($listViewData->query) {
                        $query = $query->search($listViewData->query);
                    }
                    if ($listViewData->team) {
                        $query = $query->where('team_id',  $listViewData->team);
                    }
                    if ($listViewData->dates) {
                        $date = getCalendarDates($listViewData->dates);
                        $query = $query->whereBetween('created_at', $date);
                    }
                    //return  $query->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
                }
            }

            $query = $this->repository->where('created_by', $listViewData->userId)
                ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->withPagination($perPage);
            //->search($listViewData->query)
            if ($listViewData->query) {
                $query->where('project_name', $listViewData->query);
            }
            //if ($listViewData->query) {
            //     $query = $query->search($listViewData->query);
            //   }
            return $query->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();


        }

        if ($listViewData->query && $listViewData->dates && $listViewData->team) {
            $date = getCalendarDates($listViewData->dates);
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->in(['project_name'])
                ->whereBetween('created_at', $date)
                ->search($listViewData->query)
                ->whereHas('projectSaleAgentDetail', 'team_id', $listViewData->team)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        if ($listViewData->query && $listViewData->dates) {
            $date = getCalendarDates($listViewData->dates);
            // dd($date);
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->in(['project_name'])
                ->whereBetween('created_at', $date)
                ->search($listViewData->query)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if(userRole($listViewData->userId) != 'administrator'){
                $check->whereHas('projectSaleAgentDetailForTeam', 'team_id', $userTeamId);
            }
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        if ($listViewData->query && $listViewData->team) {
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->in(['project_name'])
                ->search($listViewData->query)
                ->whereHas('projectSaleAgentDetail', 'team_id', $listViewData->team)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        if ($listViewData->dates && $listViewData->team) {
            $date = getCalendarDates($listViewData->dates);
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->whereHas('projectSaleAgentDetail', 'team_id', $listViewData->team)
                ->whereBetween('created_at', $date)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        if ($listViewData->query) {
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->in(['project_name'])
                ->search($listViewData->query)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if(userRole(Auth::id()) != 'administrator'){
                $check->whereHas('projectSaleAgentDetailForTeam', 'team_id', $userTeamId);
            }
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            }
            else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        elseif ($listViewData->dates) {
            $date = getCalendarDates($listViewData->dates);
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                //->whereBetween('meeting_datetime', $date)
                //->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if(userRole(Auth::id()) != 'administrator'){
                $check->whereHas('projectSaleAgentDetailForTeam', 'team_id', $userTeamId);
            }
            $check->whereHasBetween('projectSaleDetail','updated_at', $date);
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            $check->all();
        }
        elseif ($listViewData->team) {
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->withPagination($perPage)
                ->whereHas('projectSaleAgentDetail', 'team_id', $listViewData->team)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);
            if ($sale == '1') {
                $check->where('is_convertion', 0);
            } else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        elseif ($listViewData->bidder) {
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                //->in(['created_by'])
                //->search($listViewData->bidder)
                ->withPagination($perPage)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);

            if ($sale == '1') {
                $check->where('created_by', $listViewData->bidder);
            }
            else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        elseif ($listViewData->closer) {
            $check = $this->repository
                ->with('projectSaleDetail', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                ->withPagination($perPage)
                ->whereHas('projectSaleAgentDetail', 'closer_id', $listViewData->closer)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection);

            if ($sale == '1') {
                $check->where('is_convertion', 0);
            }
            else {
                $check->where('is_convertion', 1);
            }
            return $check->all();
        }
        else {
            //Sale
            if (userRole(Auth::id()) == 'administrator') {
                return $this->repository->where('is_convertion', 1)
                    ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                    //->withPagination($perPage)
                    //->where('created_by', $listViewData->userId)
                    ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
            return $this->repository->where('is_convertion', 1)
                ->with('projectSaleDetail.account', 'projectSaleDetail.portal', 'projectSaleAgentDetail.bidder', 'projectSaleAgentDetail.closer', 'projectSaleAgentDetail.caller', 'projectSaleAgentDetail.team', 'projectSaleProductionDetail', 'projectType', 'client','createdBy','team')
                //->withPagination(50)
                // whereHas($table, $column, $value)
                ->whereHas('projectSaleAgentDetailForTeam', 'team_id', $userTeamId)
                ->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

    /**
     * @return bool
     */
    public function resetStatus()
    {
        $projectSales = $this->repository->resetStatus();
        $projectSales?->each(function ($item) {
            $item->update(['is_convertion' => 0]);
        });
        return true;
    }
    /**
     * @param int $projectSaleId
     * @return Model|null
     */
    public function ProjectSaleLog(int $projectSaleId): ?Model
    {
        return $this->repository->with('projectSaleLog')->find($projectSaleId);
    }
    /**
     * @param $userId
     * @return mixed
     */
    public function GetUsertarget()
    {
        return $this->repository->getUserTarget();
    }
    public function GetSortUsertarget($month)
    {
        return $this->repository->getsortUsertarget($month);
    }
    public function GetCurrentSale()
    {
        return $this->repository->getCurrentsale();
    }
    public function GetLastSale()
    {
        return $this->repository->getlastsale();
    }
}
