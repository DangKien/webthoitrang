@extends('layouts.master') 
@section('content')
    <div class="page reset-password-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 reset-password-form-page-wrapper">
                    <h1>Art Form</h1>
                    <form action="" class="form-reset-password">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm-pass" placeholder="Confirm password">
                        </div>
                        <div class="form-group">
                            <button class="ui-btn">Reset password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection