<section class="ftco-appointment">
    <div class="overlay"></div>
<div class="container-wrap">
    <div class="row no-gutters d-md-flex align-items-center">
        <div class="col-md-12 appointment ftco-animate">
            <h3 class="mb-3">Contact Us</h3>
            <form action="{{ route('contactResponse') }}" class="appointment-form" method="GET">
                @csrf
                <div class="d-md-flex">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name">
                    </div>
                </div>
                <div class="d-me-flex">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
          <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
        </div>

          <input type="submit" value="Send" class="btn btn-primary py-3 px-4">

            </form>
        </div>
    </div>
</div>
</section>
