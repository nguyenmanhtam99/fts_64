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
                <section>
                    <div class="row page-title-row">
                        <div class="col-md-8">
                            <h3> {{ trans('user.title') }} <small>&raquo; {{ trans('user.list') }}</small></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> {{ trans('user.list') }} </h3>
                                </div>
                                <div class="panel-body">

                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables">
                                            <thead>
                                            <tr>
                                                <th> {{ trans('user.user_name') }} </th>
                                                <th> {{ trans('user.email') }} </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $users->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop
