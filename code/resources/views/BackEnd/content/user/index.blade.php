@extends('BackEnd.layouts.default')
@section ('title', 'Quản lý người dùng')
@section('content')
<div id="content-container">
	<br>
	<div class="col-md-12 col-wrap-user">
		<div class="row">
	        <div class="col-lg-12 margin-tb">

	            <div class="pull-left">

	                <h2>User Manager</h2>

	            </div>

	            <div class="pull-right">

	                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

	            </div>

	        </div>
	    </div>
	    @if ($message = Session::get('success'))
	        <div class="alert alert-success">
	            <p>{{ $message }}</p>
	        </div>
	    @endif
	    <table class="table table-bordered">
	        <tr>
	            <th>No</th>
	            <th>First Name</th>
	            <th>Last Name</th>
	            <th>Age</th>
	            <th>Email</th>
	            <th width="280px">Action</th>
	        </tr>
	        @php
	        	$i = 0;
	        @endphp
	        @if(!$users->isEmpty())
	        @foreach ($users as $user)
	        <tr>
	            <td>{{ ++$i }}</td>
	            <td>{{ ($user->first_name) ? $user->first_name : '<chưa cập nhật>' }}</td>
	            <td>{{ ($user->last_name) ? $user->last_name : '<chưa cập nhật>' }}</td>
	            <td>{{ ($user->age) ? $user->age : '<chưa cập nhật>' }}</td>
	            <td>{{ $user->email }}</td>
	            <td>
	                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
	                    @csrf
	                    @method('DELETE')
	                    <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </table>

	    {!! $users->links() !!}
	</div>
</div>
@endsection