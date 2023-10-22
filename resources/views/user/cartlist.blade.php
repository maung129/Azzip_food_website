@extends('layout.master')


@section('content')

<section class="container mt-3">
    <a href="/menu" class="mt-5 mb-5 float-left">
        <button class="btn btn-outline-light"><i class="fa fa-solid fa-arrow-left mr-3"></i>Go Back</button>
    </a>
    <h2 class="my-5">View Your Cart List</h2>
    <div class="container">
        <ul class="row mt-5 list-unstyled d-flex flex-col justify-content-center align-items-center">
            @foreach ($cartItems as $item)
            @if ($item->qty>0)
            <div class="col-12" style="margin-bottom:15px;height:auto;color:white">
                <li class="w-full">
                    <div class="row d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/'.$item->cartImage) }}"
                        style="width: 74px;height:74px;object-fit:cover; border-radius:50%;text-align:center;" alt="{{ $item->cartName }}">
                        <span class="font-bold col-3" style="font-size: 20px">{{ $item->cartName }}</span>
                        <span class="font-bold col-1" style="font-size: 20px">{{ $item->qty }} items</span>
                        <span class="col-3" style="margin-left:50px"><em>${{ $item->cartPrice }}</em></span>
                        <span class="col-2 text-danger"><a href="{{ route('orderCancle',$item->id) }}">Cancel order</a></span>
                    </div>
                </li>
            </div>
            @endif
            @endforeach
        </ul>
        <div class="row mb-3" >
            <div class="col-2 offset-md-6" style="font-size:20px;font-weight:bold;border-radius:10px;color:whitesmoke;width:full;text-align:end">Total :</div>
            <div class="col-3" style="font-size:20px;font-weight:bold;color:whitesmoke;width:full">${{ $total }}</div>
        </div>
    </div>
</section>

@endsection
