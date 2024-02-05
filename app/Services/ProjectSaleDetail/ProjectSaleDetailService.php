<?php

namespace App\Services\ProjectSaleDetail;

use App\Dto\ProjectSaleDetailData;
use App\Models\ProjectSaleDetail;
use App\Repositories\ProjectSale\IProjectSaleRepository;
use App\Repositories\ProjectSaleDetail\IProjectSaleDetailRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class ProjectSaleDetailService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IProjectSaleDetailRepository $projectSaleDetailRepository)
    {
        $this->repository = $projectSaleDetailRepository;
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
        return $this->repository->find($user_id);
    }


    /**
     * @param $saleamount
     * @return mixed
     */
    public static function getchecksaleamount($saleamount): mixed
    {
        $saleamount = \DB::table('project_sale_details')->select('sale_amount', DB::raw('sum(*) as total'))
            ->where('project_sale_id',$saleamount)->groupBy('project_sale_id')->get();
        return $saleamount;
    }
    /**
     * @param $saledetail
     * @return mixed
     */
    public static function getchecksaledetail($saledetail): mixed
    {

        $saledetail = \DB::table('project_sale_details')
        ->where('project_sale_id',$saledetail)->get();
        return $saledetail;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->sortBy('id','desc')->all();
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

    public function create(ProjectSaleDetailData $projectSaleDetailData): ?Model
    {

        $projectSaleDetailData->setCreatedAt(now());
        return $this->repository->create($projectSaleDetailData->except('id')->toArray());
    }

    public function update(ProjectSaleDetailData $projectSaleData): ?Model
    {
        $projectSaleData->setUpdatedAt(now());
        return $this->repository->update($projectSaleData->getId(), $projectSaleData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }
}
