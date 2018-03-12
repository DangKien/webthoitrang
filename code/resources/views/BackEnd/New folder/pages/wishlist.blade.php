@extends('layouts.master') 
@section('content')
<div class="favorite-list-section">
    <div class="container">
        <div class="row fix-row">
            <div class="wishlist-wrapper">
                <div class="description">
                    <p>My wishlist on VietnamArtist</p>
                </div>
                <div class="favorite-list">
                    <div class="title">
                        <ul>
                            <li>Product name</li>
                            <li>Unit price</li>
                            <li>Sock status</li>
                        </ul>
                    </div>
                    @foreach($products as $product)
                    <div class="item">
                        <ul>
                            <li><a href="{!! route('product.remove_wishlist', $product->id) !!}" title=""><i class="fa fa-times" aria-hidden="true"></i></a></li>
                            <li><a href="{!! $product->route !!}"><img height="100px;" width="100px;" src="{!! $product->image !!}" alt=""></a></li>
                            <li class="entry-title"><span>Product name: </span><p><a href="{!! $product->route !!}">{!! $product->title !!}</a></p></li>
                            <li><span>Unit price: </span><p>
                                @if($product->show_price)
                                    $ {!! $product->price !!}
                                @endif
                            </p></li>
                            <li><span>Sock status: </span>
                                <p>
                                    @if($product->is_available)
                                        In stock
                                    @else
                                        Out stock
                                    @endif
                                </p>
                            </li>
                            <li>
                                @if($product->show_addcart)
                                    <a href="{!! route('cart.show', $product->slug) !!}" class="add" title="">ADD TO CART</a>
                                @endif
                            </li>

                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection