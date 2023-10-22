@extends('layout.master')

@section('content')


  <section class="ftco-section">
    @if ($blogs)
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Read our blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div>
          <div class="sidebar-box ftco-animate">
              <h3>Blogs' categories</h3>
              <div class="tagcloud">
                @foreach ($blogCats as $cat)
                <a href="{{ route('filteredBlogs',$cat->id) }}" class=" w-10 px-3 mr-4" style="font-size:15px">{{ $cat->catName }}</a>
                @endforeach

                {{-- <a href="{{ route('filteredBlogs',$blog->category_id) }}" class="tag-cloud-link w-10 px-3 mr-4" style="font-size:15px">coffee</a>
                <a href="{{ route('filteredBlogs',$blog->category_id) }}" class="tag-cloud-link w-10 px-3 mr-4" style="font-size:15px">food</a>
                <a href="{{ route('filteredBlogs',$blog->category_id) }}" class="tag-cloud-link w-10 px-3 mr-4" style="font-size:15px">desserts</a>
                <a href="{{ route('filteredBlogs',$blog->category_id) }}" class="tag-cloud-link w-10 px-3 mr-4" style="font-size:15px">drinks</a> --}}
              </div>
            </div>

        </div>
        <div class="row d-flex">
          @foreach ($blogs as $blog)
          <a href="{{ route('blogDetail',$blog->id) }}">
              <div class="col-md-4 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch">
                  <img src="{{ asset('storage/'.$blog->blogImage) }}" style="width:300px;height:200px;object-fit:cover" alt="{{ $blog->title }}">
                  <div class="text py-4 d-block">
                      <div class="meta">
                      <div><a href="#">{{ $blog->created_at }}</a></div>
                      <div><a href="#">{{ $blog->blogAuthor }}</a></div>

                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> {{ count($blog->comments) }}</a></div>
                    </div>
                    <div><a href="{{ route('filteredBlogs',$blog->category_id) }}" class="btn btn-sm" style="font-size:11px;border:1px solid rgb(210, 136, 7)">{{ $blog->category->catName }}</a></div>
                    <h3 class="heading mt-2"><a href="#">{{ $blog->blogTitle }}</a></h3>
                    <p>{{ Str::limit($blog->blogDescription, 100, '...') }}</p>
                  </div>
                </div>
              </div>
          </a>
          @endforeach

        </div>
        {{-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> --}}
      </div>
    @endif
  </section>


@endsection
