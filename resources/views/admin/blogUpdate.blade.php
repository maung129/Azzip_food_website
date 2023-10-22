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
    <h2 class="text-center">Create Blog</h2>
    <form action="{{ route('update',$blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
              <label class="form-label font-weight-bold">Blog Title</label>
              <input type="text" class="form-control" value="{{ $blog->blogTitle }}" name="blogTitle">
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">Blog Author</label>
                <input type="text" class="form-control" value="{{ $blog->blogAuthor }}" name="blogAuthor" value="Admin" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">Blog Description</label>
                <textarea type="text" class="form-control" name="blogDescription">{{ $blog->blogDescription }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label font-weight-bold"></label>
                <input type="file" class="form-control" name="blogImage">
            </div>
            <div class="mb-3">
                @foreach ($categories as $cat)
                <div class="form-check">
                    @if ($blog->category_id===$cat->id)
                    <input class="form-check-input" type="radio" name="category" id="flexRadioDefault1" checked value="{{ $cat->id }}">
                    @else
                    <input class="form-check-input" type="radio" name="category" id="flexRadioDefault1" value="{{ $cat->id }}">
                    @endif

                    <label class="form-check-label" for="flexRadioDefault1">
                      {{ $cat->catName }}
                    </label>
                  </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-outline-dark">Update Blog</button>

    </form>
</div>

@endsection
