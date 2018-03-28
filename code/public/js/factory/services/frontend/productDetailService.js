ngApp.factory('$productDetailService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data.filterProduct = function (slug) {
		return {
			'slug': slug,
		}
	};

	service.action.product = function (filter) {
		var url = SiteUrl + "/rest/frontend/product/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.productInvole = function (filter) {
		var url = SiteUrl + "/rest/frontend/productInvole/" + filter;
        return $http.get(url);
	};

	
	return service;
})