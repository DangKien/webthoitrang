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
			<div class="col-md-5 col-sm-5 pull-right search-nc">
				<button type="button" class="btn btn-primary pull-right" data-target="#demo-panel-collapse-default"
				        data-toggle="collapse">Tìm kiếm nâng cao
				</button>
			</div>
		</div>
		<!-- tim kiem nang cao -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
				    <!--Panel body-->
				    <div id="demo-panel-collapse-default" class="collapse">
				        <form>
				            <div class="panel-body">
				                <div class="row">
				                   <form class="" ng-enter="actions.listCate()">
				                   		 <div class="col-sm-6">
				                        <div class="form-group">
				                            <label class="control-label">Tên loại tin: </label>
				                            <input ng-model = "data.filter.name" type="text" class="form-control">
				                        </div>
				                    </div>
				                    <div class="col-sm-6">
				                        <div class="form-group">
				                            <label class="control-label">Trạng thái: </label>
				                            <br>
				                            <select id ="statusFilter"  class="form-control" data-width="100%">
				                                <option value="1" selected ="selected">Hoạt động</option>
				                                <option value="2">Không hoạt động</option>
				                            </select>
				                        </div>
				                    </div>
				                   
				                </div>
				            </div>
				            <div class="panel-footer text-right">
				                <button ng-click="actions.listCate()" class="btn btn-info" type="submit">
				                	<i class="fa fa-search"> Tìm kiếm</i>
				                </button>
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
		<!-- het tim kiem nang cao -->
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
										<th>Mã sản phẩm</th>
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
									<tr class="width-fix-table" ng-repeat="(key, product) in data.listProduct">
										<td class="width-100"> @{{ product.code_product }} </td>
										<td class="width-100"> @{{ product.name }} </td>
										<td> @{{ product.cates.name }} </td>
										<td> <img ng-src=" {{ url('images/main_prodcut/') }}/@{{ product.url_image }}" alt="" style="width: 100px; height: 100px"> </td>
										<td class="width-80"> @{{ product.price }} </td>
										<td class="width-250"> <span ng-bind-html="product.description"></span> </td>
										<td class="width-80"> @{{ product.tag }} </td>
										<td> 
											<a href="#/@{{ product.id }}" class="btn btn-default btn-icon btn-circle icon-lg fa fa-list-alt"></a>
											<button ng-click= "actions.showModal(product.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
											<button ng-click= "actions.deleteProduct(product.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="row text-center">
						   <div class="page-oum">
						       <div paging
						           page="data.pageProdcut.current_page"
						           page-size = "data.pageProdcut.per_page"
						           total="data.pageProdcut.total"
						           paging-action="actions.changePage(page)">
						       </div>
						   </div>
						</div>
					</div>
					<!--===================================================-->
					<!--End Data Table-->
				</div>
			</div>
			<!-- end datatable -->
		</div>	
	</div>
	<!--===================================================-->
	<!--End page content-->
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModal()"
	>
	</button>
	<product-modal product-data="data" product-save="actions.save(data)" dom-product-form="domProductForm" dom-product-modal="domProductModal"> </product-modal>	
</div>