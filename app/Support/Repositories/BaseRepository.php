<?php

namespace App\Support\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    // Our Eloquent model

    public $model;

    /**
     * @var bool
     */
    public bool $pagination = false;
    /**
     * @var int
     */
    public int $perPage = 10;
    /**
     * @var bool
     */
    public bool $paginationPath = false;
    /**
     * @var string
     */
    public string $withPath = '';

    /**
     * @var array
     */
    private array $in = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return $this
     */
    public function withPagination(int $perPage): BaseRepository
    {
        $this->pagination = true;
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): BaseRepository
    {
        $this->model = $this->model->limit($limit);
        return $this;

    }

        /**
     * @param string $withPath
     * @return $this
     */
    public function withPaginationPath(string $withPath): BaseRepository
    {
        $this->paginationPath = true;
        $this->withPath = $withPath;
        return $this;
    }

    /**
     * @return Collection|LengthAwarePaginator
     */
    public function all(): Collection|LengthAwarePaginator
    {
        return $this->pagination ? $this->model->paginate($this->perPage)->withQueryString()->withPath($this->withPath) : $this->model->get();

    }

    /**
     * @param array $columns
     * @return $this
     */
    public function in(array $columns): self
    {
        $this->in = array_merge($this->in, $columns);
        return $this;
    }

    /**
     * @param string $keyword
     * @return BaseRepository
     */
    public function searchExact(string $keyword): self
    {
        foreach ($this->in as $column) {
            $this->model = $this->model->where($column, $keyword);
        }
        return $this;
    }

    /**
     * @param \Illuminate\Support\Collection $columns
     * @return $this
     */
    public function searchByFilter(\Illuminate\Support\Collection $columns): self
    {
        $columns = $columns->filter(function ($val) {
            return $val !== NULL;
        });
        foreach ($columns->except(['total_credit_limit_to','total_credit_limit_from','date_from', 'date_to', 'mobile_number', 'workcode_id','start_date','end_date']) as $column => $value) {
            $this->model = $this->model->where($column, 'ILIKE', '%' . $value . '%');
            //$this->model = $this->model->where($column, $value);
        }
        if (isset($columns['workcode_id'])) {
            $this->model = $this->model->where('workcode_id', $columns['workcode_id']);
        }
        if (isset($columns['date_from'])) {
            $this->model = $this->model->whereDate('created_at', '>=', $columns['date_from']);
        }
        if (isset($columns['date_to'])) {
            $this->model = $this->model->whereDate('created_at', '<=', $columns['date_to']);
        }
        if (isset($columns['start_date'])) {
            $this->model = $this->model->whereDate('date_time', '>=', $columns['start_date']);
        }
        if (isset($columns['end_date'])) {
            $this->model = $this->model->whereDate('date_time', '<=', $columns['end_date']);
        }
        if (isset($columns['total_credit_limit_from'])) {
            $this->model = $this->model->where('total_credit_limit', '>=', $columns['total_credit_limit_from']);
        }
        if (isset($columns['total_credit_limit_to'])) {
            $this->model = $this->model->where('total_credit_limit', '<=', $columns['total_credit_limit_to']);
        }
        return $this;
    }

    /**
     * @param string|null $keyword
     * @return $this
     */
    public function search(?string $keyword): self
    {
        $this->model = $this->model->where(function ($query) use ($keyword) {
            foreach ($this->in as $column) {
                $query = $query->orWhere($column, 'LIKE', '%' . $keyword . '%');
            }
            return $query;
        });
        return $this;
    }
    public function whereBetween($attribute, $value): static
    {
        $this->model = $this->model->whereBetween($attribute, [$value[0], $value[1]]);
        return $this;
    }

    /**
     * @param string $keyword
     * @return $this
     */
    public function whereNotNull(string $keyword): self
    {
        $this->model = $this->model->whereNotNull($keyword);
        return $this;
    }

    /**
     * @param string $keyword
     * @return $this
     */
    public function whereNull(string $keyword): self
    {
        $this->model = $this->model->whereNull($keyword);
        return $this;
    }

    /**
     * @param string $column
     * @param string $direction
     * @return BaseRepository
     */
    public function sortBy(string $column, string $direction): self
    {
        $this->model = $this->model->orderBy($column, $direction);
        return $this;
    }

    /**
     * @param string $column
     * @param string $direction
     * @return BaseRepository
     */
    public function findInList(string $column, string $attribute): self
    {
        $this->model = $this->model->where($column, $attribute);
        return $this;
    }

    public function findInListWhereIn(string $column, array $attribute): self
    {
        $this->model = $this->model->whereIn($column, $attribute);
        return $this;
    }


    /**
     * @param $table
     * @param $column
     * @param $value
     * @return $this
     */
    public function whereHas($table, $column, $value){
        $this->model = $this->model->whereHas($table, function ($query) use($value,$column){
            $query->where($column, 'like', '%'.$value.'%');
        });
        return $this;
    }

    public function whereHasBetween($table, $column, $dates){
        $this->model = $this->model->whereHas($table, function ($query) use($dates,$column){
            $query->whereBetween($column, [$dates[0], $dates[1]]);
        });
        return $this;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param array $relations
     * @return BaseRepository
     */
    public function withRelation(array $relations): self
    {
        $this->model = $this->model->with($relations);
        return $this;
    }

    /**
     * @param ...$relations
     * @return BaseRepository
     */
    public function with(...$relations): self
    {
        $this->model = $this->model->with($relations);
        return $this;
    }


    /**
     * @param ...$relations
     * @return $this
     */
    public function withCount(...$relations): self
    {
        $this->model = $this->model->withCount($relations);
        return $this;
    }

    /**
     * @param array $attributes
     * @return Model|null
     */
    public function create(array $attributes): ?Model
    {
        $this->model = new $this->model;
        foreach ($attributes as $column => $value) {
            $this->model->{$column} = $value;
        }
        if ($this->model->save()) {
            return $this->model;
        }
        return null;
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function massCreate(array $attributes): bool
    {
        return $this->model->insert($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return Model|null
     */
    public function update(int $id, array $attributes): ?Model
    {
        $model = $this->model->find($id);
        if ($model !== NULL) {
            foreach ($attributes as $column => $value) {
                $model->{$column} = $value;
            }
            if ($model->save()) {
                return $model;
            }
        }
        return NULL;
    }

    /**
     * @param array $criteria
     * @param array $data
     * @return bool
     */
    public function updateByAttribute(array $criteria, array $data): bool
    {
        if (count($criteria) > 0) {
            $model = $this->model;
            foreach ($criteria as $column => $value) {
                $model = $model->where($column, '=', $value);
            }
            return $model->update($data);
        }
        return false;
    }

    /**
     * Removes a model.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param array $attributes
     * @return bool
     * @throws \Exception
     */
    public function deleteByAttributes(array $attributes = []): bool
    {
        $model = $this->model;
        foreach ($attributes as $column => $value) {
            $model = $model->where($column, '=', $value);
        }
        return $model->delete();
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param string $attribute
     * @return bool
     */
    public function massDeleteByAttribute(\Illuminate\Support\Collection $collection, string $attribute): bool
    {
        return $this->model->whereIn($attribute, $collection->all())->delete();
    }

    /**
     * @param string $attribute
     * @param \Illuminate\Support\Collection $collection
     * @param array $data
     * @return bool
     */
    public function massUpdateByAttribute(string $attribute, \Illuminate\Support\Collection $collection, array $data): bool
    {
        return $this->model->whereIn($attribute, $collection->all())->update($data);
    }

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param array $data
     * @return bool
     */
    public function massUpdate(\Illuminate\Support\Collection $collection, array $data): bool
    {
        return $this->model->whereIn('id', $collection->all())->update($data);
    }

    /**
     * Get Model by id.
     *
     * @param int $id
     * @return Model
     */
    public function getById($id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Model by id without Fail
     *
     * @param int $id
     * @return Model
     */
    public function getByIdWithoutFail($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     *
     * @param $attribute
     * @param $value
     * @return Model
     */
    public function findByAttribute($attribute, $value): ?Model
    {
        return $this->model->where($attribute, $value)->first();
    }


    /**
     * @param $attribute
     * @param $value
     * @return $this
     */
    public function where($attribute, $value): static
    {
        $this->model = $this->model->where($attribute, $value);
        return $this;
    }

    /**
     * @param $attribute
     * @param $operator
     * @param $value
     * @return Model|null
     */
    public function findByAttributeWithOperator($attribute, $operator, $value): ?Model
    {
        return $this->model->where($attribute, $operator, $value)->first();
    }

    /**
     * @param array $attributes
     * @return Collection
     */
    public function findByAttributes(array $attributes): ?Model
    {
        $model = $this->model;
        foreach ($attributes as $column => $value) {
            $model = $model->where($column, '=', $value);
        }
        return $model->first();
    }

    /**
     * @param $attribute
     * @param $value
     * @return Collection
     */
    public function findAllByAttribute($attribute, $value): Collection|LengthAwarePaginator
    {
        return $this->pagination ? $this->model->where($attribute, $value)->paginate($this->perPage) : $this->model->where($attribute, $value)->get();
    }

    /**
     * @param array $attributes
     * @return Collection
     */
    public function findAllByAttributes(array $attributes): Collection|LengthAwarePaginator
    {
        $model = $this->model;
        foreach ($attributes as $column => $value) {
            $model = $model->where($column, '=', $value);
        }
        return $this->pagination ? $model->paginate($this->perPage) : $model->get();
    }

    /**
     * @param $attribute
     * @param $values
     * @return Collection
     */
    public function findAllWhereIn($attribute, $values): Collection|LengthAwarePaginator
    {
        return $this->pagination ? $this->model->whereIn($attribute, $values)->paginate($this->perPage) : $this->model->where($attribute, $values)->get();
    }

    /**
     * @param $attribute
     * @param $values
     * @return Collection
     */
    public function findAllWhereInAll($attribute, $values): Collection|LengthAwarePaginator
    {
        return $this->model->whereIn($attribute, $values)->get();
    }

    /**
     * @param $attribute
     * @param $value
     * @return int
     */
    public function count($attribute, $value): int
    {
        return $this->model->where($attribute, $value)->count();
    }

    /**
     * @param array $attributes
     * @return int
     */
    public function countByAttributes(array $attributes): int
    {
        $model = $this->model;
        foreach ($attributes as $column => $value) {
            $model = $model->where($column, '=', $value);
        }
        return $model->count();
    }

    /**
     * @param array $attributes
     * @return int
     */
    public function countWhereInByAttributes(array $attributes): int
    {
        $model = $this->model;
        foreach ($attributes as $column => $value) {
            $model = $model->whereIn($column, $value);
        }
        return $model->count();
    }


    public function allCount()
    {
        return $this->model->count();
    }

    public function findByLikeAttribute($attribute, $value)
    {
        return $this->model->where($attribute, 'like', '%' . $value . '%')->first();
    }

    /**
     * @param $attribute
     * @param $value
     * @return Collection
     */
    public function findAllByLikeAttribute($attribute, $value): Collection|LengthAwarePaginator
    {
        return $this->pagination ? $this->model->where($attribute, 'like', '%' . $value . '%')->paginate($this->perPage) : $this->model->where($attribute, 'like', '%' . $value . '%')->get();
    }
}
