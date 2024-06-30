@extends('admin.layout.main')

@section('content-page')

<a href="{{ route('dbartikels.create') }}" class="btn btn-md btn-success mb-3 ml-3">TAMBAH ARTIKEL</a>

@if (session('success'))
        <div class="alert alert-success ml-3 mr-3">
            {{ session('success') }}
        </div>
@endif
<div class="row">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success ml-3 mr-3">
            {{ session('success') }}
        </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tables Artikel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            {{-- <div class="pl-3">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>
                                    <button type="button" class="btn btn-primary " style="height: auto"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div> --}}
                            <form action="{{ route('dbartikels.index') }}" method="GET" class="mb-4">
                                <div class="pl-3">
                                  <div class="input-group">
                                    <input type="text" name="query" class="form-control" placeholder="Search for artikel..." value="{{ request()->input('query') }}">
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
                                            <th scope="col" style="width: 5%">User ID</th>
                                            <th scope="col" style="width: 30%">Gambar</th>
                                            <th scope="col" style="width: 40%">Judul</th>
                                            <th scope="col" style="width: 25%">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($artikels as $artikel)
                                            <tr>
                                                <td>{{ $artikel->id }}</td>
                                                <td><img src="{{ asset('/storage/products/'.$artikel->cover_path) }}" class="rounded" style="width: 100%"></td>
                                                <td>{{ $artikel->judul }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dbartikels.destroy', $artikel->id) }}" method="POST">
                                                        <a href="{{ route('dbartikels.show', $artikel->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                                        <a href="{{ route('dbartikels.edit', $artikel->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Products belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                    {{ $artikels->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>

</div>
  
@endsection