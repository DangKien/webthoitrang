ngApp.directive('sliderModal', function($sliderService, $apply, $myLoader){
	var url = SiteUrl + "/modal/sliderModal";

	var link = function(scope){
		scope.actions = {
			paramsSlide: function(){
				var name      = scope.data.params.name;
				var url_image = $("input[name*='fileImg']")[0].files[0];
				var location  = scope.data.params.location;
				console.log(location);
				var params    = $sliderService.data.params(name, url_image, location);

				return params;
			},

			insertSlide: function () {
				if ($(scope.slideForm).parsley().validate()) {
					var params = scope.actions.paramsSlide();
					$myLoader.show();
					$sliderService.action.insertSlide(params).then(function(resp){
						if (resp) {
							$apply(function() {
								scope.resFunc({data : true});
							});
						}
					}, function(err){
						scope.resFunc({data: err.data});
					});
				}
			},
			updateSlide: function (idSlide) {
				if ($(scope.slideForm).parsley().validate()) {
					var params = scope.actions.paramsSlide();
					$myLoader.show();
					$sliderService.action.updateSlide(idSlide, params).then(function(resp){
						if (resp) {
							$apply(function() {
								scope.resFunc({data : true});
							});
						}
					}, function(err){
						scope.resFunc({data: err.data});
					});
				}
			},

			saveSlide: function () {
				if (scope.data.idSlide) {
					scope.actions.updateSlide(scope.data.idSlide);
				} else {
					scope.actions.insertSlide();
				}
			}
		}

	}

	return {
		restrict: "E",
		scope: {
			slideModal: "=slideModal",
			data: "=data",
			resFunc: "&slideSave",
			slideForm: "=slideForm",

		},
		link: link,
		templateUrl: url
	}
});