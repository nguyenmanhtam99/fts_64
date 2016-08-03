<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Repositories\Subject\SubjectRepositoryInterface;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $layout = config('common.layouts.login.default');
        parent::__construct($layout);
        $this->subjectRepository = $subjectRepository;
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepository->paginate(config('common.paginate'));
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $requestAll = $request->all();
        $subject = $this->subjectRepository->create($requestAll);
        if (!$subject) {
            return redirect()->route('admin.subjects.index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }
        return redirect()->route('subjects.index')->withSuccess(trans('session.subject_create_success'));
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
        $subject = $this->subjectRepository->find($id);
        if (!$subject) {
            return redirect()->route('admin.subjects.index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }
        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $requestAll = $request->only('name');
        $subject =  $this->subjectRepository->update($requestAll, $id);
        if (!$subject) {
            return redirect()->route('admin.subjects.index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }
        return redirect()->route('subjects.index')->withSuccess(trans('session.subject_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepository->destroy($id);
        if (!$subject) {
            return redirect()->route('admin.subjects.index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }
        return redirect()->route('subjects.index')->withSuccess(trans('session.subject_update_success'));

    }
}
