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
										id="quantily" ng-model = "data.params.quantily">
									</div>
								</div>

								<div class="form-group col-sm-6 pull-right">
									<label class="control-label fix-form-cate" for="price">Giá: </label>
									<div>
										<input required type="text" placeholder="Giá sản phẩm" class="form-control input-sm " 
										id="price" ng-model = "data.params.price">
									</div>
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
