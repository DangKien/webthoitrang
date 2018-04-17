ngApp.controller('commentCtrl', function($scope, $commentService, $apply, $myNotify, $myBootbox, $myLoader){
	$scope.chosseModal;
	$scope.data = {
		list: function(){
			$commentService.action.listComment().then(function (resp) {				
				$apply(function () {
					resp.data;
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

		
		showModal: function(idSlide) {
			$scope.data.idSlide = idSlide;
			$scope.data.params = {};
			$scope.data.errors = {};
			$($scope.slideForm).parsley().reset();
			$("input[name=imageTitle]").val('');
			$(".image-support").attr("src", " ");
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
					$myLoader.show();
					$sliderService.action.deleteSlide(idSlide).then(function (resp) {
						$myNotify.success('Xóa slide thành công.')
						$scope.data.list();
						$myLoader.hide();
					}, function (error) {
						console.log(error);
						$myLoader.hide();
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
				$myLoader.hide();
			} else {
				$scope.data.errors = data.errors;
				$myLoader.hide();
			}
		},


		
	}
	
	$scope.data.list();
});