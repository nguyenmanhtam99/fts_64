<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Option\OptionRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Subject\SubjectRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserQuestion\UserQuestionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    private $questionRepository;
    private $optionRepository;
    private $subjectRepository;
    private $userRepository;
    private $userQuestionRepository;

    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        OptionRepositoryInterface $optionRepository,
        SubjectRepositoryInterface $subjectRepository,
        UserRepositoryInterface $userRepository,
        UserQuestionRepositoryInterface $userQuestionRepository
    )
    {
        $layout = config('common.layouts.login.default');
        parent::__construct($layout);
        $this->questionRepository = $questionRepository;
        $this->optionRepository = $optionRepository;
        $this->subjectRepository = $subjectRepository;
        $this->userRepository = $userRepository;
        $this->userQuestionRepository = $userQuestionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userQuestion = $this->userRepository->userQuestion(Auth::user()->id);
        return view('admin.question.index', compact('userQuestion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = $this->subjectRepository->lists('name', 'id');
        return view('admin.question.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestAll = $request->all();
        $question = $this->questionRepository->create($requestAll);
        if (!$question) {
            return redirect()->route('admin.questions.index')
                ->withErrors(['message' => trans('question.not_found')]);
        }
        return redirect()->route('admin.questions.index')->withSuccess(trans('session.subject_create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
