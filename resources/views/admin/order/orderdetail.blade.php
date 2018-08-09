@extends('admin.master')
@section('title', trans('home.order_detail'))
@section('content')
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">{{ trans('home.order_detail') }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.customer') }}</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext" style="color: #00AAF1;">{{ $order->name }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.address') }}</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $order->address }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.order_date') }}</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $order->created_at }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.phone') }}</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $order->phone }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.email') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $order->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.method_payment') }}</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $order->payment->method }}</p>
                        </div>
                    </div>
                    @if($order->payment->method == 'shipping')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.price_shipping') }}:</label>
                            <div class="col-sm-9">
                                <p class="form-control-plaintext">{{ number_format($order->price_shipping) }} VNĐ</p>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">{{ trans('home.amount') }}:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">
                                <?php $amount = 0;?>
                                @foreach($order->detailOrders as $detailOrder)
                                    @if($detailOrder->discount != 0)
                                        <?php $amount += ($detailOrder->price*$detailOrder->quantity) - ($detailOrder->price*$detailOrder->quantity*$detailOrder->discount/100); ?>
                                    @else
                                        <?php $amount += ($detailOrder->price*$detailOrder->quantity) ?>
                                    @endif
                                @endforeach
                                <span class="badge badge-pill badge-gradient-success">{{ number_format($amount + $order->price_shipping) }} VNĐ</span>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::model($order, ['method' => 'PATCH', 'url' => ['admin/orders', $order->id]]) !!}
                            {!! Form::hidden('name',null,['class'=>'']) !!}
                            {!! Form::hidden('email',null,['class'=>'']) !!}
                            {!! Form::hidden('address',null,['class'=>'']) !!}
                            {!! Form::hidden('phone',null,['class'=>'']) !!}
                            {!! Form::hidden('user_id',null,['class'=>'']) !!}
                            {!! Form::hidden('price_shipping',null,['class'=>'']) !!}
                            {!! Form::hidden('payment_id',null,['class'=>'']) !!}
                            {!! Form::hidden('date',null,['class'=>'']) !!}
                            {!! Form::label(trans('home.status_ship'), null, ['class' => 'col-sm-12 col-form-label control-label text-dark']) !!}
                            <div class="col-sm-9" style="display: inline-flex;">
                                @if($order->status == 2)
                                    <input type="text" value="Đã giao hàng" disabled class="form-control" style="color: red;">
                                @else
                                    <div class="col-sm-6">
                                        {!! Form::select('status', [0 => 'Đang chờ xác nhận', 1 => 'Đang giao hàng', 2 => 'Đã giao hàng', 3 => 'Hủy đơn hàng'], null, ['class' => 'form-control'] ) !!}
                                    </div>
                                    <div class="col-sm-3">
                                        {!! Form::submit(trans('home.update'), ['class' => 'btn btn-default']) !!}
                                    </div>
                                @endif
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ trans('home.product') }}</th>
                    <th scope="col">{{ trans('home.price') }}</th>
                    <th scope="col">{{ trans('home.quantity') }}</th>
                    <th scope="col">{{ trans('home.discount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->detailOrders as $key => $order_detail)
                    <tr>
                        <th scope="row">{{ ($key+1) }}</th>
                        <td>{{ $order_detail->product->name }}</td>
                        <td>{{ $order_detail->price }}</td>
                        <td>{{ $order_detail->quantity }}</td>
                        <td>{{ $order_detail->discount }} %</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
