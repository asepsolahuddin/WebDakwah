@extends('user.layout.main-video')

@section('content-page')
<div class="container play-container">
  <div class="row">
    <div class="play-video">
      <video controls autoplay>
        <source src="{{ asset('images/video/video.mp4') }}" type="video/mp4" />
      </video>
      <div class="tags">
        <a href="">#Coding</a> <a href="">#Html</a> <a href="">#css</a>
        <a href="">#js</a>
      </div>
      <h3>Ini adalah video yang paling terkenal</h3>
      <div class="justify-text">
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo
          voluptatibus nesciunt optio hic, fugiat molestias, voluptate
          perspiciatis fuga veritatis, suscipit sapiente ratione quos fugit
          omnis sunt doloribus incidunt quae est.
        </p>
        <br />
        <hr />
      </div>
    </div>
    <div class="right-sidebar">
      <h3>Recent Video</h3>
      <div class="side-video-list">
        <a href="" class="small-thumbnail"
          ><img src="images/thumbnail1.png"
        /></a>
        <div class="vid-info">
          <a href="">Best Channerl that help you to be a web developer</a>
          <p>Easy Tutorials</p>
          <p>15k Views</p>
        </div>
      </div>
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