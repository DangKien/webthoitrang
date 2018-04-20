ngApp.controller('categoryCtrl', function($apply, $categoryService, $rootScope, $scope, $myLoader) {
		
	$scope.data = {
		slug: slug.trim(),
		categories: [],
		detail: {},
		pageCategory:{},
		sortBy: '',
		filter: function () {
			var slug   = $scope.data.slug;
			var page   = $scope.data.pageCategory.current_page;
			var params = $categoryService.data.filterProduct(page);
			return params;
		},
		productDetail: function () {
			$myLoader.show();
			var slug   = $scope.data.slug;
			var page   = $scope.data.pageCategory.current_page;
			var params = $categoryService.data.filterProduct(page);
			$categoryService.action.categories(slug, params).then(function (resp) {
				$apply(function () {
					$scope.data.categories.push(resp.data.data)
					$scope.data.pageCategory    = resp.data;
					$myLoader.hide();
				});
			}, function (error) {
				$myLoader.hide();
			})
		},
		loadMore: function() {
			if ($scope.data.pageCategory.total > $scope.data.categories.length
				&& $scope.data.pageCategory.current_page < $scope.data.pageCategory.last_page) {
				$scope.data.pageCategory.current_page  = $scope.data.pageCategory.current_page + 1;
				var params = $scope.data.filter();
				$myLoader.show();
				$categoryService.action.categories($scope.data.slug, params).then(function (resp) {
					$apply(function () {
						$scope.data.categories.push(resp.data.data);
						$scope.data.pageCategory = resp.data;
						$myLoader.hide();
						console.log($scope.data.pageCategory);
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

		addCart: function ($id){
			$categoryService.action.addCart($id).then(function(resp) {
				$rootScope.getCartItems();
			}, function (error){
				console.log(error);
			});
		},
	} 
	$scope.data.productDetail();
});