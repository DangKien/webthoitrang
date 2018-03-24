@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Chi tiết thông tin người dùng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"> Chỉnh sửa</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Rất tiếc!</strong> Có lỗi xảy ra với dữ liệu đầu vào.
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
        		<td>Ảnh đại diện:</td>
        		<td><img src="{{ ($user->avatar != '') ? $user->avatar : 'https://fakeimg.pl/150x150' }}" alt="{{ $user->title }}" width="150px" height="150px"></td>
        	</tr>
        	<tr>
        		<td>Tên Họ:</td>
        		<td><strong>{{ $user->first_name }}</strong></td>
        	</tr>
        	<tr>
        		<td>Tên:</td>
        		<td><strong>{{ $user->last_name }}</strong></td>
        	</tr>
        	<tr>
        		<td>Email:</td>
        		<td><strong>{{ $user->email }}</strong></td>
        	</tr>
        	<tr>
        		<td>Tuổi:</td>
        		<td><strong>{{ $user->age }}</strong></td>
        	</tr>
        	<tr>
        		<td>Số điện thoại:</td>
        		<td><strong>{{ $user->phone }}</strong></td>
        	</tr>
        	<tr>
        		<td>Mô tả:</td>
        		<td><strong>{{ $user->description }}</strong></td>
        	</tr>
        	<tr>
        		<td>Trạng thái tài khoản:</td>
        		<td><strong>{{ ($user->status == 0) ? 'Đang chờ' : 'Kích hoạt' }}</strong></td>
        	</tr>
        </table>
    </div>
</div>
@endsection