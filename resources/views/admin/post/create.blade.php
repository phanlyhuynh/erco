@extends('admin.master')
@section('title','Thêm bài đăng mới')
@section('content')
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ trans('home.home') }}</a>
                <a class="breadcrumb-item" href="{{ url('admin/posts') }}">{{ trans('home.post') }}</a>
                <span class=" breadcrumb-item active">{{ trans('home.addnew') }}</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ trans('home.addnew') }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/posts', 'id' => 'form-validation', 'novalidate' => 'novalidate']) !!}
                        <div class="form-group row">
                            {!! Form::label(trans('home.title'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('home.title')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label(trans('home.author'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::text('author', null, ['class' => 'form-control', 'placeholder' => trans('home.author')]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label(trans('home.thumbnail'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::file('thumbnail', ['class' => 'form-control', 'id' => 'post-thumbnail']) !!}
                                {!! $errors->first('thumbnail', '<p class="errors_validate">:message</p>') !!}
                                <img src="{{ asset('uploads/products/thumbnail/no-image.jpg') }}" alt="" style="width: 150px; height: 150px;" id="post-thumbnail-show">
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label(trans('home.content'), null, ['class' => 'col-sm-4 col-form-label control-label']) !!}
                            <div class="col-sm-12">
                                <div class="m-t-15">
                                    {!! Form::textarea('content', null, ['class' => 'tinymce', 'placeholder' => trans('home.content')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="text-sm-right">
                                    {!! Form::submit(trans('home.addnew'), ['class' => 'btn btn-gradient-success']) !!}
                                    <a href="{{ url('admin/posts') }}" class="btn btn-gradient-warning">{{ trans('home.cancel') }}</a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection