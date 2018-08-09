@extends('frontend.master')
@section('title', 'Đăng ký')
@section('content')
    @if(!Auth::check())
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form">
                            <h2>Đăng nhập tài khoản của bạn</h2>
                            <form action="{{ route('login') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="email" placeholder="Email" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input type="password" placeholder="Mật khẩu" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <span>
                                    <input type="checkbox" name="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}> Nhớ mật khẩu
                                </span>
                                <button type="submit" class="btn btn-default">Đăng nhập</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form">
                            <h2>Đăng ký tài khoản mới!</h2>
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Tên" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input type="password" placeholder="Mật khẩu" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation" required>
                                <input type="text" name="address" placeholder="Địa chỉ">
                                <input type="number" name="phone" placeholder="Số điện thoại">
                                <input type="file" name="avatar">
                                <button type="submit" class="btn btn-default">
                                    Đăng ký
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                                    <h2>Name:</h2>
                                </div>
                                <div class="col-sm-5">
                                    <h2>{{ Auth::user()->name }}</h2>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                                    <h2>Email:</h2>
                                </div>
                                <div class="col-sm-5">
                                    <h2>{{ Auth::user()->email }}</h2>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                                    <h2>Phone:</h2>
                                </div>
                                <div class="col-sm-5">
                                    <h2>{{ Auth::user()->phone }}</h2>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-4">
                                    <h2>Address:</h2>
                                </div>
                                <div class="col-sm-5">
                                    <h2>{{ Auth::user()->address }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection