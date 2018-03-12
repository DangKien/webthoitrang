@extends('layouts.master') 
@section('content')
<div class="update-profile-section">
    <div class="container">
        {{-- start form --}}
        <div class="update-profile-wrapper">
            <form>
                <div class="row profile">
                    <div class="profile-title col-xs-12 col-sm-3 col-md-3">
                        <p>Update profile</p>
                    </div>
                    <div class="profile-input col-xs-12 col-sm-4 col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tel" placeholder="Tel">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="year" placeholder="Year of birth">
                        </div>
                    </div>
                    <div class="profile-image col-xs-12 col-sm-4 col-md-2 col-md-offset-2">
                        <img id="avatar" width="170px" height="160px" src="{{ asset('assets/images/update-profile/avatar.png') }}">
                        <p>
                            <span class="btn-file">
                            Upload avatar
                            <input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
                        </span>&nbsp&nbsp|&nbsp&nbsp<span id="del-avatar" href="#" title="">Delete</span>
                        </p>
                    </div>
                </div>
                <div class="row infomation">
                    <div class="infomation-title col-xs-12 col-sm-12 col-md-3">
                        <p>Banking acount information</p>
                    </div>
                    <div class="infomation-input col-xs-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="acount-number" placeholder="Acount number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bank" placeholder="Bank">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="branch" placeholder="Branch">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Biography" class="area-control" name="biography" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="List of ehibitions" class="area-control" name="ehibition" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <a href="#" class="update" title="">Update</a>
                        </div>
                    </div>
                </div>
            </form>
            {{-- end form --}}
        </div>
    </div>
</div>
@endsection