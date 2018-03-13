ngApp.controller('categoryCtrl', function($apply, $categoryService, $scope) {
		
	$scope.data = {
		slug: slug.trim(),
		categories: {},
		detail: {},
		sortBy: '',
		filter: function () {
			var slug      = $scope.data.slug;
			var params    = $categoryService.data.filterProduct(slug);
			return params;
		},
		productDetail: function () {
			var slug      = $scope.data.slug;
			$categoryService.action.categories(slug).then(function (resp) {
					$apply(function () {
						$scope.data.categories = resp.data.data;
						console.log(resp.data);
					});
			}, function (error) {

			})
		}
	}

	$scope.actions = {
		productSort: function (sort) {
			if (sort == 'priceUp') {
				$scope.propertyName = 'price';
				$scope.reverse = true;
			} else if (sort == 'priceDown')  {
				$scope.propertyName = 'price';
				$scope.reverse = false;
			}
		},
	} 

	$scope.data.productDetail();
});