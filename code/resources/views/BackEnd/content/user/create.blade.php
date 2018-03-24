@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Thêm sản phẩm mới</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Trở lại</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Rất tiếc!</strong> Có lỗi xảy ra với đầu vào dữ liệu của bạn.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            	<div class="col-xs-12 col-sm-6 col-md-6">
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Ảnh đại diện:</strong>
                                <input type="file" name="file">
                                <input type="hidden" name="uploadType" value="users">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <img src="{{ 'https://fakeimg.pl/150x150' }}" alt="" width="100%">
                        </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Họ:</strong>
	                        <input type="text" name="first_name" class="form-control" placeholder="First Name">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Tên:</strong>
	                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Email:</strong>
	                        <input type="email" name="email" class="form-control" placeholder="Email">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Mật khẩu:</strong>
	                        <input type="password" name="password" class="form-control" placeholder="Password">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12 ">
	                    <button type="submit" class="btn btn-primary">Tạo</button>
	                </div>
	                <br>
	                <br>
            	</div>
            	<div class="col-xs-12 col-sm-6 col-md-6">
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Tuổi:</strong>
	                        <input type="number" name="age" min="0" max="100" class="form-control" placeholder="Age">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Số điện thoại:</strong>
	                        <input type="phone" name="phone" class="form-control" placeholder="Phone">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Địa chỉ:</strong>
	                        <input type="text" name="address" class="form-control" placeholder="Address">
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Mô tả:</strong>
	                        <textarea class="form-control" placeholder="Description"></textarea>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <strong>Trạng thái:</strong>
	                        <br/>
	                        <input type="radio" name="status_user[]" value="1" checked="true"> Hoạt động
	                        <br/>
	                        <input type="radio" name="status_user[]" value="0"> Không hoạt động
	                    </div>
	                </div>
            	</div>
            </div>
        </form>
    </div>
</div>
@endsection