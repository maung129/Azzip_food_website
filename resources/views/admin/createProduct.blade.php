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
    <h2 class="text-center">Create Products</h2>
    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
              <label class="form-label">Product Name</label>
              <input type="text" class="form-control" name="productName">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="productImage">
              </div>
            <div class="mb-3">
                <label class="form-label">Product Description</label>
                <textarea name="productDesc" id="" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label class="form-label">Choose Product's Category</label>
                <select class="form-select" name="category_id">
                  @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->categoryName }}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark">Create</button>

    </form>
</div>

@endsection
