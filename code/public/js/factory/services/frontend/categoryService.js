ngApp.factory('$categoryService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data.filterProduct = function (page) {
		return {
			page: page || 1,
		}
	};

	service.action.categories = function (params, data) {
		var url = SiteUrl + "/rest/frontend/category/" + params + "?" + $httpParamSerializer(data);
        return $http.get(url);
	};

	service.action.addCart = function (params) {
		var url = SiteUrl + "/rest/frontend/add-cart/" + params;
        return $http.post(url);
	};

	service.action.getCart = function () {
		var url = SiteUrl + "/rest/frontend/cart/" ;
        return $http.get(url);
	};
	
	return service;
})