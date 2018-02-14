<div class="modal fade" ng-dom="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveProduct()">
	<div class="modal-dialog modal-lg" role="document">
		<form ng-dom="productForm" method="get" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<!-- insert cate -->
					<div class="form-horizontal ">
						<div class="form-group col-sm-12">
							<label class=" control-label" for="demo-is-inputsmall"></label>
							<div>
								<div class="text-danger" style="margin-top: 5px;">
								    @{{ data.errors.messages }}
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label fix-form-cate" for="name">Tên sản phẩm*: </label>
								<div>
									<input required type="text" placeholder="Tên loại tin" class="form-control input-sm"
										   id="name" ng-model = "data.params.name">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.name"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label fix-form-cate" for="idCate">Loại sản phẩm*: </label>
								<div>
									<select id="idCate" class="form-control">
										<option ng-repeat="(key, cate) in data.nameCate" 
												ng-selected="(cate.id == data.params.cate_id)"
												value="@{{ cate.id }}">@{{ cate.name }}
										</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class=" control-label fix-form-cate" for="idSale">Loại huyến mãi: </label>
								<div>
									<select id="idSale" class="form-control">
										<option ng-repeat="(key, cate) in data.nameCate" 
												ng-selected="(cate.id == data.params.cate_id)"
												value="@{{ cate.id }}">@{{ cate.name }}
										</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class=" control-label fix-form-cate" for="sale_description">Mô tả khuyến mãi: </label>
								<div>
									<input type="text" placeholder="Mô tả khuyến mãi" class="form-control input-sm " 
									id="sale_description" ng-model = "data.params.sale_description">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="imageMain">Ảnh chính: </label>
								<div>
									<input required name="fileImg" type="file" placeholder="Tên người dùng" class="form-control input-sm image-support" id="imageMain">
									<img class="image-support img-responsive" src="{{ url('Nifty') }}/img/av6.png" alt="..." style="margin-top: 5px; width: 140px; height: 150px;">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.file"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class=" control-label fix-form-cate" for="tag">Tag: </label>
								<div>
									<input type="text" placeholder="tag 1, tag 2,..." class="form-control input-sm " 
									id="tag" ng-model = "data.params.tag">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label">Ảnh sản phẩm: </label>
								<div class="row">
									<div class="col-sm-12">
										<div class="image-file upload-multi-image" ng-model="data.params.multiImage">
											<input required id="image-multi" type="file" name="imageMulti[]" multiple accept="image/*">
										</div>
										<div id="images">
										</div>
									</div>
								</div>
							</div>

							<div class="clearfix"></div>
							

							<div class="form-group">
								<label required class="control-label " for="demo-is-inputsmall">Mô tả: </label>
								<div>
									<textarea ng-model="data.params.description" class="my-ckeditor" name="description"></textarea>
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.content"
									>
									    @{{ er }}
									</p>
								</div>
							</div>
						</div>
							
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveProduct()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</form>
	</div>
</div>