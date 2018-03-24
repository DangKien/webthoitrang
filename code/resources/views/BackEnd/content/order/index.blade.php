@extends('BackEnd.layouts.default')
@section ('title', 'Quản lý người dùng')
@section('content')
<div id="content-container">
	<br>
	<div class="col-md-12 col-wrap-user">
		<div class="row">
	        <div class="col-lg-12 margin-tb">

	            <div class="pull-left">

	                <h2>Quản lý tài khoản người dùng</h2>

	            </div>

	            <div class="pull-right">

	                <a class="btn btn-success" href="{{ route('users.create') }}"> Tạo người dùng mới</a>

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
		            <th>Tên Họ</th>
		            <th>Tên</th>
		            <th>Email</th>
		            <th>Tình trạng</th>
		            <th>Quyền người dùng</th>
		            <th width="220px">Hành động</th>
		        </tr>
		    </thead>
		    <tbody>
		        @php
		        	$i = 0;
		        @endphp
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