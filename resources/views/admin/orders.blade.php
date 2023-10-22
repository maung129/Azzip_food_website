@extends("admin.dashboard")


@section("admin")
<div class="container mt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Customer Id</th>
                        <th>Ordered Product Names</th>
                        <th>Total Price</th>
                        <th>OrderCode</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user_id }}</td>
                        <td class="align-middle">Product Name</td>
                        <td class="align-middle">{{ $order->orderCode }}</td>
                        <td class="align-middle">
                           {{ $order->totalPrice }}
                        </td>
                        <td class="align-middle">{{ $order->status===0 ? "Pending..." : "Order Completed" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$160</h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
