ngApp.factory('$searchService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data.filterSearch = function (freeText , page) {
		return {
			freeText: freeText || '',
			page: page || 1,
		}
	};

	service.action.search = function (filter) {
		var url = SiteUrl + "/rest/frontend/search/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};
	
	return service;
})