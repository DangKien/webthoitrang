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

	return service;
})