<?php

namespace App\Repositories\Subject;

use App\Repositories\BaseRepository;
use App\Models\Subject;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }
}
