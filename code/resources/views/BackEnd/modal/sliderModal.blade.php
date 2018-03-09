<div ng-dom="slideModal" class="modal fade" role="dialog" ng-enter="actions.saveSlide()">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">@{{data.title}}</h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-primary">
					<div class="panel-body">
						<form class="form-horizontal" data-parsley-validate ng-dom="slideForm">
							<div class="form-group">
								<label class="col-sm-3 control-label">Tên slide: </label>   
								<div class="col-sm-8">                     
									<input required type="text" placeholder="Tên slide" class="form-control input-sm" id="demo-is-inputsmall" ng-model="data.params.name">
									<div style="margin-top: 5px;"></div>
									<p class="text-danger" style="margin-top: 5px;" ng-repeat="er in data.errors.name">
										@{{ er }}
									</p>
								</div>
							</div>

							<!-- <div class="form-group">
								<label class="col-sm-3 control-label">Chọn mục: </label>   
								<div class="col-sm-8">  
									<select required style="cursor: pointer;" class="form-control" ng-model="dataModal.chosseCategory">
                                        <option value="">---Chọn mục---</option>
                                        <option ng-repeat="(key, val) in dataModal.listCategory" value="@{{ val.code }}">
                                            @{{ val.name }}
                                        </option>
                                    </select>
                                    <div ng-repeat="item in data.errors" >
                                        <div ng-repeat="err in item.choose_cate" style="color: red; margin-top:5px;">
                                            @{{ err }}
                                        </div>
                                    </div>
								</div>
							</div>
 -->
							<div class="form-group" ng-if="(data.locationCheck)">
								<label class="col-sm-3 control-label">Vị trí: </label>   
								<div class="col-sm-8">  
									<select style="cursor: pointer;" class="form-control" ng-model="data.params.location">
                                        <option ng-repeat="(key, val) in data.locationList" ng-selected="(val == data.params.location)" >
                                            @{{ val }}
                                        </option>
                                    </select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label" for="imageMain">Ảnh chính: </label>
								<div class="col-sm-8">
									<input name="fileImg" type="file" placeholder="Tên người dùng" class="form-control  input-sm image-support" id="imageMain">
									<div>
										<img class="image-support img-responsive" ng-src="{{ url('../storage/app') }}/@{{ data.params.url_image }}" alt="..." style="margin-top: 5px; width: 140px; height: 150px;">
										<p class="text-danger" style="margin-top: 5px;"
											ng-repeat="er in data.errors.url_image"
										>
										    @{{ er }}
										</p>	
									</div>
										
								</div>
							</div>
							<hr>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-click="actions.saveSlide()">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>					
			</div>
		</div>
	</div>
</div>
</div>