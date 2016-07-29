<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title or trans('common.title') }}{{ isset($no_subtitle) ? '' : ' | ' . (isset($subtitle) ? $subtitle : trans('common.subtitle')) }}</title>
    <!-- Styles -->
    @include('layouts.styles')

</head>
<body id="app-layout">

    <!-- Header -->
    @include('layouts.header')

    <!-- Content -->
    @yield('content')

    <!-- JavaScripts -->
    @include('layouts.scripts')
</body>
</html>
