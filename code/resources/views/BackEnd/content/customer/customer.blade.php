@extends('BackEnd.layouts.default')
@section ('title', 'Liên hệ')
@section ('myJs')
@endsection

@section('content')
	<div id="content-container">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
			<!--Searchbox-->
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Tìm kiếm..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- datatable -->
				<div class="col-sm-12">
					<div class="panel">
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Tên</th>
											<th>Địa chỉ email</th>
											<th style="max-width: 100px;">Số điện thoại</th>
											<th>Địa chỉ</th>
											<th style="max-width: 150px;">Tài khoản</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($customers as $key => $customer)
										<tr>
											<td> {{ $customer->first_name." ".$customer->last_name }} </td>
											<td> {{ $customer->email }} </td>
											<td> {{ $customer->phone }} </td>
											<td> {{ $customer->address }}</td>
											<td> {{ $customer->provider }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							{{ $customers->links() }}
						</div>
		
					</div>
				</div>
	
			</div>	
		</div>
	</div>
@endsection