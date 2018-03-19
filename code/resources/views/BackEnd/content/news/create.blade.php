@extends('BackEnd.layouts.default') @section ('title', 'Tạo bài viết mới') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Thêm tin tức</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('news.index') }}"> Trở lại</a>
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
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="1">
            <div class="row">
                <div class="">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="avatar">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tiêu đề:</strong>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Slug:</strong>
                            <input type="text" name="slug" class="form-control" placeholder="slug">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mô tả ngắn:</strong>
                            <textarea type="number" name="excerpt" rows="5" class="form-control" placeholder="Excerpt"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nội dung:</strong>
                            <textarea class="form-control" name="content" rows="10" placeholder="Nội dung"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            <br/>
                            <input type="radio" name="status_news[]" value="1" checked="true"> Publish
                            <br/>
                            <input type="radio" name="status_news[]" value="0"> Draft
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection