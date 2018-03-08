ngApp.factory('$categoryService', function ($http, $httpParamSerializer){

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

	service.action.categories = function (params) {
		var url = SiteUrl + "/rest/frontend/category/" + params;
        return $http.get(url);
	};

	
	return service;
})