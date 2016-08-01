<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        $data = $this->model->all();
        if (!$data) {
            throw new Exception("general/message.item_not_exist");
        }
        return $data;
    }
}
