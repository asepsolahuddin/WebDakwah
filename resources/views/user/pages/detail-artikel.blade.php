@extends('user/layout/main')

@section('content-page')
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <a href="{{ url('/halaman-artikel') }}"><h2>Artikel</h2></a>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <article class="entry entry-single">
            <div class="entry-img">
              <img src="{{ asset('/storage/products/'.$posts->cover_path) }}" class="rounded" style="width: 100%">
            </div>

            <h2 class="entry-title">
              <a href="blog-single.html"
                >{{ $posts->judul }}</a
              >
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center">
                </li>
              </ul>
            </div>

            <div class="entry-content">
              <p>{!! $posts->deskripsi !!}</p>
            </div>
          </article>
          <!-- End blog entry -->

          <!-- <div class="blog-author d-flex align-items-center">
            <img
              src="assets/img/blog/blog-author.jpg"
              class="rounded-circle float-left"
              alt=""
            />
            <div>
              <h4>Jane Smith</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"
                  ><i class="bi bi-twitter"></i
                ></a>
                <a href="https://facebook.com/#"
                  ><i class="bi bi-facebook"></i
                ></a>
                <a href="https://instagram.com/#"
                  ><i class="biu bi-instagram"></i
                ></a>
              </div>
              <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi
                eum sed possimus accusantium. Quas repellat voluptatem
                officia numquam sint aspernatur voluptas. Esse et
                accusantium ut unde voluptas.
              </p>
            </div>
          </div> -->
          <!-- End blog author bio -->

          <!-- End blog comments -->
        </div>
        <!-- End blog entries list -->

        <div class="col-lg-4">
          <div class="sidebar">
            {{-- <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text" />
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div> --}}
            <!-- End sidebar search formn-->
            <!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              @foreach ($recents as $recent )
              <div class="post-item clearfix">
                <img src="{{ asset('/storage/products/' . $recent->cover_path) }}" alt="" />
                <h4>
                  <a href="blog-single.html"
                    >{{ $recent->judul }}</a
                  >
                </h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>
              @endforeach
            </div>
            <!-- End sidebar recent posts-->
          </div>
          <!-- End sidebar -->
        </div>
        <!-- End blog sidebar -->
      </div>
    </div>
  </section>
  <!-- End Blog Single Section -->
</main>
@endsection