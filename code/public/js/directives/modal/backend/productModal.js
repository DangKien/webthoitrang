ngApp.directive('productModal', function($apply, $productService){
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

			var params = $productService.data(name, cate_id, cate_sale, sale_description, url_image, tag, description
											, multiImage);
			return params;
	};

		scope.actions = {

			insertProduct : function () {
				var params = scope.dataParams();
				$productService.action.insertProduct(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateProduct: function (idCate) {
				var params = scope.dataParams();
				$productService.action.updateCate(idCate, params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			saveProduct: function () {
				var params = scope.dataParams();
			
				if (!scope.data.idCate) {
					if ($(scope.productForm).parsley().validate())
					{
						scope.actions.insertProduct();
					}
				}
				// else {
				// 	if ($(scope.cateForm).parsley().validate())
				// 	{
				// 		scope.actions.updateProduct(scope.data.idCate);
				// 	}
					
				// }
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