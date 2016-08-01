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
                            <h3> {{ trans('subject.subject') }} <small>&raquo; {{ trans('subject.create_subject') }}</small></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> {{ trans('subject.create_new') }} </h3>
                            </div>
                            <div class="panel-body">

                                <div>
                                    @include('layouts.partials.error')
                                    @include('layouts.partials.success')
                                </div>

                                {!! Form::open(['method' => 'POST', 'route' => 'subjects.store', 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                {!! Form::label('name', trans('subject.subject_name'), ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
                                </div>

                                <div class="form-group">
                                {!! Form::button('<i class="fa fa-plus-circle"></i>&nbsp;' . trans('subject.add'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
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
