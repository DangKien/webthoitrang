ngApp.controller('productCtrl', function ($apply, $productService, $scope, changStatus, $conf) {
	$scope.domProductForm;
	$scope.domProductModal;
	$scope.data = {
		listProduct: {},
		pageProdcut: {},
		nameCate: [],
		mutiImage: [],
		show: true,
		filter: {},
	};

	$scope.actions = {

		changePage: function (page) {
			$scope.data.pageProdcut.current_page = page;
			$scope.actions.listProduct();
		},

		// Danh sach loai tin
		listProduct: function () {
			var name   = $scope.data.filter.name;
			var current_page =  $scope.data.pageProdcut.current_page;
			var params = $productService.filter (name, current_page , 10);
			$productService.action.listProduct(params).then(function (resp) {
				$scope.data.listProduct = resp.data.data;
				$scope.data.pageProdcut = resp.data;
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

		listPromotion: function () {
			$productService.action.listPromotion().then(function (resp) {
				$scope.data.allPromotion = resp.data;
				console.log($scope.data.allPromotion);
			}, function (error) {
				console.log(error);
			});
		},

		showModal: function (idProduct) {
			$scope.data.idProduct = idProduct;
			$($scope.domProductModal).modal('show');
			$scope.actions.listPromotion();
			$($scope.domProductForm).parsley().reset();
			$scope.data.errors = {};
			$scope.data.params = {};
			if (!idProduct) {
				$scope.data.title = "Thêm mới sản phẩm";
			} else {
				$scope.data.show = false;
				$productService.action.editProduct(idProduct).then (function (resp) {
					$scope.data.params = resp.data;
				}, function (error) {
					console.log(error);
				});
				$scope.data.title = "Cập nhật sản phẩm";
			}
		},
		save: function (data, conf) {
			if (data == true) {
				if (!$scope.data.idProduct) {
					$conf.confirmNotifi('success', 'Thêm mới sản phẩm thành công');
				}
				else {
					$conf.confirmNotifi('success', 'Cập nhật sản phẩm thành công');			
				}
				$apply(function () {
					$scope.actions.allListCate();
					$scope.actions.listProduct();
					$($scope.domProductModal).modal('hide');
				});
				
			} else {
				$scope.data.errors = data.errors;
			}
		},
	};
	$scope.actions.allListCate();
	$scope.actions.listProduct();
});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var urlProduct = SiteUrl + "/backend/product-main";
        var urlDetail = SiteUrl + "/backend/detail-product";
        $routeProvider.
        when('/', {
            templateUrl: urlProduct,
            controller: 'productCtrl'
        }).
        when('/:id', {
            templateUrl: urlDetail,
            controller: 'detailProductCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');
        //$locationProvider.html5Mode(true);
}]);