ngApp.directive('detailProductModal', function($apply, $productService){
	templateUrl = SiteUrl + '/modal/productDetailModal';
	var link = function (scope) {

		scope.dataParams = function () {
			var color = scope.data.params.color;
			var size = scope.data.params.size;
			var price = scope.data.params.price;
			var quantily = scope.data.params.quantily;

			var params = $productService.dataDetail(color, size, quantily, price);
			console.log(params);
			return params;
	};

		scope.actions = {
			formatQuantily: function (quantily){
				scope.data.params.quantily = FormatNumber(quantily);
			},

			formatPrice: function (price){
				scope.data.params.price = FormatNumber(price);
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
				console.log(scope.data.idDetailProduct);
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