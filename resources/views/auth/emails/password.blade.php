{{ trans('auth.clickHere') }} <a href="{{ $link = route('auth.pass.reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>

