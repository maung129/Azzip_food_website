@extends('admin.dashboard');

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
            <div class="d-flex flex-col justify-content-center align-items-center container mt-5 text-center">
                <div class="shadow-lg" style="width:700px;height:auto;margin-left:23%">
                    <div style="font-size: 30px;font-weight:700;margin-bottom:23px">Admin Profile</div>
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="{{ asset('storage/'.auth()->user()->image) }}" style="object-fit:cover;height:200px;width:250px;border-radius:20px" alt="">
                     </div>
                    <div class="d-flex justify-content-center align-items-center mb-4">
                       <p class="mr-3">Name: </p>
                        <h4>{{ auth()->user()->username }}</h4>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <p class="mr-3">Email: </p>
                         <h4>{{ auth()->user()->email }}</h4>
                     </div>
                     <div class="d-flex justify-content-center align-items-center mb-4">
                        <p class="mr-3">Phone number: </p>
                         <h4>{{ auth()->user()->phone }}</h4>
                     </div>
                     <div class="d-flex justify-content-center align-items-center mb-4">
                        <p class="mr-3">Address: </p>
                         <h4>{{ auth()->user()->address }}</h4>
                     </div>

                </div>
            </div>
        </div>


