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
          <a href="{{ route('detail.video', $video->id) }}">{{ $video->judul }}</a
          >
          <p><time>{{ $video->created_at->format('d M Y') }}</time></p>
        </div>
      </div>
    </div> 
    @endforeach
    
  </div>
  
</div>
{{ $videos->links('pagination::bootstrap-5') }}
  
@endsection