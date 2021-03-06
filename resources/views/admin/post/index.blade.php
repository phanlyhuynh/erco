@extends('admin.master')
@section('title', trans('home.posts'))
@section('content')
    <div class="page-header">
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ url('admin') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ trans('home.home') }}</a>
                <span class="breadcrumb-item">{{ trans('home.posts') }}</span>
                <span class="breadcrumb-item active">{{ trans('home.post') }}</span>
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
        <a class="text-gray" href="{{ url('admin/posts/create') }}">{{ trans('home.addnew') }}</a>
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
                            {!! Form::open(['method' => 'GET', 'url' => 'admin/posts']) !!}
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
                                    <th>#</th>
                                    <th>{{ trans('home.title') }}</th>
                                    <th>{{ trans('home.author') }}</th>
                                    <th>{{ trans('home.date_created') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($posts))
                                    @foreach($posts as $post)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->author }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td class="text-center font-size-18">
                                                {!! Form::open(['method' => 'GET', 'url' => 'admin/posts/' . $post->id . '/edit']) !!}
                                                <button class="text-gray">
                                                    <i class="ti-pencil"></i>
                                                </button>
                                                {!! Form::close() !!}
                                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/brands', $post->id]]) !!}
                                                <button type="submit" class="text-gray" onclick="return confirm('{{ trans('home.confirm_delete') }}');">
                                                    <i class="ti-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dt-opt_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dt-opt_previous">
                                        <a href="#" aria-controls="dt-opt" data-dt-idx="0" tabindex="0" class="page-link">{{ trans('home.previous') }}</a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dt-opt" data-dt-idx="1" tabindex="0"class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dt-opt" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item next" id="dt-opt_next">
                                        <a href="#" aria-controls="dt-opt" data-dt-idx="3" tabindex="0" class="page-link">{{ trans('home.next') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
