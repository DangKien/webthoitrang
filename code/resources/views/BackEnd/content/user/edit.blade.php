@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Chỉnh sửa người dùng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Rất tiếc!</strong> Bạn phải nhập đầy đủ dữ liệu đầu vào yêu cầu.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-error">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                            <img src="{{ ($user->avatar != '') ? $user->avatar : 'https://fakeimg.pl/150x150' }}" alt="{{ $user->title }}" width="100%">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Họ Đệm:</strong>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tên:</strong>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled="true">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mật khẩu mới (nếu muốn thay đổi):</strong>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password to change">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tuổi:</strong>
                            <input type="number" name="age" min="0" max="100" class="form-control" placeholder="Age" value="{{ $user->age }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Số điện thoại:</strong>
                            <input type="phone" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Địa chỉ:</strong>
                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mô tả ngắn:</strong>
                            <textarea class="form-control" placeholder="Description">{{ $user->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Trạng thái tài khoản:</strong>
                            <br/>
                            <input type="radio" name="status_user[]" value="1" {{ ((int)$user->status == 1) ? 'checked="true"' : '' }}> Active
                            <br/>
                            <input type="radio" name="status_user[]" value="0" {{ ((int)$user->status == 0) ? 'checked="true"' : '' }}> Deactive
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection