ngApp.factory('$productService', function ($http, $httpParamSerializer){

	var service = {
		action: {},
		data: {},
		filter: {},
	};

	service.data = function (name, cate_id, cate_sale, sale_description, url_image, tag, description, multiImage) {
		var params = new FormData();
		params.append('name', name || '');
		params.append('cate_id', cate_id || '');
		params.append('cate_sale', cate_sale || '');
		params.append('sale_description', sale_description || '');
		params.append('url_image', url_image || '');
		params.append('tag', tag || '');
		params.append('description', description || '');
		angular.forEach(multiImage, function(image, key){
			params.append('imageDetail[]', image);
		});
		return params;
	};

	service.dataDetail = function (color, size, quantily, price) {
		var params = {
			color: color || '#000000',
			size: size || '',
			quantily: quantily,
			price: price || '1',
		};
		
		return params;
	};

	service.filter = function (name, page, perPage = 10) {
		var params = {
			name: name || '',
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};

	service.filterDetail = function (name, page, perPage = 10) {
		var params = {
			name: name || '',
			per_page: perPage,
			page: page || '1',
		};
		return params;
	};

	service.action.listProduct = function (filter) {
		var url = SiteUrl + "/rest/backend/product/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.allListCate = function (filter) {
		var url = SiteUrl + "/rest/backend/cate/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.listPromotion = function (filter) {
		var url = SiteUrl + "/rest/backend/promotion/?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertProduct = function (params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/product";
        return $http.post(url, params, config);
	};

	service.action.editProduct = function (idProduct) {
		var url = SiteUrl + "/rest/backend/product/" + idProduct;
        return $http.get(url);
	};

	

	service.action.updateProduct = function (idProduct, params) {
		var config = {
			headers : {
                    'Content-Type': undefined,
                    'processData': false,
                    'contentType': false,
            },
		};
		var url = SiteUrl + "/rest/backend/product/" + idProduct;
        return $http.post(url, params, config);
	};

	service.action.deleteProduct = function (idProduct) {
		var url = SiteUrl + "/rest/backend/product/" + idProduct;
        return $http.delete(url);
	};

	service.action.listDetailProduct = function (idProduct, filter) {
		var url = SiteUrl + "/rest/backend/product-detail/" + idProduct + "?" + $httpParamSerializer(filter);
        return $http.get(url);
	};

	service.action.insertDetailProduct = function (idProduct, params) {
		var url = SiteUrl + "/rest/backend/product-detail/" + idProduct;
        return $http.post(url, params);
	};

	service.action.editDetailProduct = function (idProduct) {
		var url = SiteUrl + "/rest/backend/product-detail-edit/" + idProduct;
        return $http.get(url);
	};

	service.action.updateDetailProduct = function (idProduct, params) {
		var url = SiteUrl + "/rest/backend/product-detail-update/" + idProduct;
        return $http.post(url, params);
	};

	service.action.deleteDetailProduct = function (idProduct) {
		var url = SiteUrl + "/rest/backend/product-detail-delete/" + idProduct;
        return $http.get(url);
	};

	



	return service;
})