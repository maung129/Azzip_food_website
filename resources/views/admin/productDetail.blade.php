

@extends('admin.dashboard');


@section('admin')

        <div class="row" style="width:100vw">
            <div class="col-md-3" style="overflow: hidden">
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
            </div>
            <div class="d-flex flex-col justify-content-center align-items-center container mt-3 text-center">
                <div class="shadow-sm" style="width:700px;height:auto;margin-left:23%">
                    <div style="font-size: 30px;font-weight:700;margin-bottom:23px">Product Detail</div>
                    <div class="container mt-4">
                    <img src="{{ asset('storage/'.$product->productImage) }}" style="width:250px;height:250px;object-fit:cover;border-radius:10px" alt="">
                        <div class="detailInfo">
                            <h2 class="mt-3">{{ $product->productName }}</h2>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <span style="color:gray;font-size:13px;">Category - {{ $product->category->categoryName }}</span>
                                <span style="font-size:17px;font-weight:bold;letter-spacing:0.3em">Price - ${{ $product->price }}</span>
                            </div>
                            <div class="description mt-3">
                                <p style="font-size: 18px;font-family:Verdana;color:black">{{ $product->productDesc }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="/dashboard" class="mt-5 mb-3 float-left">
                        <button class="btn btn-outline-dark"><i class="fa fa-solid fa-arrow-left mr-3"></i>Go Back</button>
                    </a>
            </div>

        </div>

@endsection


