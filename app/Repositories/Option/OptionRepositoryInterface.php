<?php

namespace App\Repositories\Option;

interface OptionRepositoryInterface
{
    public function create($inputs);
    public function insert($inputs);
    public function update($attributes, $id);
    public function destroy($id);
    public function paginate($limit);
    public function find($id);
    public function lists($column, $key = null);
    public function findBy($column, $option);
}
