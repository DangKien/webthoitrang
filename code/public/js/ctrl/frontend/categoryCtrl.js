ngApp.controller('categoryCtrl', function($apply, $categoryService, $scope) {
		
	$scope.data = {
		slug: slug.trim(),
		categories: {},
		detail: {},
		filter: function () {
			var slug      = $scope.data.slug;
			var params    = $categoryService.data.filterProduct(slug);
			return params;
		},
		productDetail: function () {
			var slug      = $scope.data.slug;
			$categoryService.action.categories(slug).then(function (resp) {
					$apply(function () {
						$scope.data.categories = resp.data;
						console.log(resp.data);
					});
			}, function (error) {

			})
		}
	}

	$scope.data.productDetail();
});