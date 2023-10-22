@extends('admin.dashboard')

@section('admin')

<div class="row" style="width:94vw;text-align:center">
        <div class="col-md-3">
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
                            <li>
                                <a href="{{ route('welcome') }}">
                                    <i class="fas fa-arrow-circle-right"></i>Go to user view</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        </div>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->

            <!-- HEADER DESKTOP-->
            {{-- <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Sithu</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">sithu</a>
                                                    </h5>
                                                    <span class="email">sithu@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header> --}}
            <!-- HEADER DESKTOP-->

            <div class="col-md-9">

                <div class="container mt-5">
                    <h2 class="fw-bold text-center mb-3">
                        Azzip Products List
                    </h2>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    {{-- Products Section --}}
                    <table class="table table-striped mt-5">
                        <thead>
                          <tr>
                            <th scope="col">Product No.</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Category</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">View Detail / Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)

                                <tr class="p-3">
                                        <th scope="row">{{ $p->id }}</th>
                                        <td style="width:100px;height:100px;object-fit:cover"><img src="{{ asset('storage/'.$p->productImage) }}" alt=""></td>
                                        <td>{{ $p->productName }}</td>
                                        <td>{{ $p->category->categoryName }}</td>
                                        <td>${{ $p->price }}</td>
                                        <td class="d-flex justify-content-around"><a href="{{ route('productDetail',$p->id) }}" >
                                            <i class="fas fa-eye" style="font-size: 23px;color:black" ></i>
                                        </a>
                                        <form action="{{ route('productDelete',$p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fas fa-trash" style="font-size: 23px;color:red"></i>
                                            </button>
                                        </form>
                                    </td>
                                  </tr>


                            @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>



@endsection
