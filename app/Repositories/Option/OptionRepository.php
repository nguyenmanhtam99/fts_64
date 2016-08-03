<?php

namespace App\Repositories\Option;

use App\Repositories\BaseRepository;
use App\Models\Option;

class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    public function __construct(Option $option)
    {
        $this->model = $option;
    }
}