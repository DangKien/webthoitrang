ngApp.controller('productDetailCtrl', function($apply, $productDetailService, $scope) {
		
	$scope.data = {
		productId: productId.trim(),
		slug: slug.trim(),
		productRecord: {},
		filter: function () {
			var productId = $scope.data.productId;
			var slug      = $scope.data.slug;
			var params    = $productDetailService.data.filterProduct(productId, slug);
			return params;
		},
		productDetail: function () {
			var filter = $scope.data.filter();
			$productDetailService.action.product(filter).then(function (resp) {
					$apply(function () {
						$scope.data.productRecord = resp.data;
					});
			}, function (error) {

			})
		}
	}

	$scope.data.productDetail();
});