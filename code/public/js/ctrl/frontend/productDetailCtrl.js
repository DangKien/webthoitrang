ngApp.controller('productDetailCtrl', function($apply, $productDetailService, $scope) {
		
	$scope.data = {
		slug: slug.trim(),
		productRecord: {},
		filter: function () {
			var slug      = $scope.data.slug;
			var params    = $productDetailService.data.filterProduct(slug);
			return params;
		},
		productDetail: function () {
			var filter = $scope.data.filter();
			$productDetailService.action.product(filter).then(function (resp) {
				console.log(resp.data);
					$apply(function () {
						$scope.data.productRecord = resp.data;
						console.log($scope.data.productRecord);
					});
			}, function (error) {

			})
		}
	}

	$scope.data.productDetail();
});