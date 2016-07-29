@extends($layout)

@section('content')

<div class="container">
    <div class="omb_login">
        <h3 class="omb_authTitle">{{ trans('auth.resetPassword') }}</h3>

        @include('layouts.partials.error')

        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">

                {!! Form::open(array('route' => 'auth.pass.reset','method' => 'POST','class' => 'omb_loginForm')) !!}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {!! Form::email('email', $email, ['class' => 'form-control', 'placeholder' => trans('auth.emailAddress')]) !!}
                    </div>

                    <span class="help-block"></span>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('auth.pass')]) !!}
                    </div>

                    <span class="help-block"></span>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('auth.confirmPassword')]) !!}
                    </div>

                    <span class="help-block"></span>

                    {{ Form::button('<i class="fa fa-btn fa-refresh"></i> ' .  trans('auth.resetPassword' ), ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}

                    <span class="help-block"></span>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
