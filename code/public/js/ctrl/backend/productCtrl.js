ngApp.controller('productCtrl', function ($apply, $productService, $scope, changStatus, $conf) {
	$scope.domProductForm;
	$scope.domProductModal;
	$scope.data = {
		listProduct: {},
		nameCate: [],
		mutiImage: [],
	};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageCate.current_page = page;
			$scope.actions.listProduct();
		},

		// Danh sach loai tin
		listProduct: function () {
			// var name   = $scope.data.filter.name;
			// var status = $('#statusFilter').val();
			// var current_page =  $scope.data.pageCate.current_page;
			// var params = $cateService.filter (name, status, current_page , 10);
			$productService.action.listProduct().then(function (resp) {
				$scope.data.listProduct = resp.data.data;
				$scope.data.pageProduct = resp.data;

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

		allListCate: function () {
			var params = $productService.filter('', '', '', 0);
			$productService.action.allListCate(params).then(function (resp) {
				$scope.data.allListCate = resp.data;
				$scope.actions.menuBarLevel($scope.data.allListCate);
			}, function (error) {
				console.log(error);
			});
		},

		showModal: function (idPro) {
			$scope.data.idPro = idPro;
			$($scope.domProductModal).modal('show');
			// $($scope.domCateForm).parsley().reset();
			$scope.data.errors = {};
			if (!idPro) {
				$scope.data.title = "Thêm mới sản phẩm";
			} else {
				// $cateService.action.editCate(idPro).then (function (resp) {
				// 	$scope.data.params = resp.data;
					
				// }, function (error) {
				// 	console.log(error);
				// });
				// $scope.data.title = "Cập nhật loại tin";
			}
		},
		save: function (data, conf) {
			if (data == true) {
				if (!$scope.data.idCate) {
					$conf.confirmNotifi('success', 'Thêm mới thành công');
				}
				else {
					$conf.confirmNotifi('success', 'Cập nhật thành công');			
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
	$scope.actions.listProduct();
	

});