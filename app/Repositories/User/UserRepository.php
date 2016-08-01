<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * [__construct description]
     * @param User $user [description]
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * [all description]
     * @return [type] [description]
     */
    public function all()
    {
        $data = $this->model->all();
        if (!$data) {
            throw new Exception("general/message.item_not_exist");
        }
        return $data;
    }

    /**
     * [whereEmail description]
     * @param  [type] $email [description]
     * @return [type]        [description]
     */
    public function whereEmail($email)
    {
        return $this->model->where('email', $email);
    }

    /**
     * [user_create description]
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    public function user_create(array $data)
    {
        return $this->model->create($data);
    }
}
