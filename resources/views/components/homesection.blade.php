<div>
    @if (session('success'))
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:black">&times;</span>
        </button>
      </div>
    @endif
</div>
<section class="img" style="background-image: url(images/bg_1.jpg);height:100vh;margin-top:10%">

    <div style="background-image: url(images/bg_3.jpg);">

        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">We cooked your desired Pizza Recipe</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="{{ route('menu') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> </p>
          </div>

        </div>
      </div>
    </div>
  </section>
