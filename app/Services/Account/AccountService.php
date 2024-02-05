<?php

namespace App\Services\Account;

use App\Dto\AccountAndBenchmarkData;
use App\Dto\AccountData;
use App\Models\AccountsAndBenchmark;
use App\Repositories\Account\IAccountRepository;
use App\Repositories\AccountAndBenchmark\IAccountAndBencmarkRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class AccountService
{
    /**
     * @var
     */
    protected IAccountRepository $repository;

    /**
     * @param IAccountRepository $accountRepository
     */
    public function __construct(IAccountRepository $accountRepository)
    {
        $this->repository = $accountRepository;
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function getById(int $category_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($category_id);
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function find(int $category_id): ?Model
    {
        return $this->repository->find($category_id);
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

    /**
     * @param $attr
     * @param $value
     * @return Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllByAttribute($attr,$value): Collection|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->repository->findAllByAttribute($attr, $value);
    }

    /**
     * @param AccountData $accountData
     * @return Model|null
     */
    public function create(AccountData $accountData): ?Model
    {
        $accountData->setCreatedAt(now());
        return $this->repository->create($accountData->except('id')->toArray());
    }

    /**
     * @param AccountData $accountData
     * @return Model|null
     */
    public function update(AccountData $accountData): ?Model
    {
        $accountData->setUpdatedAt(now());
        return $this->repository->update($accountData->getId(), $accountData->except('id', 'created_at')->toArray());
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
    public function GetAccountProject(int $Accountid): mixed
    {
        return $this->repository->GetAccountProject($Accountid);
    }
    public function GetAccountBySale(): mixed
    {
        return $this->repository->GetAccountBySale();
    }

}
