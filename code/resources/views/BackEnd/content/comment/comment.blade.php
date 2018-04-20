@extends('BackEnd.layouts.default')
@section ('title', 'Bình luận')
@section ('myJs')
@endsection
	
@section('content')
	<div id="content-container" ng-controller="commentCtrl">
		
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
				<div class="col-md-5 col-sm-5 pull-right search-nc">
					<button type="button" class="btn btn-primary pull-right" data-target="#demo-panel-collapse-default"
					        data-toggle="collapse">Tìm kiếm nâng cao
					</button>
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
											<th style="max-width: 100px;">Ngày bình luận</th>
											<th style="max-width: 350px;">Nội dung</th>
											<th style="max-width: 350px;">Trạng thái</th>
											<th style="max-width: 300px;">Thao tác</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($comments as $key => $comment)
										<tr>
											<td> {{ $comment->name }} </td>
											<td> {{ $comment->email }} </td>
											<td> {{ Carbon\Carbon::Parse($comment->created_at)->format('d-m-Y') }} </td>
											<td> {{ $comment->content }} </td>
											<td> @if ($comment->status == "AVAILABLE" ) {{ 'Đã hiện thị' }}
												@else {{ 'Không hiện thị' }} @endif
											 </td>
											<td>
												@if ($comment->status == "AVAILABLE" ) 
												<a href="{{ url('backend/delete-comment', $comment->id) }}" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></a>
												@else 
												<a href="{{ url('backend/approval-comment', $comment->id) }}" class="btn btn-info btn-icon btn-circle icon-lg fa fa-check"></a>
												@endif
												
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						{{ $comments->links() }}
					</div>
				</div>
	
			</div>	
		</div>
	</div>
@endsection