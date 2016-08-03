<?php

namespace App\Repositories\Question;

use App\Models\Option;
use App\Models\UserQuestion;
use App\Repositories\BaseRepository;
use App\Models\Question;
use App\Repositories\UserQuestion\UserQuestionRepositoryInterface;
use DB;
use Auth;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function __construct(Question $question)
    {
        $this->model = $question;
    }

    public function create($inputs)
    {
        DB::beginTransaction();
        $question =  $this->model->create($inputs);
        $questionId = $question->id;
        $userQuestion[] = [
            'user_id' => Auth::user()->id,
            'question_id' => $questionId,
        ];
        $data = UserQuestion::insert($userQuestion);
        if (!$data) {
            throw new Exception(trans('question.not_found'));
        }
        $arrayContent = $inputs['option_content'];
        $arrayIsCorrect = $inputs['option_is_correct'];
        if (!isset($arrayIsCorrect)) {
            $arrayIsCorrect = config('user.is_correct.false');
        }
        $option = [];
        foreach ($arrayContent as $key => $content) {
            $option[] = [
                'content' => $arrayContent[$key],
                'is_correct' => $arrayIsCorrect[$key],
                'question_id' => $question->id,
            ];
        }
        $option = Option::insert($option);
        DB::commit();
        if (!$option) {
            throw new Exception(trans('question.not_found'));
        }
    }
}
