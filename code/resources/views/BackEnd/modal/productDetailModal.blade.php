<div class="modal fade" ng-dom="detailProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveProduct()">
	<div class="modal-dialog modal-lg" role="document">
		<form ng-dom="productForm" method="get" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<!-- insert cate -->
					<div class="form-horizontal clearfix">

						<div class="form-group col-sm-6">
							<label class="control-label fix-form-cate" for="color">Màu: </label>
							<div>
								<input required  type="color" class="form-control input-sm " 
								id="color" ng-model = "data.params.color">
							</div>
						</div>
					
						<div class="form-group col-sm-12">
							<label class="control-label fix-form-cate" for="idSize">Kích cỡ: </label>
							<br><hr>
							<div>
								<div class="col-sm-3" ng-repeat="(key, size) in data.listSize">
									<div class="checkbox">
									    <label>
									    	<input ng-model="data.checkSize[size.id]" type="checkbox" value="" > @{{ size.name }}
									    </label>
									</div>
								</div>
								<p class="text-danger" style="margin-top: 5px;"
									ng-repeat="er in data.errors.cate_id"
								>
								    @{{ er }}
								</p>
							</div>
						</div>			
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveDetailProduct()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</form>
	</div>
</div>