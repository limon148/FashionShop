@extends('layout')
@section('content')
<h2 class="title text-center">Features Items</h2>
<?php foreach($product_by_manufacture as $v_manufacture_by_product){?>
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{URL::to($v_manufacture_by_product->product_image)}}" alt="" height="300px" width="300px" />
                <h2>{{$v_manufacture_by_product->product_price}} Tk</h2>
                <p>{{$v_manufacture_by_product->product_name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{$v_manufacture_by_product->product_price}} Tk</h2>
                    <p>{{$v_manufacture_by_product->product_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#">{{$v_manufacture_by_product->manufacture_name}}</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>View Product</a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>

</div>
<!--features_items-->

@endsection