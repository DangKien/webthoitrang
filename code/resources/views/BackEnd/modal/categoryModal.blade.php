<div class="modal fade" ng-dom="cateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-enter="actions.saveCate()">
	<div class="modal-dialog" role="document">
		<form ng-dom="cateForm" method="get" accept-charset="utf-8">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">@{{ data.title }}</h5>
				</div>
				<div class="modal-body">
					<!-- insert cate -->
					<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-3 control-label" for="demo-is-inputsmall"></label>
								<div class="col-sm-8">
									<div class="text-danger" style="margin-top: 5px;">
									    @{{ data.errors.messages }}
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Tên loại sản phẩm*: </label>
								<div class="col-sm-8">
									<input required type="text" placeholder="Tên loại tin" class="form-control input-sm"
									id="demo-is-inputsmall" ng-model = "data.params.name">
									<p class="text-danger" style="margin-top: 5px;"
										ng-repeat="er in data.errors.name"
									>
									    @{{ er }}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Loại sản phẩm cha*: </label>
								<div class="col-sm-8">
									<select id = "idCate" class="form-control">
										<option value="0">Loại tin cha </option>
										<option ng-repeat="(key, cate) in data.nameCate" 
												ng-selected="(cate.id == data.params.parent_id)"
												value="@{{ cate.id }}"> @{{ cate.name }}
										</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Link Sản Phẩm: </label>
								<div class="col-sm-8">
									<input type="text" placeholder="" class="form-control input-sm"
									id="demo-is-inputsmall" ng-model = "data.params.url_link">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label fix-form-cate" for="demo-is-inputsmall">Tag: </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Tag: tag1, tag2,..." class="form-control input-sm col-sm-3" 
									id="demo-is-inputsmall" ng-model = "data.params.tag">
								</div>
							</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="actions.saveCate()">Cập nhật</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</form>
	</div>
</div>