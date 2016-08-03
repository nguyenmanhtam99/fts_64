<?php

namespace App\Repositories\UserQuestion;

use App\Repositories\BaseRepository;
use App\Models\UserQuestion;

class UserQuestionRepository extends BaseRepository implements UserQuestionRepositoryInterface
{
    public function __construct(UserQuestion $userQuestion)
    {
        $this->model = $userQuestion;
    }

    public function createUserQuestion($userId, $questionId)
    {
            $userQuestion[] = [
                'user_id' => $userId,
                'question_id' => $questionId,
            ];
        $data = $this->model->insert($userQuestion);
        return $data;
    }
}


