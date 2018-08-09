@extends('admin.master')
@section('title', trans('home.users'))
@section('content')
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ url('admin') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ trans('home.home') }}</a>
                <span class="breadcrumb-item">{{ trans('home.users') }}</span>
                <span class="breadcrumb-item active">{{ trans('home.user') }}</span>
            </nav>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <p class="text-semibold m-b-20">
        <i class="mdi mdi-plus m-r-5 text-info"></i>
        <a class="text-gray" href="{{ url('admin/users/create') }}">{{ trans('home.addnew') }}</a>
    </p>
    <div class="card">
        <div class="card-body">
            <div class="table-overflow">
                <div id="dt-opt_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dt-opt_length">
                                <label>{{ trans('home.show') }}
                                    <select name="dt-opt_length" aria-controls="dt-opt" class="form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>{{ trans('home.line') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            {!! Form::open(['method' => 'GET', 'url' => 'admin/users']) !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    {!! Form::submit(trans('home.searching'), ['class' => 'btn btn-default']) !!}
                                </div>
                                {!! Form::text('keyword', $keyword, ['class' => 'form-control', 'placeholder' => trans('home.search')]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="dt-opt" class="table table-hover table-xl dataTable no-footer" role="grid" aria-describedby="dt-opt_info">
                                <thead>
                                <tr role="row">
                                    <th>{{ trans('home.user') }}</th>
                                    <th>{{ trans('home.email') }}</th>
                                    <th>{{ trans('home.phone') }}</th>
                                    <th>{{ trans('home.address') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))
                                    @foreach($users as $user)
                                        <tr role="row" class="odd">
                                            <td>
                                                <div class="list-media">
                                                    <div class="list-item">
                                                        <div class="media-img">
                                                            <img src="{{ asset('uploads/user/avatar/' . $user->avatar) }} " alt="" class="avatar">
                                                        </div>
                                                        <div class="info">
                                                            <span class="title">{{ $user->name }}</span>
                                                            <span class="sub-title">ID {{ $user->id }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            @if($user->role != "admin")
                                                <td class="text-center font-size-18">
                                                    {!! Form::open(['method' => 'GET', 'url' => 'admin/users/' . $user->id . '/edit']) !!}
                                                    {!! Form::button('<i class="ti-pencil"></i>', ['type' => 'submit', 'class' => 'text-gray btn btn-float']) !!}
                                                    {!! Form::close() !!}
                                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/users', $user->id]]) !!}
                                                    {!! Form::button('<i class="ti-trash"></i>', ['type' => 'submit', 'class' => 'text-gray btn btn-float', 'id' => 'confirm_delete']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dt-opt_info" role="status" aria-live="polite">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dt-opt_paginate">
                                <ul class="pagination">
                                    {{ $users->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
