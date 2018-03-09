ngApp.controller('sliderCtrl', function($scope,  $sliderService, $apply, $myNotify, $myBootbox){

	$scope.chosseSlideModal;
	$scope.slideForm;
	$scope.filter = {
	};
	$scope.data = {
		info: {},
		listSlide: {},
		pageSlide: {},
		params: {},
		checkbox: [],
		locationList: [],
		pagePostMenu: {},
		listPostAllMenu: {},
		locationCheck: false,
		list: function(){
			var textSreach = $scope.filter.textSreach;
			var params = $sliderService.data.list(textSreach, $scope.data.pageSlide.current_page, 10);
			$sliderService.action.listSlide(params).then(function (resp) {				
				$apply(function () {
					$scope.data.listSlide = resp.data.data;
					$scope.data.pageSlide = resp.data;
					$scope.actions.location(resp.data.data);
				});
			}, function (error) {
			});
		}
	}
	$scope.actions = {
		changePage: function(page){
			$scope.data.pageSlide.current_page = page;
			$scope.data.list();
		},

		location: function (data){
			$scope.data.locationList = [];
			angular.forEach(data, function(value, key){
				$scope.data.locationList.push(value.location);
			});
		},

		showModal: function(idSlide) {
			$scope.data.idSlide = idSlide;
			$scope.data.params = {};
			$("input[name=imageTitle]").val('');
			$($scope.chosseSlideModal).modal('show');
			if (idSlide){
				$scope.data.locationCheck = true;
				$sliderService.action.editSlide(idSlide).then(function (resp) {
					$scope.data.params = resp.data;
					if ($scope.data.params.img_link == "default-slide-image.png") {
						var img_link = SiteUrl + "/images/" + $scope.data.params.img_link;
					}else{
						var img_link = SiteUrl + $scope.data.params.img_link;
					}
					$("#holder").attr("src", img_link);
				}, function (error) {

				});
				$scope.data.title = "Cập nhật Slide";
			}
			else {
				$scope.data.locationCheck = false;
				$scope.data.title = "Thêm mới Slide";
			}
		},
	
		saveDelete: function (idSlide) {
			
			$myBootbox.confirm ('Bạn thật sự muốn xóa slide này?', function (conf) {
				if (conf) {

					$sliderService.action.deleteSlide(idSlide).then(function (resp) {
						$myNotify.success('Xóa slide thành công.')
						$scope.data.list();
					}, function (error) {
						console.log(error);
					});
				}
			});
		},

		successModal: function(data){
			if (data == true) {
				if (!$scope.data.idSlide) {
					$myNotify.success('Thêm mới slide thành công.')
				} else {
					$myNotify.success('Cập nhật slide thành công.')
				}
				$($scope.chosseSlideModal).modal('hide');
				$scope.data.list();
			} else {
				$scope.data.errors = data.errors;
			}
		},


		
	}
	
	$scope.data.list();
});