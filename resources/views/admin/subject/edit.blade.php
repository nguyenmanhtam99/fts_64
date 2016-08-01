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
                            <h3> {{ trans('subject.subject') }} <small>&raquo; {{ trans('subject.edit_subject') }}</small></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> {{ trans('subject.edit_subject') }} </h3>
                            </div>
                            <div class="panel-body">

                                @include('layouts.partials.error')
                                @include('layouts.partials.success')

                                {!! Form::model($subject, ['method' => 'PUT', 'route' => ['subjects.update', $subject['id']], 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', trans('subject.subject_name'), ['class' => 'control-label']) !!}
                                    {!! Form::text('name', $subject['name'], ['class' => 'form-control', 'autofocus']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('subject.save_changes'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
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
