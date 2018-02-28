ngApp.controller('detailProductCtrl', function ($apply, $productService, $scope, changStatus, $conf, $routeParams) {
    $scope.domProductForm;
    $scope.domDetailProductModal;
    $scope.data = {
        listProduct: {},
        nameCate: [],
        mutiImage: [],
        params: {},
        pageDetailProdcut:{},
    };
    $scope.data.idProduct = $routeParams.id;

    $scope.actions = {

        changePage: function (page) {
            $scope.data.pageDetailProdcut.current_page = page;
            $scope.actions.listProduct();
        },

        // Danh sach loai tin
        listDetailProduct: function () {
            // var name   = $scope.data.filter.name;
            // var status = $('#statusFilter').val();
            // var current_page =  $scope.data.pageCate.current_page;
            // var params = $cateService.filter (name, status, current_page , 10);
            $productService.action.listDetailProduct($scope.data.idProduct).then(function (resp) {
                $scope.data.listDetailProduct = resp.data.data;
                $scope.data.pageDetailProdcut = resp.data;
            }, function (error) {
                console.log(error);
            });
        },
        showModal: function (idDetailProduct) {
            $scope.data.idDetailProduct = idDetailProduct;
            $($scope.domDetailProductModal).modal('show');
            // $($scope.domCateForm).parsley().reset();
            $scope.data.errors = {};
            if (!idDetailProduct) {
                $scope.data.title = "Thêm mới sản phẩm";
            } else {
                $productService.action.editDetailProduct(idDetailProduct).then (function (resp) {
                 $scope.data.params = resp.data;
                }, function (error) {
                 console.log(error);
                });
                $scope.data.title = "Cập nhật loại tin";
            }
        },
        save: function (data, conf) {
            if (data == true) {
                if (!$scope.data.idDetailProduct) {
                    $conf.confirmNotifi('success', 'Thêm mới chi tiết thành công');
                }
                else {
                    $conf.confirmNotifi('success', 'Cập nhật chi tiết thành công');          
                }
                $apply(function () {
                    $scope.actions.listDetailProduct();
                    $($scope.domDetailProductModal).modal('hide');
                });
                
            } else {
                $scope.data.errors = data.errors;
            }
        },

        deleteDetail: function(idProduct) {
            $conf.confirmDelete ('small', 'Bạn muốn chi tiết sản phẩm này?', function (resp) {
                if (resp == true){
                    $productService.action.deleteDetailProduct(idProduct).then(function (resp) {
                        if (resp) {
                            $scope.actions.listDetailProduct();
                            $conf.confirmNotifi('success', 'Xóa loại chi tiết sản phẩm thành công');
                        }
                    }, function (error) {
                            $conf.confirmNotifi('error', 'Xóa loại chi tiết sản phẩm thất bại', "fa fa-ban");
                    });
                }
            });
        }
    };
    $scope.actions.listDetailProduct();
    

});