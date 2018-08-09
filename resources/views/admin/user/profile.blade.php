@extends('admin.master')
@section('title', trans('home.profile'))
@section('content')
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ url('admin') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ trans('home.home') }}</a>
                <span class="breadcrumb-item">{{ trans('home.profile') }}</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ trans('home.profile') }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <img src="{{ asset('uploads/user/avatar/' . $user->avatar) }}" alt="" style="width: 250px; height: 250px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.fullname') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.email') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.phone') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ Auth::user()->phone }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.address')  }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.role') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button class="btn btn-default">
                                <a href="{{ url('admin/users/' . Auth::user()->id . '/edit') }}">{{ trans('home.edit_profile') }}</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection