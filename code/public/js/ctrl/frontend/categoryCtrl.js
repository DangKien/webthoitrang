ngApp.controller('categoryCtrl', function($apply, $categoryService, $scope) {
		
	$scope.data = {
		slug: slug.trim(),
		categories: {},
		detail: {},
		pageCategory:{},
		sortBy: '',
		filter: function () {
			var slug      = $scope.data.slug;
			var params    = $categoryService.data.filterProduct(slug);
			return params;
		},

		changePage: function (page) {
			$scope.data.pageCategory.current_page = page;
			$scope.data.productDetail();
		},

		productDetail: function () {
			var slug   = $scope.data.slug;
			var page   = $scope.data.pageCategory.current_page;
			var params = $categoryService.data.filterProduct(page);
			$categoryService.action.categories(slug, params).then(function (resp) {
				$apply(function () {
					$scope.data.categories = resp.data.data;
					$scope.data.pageCategory    = resp.data;

				});
			}, function (error) {

			})
		},
		loadMore: function() {
			if ($scope.data.pageCategory.total > $scope.data.categories.length
				&& $scope.data.pageCategory.current_page < $scope.data.pageCategory.last_page) {
				$scope.data.pageCategory.current_page  = $scope.data.pageCategory.current_page + 1;
				var params = $scope.data.filter();
				$searchService.action.search(params).then(function (resp) {
					$apply(function () {
						console.log($scope.data.categories);
						$scope.data.pageCategory = resp.data;
					});
				}, function (error) {

				})
			}
		},
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