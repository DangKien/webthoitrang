@extends('BackEnd.layouts.default')
@section ('title', 'SlideShow')
@section ('myJs')
<script src="{{ url('') }}/js/ctrl/backend/sliderCtrl.js"></script>
<script src="{{ url('') }}/js/factory/services/backend/sliderService.js"></script>
<script src="{{ url('') }}/js/directives/modal/backend/sliderModal.js"></script>



@endsection
@section('content')
<div id="content-container" ng-controller="sliderCtrl">
	<br>
	<div class="col-md-4 tag_top" >
		<span><h3>Quản lý slide</h3></span>
		<!-- Trigger the modal with a button -->
	</div>

	<div class="col-md-12">
		<div class="searchbox search_box">
			<form ng-enter="data.list()">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Tìm kiếm.." ng-model="filter.textSreach">
					<span class="input-group-btn">
						<button ng-click="data.list()" class="text-muted" type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
		</div>
		<br><br>
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover tag_table">
					<thead>
						<tr>
							<th>Tên Slide</th>
							<th>Ảnh</th>
							<th>Đường dẫn</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="(key, slide) in data.listSlide">
							<td>@{{ slide.name }}</td>
							<td>
								<img ng-src="{{ url('../storage/app/') }}/@{{ slide.url_image }}" style="width: 150px; height: 150px" class="img-responsive"  alt="">
							</td>
							<td> @{{ slide.url_slide }} </td>
							<td>
								<i ng-click="actions.showModal(slide.id)" class="fa fa-pencil-square-o btn btn-info btn-icon btn-circle  fa fa-times" aria-hidden="true"></i>
								<i ng-click="actions.saveDelete(slide.id)" class="btn btn-danger btn-icon btn-circle  fa fa-times" aria-hidden="true"></i>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row text-center">
				<!-- panigation -->
				<ul class="pagination" >
					<div paging
					page="data.pageSlide.current_page" 
					page-size="data.pageSlide.per_page" 
					total="data.pageSlide.total"
					paging-action="actions.changePage(page)"
					>
				</div>  
			</ul>
			<!--End panigation -->
		</div>

	</div>
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModal()"
	>
	</button>
</div>
	<slider-modal slide-modal="chosseSlideModal" data="data" slide-save="actions.successModal(data)" slide-form="slideForm"> </slider-modal>
</div>
@endsection