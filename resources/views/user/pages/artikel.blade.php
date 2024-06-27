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
                <a href="{{ route('welcome.artikel', $news->id) }}">
                {{ $news->judul }}</a
                >
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center">
                    <i>Tanggal Upload :</i>
                    {{ $news->created_at->format('d M Y') }}
                  </li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {!! $news->tag_line !!}
                </p>
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
                  <a href="{{ route('welcome.artikel', $recent->id) }}">
                    {{ $recent->judul }}
                    </a>
                </h4>
                <time datetime="2020-01-01">{{ $recent->created_at->format('d M Y') }}</time>
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