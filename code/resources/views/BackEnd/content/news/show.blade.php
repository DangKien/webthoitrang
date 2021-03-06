@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Xem trước chi tiết tin</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('news.edit', $news->id) }}"> Chỉnh sửa</a>
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
        		<td>Ảnh bài viết:</td>
        		<td><img src="{{ ($news->image != '') ? $news->image : 'https://fakeimg.pl/150x150' }}" alt="{{ $news->title }}" width="150px" height="150px;"></td>
        	</tr>
        	<tr>
        		<td>Tiêu đề:</td>
        		<td><strong>{{ $news->title }}</strong></td>
        	</tr>
        	<tr>
        		<td>Slug:</td>
        		<td><strong>{{ $news->slug }}</strong></td>
        	</tr>
        	<tr>
        		<td>Mô tả ngắn:</td>
        		<td><strong>{{ $news->excerpt }}</strong></td>
        	</tr>
        	<tr>
        		<td>Nội dung:</td>
        		<td><strong>{{ $news->content }}</strong></td>
        	</tr>
        	<tr>
        		<td>Trạng thái:</td>
        		<td><strong>{{ ($news->status == 0) ? 'Đang chờ' : 'Công khai' }}</strong></td>
        	</tr>
        </table>
    </div>
</div>
@endsection