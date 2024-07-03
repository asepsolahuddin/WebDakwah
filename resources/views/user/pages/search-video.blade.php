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
        {{ $results->appends(['query' => $query])->links('pagination::bootstrap-5') }}
    @endif
  
@endsection