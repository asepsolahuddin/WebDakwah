@extends('user/layout/main')

@section('content-page')
<main id="main">
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <h2>Blog</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <!-- batas awal artikel-->
          <div class="row mb-4">
            <div class="col-md-8">
                <form action="{{ route('post.artikel') }}" method="GET" class="mt-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search for articles" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if($newss->isEmpty())
          <h1">No articles found.</h1>
        @else
            @foreach($newss as $news)
            <article class="entry">
              <div class="entry-img">
                <img
                  src="{{ asset('/storage/products/' . $news->cover_path) }}"
                  alt=""
                  class="img-fluid"
                />
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">
                {{ $news->judul }}</a
                >
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center">
                    <i>Kategori :</i>
                    <a href="blog-single.html">{{ $news->kategori }}</a>
                  </li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas.
                  Quibusdam animi praesentium. Aliquam et laboriosam eius aut
                  nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est
                  ea dolorem doloremque deleniti aperiam unde soluta. Est cum
                  et quod quos aut ut et sit sunt. Voluptate porro consequatur
                  assumenda perferendis dolore.
                </p>
                <div class="read-more">
                  <a href="blog-single.html">Read More</a>
                </div>
              </div>
            </article>
            @endforeach
        @endif
          <!-- End blog entry -->

          <div class="blog-pagination">
            <ul class="justify-content-center">
              <li>{{ $newss->links('pagination::bootstrap-5') }}</li>
            </ul>
          </div>
        </div>
        <!-- End blog entries list -->

        <div class="col-lg-4">
          <div class="sidebar">
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

            <!-- End sidebar tags-->
          </div>
          <!-- End sidebar -->
        </div>
        <!-- End blog sidebar -->
      </div>
    </div>
  </section>
  <!-- End Blog Section -->
</main>
@endsection