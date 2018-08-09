@extends('admin.master')
@section('title', trans('home.addnew'))
@section('content')
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ url('admin') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ trans('home.home') }}</a>
                <a class="breadcrumb-item" href="{{ url('admin/users') }}">{{ trans('home.user') }}</a>
                <span class=" breadcrumb-item active">{{ trans('home.addnew') }}</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">Thêm mới</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/users', 'files' => true, 'id' => 'form-validation', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
                    <div class="form-group row">
                        {!! Form::label(trans('home.user'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('home.user')]) !!}
                            {!! $errors->first('name', '<p class="errors_validate">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.email'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('home.email')]) !!}
                            {!! $errors->first('email', '<p class="errors_validate">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.password'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('home.password')]) !!}
                            {!! $errors->first('password', '<p class="errors_validate">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.phone'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('home.phone')]) !!}
                            {!! $errors->first('phone', '<p class="errors_validate">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.address'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('home.address')]) !!}
                            {!! $errors->first('address', '<p class="errors_validate">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.role'), '', ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('role', ['admin' => 'Admin', 'user' => 'Khách hàng'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(trans('home.thumbnail'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::file('avatar', ['class' => 'form-control', 'id' => 'user-avatar']) !!}
                            {!! $errors->first('avatar', '<p class="errors_validate">:message</p>') !!}
                            <img src="{{ asset('uploads/user/avatar/no-image.jpg') }}" alt="" style="width: 150px; height: 150px;" id="user-avatar-show">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="text-sm-right">
                                {!! Form::submit(trans('home.addnew'), ['class' => 'btn btn-gradient-success']) !!}
                                <a href="{{ url('admin/users') }}" class="btn btn-gradient-warning">{{ trans('home.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection