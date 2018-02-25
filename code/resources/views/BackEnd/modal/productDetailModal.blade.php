<div class="modal fade" ng-dom="detailProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveProduct()">
	<div class="modal-dialog modal-lg" role="document">
		<form ng-dom="productForm" method="get" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<!-- insert cate -->
					<div class="form-horizontal ">
						
						<div class="col-sm-12">
							<div class="row">
								<div class="form-group col-sm-6">
									<label class="control-label fix-form-cate" for="color">Màu: </label>
									<div>
										<input required  type="color" class="form-control input-sm " 
										id="color" ng-model = "data.params.color">
									</div>
								</div>

								<div class="form-group col-sm-6 pull-right">
									<label class="control-label fix-form-cate" for="demo-is-inputsmall">Kích cỡ: </label>
									<div>
										<input required type="text" placeholder="Kích cỡ" class="form-control input-sm " 
										id="demo-is-inputsmall" ng-model = "data.params.size">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<label class="control-label fix-form-cate" for="quantily">Số lượng: </label>
									<div>
										<input required type="text" placeholder="Số lượng sản phẩm" class="form-control input-sm " 
										id="quantily" ng-model = "data.params.quantily" ng-change="actions.formatQuantily(data.params.quantily)">
									</div>
								</div>

								<div class="form-group col-sm-6 pull-right">
									<label class="control-label fix-form-cate" for="price">Giá: </label>
									<div>
										<input required type="text" placeholder="Giá sản phẩm" class="form-control input-sm " 
										id="price" ng-model = "data.params.price" ng-change="actions.formatPrice(data.params.price)">
									</div>
								</div>
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