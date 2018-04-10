<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> @yield('title') </title>
    @includeif('BackEnd.layouts.partial._default_css')
    @includeif('BackEnd.layouts.partial._angular')
    @includeif('BackEnd.layouts.partial._css')
    @yield('myCss')
<script>
    var SiteUrl = '{{url("/")}}';
</script>

<!-- <script src="{{ url('js/ctrl/backend/loginCtrl.js') }}"></script> -->

<body ng-app="ngApp">
    <div id="container" class="cls-container">

        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay" class="bg-img img-balloon"></div>
        
        <!-- HEADER -->
        <!--===================================================-->
        <div class="cls-header cls-header-lg">
            <div class="cls-brand">
                <a class="box-inline" href="{{url('')}}">
                    <!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
                    <!-- <span class="brand-title">Quay thưởng</span></span> -->
                </a>
            </div>
        </div>
        <!--===================================================-->


        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <p class="pad-btm" style="font-size: 15px;">Đăng nhập hệ thống CMS</p>
                    
                    <!-- ========================================== -->
                    <form data-parsley-validate class="form-horizontal" id="formLogin" action="{{ url('backend/login') }}" method="POST" role="form" >

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label style="padding-left:0px;" for="inputEmail3" class="col-sm-3 control-label">Tài khoản: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email"  required ="" placeholder="Tên tài khoản" name="email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                            <div class="text-left text-danger" style="margin-top: 5px;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @endif
                            </div>
                            
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label style="padding-left:0px;" for="inputEmail3" class="col-sm-3 control-label">Mật khẩu:</label>
                            <div class="col-sm-9">
                                <input type="password"  class="form-control" id="password" required ="" placeholder="Mật khẩu" style="height: 33px;" name="password">
                                @if ($errors->has('password'))
                            <div class="text-left text-danger" style="margin-top: 5px;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                            </div>
                            
                        </div>
                        {!! csrf_field() !!}
                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                            Đăng nhập
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    @includeif('Backend.layouts.partial._default_js')
    @includeif('Backend.layouts.partial._js')
    @yield('myJs')

</body>

<!-- Tieu Long Lanh Kute -->
</html>
