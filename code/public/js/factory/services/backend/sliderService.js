ngApp.factory('$sliderService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };
    //chuan bi du lieu
    service.data.list = function (textSearch, page, perPage) {
        return {
            text_search: textSearch,
            page: page,
            perPage: perPage
        };
    };

    service.data.params = function (name, url_image, location) {
        var params = new FormData();
        params.append('name', name || '');
        params.append('url_image', url_image || '');
        params.append('location', location || '');

        return params;
    };
    
    //action
    service.action.listSlide = function (data) {
        var url = SiteUrl + '/rest/backend/slider?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    service.action.insertSlide = function (params) {
        var config = {
            headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
        };
        var url = SiteUrl + '/rest/backend/slider';
        return $http.post(url, params, config);
    };

    service.action.updateSlide = function (idSlide, data) {
        var config = {
            headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
        };
        var url = SiteUrl + '/rest/backend/slider/' + idSlide;
        return $http.post(url, data, config);
    };

    service.action.editSlide = function (idSlide) {
        var url = SiteUrl + '/rest/backend/slider/' + idSlide;
        return $http.get(url);
    };

    service.action.deleteSlide = function (idSlide) {
        var url = SiteUrl + '/rest/backend/slider/' + idSlide;
        return $http.delete(url);
    };

    
    return service;
});