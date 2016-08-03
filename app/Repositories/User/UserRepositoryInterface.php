<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function paginate($limit);
    public function userQuestion($id);
}
