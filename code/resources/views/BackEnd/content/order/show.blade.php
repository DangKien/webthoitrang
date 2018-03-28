@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Đơn đặt hàng</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}"> Trở lại</a>
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
        <div class="col-sm-12">
            <div class="panel">
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="col-xs-12">
                        <h4>Chi tiết đơn đặt hàng mã #{{ $order->id }}</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-sm-4">
                            <h5>Thời gian đặt hàng</h5>
                            <input type="text" name="date" disabled="true" value="{{ $order->created_at }}">
                            <h5>Tình trạng đơn hàng</h5>
                            <select class="form-control" name="status">
                                <option value="0" {{ ($order->status == 0) ? 'selected' : '' }}>Processing</option>
                                <option value="1" {{ ($order->status == 1) ? 'selected' : '' }}>Completed</option>
                                <option value="2" {{ ($order->status == 2) ? 'selected' : '' }}>Pending</option>
                                <option value="3" {{ ($order->status == 3) ? 'selected' : '' }}>Cancel</option>
                                <option value="4" {{ ($order->status == 4) ? 'selected' : '' }}>Refund</option>
                            </select>
                            <h5>Khách hàng</h5>
                            <p>Họ tên: {{ $order->customer_name }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h5>Thông tin thanh toán</h5>
                            <h5>Địa chỉ: </h5>
                            <p>{{ $order->address }}</p>
                            <br>
                            <h5>Email: </h5>
                            <p><a href="#"> {{ $order->customer_email }}</a></p>
                            <br>
                            <h5>Số điện thoại: </h5>
                            <p>{{ $order->customer_phone }}</p>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h5>Địa chỉ giao hàng: </h5>
                            <p>{{ $order->address }}</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại</th>
                                    <th>Ảnh</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Thẻ gắn</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel">
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng cộng</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <th>
                                    <span style="width: 70px; height: 70px"><img src="{!!  url($item->product->url_image) !!}" width="70px" height="70px"></span>
                                    <span>{{ $item->product->name }}</span>
                                </th>
                                <th>{{ $item->product->price }}</th>
                                <th>{{ $item->quantity }}</th>
                                <th>{{ ($item->product->price * $item->quantity) }}</th>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><strong>Tổng cộng</strong></td>
                            <td colspan="1"><strong>{{ $order->total }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection