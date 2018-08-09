<div id="load" style="position: relative;">
    <div class="card">
        <div class="card-body">
            <div class="table-overflow">
                <div id="dt-opt_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dt-opt_length">
                                <label>{{ trans('home.show') }}
                                    <select name="dt-opt_length" aria-controls="dt-opt" class="form-control form-control-sm" id="select_show">
                                        <option value="10" class="select_option">10</option>
                                        <option value="25" class="select_option">25</option>
                                        <option value="50" class="select_option">50</option>
                                        <option value="100" class="select_option">100</option>
                                    </select>{{ trans('home.line') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            {!! Form::open(['method' => 'GET', 'url' => 'admin/brands']) !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    {!! Form::submit(trans('home.searching'), ['class' => 'btn btn-default', 'id' => 'btnSearch']) !!}
                                </div>
                                {!! Form::text('keyword', $keyword, ['class' => 'form-control', 'placeholder' => trans('home.search'), 'id' => 'search_keyword']) !!}
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
                                    <th>{{ trans('home.brand') }}</th>
                                    <th>{{ trans('home.status') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($brands))
                                    @foreach($brands as $brand)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $brand->id }}</td>
                                            <td>{{ $brand->name }}</td>
                                            @if($brand->status == 0)
                                                <td>{{ trans('home.hidden') }}</td>
                                            @else
                                                <td>{{ trans('home.show') }}</td>
                                            @endif
                                            <td class="text-center font-size-18">
                                                {!! Form::open(['method' => 'GET', 'url' => 'admin/brands/' . $brand->id . '/edit']) !!}
                                                <button class="text-gray btn btn-float">
                                                    <i class="ti-pencil"></i>
                                                </button>
                                                {!! Form::close() !!}
                                                {!! Form::open(['method' => 'DELETE', 'url' => ['admin/brands', $brand->id]]) !!}
                                                <button type="submit" class="text-gray btn btn-float" onclick="return confirm('{{ trans('home.confirm_delete') }}');">
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
                                    {{ $brands->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
