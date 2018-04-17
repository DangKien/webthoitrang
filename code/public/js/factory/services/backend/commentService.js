ngApp.factory('$commentService', function ($rootScope, $http, $httpParamSerializer)
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
    service.action.listComment = function (data) {
        var url = SiteUrl + '/rest/backend/comment?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    return service;
});