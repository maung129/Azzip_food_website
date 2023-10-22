

@extends('layout.master')


@section('content')
@if (count($cartItems)===0)
    <h2 class="font-bold" style="font-size: 30px;text-align:center">There is nothing in your orderlist...</h2>
@else
<section class="container mt-3">
    <a href="/menu" class="mt-5 mb-5 float-left">
        <button class="btn btn-outline-light"><i class="fa fa-solid fa-arrow-left mr-3"></i>Go Back</button>
    </a>
    <h2 class="my-5">Your Order List</h2>
    <div class="container">
        <ul class="row mt-5 list-unstyled d-flex flex-col justify-content-center align-items-center">
            @foreach ($cartItems as $item)

                <a href="{{ route('cart',$item->product_id) }}">
                    <div class="col-12" style="padding:20px;background:rgba(237, 233, 233,0.3);border-radius:10px;margin-bottom:10px;height:auto;color:white">
                    <li class="w-full">
                        <div class="row d-flex justify-content-center align-items-center">
                            <span class="col-3">
                                <img src="{{ asset('storage/'.$item->productImage) }}"
                            style="width: 74px;height:74px;object-fit:cover; border-radius:50%;text-align:center;margin:0 10px" alt="{{ $item->productName }}">
                            </span>
                            <span class="font-bold col-3 " style="font-size: 20px">{{ $item->productName }}</span>
                            <span class="col-2"><em>One Per ${{ $item->price }}</em></span>
                            <span class="col-2 font-bold">{{ $item->qty }} items</span>
                            <span class="col-2"><em>Total ${{ $item->price*$item->qty }}</em></span>
                           <a href="{{ route('orderCancle',$item->product_id) }}"> <span class="col-2 text-danger">Cancel order</span></a>
                        </div>
                    </li>
                </div>
                </a>

            @endforeach
        </ul>
        <div class="row">
            <div class="col-2 offset-md-7" style="font-size:20px;font-weight:bold;rgba(237, 233, 233,0.3);border-radius:10px;color:whitesmoke;width:full;text-align:end">Total :</div>
            <div class="col-3" style="font-size:20px;font-weight:bold;background:rgba(237, 233, 233,0.3);color:whitesmoke;border-radius:10px;width:full">${{ $total }}</div>
        </div>
        <div style="text-align:end">
                <form action="{{ route('storeInorder') }}" method="POST">
                    @csrf
                    <a href="{{ route('finish') }}">
                        <button type="submit" class="my-3 btn btn-lg rounded btn-outline-light">Order Now</button>
                    </a>
                </form>
        </div>
    </div>
</section>
@endif

@endsection
