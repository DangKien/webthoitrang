@extends('BackEnd.layouts.default') @section ('title', 'Quản lý tin tức') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Chỉnh sửa tin tức</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('news.index') }}"> Trở lại</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Rất tiếc!</strong> Đã có lỗi xảy ra.
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
        <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{ $news->title }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Slug:</strong>
                            <input type="text" name="slug" class="form-control" placeholder="slug" value="{{ $news->slug }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mô tả ngắn:</strong>
                            <textarea type="number" name="excerpt" rows="5" class="form-control" placeholder="Excerpt">{{ $news->excerpt }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nội dung:</strong>
                            <textarea class="form-control" name="content" rows="10" placeholder="Nội dung">{{ $news->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Trạng thái:</strong>
                            <br/>
                            <input type="radio" name="status_news[]" value="1" {{ ((int)$news->status == 1) ? 'checked="true"' : '' }}> Publish
                            <br/>
                            <input type="radio" name="status_news[]" value="0" {{ ((int)$news->status == 0) ? 'checked="true"' : '' }}> Draft
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