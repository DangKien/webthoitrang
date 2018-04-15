<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductDetailModel;
use App\Models\CategoryModel;
use Cart;

class CartCtrl extends Controller
{
    public function addCart(ProductModel $productModel, $id) {
        $product = $productModel::select('name', 'price', 'url_image', 'slug')
                                ->find($id);
        $price = (int) str_replace( ',', '', $product->price);
        $productCart = ['id' => $id,
                         'name' => $product->name,
                         'qty' => 1, 
                         'price' => $price, 
                         'options' =>           
                         ['image' => $product->url_image,
                         'slug'=>$product->slug,
                     ]];
        Cart::add($productCart);

        return response()->json(["status" => true], 200);
    }

    public function getCart() {
        return response()->json(["cartItems"=>Cart::content(),
                                 "cartCount"=>Cart::count(),
                                 "cartTotal"=> Cart::subtotal()]);
    }

    public function deleteCart($rowId) {
        Cart::remove($rowId);
    }

}
