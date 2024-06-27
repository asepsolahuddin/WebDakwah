@extends('user.layout.main-video')

@section('content-page')

<div class="container-video">
  <div class="banner">
    <img src="{{ asset('images/banner1.jpg') }}" alt="" />
  </div>
  <div class="list-container">
    @foreach ($videos as $video)
    <div class="vid-list">
      <a href="{{ route('detail.video', $video->id) }}"
        ><img src="{{ asset('/storage/products/'.$video->cover_path) }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href="play-video.html"
            >{{ $video->judul }}</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div> 
    @endforeach
    
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail2.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail3.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail4.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail5.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail6.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
    <div class="vid-list">
      <a href=""
        ><img src="{{ asset('images/video/thumbnail7.png') }}" class="thumbnail" alt=""
      /></a>
      <div class="flex-div">
        <div class="vid-info">
          <a href=""
            >Best chanel ro learn coding that help you to be a web
            developer</a
          >
          <p>Easy Tutorials</p>
          <p>15k Views 2 days</p>
        </div>
      </div>
    </div>
  </div>
</div>
  
@endsection