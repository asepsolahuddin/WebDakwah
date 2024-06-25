@extends('admin.layout.main')

@section('content-page')
<div class="container mt-5 mb-5">
  <div class="row">
      <div class="col-md-4">
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <img src="{{ asset('/storage/products/'.$videos->cover_path) }}" class="rounded" style="width: 100%">
              </div>
          </div>
      </div>
      <div class="col-md-8">
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <h3>{{ $videos->judul }}</h3>
                  <hr/>
                  <code>
                      <p>{!! $videos->deskripsi !!}</p>
                  </code>
                  <hr/>
                  <iframe width="560" height="315" src="{{ $videos->video_url }}" 
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                   </iframe>
              </div>
          </div>
      </div>
  </div>
</div>

  
@endsection