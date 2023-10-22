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
                                    <h2 class="mb-5">Category List</h2>

                                </div>
                            </div>

                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Category No.</th>
                                        <th>CategoryName</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr class="tr-shadow">
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <span>{{ $category->categoryName }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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

@endsection
