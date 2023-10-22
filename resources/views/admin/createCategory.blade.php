@extends('admin.dashboard')

@section('admin')

{{-- sidebar --}}
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

{{-- create product form  --}}
<div class="container" style="max-width: 600px;margin-top:5%;padding-left:50px">
    <h2 class="text-center">Add Category</h2>
    <form action="{{ route('storeCat') }}" method="POST">
        @csrf
            <div class="mb-3">
              <label class="form-label">Category Name</label>
              <input type="text" class="form-control" name="categoryName">
            </div>
            <button type="submit" class="btn btn-outline-dark">Create</button>

    </form>
</div>

@endsection
