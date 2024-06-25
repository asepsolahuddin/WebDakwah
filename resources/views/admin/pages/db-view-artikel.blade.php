@extends('admin.layout.main')

@section('content-page')
<div class="container mt-5 mb-5">
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <img src="{{ asset('/storage/products/'.$artikels->cover_path) }}" class="rounded" style="width: 100%">
              </div>
          </div>
      <hr/>
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <h3>{{ $artikels->judul }}</h3>
                  <hr/>
                      <p>{!! $artikels->deskripsi !!}</p>
                  <hr/>
              </div>
          </div>
</div>

  
@endsection