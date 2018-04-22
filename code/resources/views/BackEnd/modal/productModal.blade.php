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
								    @{{ data.errors.message }}
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label fix-form-cate" for="name">Tên sản phẩm <span class="text-danger">*</span>: </label>
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
								<div class="form-group" ng-if="data.show">
									<label class="control-label fix-form-cate" for="name">Mã sản phẩm <span class="text-danger">*</span>: </label>
									<div>
										<input required type="text" placeholder="Tên loại tin" class="form-control input-sm"
											   id="name" ng-model = "data.params.code_product">
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.code_product"
										>
										    @{{ er }}
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5 pull-left">
										<div class="form-group">
											<label class="control-label fix-form-cate" for="idCate">Loại sản phẩm <span class="text-danger">*</span>: </label>
											<div>
												<select id="idCate" class="form-control">
													<option ng-repeat="(key, cate) in data.nameCate" 
															ng-selected="(cate.id == data.params.cate_id)"
															value="@{{ cate.id }}">@{{ cate.name }}
													</option>
												</select>
												<p class="text-danger" style="margin-top: 5px;"
													ng-repeat="er in data.errors.cate_id"
												>
												    @{{ er }}
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-5 pull-right">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="price">Giá sản phẩm <span class="text-danger">*</span>: </label>
											<div>
												<input required type="text" placeholder="Giá sản phẩm" class="form-control input-sm " 
													id="price" ng-model = "data.params.price" ng-change="actions.formatPrice(data.params.price)">
												<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.price"
													>
												    @{{ er }}
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-5 pull-left">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="idSale">Loại huyến mãi: </label>
											<div>
												<select id="idSale" class="form-control">
													<option value = "0">Loại khuyến mãi
													</option>
													<option ng-repeat="(key, promotion) in data.allPromotion" 
															ng-selected="(promotion.id == data.params.cate_sale)"
															value="@{{ promotion.id }}">@{{ promotion.name }}
													</option>
													<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.cate_sale"
													>
													    @{{ er }}
													</p>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-5 pull-right">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="sale_description">Mô tả khuyến mãi: </label>
											<div class="form-group">
												<label class=" control-label fix-form-cate" for="tag">Tag: </label>
												<div>
													<input type="text" placeholder="tag 1, tag 2,..." class="form-control input-sm " 
													id="tag" ng-model = "data.params.tag">
													<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.tag"
													>
													    @{{ er }}
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-5 pull-left">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="material">Chất liệu <span class="text-danger">*</span>: </label>
											<div>
												<input type="text" placeholder="Chất liệu" class="form-control input-sm"  required 
												id="material" ng-model = "data.params.material">
											</div>
											<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.material"
													>
												    @{{ er }}
											</p>
										</div>
									</div>
									<div class="col-sm-5 pull-right">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="made_in">Xuất xứ <span class="text-danger">*</span>: </label>
											<div>
												<input type="text" placeholder="Xuất xứ" class="form-control input-sm" required
												id="made_in" ng-model = "data.params.made_in">
												<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.made_in"
													>
												    @{{ er }}
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-5 pull-left">
										<div class="form-group">
											<label class=" control-label fix-form-cate" for="trade">Thương hiệu</label>
											<div>
												<input type="text" placeholder="Thương hiệu" class="form-control input-sm " 
												id="trade" ng-model = "data.params.trade">
												<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.trade"
													>
												    @{{ er }}
												</p>
											</div>
										</div>
									</div>
									<div class="col-sm-5 pull-right">
										<div class="form-group">
											<label class="control-label" for="imageMain">Ảnh chính <span class="text-danger">*</span>: </label>
											<div>
												<input name="fileImg" type="file" placeholder="Tên người dùng" class="form-control input-sm image-support" id="imageMain">
												<div ng-if="data.show">
													<img class="image-support img-responsive" src="{{ url('Nifty') }}/img/av6.png" alt="..." style="margin-top: 5px; width: 140px; height: 150px;">
													<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.url_image"
													>
													    @{{ er }}
													</p>	
												</div>	
												<div ng-if="!data.show">
													<img class="image-support img-responsive" ng-src="{{ url('../storage/app') }}/@{{ data.params.url_image }}" alt="..." style="margin-top: 5px; width: 140px; height: 150px;">
													<p class="text-danger" style="margin-top: 5px;"
														ng-repeat="er in data.errors.url_image"
													>
													    @{{ er }}
													</p>	
												</div>
													
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="demo-is-inputsmall">Trạng thái: </label>
									<div class="col-sm-8 text-left padding-top-7">
										<label style="margin-bottom: 10px;" class="form-normal">
											<input ng-model = "data.params.status" value="0" type="radio" ng-checked="data.params.status == '0' ">Còn hàng</label>
										<label class="form-normal">
											<input ng-checked="data.params.status == '1'" ng-model = "data.params.status " value="1" type="radio" >Hết hàng</label>
									</div>
								</div>
								<div class="form-group" ng-if="data.show">
									<label class="control-label">Ảnh sản phẩm: </label>
									<div class="row">
										<div class="col-sm-12">
											<div class="image-file upload-multi-image" ng-model="data.params.multiImage">
												<input id="image-multi" type="file" name="imageMulti[]" multiple accept="image/*">
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
											ng-repeat="er in data.errors.description"
										>
										    @{{ er }}
										</p>
									</div>
								</div>
								<div class="form-group">
									<label required class="control-label " for="sale_description">Mô tả khuyến mãi: </label>
									<div>
										<textarea ng-model="data.params.sale_description" class="my-ckeditor" name="sale_description" id="sale_description"></textarea>
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.sale_description"
										>
										    @{{ er }}
										</p>
									</div>
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