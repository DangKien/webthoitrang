ngApp.directive('detailProductModal', function($apply, $productService){
	templateUrl = SiteUrl + '/modal/productDetailModal';
	var link = function (scope) {

		scope.dataParams = function () {
			var color    = scope.data.params.color;
			var price    = scope.data.params.price;
			var size     = [];

			angular.forEach(scope.data.checkSize, function(value, key) {
			
			  	if (value == true) {
			  		size.push(key);
			  	}
			});
			var params = $productService.dataDetail(color, size, price);
			return params;
	};

		scope.actions = {
			formatQuantily: function (quantily){
				scope.data.params.quantily = FormatNumber(quantily);
			},

			insertDetailProduct : function () {
				var params = scope.dataParams();
				$productService.action.insertDetailProduct(scope.data.idProduct, params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateDetailProduct: function (idDetailProduct) {
				var params = scope.dataParams();
				$productService.action.updateDetailProduct(idDetailProduct, params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveDetailProduct: function () {
				if (!scope.data.idDetailProduct) {
					if ($(scope.productForm).parsley().validate())
					{
						scope.actions.insertDetailProduct();
					}
				}
				else {
					if ($(scope.productForm).parsley().validate())
					{
						scope.actions.updateDetailProduct(scope.data.idDetailProduct);
					}
					
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: "=productData",
			onSave: "&productSave",
			productForm: "=domProductForm",
			detailProductModal: "=domDetailProductModal",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});