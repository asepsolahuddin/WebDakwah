@extends('user.layout.main-video')

@section('content-page')
<div class="search-container">
  <h3>Hasil Pencarian :"{{ $query }}"</h3>
  <br />
    
    @if($results->isEmpty())
        <p>No results found.</p>
    @else
        @foreach($results as $result)
        <div class="video-search">
          <a href="" class="large-thumbnail"
            ><img src="{{ asset('/storage/products/'.$result->cover_path) }}"
          /></a>
          <div class="vid-search-info">
            <a href="{{ route('detail.video', $result->id) }}"
              >{{$result->judul}}</a
            >
            <p>diupload pada: {{ $result->created_at->format('d M Y') }}</p>
          </div>
        </div>
        <hr />
        <br />
        @endforeach
        <!-- Tambahkan link pagination -->
        {{ $results->appends(['query' => $query])->links() }}
    @endif
  <div class="video-search">
    <a href="" class="large-thumbnail"
      ><img src="images/thumbnail1.png"
    /></a>
    <div class="vid-search-info">
      <a href="">Best Channerl that help you to be a web developer</a>
      <p>Recent</p>
      <p>

      </p>
    </div>
  </div>
  <hr />
  <br />
  <div class="video-search">
    <a href="" class="large-thumbnail"
      ><img src="images/thumbnail1.png"
    /></a>
    <div class="vid-search-info">
      <a href="">Best Channerl that help you to be a web developer</a>
      <p>Recent</p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
        neque enim magni iste illo eligendi dicta praesentium iure ullam
        similique. Temporibus amet, explicabo recusandae officiis quos
        eveniet labore optio ipsum.
      </p>
    </div>
  </div>
  <hr />
  <br />
  <div class="video-search">
    <a href="" class="large-thumbnail"
      ><img src="images/thumbnail1.png"
    /></a>
    <div class="vid-search-info">
      <a href="">Best Channerl that help you to be a web developer</a>
      <p>Recent</p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
        neque enim magni iste illo eligendi dicta praesentium iure ullam
        similique. Temporibus amet, explicabo recusandae officiis quos
        eveniet labore optio ipsum.
      </p>
    </div>
  </div>
  <hr />
  <br />
</div>
<footer class="footer">
  <p>
    &copy; 2024
    <a href="https://yourwebsite.com">Adab Nabi Muhammad SAW</a>. All rights
    reserved.
  </p>
</footer>
  
@endsection