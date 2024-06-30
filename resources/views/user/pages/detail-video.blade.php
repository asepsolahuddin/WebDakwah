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
        <a href="">#Cinta Nabi Muhammad SAW</a>
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
          <a href="{{ route('detail.video', $recent->id) }}">{{ $recent->judul }}</a>
          <p><time>{{ $recent->created_at->format('d M Y') }}</time></p>
        </div>
      </div>
          
      @endforeach
    </div>
  </div>
</div>
  
@endsection