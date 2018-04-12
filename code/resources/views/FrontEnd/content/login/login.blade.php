@extends('FrontEnd.layouts.default')
@section ('title', 'Tin tức thời trang')
@section ('myJs')

@endsection
@section ('content')

<div class="shop-page-area ptb-10" ng-controller="newCtrl">
    <div class="login-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-content">
                        <div class="login-title">
                            <h4>Đăng Nhập</h4>
                            <p>Đăng nhập tài khoản</p>
                        </div>
                        <div class="login-form">
                            <form method="post">
                                @csrf
                                <input name="account" placeholder="Tài khoản" type="text">
                                @if ($errors->has('account'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </div>
                                @endif
                                <input name="password" placeholder="Mật khẩu" type="password">
                                @if ($errors->has('password'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                                <div class="button-remember">
                                    <div class="checkbox-remember">
                                        <a href="#">Quên mật khẩu?</a>
                                    </div>
                                    <button class="login-btn" type="submit">Đăng nhập</button>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="login-btn" type="button">Facebook</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="login-btn" type="button">Google++</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="new-account mt-90">
                                    <p><a href="{{ route('register.frontend') }}">Bạn là người mới ? Tạo mới tài khoản.</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection