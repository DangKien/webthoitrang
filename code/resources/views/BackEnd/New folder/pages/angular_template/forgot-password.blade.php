@extends('layouts.master') 
@section('content')
    <div class="page forgot-password-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 forgot-password-form-page-wrapper">
                    <h1>Art Form</h1>
                    <form action="" class="form-forgot-password">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <button class="ui-btn">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection