<?php

namespace App\Repositories\Subject;

interface SubjectRepositoryInterface
{
    public function create($inputs);
    public function insert($inputs);
    public function update($attributes, $id);
    public function destroy($id);
    public function paginate($limit);
    public function find($id);
}
