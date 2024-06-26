@extends('user.layout.main-video')

@section('content-page')
<div class="container play-container" style="padding-top: 20px">
  <div class="row">
    <div class="play-video">
      <iframe src="{{ $films->video_url }}" 
        title="YouTube video player" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
       </iframe>
      <div class="tags">
        <a href="">#Coding</a> <a href="">#Html</a> <a href="">#css</a>
        <a href="">#js</a>
      </div>
      <h3>{{ $films->judul }}</h3>
      <div class="justify-text">
        <p>
          {!! $films->deskripsi !!}
        </p>
        <br />
        <hr />
      </div>
    </div>
    <div class="right-sidebar">
      <h3>Recent Video</h3>
      @foreach ($recents as $recent)
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="{{ asset('/storage/products/'.$recent->cover_path) }}" class="thumbnail" alt=""
          /></a>
        <div class="vid-info">
          <a href="">{{ $recent->judul }}</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
          
      @endforeach
      
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail2.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail3.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail4.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail5.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail6.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <p>
    &copy; 2024
    <a href="https://yourwebsite.com">Adab Nabi Muhammad SAW</a>. All rights
    reserved.
  </p>
</footer>
  
@endsection