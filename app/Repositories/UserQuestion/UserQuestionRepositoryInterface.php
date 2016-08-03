<?php

namespace App\Repositories\UserQuestion;

interface UserQuestionRepositoryInterface
{
    public function insert($inputs);
    public function update($attributes, $id);
    public function destroy($id);
    public function paginate($limit);
    public function find($id);
    public function lists($column, $key = null);
    public function createUserQuestion($userId, $questionId);
}

