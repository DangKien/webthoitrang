ngApp.controller('cartCtrl', function($apply, $cartService, $rootScope, $scope, $myLoader) {

	$rootScope.getCartItems = function (){
		$cartService.action.getCart().then(function(resp) {
			$rootScope.cartItems = resp.data;
		}, function (error){
			console.log(error);
		});
	}

	$scope.deleteCart = function ($id){
		$cartService.action.deleteCart($id).then(function(resp) {
			$rootScope.getCartItems();
		}, function (error){
			console.log(error);
		});
	}

	$scope.updateCart = function ($id, qty) {
		$cartService.action.updateCart($id, {'qty': qty}).then(function (resp){
			$rootScope.getCartItems();
		}, function (error) {

		});
	}

	$rootScope.getCartItems();
});