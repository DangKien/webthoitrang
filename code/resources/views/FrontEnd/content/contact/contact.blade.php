@extends('FrontEnd.layouts.default')
@section ('title', 'Liên hệ')
@section ('myJs')
  
@endsection
@section ('content')

<div id="contact-area" class="contact-area">
            <div class="container">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">
                         Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{ url('contact') }}"> Liên hệ </a>
                    </li>
                </ol>
                <div class="section-title text-center mb-70">
                    <h2>Liên hệ với chúng tôi <i class="fa fa-phone"></i></h2>
                    <p>Hãy để lại lời nhắn, câu hỏi, phản ảnh của bạn cho chúng tôi.</p>
                    @if (isset($message))
                        <p class="text-success">
                            {{ $message }}
                        </p> 
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-offset-2 col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-5">
                                <div class="contact-info-area">
                                    <ul>
                                        <li>
                                            <div class="contact-icon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="contact-address">
                                                <h5>Điện thoại liên hệ</h5>
                                                <span>01659901941</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contact-icon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="contact-address">
                                                <h5>Email</h5>
                                                <span><a href="#">quanaomoi@gmail.com</a></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contact-icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="contact-address">
                                                <h5>Địa chỉ</h5>
                                                <p>Cổng trường Sư phạm, Hà Nội</p>
                                                <p>Cổng trường Thương Mại, Hà Nội</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-7">
                                <div class="sent-message">
                                    <form class="contact_form" id="contact_form" action="{{ url('contact')  }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main-input mb-10">
                                                    <input id="contact_name" name="name" placeholder="Tên của bạn*" type="text">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <div class="text-left text-danger mtb-15" style="margin-top: 5px;">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="main-input mrg-contact mb-10">
                                                    <input id="contact_email" name="email" type="email" placeholder="Địa chỉ email*">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <div class="text-left text-danger mtb-15" style="margin-top: 5px;">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                             <div class="col-md-12">
                                                <div class="main-input mrg-contact mb-10">
                                                    <input id="contact_email" name="phone" type="text" placeholder="Số điện thoại*">
                                                    @if ($errors->has('phone'))
                                                        <div class="text-left text-danger mtb-15" style="margin-top: 5px;">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-leave2 mb-20">
                                                    <textarea name="message" id="contact_message" placeholder="Lời nhắn của bạn"></textarea>
                                                    @if ($errors->has('message'))
                                                        <div class="text-left text-danger mtb-15" style="margin-top: 5px;">
                                                            <strong>{{ $errors->first('message') }}</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="submit ripple-btn" type="submit" name="submit" id="contact_submit" data-complete-text="Well done!">Gửi lời nhắn</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-area-all">
            <div id="ian"></div>
        </div>
@endsection