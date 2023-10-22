@extends("admin.dashboard")


@section("admin")
<a class="" href="{{ route('viewOrders') }}">
    <div class="btn btn-outline-dark rounded m-5"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Back</div>
</a>
<div class="container mt-1 p-3 bg-light shadow-sm">
    <div class="row">
        @foreach ($products as $index=>$p)


        @foreach ($p as $product)

        <div class="col-1 col-md-3 offset-md-1">
            <div class="card shadow-lg" style="width: 18rem;">

               <img class="card-img-top" src="{{ asset("storage/".$product->productImage) }}" style="object-fit: cover" alt="Card image cap">
               <div class="card-body">
                 <h5 class="card-title">{{ $product->productName }}</h5>
                 <p class="card-text">${{ $product->price }}</p>
               </div>

              </div>
        </div>
        @endforeach



        @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-bold" style="font-size: 20px">
            Total Amount : ${{ $order->totalPrice }}
        </div>
        <div class="col-md-4 font-bold" style="font-size: 20px">
            Order Code : {{ $order->orderCode }}
        </div>
        <div class="col-md-4 font-bold" style="font-size: 20px">
            Customer Name : {{ $user->username }}
        </div>
    </div>
</div>
<div class="text-center">
    <a href="{{ route('statusFinished',$order->id) }}" class=" {{ $order->status ? "btn btn-success mt-2 disabled" : "btn btn-danger mt-2"}}">{{ $order->status ? "Order Finished" : "Click when food is ready" }}</a>
</div>



{{--
    <h2>{{ $p[0]['price'] }}</h2> --}}



@endsection
