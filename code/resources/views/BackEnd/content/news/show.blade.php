@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Preview infomation user</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"> Edit</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <table class="table table-bordered">
        	<tr>
        		<td>Avatar:</td>
        		<td><img src="{{ $user->avatar }}" alt=""></td>
        	</tr>
        	<tr>
        		<td>First Name:</td>
        		<td><strong>{{ $user->first_name }}</strong></td>
        	</tr>
        	<tr>
        		<td>Last Name:</td>
        		<td><strong>{{ $user->last_name }}</strong></td>
        	</tr>
        	<tr>
        		<td>Email:</td>
        		<td><strong>{{ $user->email }}</strong></td>
        	</tr>
        	<tr>
        		<td>Age:</td>
        		<td><strong>{{ $user->age }}</strong></td>
        	</tr>
        	<tr>
        		<td>Phone:</td>
        		<td><strong>{{ $user->phone }}</strong></td>
        	</tr>
        	<tr>
        		<td>Description:</td>
        		<td><strong>{{ $user->description }}</strong></td>
        	</tr>
        	<tr>
        		<td>Status:</td>
        		<td><strong>{{ ($user->status == 0) ? 'Pending' : 'Active' }}</strong></td>
        	</tr>
        </table>
    </div>
</div>
@endsection