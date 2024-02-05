<?php

namespace App\Support\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface IBaseRepository
 * @package App\Repositories
 */
interface IBaseRepository
{
    /**
     * @param ...$relations
     * @return mixed
     */
    public function with(...$relations);
    public function withCount(...$relations);

    public function in(array $column);

    public function searchExact(string $keyword);

    public function search(string $keyword);
    public function whereNotNull(string $keyword);
    public function whereNull(string $keyword);
    public function where(string $keyword, string $value);

    /**
     * @param \Illuminate\Support\Collection $columns
     * @return mixed
     */
    public function searchByFilter(\Illuminate\Support\Collection $columns);

    /**
     * @param string $path
     * @return mixed
     */
    public function withPaginationPath(string $path);

    /**
     * @param int $perPage
     * @return mixed
     */
    public function withPagination(int $perPage);

    /**
     * @param int $limit
     * @return mixed
     */
    public function limit(int $limit);
    /**
     * @param string $column
     * @param string $direction
     */
    public function sortBy(string $column, string $direction);

    /**
     * @param string $column
     * @param string $attribute
     * @return mixed
     */
    public function findInList(string $column, string $attribute);

    /**
     * @param string $column
     * @param string $attribute
     * @return mixed
     */
    public function findInListWhereIn(string $column, array $attribute);

    /**
     * @return Collection|LengthAwarePaginator
     */
    public function all():Collection|LengthAwarePaginator;

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id):?Model;
    /**
     * @param array $attributes
     * @return Model|null
     */
    public function create(array $attributes):?Model;

    /**
     * @param array $attributes
     * @return bool
     */
    public function massCreate(array $attributes):bool;
    /**
     * @param int $id
     * @param array $attributes
     * @return Model|null
     */
    public function update(int $id, array $attributes):?Model;

    /**
     * @param array $criteria
     * @param array $data
     * @return bool
     */
    public function updateByAttribute(array $criteria, array $data):bool;

    /**
     * Deletes a model.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;

    /**
     * Delete a model with attribute criteria
     * @param array $attributes
     * @return bool
     * @throws \Exception
     */
    public function deleteByAttributes(array $attributes = []):bool;

    /**
     * Deletes multiple entries by attribute
     * @param \Illuminate\Support\Collection $collection
     * @param string $attribute
     * @return bool
     */
    public function massDeleteByAttribute(\Illuminate\Support\Collection $collection, string $attribute):bool;

    /**
     * Updates multiple entries by attribute
     * @param string $attribute
     * @param \Illuminate\Support\Collection $collection
     * @param array $data
     * @return bool
     */
    public function massUpdateByAttribute(string $attribute, \Illuminate\Support\Collection $collection, array $data):bool;

    /**
     * @param \Illuminate\Support\Collection $collection
     * @param array $data
     * @return bool
     */
    public function massUpdate(\Illuminate\Support\Collection $collection, array $data):bool;

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return Model
     */
    public function getById($id):Model;

    /**
     * Get Model by id without Fail
     *
     * @param int $id
     * @return Model
     */
    public function getByIdWithoutFail($id):?Model;

    /**
     * @param $attribute
     * @param $value
     * @return Model
     */
    public function findByAttribute($attribute, $value):?Model;


    /**
     * @param $attribute
     * @param $operator
     * @param $value
     * @return Model|null
     */
    public function findByAttributeWithOperator($attribute, $operator, $value):?Model;
    /**
     * @param array $attributes
     * @return Model|null
     */
    public function findByAttributes(array $attributes):?Model;
    /**
     * @param $attribute
     * @param $value
     * @return Collection|LengthAwarePaginator
     */
    public function findAllByAttribute($attribute, $value):Collection|LengthAwarePaginator;

    /**
     * @param $attributes
     * @return Collection|LengthAwarePaginator
     */
    public function findAllByAttributes(array $attributes):Collection|LengthAwarePaginator;

    /**
     * @param $attribute
     * @param $values
     * @return Collection|LengthAwarePaginator
     */
    public function findAllWhereIn($attribute, array $values):Collection|LengthAwarePaginator;

    /**
     * @param $attribute
     * @param $value
     * @return int
     */
    public function count($attribute, $value):int;

    /**
     * @param array $attributes
     * @return int
     */
    public function countByAttributes(array $attributes):int;

    /**
     * @param array $attributes
     * @return int
     */
    public function countWhereInByAttributes(array $attributes):int;

    /**
     * @return mixed
     */
    public function allCount();

    /**
     * @param $attribute
     * @param $value
     * @return Collection|LengthAwarePaginator
     */
    public function findAllByLikeAttribute($attribute, $value):Collection|LengthAwarePaginator;

    /**
     * @param $table
     * @param $column
     * @param $value
     * @return mixed
     */
    public function whereHas($table, $column, $value);

    /**
     * @param $table
     * @param $column
     * @param array $dates
     * @return mixed
     */
    public function whereHasBetween($table, $column, array $dates);

}
