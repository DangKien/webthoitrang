ngApp.controller('searchCtrl', function($apply, $searchService, $scope) {
		
	$scope.data = {
		freeText: freeText.trim(),
		categories: {},
		detail: {},
		pageCategory:{},
		sortBy: '',
		filter: function () {
			var freeText = $scope.data.freeText;
			var page     = $scope.data.pageCategory.current_page;
			var params   = $searchService.data.filterSearch(freeText, page);
			return params;
		},

		changePage: function (page) {
			$scope.data.pageCategory.current_page = page;
			$scope.data.productDetail();
		},

		productDetail: function () {
			var params = $scope.data.filter();
			$searchService.action.search(params).then(function (resp) {
				$apply(function () {
					$scope.data.categories = resp.data.data;
					$scope.data.pageCategory    = resp.data;

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