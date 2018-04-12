@extends('FrontEnd.layouts.default')
@section ('title', 'Đăng kí tài khoản')
@section ('myJs')

@endsection
@section ('content')

<div class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-content">
                    <div class="login-title">
                        <h4>Đăng kí tài khoản</h4>
                        <p>Nhập thông tin tài khoản của bạn.</p>
                    </div>
                    <div class="login-form form-inline">
                        <form action="{{ url('register') }}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <label for="firstName">Họ</label>
                                <input name="first_name" placeholder="Họ" type="text" id="firstName">
                                @if ($errors->has('first_name'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                             <div class="col-md-6">
                                <label for="lastName">Tên</label>
                                <input name="last_name" placeholder="Tên" type="text" id="lastName">
                                @if ($errors->has('last_name'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="account">Tài khoản</label>
                                <input name="account" placeholder="Tài khoản" type="text" id="account">
                                @if ($errors->has('account'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input name="email" placeholder="Email" type="email" id="email">
                                @if ($errors->has('email'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                             <div class="col-md-12">
                                <label for="phone">Số điện thoại</label>
                                <input name="phone" placeholder="Số điện thoại" type="phone" id="phone">
                                @if ($errors->has('phone'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>  
                            
                            <div class="col-md-12">
                                <label for="password">Mật khẩu</label>
                                <input name="password" placeholder="Mật khẩu" type="password" id="password">
                                @if ($errors->has('password'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="confirm_password">Nhập lại mật khẩu</label>
                                <input name="confirm_password" placeholder="Nhập lại mật khẩu" type="password" id="confirm_password">
                                @if ($errors->has('confirm_password'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </div>
                                @endif
                            </div>
        
                            <div class="button-remember">
                                <button class="login-btn" type="submit">Đăng kí tài khoản</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection