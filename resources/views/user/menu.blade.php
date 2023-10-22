
@extends('layout.master')


@section('content')

<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <h1 class="mb-3 mt-5 bread"> Find Your Favourite Menu & Order Now</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

      <section class="ftco-section">

      <div class="container">
          <div class="row justify-content-center mb-5 pb-3 pt-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2 class="mb-4"> Menu List </h2>

          <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          <p class="mt-5">A taste you’ll remember.</p>
        </div>
      </div>
      <div class="row">
         @foreach ($products as $p)
         <div class="col-md-6 mt-5" style="width:100%">
            <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                       <div>
                        <img src="{{ asset('storage/'.$p->productImage) }}" style="width: 73px;height:70px;object-fit:cover;border-radius:50%" alt="">
                       </div>
                       <div class="d-flex align-items-center justify-content-around">
                        <h4 style="margin-right:15px">{{ $p->productName }}</h4>
                        <p>${{ $p->price }}</p>
                       </div>
                    </div>
                    <div class="mt-3">
                        <div class="mb-3">{{ $p->productDesc }}</div>
                        <div>
                            <a href="{{ route('orderlist',$p->id) }}" class="btn btn-white btn-outline-white">Add to cart</a>
                        </div>
                    </div>
            </div>

        </div>
         @endforeach
      </div>
      </div>
  </section>

  <div class="my-5" style="width: 97%">


       <div class="row ">
        <div class="col-md-12">
            <h1 class="text-center">Our Hot Menus</h1>
                <div class="d-flex justify-content-center">
                    <a class="nav-link" href="{{ route('hotmenus','Pizza') }}" >Pizza</a>
                    <a class="nav-link" href="{{ route('hotmenus','Cold Drinks') }}" >Cold Drinks</a>
                    <a class="nav-link" href="{{ route('hotmenus','Coffee') }}" >Coffee</a>
                    <a class="nav-link" href="{{ route('hotmenus','Desserts') }}" >Desserts</a>
                </div>
        </div>
       </div>

        <div class="d-flex flex-col justify-content-center align-items-center my-4">

                @foreach ($filteredMenus as $menu)
                    <div class="d-flex justify-content-around align-items-center ">
                        <img src="{{ asset('storage/'.$menu->productImage) }}" alt="" style="width:180px;height:200px;border-radius:10px;object-fit:cover">
                        <div class="text mt-3 mx-3">
                            <h3><a href="#">{{ $menu->productName }}</a></h3>
                            <p>{{ $menu->productDesc }}</p>
                            <p class="price"><span>{{ $menu->price }}</span></p>
                            <a href="{{ route('orderlist',$menu->id) }}" class="btn btn-white btn-outline-white">Add to cart</a>
                        </div>

                    </div>

                    @endforeach

        </div>

  </div>



@endsection
