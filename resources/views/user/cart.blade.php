@php
$qty = isset($_GET['qty']) ? $_GET['qty'] : 1; //to be displayed
if(isset($_GET['incqty'])){
   $qty += 1;
}

if(isset($_GET['decqty'])){
   $qty -= 1;
}

@endphp

@extends('layout.master')


@section('content')

<div class="container my-5">
    <div class="cartItem">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$product->productImage) }}" style="width:100%;height:400px;object-fit:cover" alt="{{ $product->productName }}">
            </div>
            <div class="col-md-6">
                <div class="product-wrapper">
                    <h4>Product Name: </h4>
                    <h3>{{ $product->productName }}</h3>
                    <small><em>${{ $product->price }}</em></small>
                    <p>{{ $product->productDesc }}</p>
                    <div class="d-flex">
                        <form method='get'>
                            @csrf
                            <td>
                                <button name='incqty' class="btn btn-outline-light"> + </button>
                                <input type='text' size='1' class="text-center btn btn-outline-light" name='qty' value="{{ $qty }}" min="1" max="99"/>

                                <button name='decqty' class="btn btn-outline-light"> - </button>
                            </td>
                         </form>
                    </div>
                    <div class="mt-3 d-flex align-items-center">

                        {{-- <button class="btn btn-outline-light mr-3" disabled="{{ count($cartItems)===0 }}">
                            <a href="{{ route('gotocart') }}" ><i class="fas fa-shopping-cart" style="font-size: 20px"></i></a>
                        </button> --}}
                        <form action="{{ route('orderlist',$product->id) }}" method="GET">
                            @csrf
                            <input type='hidden' size='1' class="text-center btn btn-outline-light" name='qty' value="{{ $qty }}" min="1" max="99"/>
                            <input type="hidden" name="total" value="{{ $product->price * $qty }}"/>
                            <button type="submit" class="btn btn-white btn-outline-white">Check your order out</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
