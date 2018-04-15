ngApp.controller('productDetailCtrl', function($apply, $productDetailService, $scope, $cartService, $rootScope) {
		
	$scope.data = {
		slug: slug.trim(),
		productRecord: {},
		key: 0,
		categories: {},
		detail: {},
		productInvole:{},
		filter: function () {
			var slug      = $scope.data.slug;
			var params    = $productDetailService.data.filterProduct(slug);
			return params;
		},
		productDetail: function () {
			var filter = $scope.data.filter();
			$productDetailService.action.product(filter).then(function (resp) {
				$apply(function () {
					$scope.data.productRecord = resp.data.product;
					$scope.data.detail = resp.data.detail;
					$scope.data.categories = resp.data.categories;
				});
			}, function (error) {

			})
		},

		productInvole: function () {
			var categoryId      = $scope.data.slug;
			$productDetailService.action.productInvole(categoryId).then(function (resp) {
				$apply(function () {
					$scope.data.productInvole = resp.data;
				});
			}, function (error) {

			})
		}
	}

	$scope.actions = {
		addCart: function ($id){
			$cartService.action.addCart($id).then(function(resp) {
				$rootScope.getCartItems();
			}, function (error){
				console.log(error);
			});
		},
	}

	
	$scope.data.productInvole();
	$scope.data.productDetail();
});