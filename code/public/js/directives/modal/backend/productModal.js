ngApp.directive('productModal', function($apply, $productService, $myLoader){
	templateUrl = SiteUrl + '/modal/productModal';
	var link = function (scope) {

		scope.dataParams = function () {
			var name             = scope.data.params.name;
			var sale_description = scope.data.params.sale_description;
			var cate_id          = $('#idCate').val();
			var cate_sale        = $('#idSale').val();
			var url_image        = $('input[name*="fileImg"]')[0].files[0];
			var tag              = scope.data.params.tag			
			var description      = scope.data.params.description;
			var multiImage       = scope.data.params.multiImage;
			var price            = scope.data.params.price;
			var codeProduct      = scope.data.params.code_product;
			var status           = scope.data.params.status;
			var made_in          = scope.data.params.made_in;
			var trade            = scope.data.params.trade;
			var material         = scope.data.params.material;

			var params = $productService.data(name, cate_id, cate_sale, sale_description, url_image, tag, description, price,
						codeProduct, material, made_in, trade, status, multiImage);

			return params;
	};

		scope.actions = {
			formatPrice: function (price){
				scope.data.params.price = FormatNumber(price);
			},

			insertProduct : function () {
				var params = scope.dataParams();
				$myLoader.show();
				$productService.action.insertProduct(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateProduct: function (idProduct) {
				var params = scope.dataParams();
				$myLoader.show();
				$productService.action.updateProduct(idProduct, params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveProduct: function () {
				var params = scope.dataParams();
				if (!scope.data.idProduct) {
					if ($(scope.productForm).parsley().validate()) {
						scope.actions.insertProduct();
					}
				}
				else {
					if ($(scope.productForm).parsley().validate()) {
						scope.actions.updateProduct(scope.data.idProduct);
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
			productModal: "=domProductModal",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});