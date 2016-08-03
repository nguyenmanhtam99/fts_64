<?php

namespace App\Repositories;

use Carbon\Carbon;
use DB;

class BaseRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Get number of records.
     *
     * @return int
     */
    public function count()
    {
        $total = $this->model->count();
        return $total;
    }

    /**
     * Destroy a model.
     *
     * @param  int $id
     * @return int
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $data = $this->model->destroy($id);
        DB::commit();
        return $data;
    }

    /**
     * Get Model by id.
     *
     * @param  int $id
     * @param  array $columns
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get All Models
     *
     * @param  array $columns
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Create a model.
     *
     * @param  array $inputs
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($inputs)
    {
        return $this->model->create($inputs);
    }

    /**
     * Create multiple models.
     *
     * @param  array $inputs
     * @return int
     */
    public function insert($inputs)
    {
        $now = Carbon::now();
        foreach ($inputs as &$input) {
            $input['created_at'] = $now;
            $input['updated_at'] = $now;
        }
        return $this->model->insert($inputs);
    }

    /**
     * Update a model.
     *
     * @param array $attributes
     * @param int $id
     * @return bool|int
     */
    public function update($attributes, $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    /**
     * Get Table Name
     *
     * @return string
     */
    public function tableName()
    {
        return $this->model->getTable();
    }

    /**
     * Get an array with the values of a given column.
     *
     * @param  string $column
     * @param  string $key
     * @return \Illuminate\Support\Collection
     */
    public function lists($column, $key = null)
    {
        return $this->model->lists($column, $key);
    }

    /**
     * Get an array with the values of a given column.
     *
     */
    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function findBy($column, $option)
    {
        $data = $this->model->where($column, $option)->get();

        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }
        return $data;
    }
}
