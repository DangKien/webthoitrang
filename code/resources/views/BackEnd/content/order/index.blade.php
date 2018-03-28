@extends('BackEnd.layouts.default')
@section ('title', 'Quản lý đơn hàng')
@section('content')
<div id="content-container">
	<br>
	<div class="col-md-12 col-wrap-user">
		<div class="row">
	        <div class="col-lg-12 margin-tb">
	            <div class="pull-left">
	                <h2>Quản lý đơn hàng</h2>
	            </div>
	            <div class="pull-right">
	                <a class="btn btn-success" href="{{ route('users.create') }}">Thống kê</a>
	            </div>
	        </div>
	    </div>
	    @if ($message = Session::get('success'))
	        <div class="alert alert-success">
	            <p>{{ $message }}</p>
	        </div>
	    @endif
	    <table class="table table-bordered datatable-index-order">
	    	<thead>
		        <tr>
		            <th>No</th>
		            <th>Đơn hàng</th>
		            <th>Tổng cộng</th>
		            <th>Địa chỉ giao hàng</th>
		            <th>Ngày</th>
		            <th>Tình trạng</th>
		            <th width="200px">Hành động</th>
		        </tr>
		    </thead>
		    <tbody>
		        @php
		        	$i = 0;
		        @endphp
		        @if(!empty($orders->toArray()))
			        @foreach($orders as $item) 
			        	<tr>
			        		<td>{{ ++$i }}</td>
			        		<td><a href="{{ route('orders.show',$item->id) }}">#<strong style="color: green;">{{ $item->id }}</strong> bởi <strong style="color: green;">{{ $item->customer_email }}</strong></a></td>
			        		<td>{{ $item->total_order }}</td>
			        		<td>{{ $item->address }}</td>
			        		<td>{{ $item->created_at }}</td>
			        		<td>{{ $item->status }}</td>
			        		<td>
				                <form action="{{ route('orders.destroy',$item->id) }}" method="POST">
				                    <a class="btn btn-info" href="{{ route('orders.show',$item->id) }}">Show</a>
				                    @csrf
				                    @method('DELETE')
				                    <button type="submit" class="btn btn-danger">Delete</button>
				                </form>
				            </td>
			        	</tr>
			        @endforeach
		        @endif
		    </tbody>
	    </table>

	    {{-- {!! $users->links() !!} --}}
	</div>
</div>
@endsection

@section('myJs')
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.datatable-index-order').DataTable({
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
		        buttons: [
			        {
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