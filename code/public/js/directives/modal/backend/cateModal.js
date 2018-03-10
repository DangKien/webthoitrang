ngApp.directive('cateModal', function($apply, $cateService, $myLoader){
	templateUrl = SiteUrl + '/modal/categoryModal';
	var link = function (scope) {
		scope.dataParams = function () {
			var name   = scope.data.params.name;
			var status = scope.data.params.status;
			var cateId = $('#idCate').val();
			var tag    = scope.data.params.tag;
			var urlLink= scope.data.params.url_link;
			var params = $cateService.data(name, status, cateId, tag, urlLink);
			return params;
		};

		scope.actions = {

			insertCate : function () {
				var params = scope.dataParams();
				$myLoader.show();
				$cateService.action.insertCate(params).then( function (resp) {
						if (resp) {
							scope.onSave({data : true});
						}
					}, function (error) {
						scope.onSave({data : error.data});
					});
			},

			updateCate: function (idCate) {
				var params = scope.dataParams();
				$myLoader.show();
				$cateService.action.updateCate(idCate, params).then( function (resp) {
					if (resp) {
						scope.onSave({data : true});
					}
				}, function (error) {
					scope.onSave({data : error.data});
				});
			},

			saveCate: function () {
				if (!scope.data.idCate) {
					if ($(scope.cateForm).parsley().validate()) {
						scope.actions.insertCate();
					}
				}else {
					if ($(scope.cateForm).parsley().validate()) {
						scope.actions.updateCate(scope.data.idCate);
					}
					
				}
			}
		}


	}
	return {
		name: '',
		scope: {
			data: "=cateData",
			onSave: "&cateSave",
			cateForm: "=domCateForm",
			cateModal: "=domCateModal",
		},
		restrict: 'E',
		templateUrl: templateUrl,
		link:link,
	};
});