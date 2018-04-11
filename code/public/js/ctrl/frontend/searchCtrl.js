ngApp.controller('searchCtrl', function($apply, $searchService, $scope, $myLoader) {
		
	$scope.data = {
		freeText: freeText.trim(),
		categories: [],
		detail: {},
		pageCategory:{},
		sortBy: '',
		filter: function () {
			var freeText = $scope.data.freeText;
			var page     = $scope.data.pageCategory.current_page;
			var params   = $searchService.data.filterSearch(freeText, page);
			return params;
		},
		productDetail: function () {
			var params = $scope.data.filter();
			$searchService.action.search(params).then(function (resp) {
				$apply(function () {
					$scope.data.categories.push(resp.data.data);
					$scope.data.pageCategory    = resp.data;
				});
			}, function (error) {

			})
		},
		loadMore: function() {
			if ($scope.data.pageCategory.last_page > $scope.data.categories.length
				&& $scope.data.pageCategory.current_page < $scope.data.pageCategory.last_page) {
				$scope.data.pageCategory.current_page  = $scope.data.pageCategory.current_page + 1;
				var params = $scope.data.filter();
				$myLoader.show();
				$searchService.action.search(params).then(function (resp) {
					$apply(function () {
						$scope.data.categories.push(resp.data.data);
						$scope.data.pageCategory = resp.data;
						$myLoader.hide();
					});
				}, function (error) {
					$myLoader.hide();
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