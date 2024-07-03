@extends('admin.layout.main')

@section('content-page')
<div class="container mt-5 mb-5">
  <div class="row">
      <div class="col-md-4">
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <img src="{{ asset('/storage/products/'.$dtustad->ktp_path) }}" class="rounded" style="width: 100%;height : 200px">
              </div>
          </div>
      </div>
      <div class="col-md-8">
          <div class="card mb-3" style="width :100%">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('/storage/products/'.$dtustad->pp_path) }}" class="img-fluid rounded-start" alt="..." style="height: 100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title font-weight-bold text-dark">{{ $dtustad->name }}</h3>
                  <hr>
                  <div class="d-flex align-items-center">
                      <i class="fas fa-phone-alt mr-2 text-primary"></i>
                      <h5 class="card-title font-weight-normal text-dark mb-0">{{ $dtustad->phone_number }}</h5>
                  </div>
                  <hr>
                  <div class="d-flex align-items-center">
                      <i class="fas fa-graduation-cap mr-2 text-success"></i>
                      <p class="card-title font-weight-light text-dark mb-0">Spesialis di bidang: {{ $dtustad->spesialis }}</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <i class="fas fa-award mt-3 ml-1 mr-2 text-warning"></i>
                    <p class="card-text font-weight-light text-dark mt-3">Memiliki prestasi sebagai berikut:</p>
                  </div>
                  <p class="card-text font-weight-light text-dark ml-4">{{ $dtustad->prestasi }}</p>
                  <p class="card-text text-muted"><small>Bergabung sejak: {{ $dtustad->created_at->format('d M Y') }}</small></p>
              </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
  
@endsection