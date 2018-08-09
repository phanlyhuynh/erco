<div id="load_orders">
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
                            </select>{{ trans('home.line') }}</label></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    {!! Form::open(['method' => 'GET', 'url' => 'admin/orders']) !!}
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
                            <th>{{ trans('home.customer') }}</th>
                            <th>{{ trans('home.order_date') }}</th>
                            <th>{{ trans('home.order_address') }}</th>
                            <th>{{ trans('home.amount') }}</th>
                            <th>{{ trans('home.status') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($orders))
                            @foreach($orders as $order)
                                <tr role="row" class="odd">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @php $amount = 0; @endphp
                                        @foreach($order->detailOrders as $detailOrder)
                                            @if($detailOrder->discount != 0)
                                                @php $amount += ($detailOrder->price*$detailOrder->quantity) - ($detailOrder->price*$detailOrder->quantity)*$detailOrder->discount/100; @endphp
                                            @else
                                                @php $amount += $detailOrder->price*$detailOrder->quantity; @endphp
                                            @endif
                                        @endforeach
                                        <span class="badge badge-pill badge-gradient-success">{{ number_format($amount+$order->price_shipping)}} VNĐ</span>
                                    </td>
                                    @if($order->status==0)
                                        <td>
                                            <span class="badge badge-pill badge-gradient-info">Đang chờ xác nhận</span>
                                        </td>
                                    @elseif($order->status==1)
                                        <td>
                                            <span class="badge badge-pill badge-gradient-warning">Đang giao hàng</span>
                                        </td>
                                    @elseif($order->status==2)
                                        <td>
                                            <span class="badge badge-pill badge-gradient-success">Đã giao hàng</span>
                                        </td>
                                    @elseif($order->status==3)
                                        <td>
                                            <span class="badge badge-pill badge-gradient-danger">Đơn hàng đã hủy</span>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ url('admin/orders/' . $order->id . '/edit') }}">Xem chi tiết</a>
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
                    <div class="dataTables_info" id="dt-opt_info" role="status" aria-live="polite">

                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="dt-opt_paginate">
                        <ul class="pagination">
                            {{ $orders->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>