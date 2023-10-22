@extends('layout.master')


@section('content')


  <section>
    @if ($blog)
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12 ftco-animate">
              <div class="d-flex justify-content-between align-items-center">
                  <div>
                      <h2 class="mb-3" style="font-size: 30px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase">{{ $blog->blogTitle }}</h2>
                      <div class="tagcloud">

                        <a href="{{ route('filteredBlogs',$blog->category_id) }}" class="tag-cloud-link w-10 px-3 mr-4" style="font-size:12px">{{ $blog->category->catName }}</a>

                      </div>
                  </div>
                  <div class="tag-widget post-tag-container mb-5 mt-5">
                    @can('update',$blog)
                    <div class="row">
                        <div class="col-4 offset-8">
                           <a href="{{ route('updateBlog',$blog->id) }}" ><i class="fa fa-edit mb-4 btn btn-outline-warning" style="font-size: 23px"></i></a>
                           <form action="{{ route('deleteBlog',$blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-trash " style="font-size: 23px"></i></button>
                           </form>
                        </div>
                      </div>
                    @endcan
                    </div>

              </div>


            <div class="my-3 d-flex justify-content-center align-content-center">
              <img src="{{ asset('storage/'.$blog->blogImage) }}" alt="" style="object-fit:cover;border-radius:15px;width:500px;height:300px;">
            </div>

            <p class="text-white mt-5" style="font-size:19px;margin:0 auto;width:700px">{{ $blog->blogDescription }}</p>
            <p>
              <img src="images/image_1.jpg" alt="" class="img-fluid">
            </p>

            <h2 class="my-5">Author Info</h2>
            <div class="about-author d-flex">

              <div class="bio align-self-md-center mr-5" style="width:200px;height:150px;">

                <img src="{{ asset('storage/'.$blog->author->image) }}" style="border:transparent;border-radius:30px" alt="blog author" class="img-fluid mb-4" >
              </div>
              <div class="desc align-self-md-center">
                <h3>{{ $blog->author->username }}</h3>
                <p>This is the admin of the this website! I hope you guys enjoy this blog section and enjoy your meals with Azzip.</p>
              </div>
            </div>

            <div class="pt-5 mt-5">
              <h3 class="mb-5">{{ count($blog->comments) }} Comments</h3>
              <ul class="comment-list">

                  @foreach ($blog->comments as $c)
                  <li class="comment">
                      <div class="vcard bio">
                          <img src="{{ asset('storage/'.$c->user->image) }}" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                          <h3>{{ $c->user->username }}</h3>
                          <div class="meta">{{ $c->created_at }}</div>
                          <p>{{ $c->body }}</p>
                      </div>
                  </li>
                  @endforeach

              </ul>
              <!-- END comment-list -->

              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="{{ route('commentCreate',$blog->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="message">Write your comment...</label>
                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
        </div>
      </div>
    @endif

  </section> <!-- .section -->

@endsection
