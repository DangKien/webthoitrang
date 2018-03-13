@extends('layouts.master') @section('content')
<!-- <div class="page login-page">
	<div class="container">
		<div class="login-wrapper">
			<div class="page-logo">
				<a href="/"><img src="{{ asset('assets/images/logo-large.png') }}"></a>
			</div>
			<div class="login-type">
				<div class="login-as-collector">
					Login as Collector
				</div>
				<div class="divider"></div>
				<div class="login-as-artist">
					Login as Artist
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="page login-form-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 login-form-page-wrapper">
                <div class="back">
                    <i class="fa fa-angle-left"></i> Back
                </div>
                <h1>Art Form</h1>
                <div class="description">
                    Original works by emerging artists.
                </div>
                <form action="" class="form-login">
                    <div class="form-group">
                        <a href="#" class="login-facebook">Login Facebook</a>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group remember-group">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="ui-btn btn-login">Login</button>
                    </div>
                    <div class="form-group forgot-password">
                    	<a href="#">Forgot Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection