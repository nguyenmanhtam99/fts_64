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
                        <div class="col-md-12">
                                <h3> {{ trans('question.question') }} <small>&raquo; {{ trans('question.create_question') }}</small></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> {{ trans('question.create_question') }} </h3>
                            </div>
                            <div class="panel-body">

                                <div>
                                    @include('layouts.partials.error')
                                    @include('layouts.partials.success')
                                </div>

                                {!! Form::open(['method' => 'POST', 'route' => 'admin.questions.store', 'class' => 'form-horizontal']) !!}

                                <div class="form-group">
                                    {!! Form::label('subject_id', trans('question.subject'), ['class' => 'control-label']) !!}
                                    {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control', 'autofocus']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('content', trans('question.content'), ['class' => 'control-label']) !!}
                                    {!! Form::textarea('content', null, ['class' => 'form-control', 'autofocus', 'rows' => '3']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('question_type', trans('question.type'), ['class' => 'control-label']) !!}
                                    {!! Form::select('question_type', array(config('user.type.0'),
                                     config('user.type.1'), config('user.type.2')),
                                    ['class' => 'form-control', 'autofocus']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-plus"></i>&nbsp;' . trans('question.add'), ['type' => 'button', 'class' => 'btn btn-primary btn-sm','id' => 'addOption']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>&nbsp;' . trans('question.remove'), ['type' => 'button', 'class' => 'btn btn-danger btn-sm', 'id' => 'removeOption']) !!}
                                </div>

                                <div class="addRow">
                                    <div class="form-group">
                                           <div class="col-md-6">
                                               {!! Form::label('content', trans('question.option'), ['class' => 'control-label']) !!}
                                               {!! Form::text('option_content[]', null, ['class' => 'form-control', 'autofocus']) !!}
                                           </div>

                                           <div class="col-md-4">
                                               {!! Form::label('is_correct', trans('question.is_correct'), ['class' => 'control-label']) !!}
                                               {!! Form::checkbox('option_is_correct[]', config('user.is_correct.true')) !!}
                                           </div>
                                    </div>
                                </div>
                                <div class="option"></div>

                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-plus-circle"></i>&nbsp;' . trans('question.add'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
