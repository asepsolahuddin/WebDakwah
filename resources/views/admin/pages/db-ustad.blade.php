@extends('admin.layout.main')

@section('content-page')

@if (session('success'))
        <div class="alert alert-success ml-3 mr-3">
            {{ session('success') }}
        </div>
@endif
<div class="row">
  <div class="container-fluid">

      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Tables Ustad</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="row">
                        <form action="{{ route('dbustads.index') }}" method="GET" class="mb-4">
                          <div class="pl-3">
                            <div class="input-group">
                              <input type="text" name="query" class="form-control" placeholder="Search for ustads..." value="{{ request()->input('query') }}">
                              <div class="input-group-append">
                                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                              </div>
                          </div>
                        </div>
                      </form>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th scope="col">User ID</th>
                                          <th scope="col">Nama</th>
                                          <th scope="col">Spesialis</th>
                                          <th scope="col">Status Aktifasi</th>
                                          <th scope="col">Tanggal Gabung</th>
                                          <th scope="col" style="width: 30%">ACTIONS</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @forelse ($ustads as $ustad)
                                          <tr>
                                              <td>{{ $ustad->id }}</td>
                                              <td>{{ $ustad->name }}</td>
                                              <td>{{ $ustad->spesialis }}</td>
                                              <td>{{ $ustad->active_status }}</td>
                                              <td>{{ $ustad->created_at->format('d M Y') }}</td>
                                              <td class="text-center">
                                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dbustads.destroy', $ustad->id) }}" method="POST">
                                                      <a href="{{ route('dbustads.show', $ustad->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                                      <a href="{{ route('dbustads.edit', $ustad->id) }}" class="btn btn-sm btn-primary">AKTIF</a>
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @empty
                                          <div class="alert alert-danger">
                                              Data Ustad belum Tersedia.
                                          </div>
                                      @endforelse
                                  </tbody>
                              </table>
                  {{ $ustads->links('pagination::bootstrap-5') }}
              </div>
          </div>
      </div>

  </div>

</div>

{{-- <script>
  function search() {
  var query = document.getElementById('search-input').value;
  window.location.href = "{{ route('search.video') }}" + "?query=" + encodeURIComponent(query);
  }
</script> --}}
  
@endsection