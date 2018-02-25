ngApp.controller('cateCtrl', function ($apply, $cateService, $scope, changStatus, $conf) {
	$scope.domCateForm;
	$scope.domCateModal;
	$scope.data = {
		listCate: {},
		params: {
			status: 1,
			parent_id: 0,
		},
		filter: {},
		nameCate:[],
		title: "",
		idCate: '',
		pageCate: {},
		allListCate:{},
		errors:{},
	};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageCate.current_page = page;
			$scope.actions.listCate();
		},

		// Danh sach loai tin
		listCate: function () {
			var name   = $scope.data.filter.name;
			var status = $('#statusFilter').val();
			var current_page =  $scope.data.pageCate.current_page;
			var params = $cateService.filter (name, status, current_page , 10);
			$cateService.action.listCate(params).then(function (resp) {
				$scope.data.listCate = resp.data.data;
				$scope.data.pageCate = resp.data;
				changStatus.change($scope.data.listCate);
				$scope.actions.changeNameCate($scope.data.listCate, $scope.data.allListCate);
			}, function (error) {
				console.log(error);
			});
		},


		allListCate: function () {
			var params = $cateService.filter('', '', '', 0);
			$cateService.action.allListCate(params).then(function (resp) {
				$scope.data.allListCate = resp.data;
				$scope.data.nameCate = [];
				$scope.actions.menuBarLevel($scope.data.allListCate);
			}, function (error) {
				console.log(error);
			});
		},

		menuBarLevel: function (data, parent = 0, str = " -- ") {
			angular.forEach(data, function(item, key) {
				if (item.parent_id == parent) {
					$scope.data.nameCate.push({'name': str + item.name + str, id: item.id});
					$scope.actions.menuBarLevel(data, item.id, str + " -- ");  
				} 
			});
		},

		// chuyen id loai tin cha thanh ten tieng viet
		changeNameCate: function (listCate, allListCate) {
			$apply(function() {
				angular.forEach(listCate, function(item, key){
				if (item.parent_id != 0) {
					var parent_id = item.parent_id;

					angular.forEach(allListCate, function(value, key1){
						if (parent_id == value.id) {
							listCate[key].parent_id = value.name;
						}
					});
					} else {
						listCate[key].parent_id = "";
					}
				});
			});
		},

		deleteCate: function (idCate) {
			$conf.confirmDelete ('small', 'Bạn muốn xóa loại sản phẩm này?', function (resp) {
				if (resp == true){
					$cateService.action.deleteCate(idCate).then(function (resp) {
						if (resp) {
							$scope.actions.listCate();
							$scope.actions.allListCate();
							$conf.confirmNotifi('success', 'Xóa loại sản phẩm thành công');
						}
					}, function (error) {
							$conf.confirmNotifi('error', 'Xóa loại sản phẩm thất bại', "fa fa-ban");
					});
				}
			});
			
		},

		showModal: function (idCate) {
			$scope.data.idCate = idCate;
			$($scope.domCateModal).modal('show');
			$($scope.domCateForm).parsley().reset();
			$scope.data.errors = {};
			if (!idCate) {
				$scope.data.params = {
					status: 1,
					parent_id: 0,
				};
				$scope.data.title = "Thêm mới loại sản phẩm";
			} else {
				$cateService.action.editCate(idCate).then (function (resp) {
					$scope.data.params = resp.data;
					
				}, function (error) {
					console.log(error);
				});
				$scope.data.title = "Cập nhật loại sản phẩm";
			}
		},

		save: function (data, conf) {
			if (data == true) {
				if (!$scope.data.idCate) {
					$conf.confirmNotifi('success', 'Thêm mới sản phẩm thành công');
				}
				else {
					$conf.confirmNotifi('success', 'Cập nhật sản phẩm thành công');			
				}
				$apply(function () {
					$scope.actions.allListCate();
					$scope.actions.listCate();
					$($scope.domCateModal).modal('hide');
				});
				
			} else {
				$scope.data.errors = data.errors;
			}
		},
	};
	$scope.actions.allListCate();
	$scope.actions.listCate();
	

});