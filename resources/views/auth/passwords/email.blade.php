@extends($layout)

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="omb_login">
        <h3 class="omb_authTitle">{{ trans('auth.resetPassword') }}</h3>

        <!-- Error -->
        @include('layouts.partials.error')

        <!-- Success -->
        @include('layouts.partials.success')

        <div class="row omb_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">

                {!! Form::open(array('route' => 'auth.pass.email','method' => 'POST','class' => 'omb_loginForm')) !!}

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('auth.emailAddress')]) !!}
                    </div>

                    <span class="help-block"></span>

                    {{ Form::button('<i class="fa fa-btn fa-envelope"></i> ' .  trans('auth.sendMail' ), ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) }}

                    <span class="help-block"></span>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
