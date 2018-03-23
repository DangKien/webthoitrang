@extends('BackEnd.layouts.default')
@section ('title', 'Quản lý người dùng')
@section('content')
<div id="content-container">
	<br>
	<div class="col-md-12 col-wrap-user">
		<div class="row">
	        <div class="col-lg-12 margin-tb">

	            <div class="pull-left">

	                <h2>Quản lý tin tức</h2>

	            </div>

	            <div class="pull-right">

	                <a class="btn btn-success" href="{{ route('news.create') }}"> Tạo tin mới</a>

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
	            <th>#</th>
	            <th>Tiêu đề</th>
	            <th>Author</th>
	            <th>Ngày cập nhật</th>
	            <th>Status</th>
	            <th width="220px">Action</th>
	        </tr>
	        @if(!$list_news->isEmpty())
	        @foreach ($list_news as $key => $item)
	        @php
	        	$user_name = $item->user->first_name . ' ' . $item->user->last_name;
	        @endphp
	        <tr>
	            <td>{{ $item->id }}</td>
	            <td>{{ ($item->title) ? $item->title : '<chưa cập nhật>' }}</td>
	            <td>{{ $user_name }}</td>
	            <td>{{ $item->updated_at }}</td>
	            <td>{!! ((int)$item->status == 1) ? '<div class="alert alert-success">Active</div>' : '<div class="alert alert-danger">Deactive</div>' !!}</td>
	            <td>
	                <form action="{{ route('news.destroy',$item->id) }}" method="POST">
	                    <a class="btn btn-info" href="{{ route('news.show',$item->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('news.edit',$item->id) }}">Edit</a>
	                    @csrf
	                    @method('DELETE')
	                    <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
	            </td>
	        </tr>
	        @endforeach
	        @endif
	    </table>

	    {!! $list_news->links() !!}
	</div>
</div>
@endsection