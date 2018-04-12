@extends('FrontEnd.layouts.default')
@section ('title', 'Tài khoản')
@section ('myJs')

@endsection
@section ('content')
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="billing-details-area">
                    <h2>Thông tin tài khoản</h2>
                    @if (isset($customerSuccess))
                        {{ $customerSuccess }}
                    @endif
                    <form action="{{ url('customer') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Họ
                                        <span class="required">*</span>
                                    </label>
                                    <input name="first_name" placeholder="Họ" type="text" value="{{ $customer->first_name }}">
                                    @if ($errors->has('first_name'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Tên
                                        <span class="required">*</span>
                                    </label>
                                    <input name="last_name" placeholder="Tên" type="text" value="{{ $customer->last_name }}">
                                    @if ($errors->has('last_name'))
                                        <div class="text-left text-danger" style="margin-bottom: 5px;">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Địa chỉ
                                        <span class="required"></span>
                                    </label>
                                    <input name="address" placeholder="Địa chỉ" type="text" value="{{ $customer->address }}">
                                    @if ($errors->has('address'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Phone 
                                        <span class="required">*</span>
                                    </label>
                                    <input name="phone" placeholder="Số điện thoại" type="text" value="{{ $customer->phone }}">
                                    @if ($errors->has('phone'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="billing-input">
                                    <label>
                                        Địa chỉ email
                                        <span class="email">*</span>
                                    </label>
                                    <input name="email" type="email" value="{{ $customer->email }}">
                                    @if ($errors->has('email'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Lời nhắc
                                        <span class="required"></span>
                                    </label>
                                    <textarea name="node" id="checkout-mess" placeholder="Lời nhắc">{{ $customer->node }}</textarea>
                                    @if ($errors->has('node'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('node') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="login-btn" type="submit">Cập nhật tài khoản</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <form action="{{ url('customer') }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Mật khẩu cũ
                                        <span class="required">*</span>
                                    </label>
                                    <input name="password" placeholder="Mật khẩu cũ của bạn" type="text">
                                    @if ($errors->has('password'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Mật khẩu mới
                                        <span class="required">*</span>
                                    </label>
                                    <input name="newPassword" placeholder="Mật khẩu mới của bạn" type="text">
                                    @if ($errors->has('newPassword'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('newPassword') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="billing-input">
                                    <label>
                                        Nhập lại mật khẩu mới
                                        <span class="required">*</span>
                                    </label>
                                    <input name="newPasswordConfirm" placeholder="Nhập lại mật khẩu mới của bạn" type="text">
                                    @if ($errors->has('newPasswordConfirm'))
                                    <div class="text-left text-danger" style="margin-bottom: 5px;">
                                        <strong>{{ $errors->first('newPasswordConfirm') }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="login-btn" type="submit">Đổi mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
