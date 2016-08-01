@extends($layout)

@section('content')
<div class="container">
    <div class="omb_login">
        <h3 class="omb_authTitle">{{ trans('auth.login') }}</h3>
        <div class="row omb_row-sm-offset-3 omb_socialButtons">
            <div class="col-xs-4 col-sm-2">
                <a href="{{ route('social.redirect', config('social.social.facebook')) }}" class="btn btn-lg btn-block omb_btn-facebook">
                <i class="fa fa-facebook visible-xs"></i>
                <span class="hidden-xs">{{ trans('auth.facebook') }}</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="{{ route('social.redirect', config('social.social.twitter')) }}" class="btn btn-lg btn-block omb_btn-twitter">
                <i class="fa fa-twitter visible-xs"></i>
                <span class="hidden-xs">{{ trans('auth.twitter') }}</span>
                </a>
            </div>
            <div class="col-xs-4 col-sm-2">
                <a href="{{ route('social.redirect', config('social.social.google')) }}" class="btn btn-lg btn-block omb_btn-google">
                <i class="fa fa-google-plus visible-xs"></i>
                <span class="hidden-xs">{{ trans('auth.google') }}</span>
                </a>
            </div>
        </div>
        <div class="row omb_row-sm-offset-3 omb_loginOr">
            <div class="col-xs-12 col-sm-6">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">{{ trans('or') }}</span>
            </div>
        </div>

        @include('layouts.partials.error')

        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">

                {!! Form::open(array('route' => 'auth.login','method' => 'post','class' => 'omb_loginForm')) !!}

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

                    {{ Form::button('<i class="fa fa-btn fa-sign-in"></i> ' .  trans('auth.login' ), ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-3">
                <label class="checkbox">
                <input type="checkbox" name="remember"> {{ trans('auth.rememberMe')}}
                </label>
            </div>
            <div class="col-xs-12 col-sm-3">
                <p class="omb_forgotPwd">
                    <a class="btn btn-link" href="{{ route('auth.pass.reset') }}"> {{ trans('auth.forgotYourPassword') }} </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
