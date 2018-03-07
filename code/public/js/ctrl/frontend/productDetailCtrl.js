ngApp.controller('productDetailCtrl', function($apply, $productDetailService, $scope) {
		
	$scope.data = {
		slug: slug.trim(),
		productRecord: {},
		key: 0,
		categories: {},
		detail: {},
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
						console.log(resp.data);
					});
			}, function (error) {

			})
		}
	}

	$scope.data.productDetail();
});