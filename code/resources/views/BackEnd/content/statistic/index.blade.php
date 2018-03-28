@extends('BackEnd.layouts.default') @section ('title', 'Quản lý người dùng') @section('content')
<div id="content-container">
    <br>
    <div class="col-md-12 col-wrap-user">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="col-sm-12">
            <div class="panel">
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
			        <h3>Thống kê</h3>
			        <hr/>
			        <div class="col-xs-3">
			            <!-- required for floating -->
			            <!-- Nav tabs -->
			            <ul class="nav nav-tabs tabs-left">
			                <li class="active"><a href="#product" data-toggle="tab">Sản phẩm</a></li>
			                <li><a href="#order" data-toggle="tab">Đơn hàng</a></li>
			                <li><a href="#user" data-toggle="tab">Người dùng</a></li>
			            </ul>
			        </div>
			        <div class="col-xs-9">
			            <!-- Tab panes -->
			            <div class="tab-content">
			                <div class="tab-pane active" id="product">
			                	<div class="col-xs-12 mgr-b-50">
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Sản phẩm thêm mới trong "tháng này"
				                		</h4>
			                			<h3>{{ $count_product_thismonth }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Tổng số lượng sản phẩm
				                		</h4>
			                			<h3>{{ $count_product_all }}</h3>
				                	</div>
				                </div>
			                	<div class="col-xs-12 table-responsive">
			                		<h4>Các sản phẩm được thêm trong tháng này</h4>
			                		<p></p>
			                        <table class="table table-striped datatable-index-stat-prod">
			                            <thead>
			                                <tr>
			                                    <th>Tên sản phẩm</th>
			                                    <th>Loại</th>
			                                    <th>Giá sản phẩm</th>
			                                    <th>Mô tả</th>
			                                    <th>Thẻ gắn</th>
			                                    <th>Ngày tạo</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                @if(!$product_thismonth->isEmpty())
			                                	@foreach($product_thismonth as $item)
			                                		<tr>
			                                			<td>{{ $item->name }}</td>
			                                			<td>{{ $item->code_product }}</td>
			                                			<td>{{ $item->price }}</td>
			                                			<td>{{ $item->description }}</td>
			                                			<td>{{ $item->tag }}</td>
			                                			<td>{{ $item->created_at }}</td>
			                                		</tr>
			                                	@endforeach
			                                @endif
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			                <div class="tab-pane" id="order">
			                	<div class="col-xs-12 mgr-b-50">
			                		<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng hóa đơn trong "tháng trước"
				                		</h4>
			                			<h3>{{ $count_order_lastmonth }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng hóa đơn trong "tuần này"
				                		</h4>
			                			<h3>{{ $count_order_thisweek }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng hóa đơn trong "tháng này"
				                		</h4>
			                			<h3>{{ $count_order_thismonth }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Tổng số hóa đơn
				                		</h4>
			                			<h3>{{ $count_order_all }}</h3>
				                	</div>
				                </div>
			                	<div class="col-xs-12 table-responsive">
			                		<h4>Các hóa đơn trong tháng này</h4>
			                        <table class="table table-striped datatable-index-stat-prod">
			                            <thead>
			                                <tr>
			                                    <th>Mã hóa đơn</th>
			                                    <th>Email khách hàng</th>
			                                    <th>Tổng giá trị hóa đơn</th>
			                                    <th>Trạng thái hóa đơn</th>
			                                    <th>Ngày tạo</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                @if(!$order_thismonth->isEmpty())
			                                	@foreach($order_thismonth as $item)
			                                		<tr>
			                                			<td>{{ $item->id }}</td>
			                                			<td>{{ $item->email }}</td>
			                                			<td>{{ $item->total_order }}</td>
			                                			<td>{{ $item->status }}</td>
			                                			<td>{{ $item->created_at }}</td>
			                                		</tr>
			                                	@endforeach
			                                @endif
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			                <div class="tab-pane" id="user">
			                	<div class="col-xs-12 mgr-b-50">
			                		<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng người dùng trong "tháng trước"
				                		</h4>
			                			<h3>{{ $count_user_lastmonth }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng người dùng trong "tuần này"
				                		</h4>
			                			<h3>{{ $count_user_thisweek }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Lượng người dùng trong "tháng này"
				                		</h4>
			                			<h3>{{ $count_user_thismonth }}</h3>
				                	</div>
				                	<div class="col-xs-12 col-sm-6 text-center col-prod">
				                		<h4 class="">
				                			Tổng
				                		</h4>
			                			<h3>{{ $count_user_all }}</h3>
				                	</div>
				                </div>
			                	<div class="col-xs-12 table-responsive">
			                		<h4>Người dùng được thêm trong tháng này</h4>
			                        <table class="table table-striped datatable-index-stat-prod">
			                            <thead>
			                                <tr>
			                                    <th>Họ đệm</th>
			                                    <th>Tên</th>
			                                    <th>Email</th>
			                                    <th>Phone</th>
			                                    <th>Ngày tạo</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                @if(!$user_thismonth->isEmpty())
			                                	@foreach($user_thismonth as $item)
			                                		<tr>
			                                			<td>{{ $item->first_name }}</td>
			                                			<td>{{ $item->last_name }}</td>
			                                			<td>{{ $item->email }}</td>
			                                			<td>{{ $item->phone }}</td>
			                                			<td>{{ $item->created_at }}</td>
			                                		</tr>
			                                	@endforeach
			                                @endif
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@section('myCss')
	<style type="text/css">
		.tabs-left, .tabs-right {
		  border-bottom: none;
		  padding-top: 2px;
		}
		.tabs-left {
		  border-right: 1px solid #ddd;
		}
		.tabs-right {
		  border-left: 1px solid #ddd;
		}
		.tabs-left>li, .tabs-right>li {
		  float: none;
		  margin-bottom: 2px;
		}
		.tabs-left>li {
		  margin-right: -1px;
		}
		.tabs-right>li {
		  margin-left: -1px;
		}
		.tabs-left>li.active>a,
		.tabs-left>li.active>a:hover,
		.tabs-left>li.active>a:focus {
		  border-bottom-color: #ddd;
		  border-right-color: transparent;
		}

		.tabs-right>li.active>a,
		.tabs-right>li.active>a:hover,
		.tabs-right>li.active>a:focus {
		  border-bottom: 1px solid #ddd;
		  border-left-color: transparent;
		}
		.tabs-left>li>a {
		  border-radius: 4px 0 0 4px;
		  margin-right: 0;
		  display:block;
		}
		.tabs-right>li>a {
		  border-radius: 0 4px 4px 0;
		  margin-right: 0;
		}
		.vertical-text {
		  margin-top:50px;
		  border: none;
		  position: relative;
		}
		.vertical-text>li {
		  height: 20px;
		  width: 120px;
		  margin-bottom: 100px;
		}
		.vertical-text>li>a {
		  border-bottom: 1px solid #ddd;
		  border-right-color: transparent;
		  text-align: center;
		  border-radius: 4px 4px 0px 0px;
		}
		.vertical-text>li.active>a,
		.vertical-text>li.active>a:hover,
		.vertical-text>li.active>a:focus {
		  border-bottom-color: transparent;
		  border-right-color: #ddd;
		  border-left-color: #ddd;
		}
		.vertical-text.tabs-left {
		  left: -50px;
		}
		.vertical-text.tabs-right {
		  right: -50px;
		}
		.vertical-text.tabs-right>li {
		  -webkit-transform: rotate(90deg);
		  -moz-transform: rotate(90deg);
		  -ms-transform: rotate(90deg);
		  -o-transform: rotate(90deg);
		  transform: rotate(90deg);
		}
		.vertical-text.tabs-left>li {
		  -webkit-transform: rotate(-90deg);
		  -moz-transform: rotate(-90deg);
		  -ms-transform: rotate(-90deg);
		  -o-transform: rotate(-90deg);
		  transform: rotate(-90deg);
		}
		.col-prod {
			border: 1px solid #ddd;
		}
		.mgr-b-50 {
			margin-bottom: 50px
		}
	</style>
@endsection
@section('myJs')
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.datatable-index-stat-prod').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi trên 1 trang",
            "zeroRecords": "Không tìm thấy bản ghi nào",
            "info": "Đang hiện trang thứ _PAGE_ / _PAGES_",
            "infoEmpty": "Không tìm thấy thông tin",
            "infoFiltered": "(Lọc từ _MAX_ tổng cộng bản ghi)",
            "search": "Tìm kiếm",
            "previous": "Trang trước",
            "next": "Trang sau"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                text: 'Copy to clipboard'
            },
            'excel',
            'csv',
            'print'
        ]
    });
});
</script>
@endsection