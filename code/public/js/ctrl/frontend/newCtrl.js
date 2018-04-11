ngApp.controller('newCtrl', function($apply, $newService, $scope, $myLoader) {
		
	$scope.data = {
		news: [],
		detail: {},
		pageNews:{},
		sortBy: '',
		filter: function () {
			var params    = $newService.data.filterProduct();
			return params;
		},

		listNews: function () {
			var slug   = $scope.data.slug;
			var page   = $scope.data.pageNews.current_page;
			var params = $newService.data.filterProduct(page);

			$newService.action.news(params).then(function (resp) {
				$apply(function () {
					$scope.data.news.push(resp.data.data);
					$scope.data.pageNews    = resp.data;
				});
			}, function (error) {

			})
		},
		loadMore: function() {
			if ($scope.data.pageNews.last_page > $scope.data.news.length
				&& $scope.data.pageNews.current_page < $scope.data.pageNews.last_page) {
				$myLoader.show();
				$scope.data.pageNews.current_page  = $scope.data.pageNews.current_page + 1;
				var params = $newService.data.filterProduct($scope.data.pageNews.current_page);
				$newService.action.news(params).then(function (resp) {
					$apply(function () {
						$scope.data.news.push(resp.data.data);
						$scope.data.pageNews = resp.data;
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

	$scope.data.listNews();
});