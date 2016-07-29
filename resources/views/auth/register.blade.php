@extends($layout)

@section('content')

<div class="container">
    <div class="omb_login">
        <h3 class="omb_authTitle">{{ trans('auth.register') }}</h3>

        @include('layouts.partials.error')

        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">

                {!! Form::open(array('route' => 'auth.register','method' => 'post','class' => 'form-horizontal')) !!}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-male"></i></span>
                            {!! Form::text('name', old('email'), ['class' => 'form-control', 'placeholder' => trans('auth.name')]) !!}
                        </div>

                        <span class="help-block"></span>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('auth.emailAddress')]) !!}
                        </div>

                        <span class="help-block"></span>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('auth.password')]) !!}
                        </div>

                        <span class="help-block"></span>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('auth.confirmPassword')]) !!}
                        </div>

                        <span class="help-block"></span>

                        {{ Form::button('<i class="fa fa-btn fa-user"></i> ' .  trans('auth.register' ), ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}

                        <span class="help-block"></span>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
