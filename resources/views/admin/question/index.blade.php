@extends($layout)

@section('title')
    {{ trans('course.title') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.leftMenu')
            </div>

            <div class="col-md-8 col-md-offset-1">
                <div class="container-fluid">
                    <div class="row page-title-row">
                        <div class="col-md-6">
                            <h3> {{ trans('question.question') }} <small>&raquo; {{ trans('question.list_question') }}</small></h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('admin.questions.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> {{ trans('question.create_question') }} </a>
                        </div>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables">
                                <thead>
                                <tr>
                                    <th> {{ trans('question.content') }} </th>
                                    <th> {{ trans('question.type') }} </th>
                                    <th> {{ trans('question.edit') }} </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userQuestion->questions as $userQuestions)
                                    <tr>
                                        <td>{{ $userQuestions->content }}</td>
                                        <td>
                                            @if ($userQuestions->question_type == config('user.question_type.multiple_choice'))
                                                {{ trans('question.multiple_choi') }}
                                            @elseif($userQuestions->question_type == config('user.question_type.signle_choice'))
                                                {{ trans('question.signle_choice') }}
                                            @else
                                                {{ trans('question.text') }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.questions.edit', $userQuestions->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
