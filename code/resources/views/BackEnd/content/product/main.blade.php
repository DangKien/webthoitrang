@extends('BackEnd.layouts.default')
@section ('title', 'Sản phẩm')
@section ('myJs')
    <script src="{{ url('')}}/js/ctrl/backend/productCtrl.js"></script>
    <script src="{{ url('')}}/js/factory/services/backend/productService.js"></script>
    <script src="{{ url('')}}/js/directives/modal/backend/productModal.js"></script>

    <script src="{{ url('')}}/js/ctrl/backend/detailProductCtrl.js"></script>
    <script src="{{ url('')}}/js/directives/modal/backend/detailProductModal.js"></script>
   
@endsection

@section('content')
	<div ng-view></div>
@endsection