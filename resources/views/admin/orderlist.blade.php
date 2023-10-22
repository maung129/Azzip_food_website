@extends('admin.dashboard');

@section('admin')

<div class="page-wrapper">
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block" style="overflow: hidden">
        <div class="logo">
            <a href="#">
                ADMIN DASHBOARD
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active has-sub">
                        <a class="js-arrow" href="/dashboard">
                            <i class="fas fa-chart-pie"></i>All Products
                        </a>
                    </li>
                    <li class=" has-sub">
                        <a class="js-arrow" href="{{ route('createProduct') }}">
                            <i class="fas fa-pencil-square-o"></i>Create Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('createCat') }}">
                            <i class="fas fa-plus"></i>Add Category</a>
                    </li>
                    <li>
                        <a href="{{ route('createBlog') }}">
                            <i class="fas fa-picture-o"></i>Create Blogs</a>
                    </li>
                    <li>
                        <a href="{{ route('viewOrders') }}">
                            <i class="fas fa-shopping-basket"></i>Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('adminProfile') }}">
                            <i class="fas fa-user"></i>Admin Profile</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="mb-3">Order List</h2>

                                </div>
                                <form action="{{ route('statusChange') }}" method="POST">
                                    @csrf
                                    @if ($statusCode === "1")
                                    <select id="status" name="filterStatus" class="form-select">
                                        <option value="2" >All</option>
                                        <option value="0">Pending</option>
                                        <option value="1" selected>Finished</option>
                                    </select>
                                    @elseif ($statusCode === "0")
                                    <select id="status" name="filterStatus" class="form-select">
                                        <option value="2" >All</option>
                                        <option value="0" selected>Pending</option>
                                        <option value="1">Finished</option>
                                    </select>
                                    @else
                                    <select id="status" name="filterStatus" class="form-select">
                                        <option value="2" selected>All</option>
                                        <option value="0" >Pending</option>
                                        <option value="1" >Finished</option>
                                    </select>
                                    @endif
                                </form>
                            </div>

                        </div>
                        <div class="container mt-3">
                                <ul style="list-style:none;text-decoration:none;font-size:22px;font-weight:700" class="d-flex justify-content-around my-3">
                                    <li>User ID.</li>
                                    <li>Username</li>
                                    <li>Ordered time</li>
                                    <li>Order Code</li>
                                    <li>Amount</li>
                                    <li>Status</th>
                                </ul>

                                <ul style="list-style:none;text-decoration:none;">
                                    @foreach ($orders as $order)
                                    <li class="d-flex flex-col align-items-center mb-1 p-3 bg-light orderHover">
                                    <a href="{{ route('orderDetail',[$order->id,$order->user_id]) }}" class="text-dark">

                                        <div class="d-flex align-items-center">
                                            <span style="margin:0 50px;text-align:center">{{ $order->user_id }}</span>
                                            <span style="margin:0 45px;text-align:center">
                                            {{ $order->username }}
                                            </span>
                                            <span style="margin:0 45px;text-align:center">{{ date('d-m-Y(H:i:s)', strtotime($order->created_at)) }}</span>
                                            <span style="margin:0 45px;text-align:center">{{ $order->orderCode }}</span>
                                            <span style="margin:0 48px;text-align:center">${{ $order->totalPrice }}</span>
                                            <span style="margin:0 48px;text-align:center" class={{ $order->status ? "text-success" : "text-danger"}}>{{ $order->status ? "Finished" : "Pending..." }}</span>
                                        </div>

                                    </a>
                                    </li>
                                    @endforeach
                                </ul>










                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>

@section('js')
let select = document.getElementById('status');

select.addEventListener('change', function(){
    this.form.submit();
}, false);


@endsection

@endsection
