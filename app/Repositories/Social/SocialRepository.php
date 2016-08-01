<?php

namespace App\Repositories\Social;

use App\Repositories\BaseRepository;
use App\Models\Social;

class SocialRepository extends BaseRepository implements SocialRepositoryInterface
{
    /**
     * [__construct description]
     * @param Social $social [description]
     */
    public function __construct(Social $social)
    {
        $this->model = $social;
    }

    /**
     * [whereSocial_user_id description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function whereSocial_user_id($name)
    {
        return $this->model->where('social_user_id', $name);
    }

    /**
     * [whereType_social description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function whereType_social($id)
    {
        return $this->model->where('type_social', $id);
    }

    public function social_create(array $data)
    {
        return $this->model->create($data);
    }
}
