ngApp.controller('cartCtrl', function($apply, $rootScope, $scope, $myLoader, $socketIo, $http, $httpParamSerializer ) {
	$socketIo.on('order', function (data) {
		if (data) {
			$rootScope.getOrder();
		}
		
	});

	$rootScope.getOrder = function () {
		var data = {
			status: 0,
			}
	    var url = SiteUrl + '/rest/backend/order?' + $httpParamSerializer(data);
	    $http.get(url).then(function (resp) {
	    	$apply(function (){
	    		$rootScope.dataOrder = resp.data;
	    		$rootScope.countOrder = Object.keys($rootScope.dataOrder).length;
	    		console.log($rootScope.dataOrder)
	    	});
	    }, function (error) {

	    });
	}
	$rootScope.getOrder();
});