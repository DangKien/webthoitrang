ngApp.factory('$newService', function ($http, $httpParamSerializer){

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

	service.action.news = function (data) {
		var url = SiteUrl + "/rest/frontend/news?" + $httpParamSerializer(data);
        return $http.get(url);
	};

	
	return service;
})