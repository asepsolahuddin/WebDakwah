@extends('admin.layout.main')

@section('content-page')

@if (session('success'))
        <div class="alert alert-success ml-3 mr-3">
            {{ session('success') }}
        </div>
@endif
<a href="{{ route('dbvideos.create') }}" class="btn btn-md btn-success mb-3 ml-3">ADD PRODUCT</a>
<div class="row">
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tables Video</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <form action="{{ route('dbvideos.index') }}" method="GET" class="mb-4">
                                <div class="pl-3">
                                  <div class="input-group">
                                    <input type="text" name="query" class="form-control" placeholder="Search for video..." value="{{ request()->input('query') }}">
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
                                            <th scope="col" style="width: 5%">ID</th>
                                            <th scope="col" style="width: 30%">Cover</th>
                                            <th scope="col" style="width: 40%">Judul</th>
                                            <th scope="col" style="width: 25%">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($videos as $video)
                                            <tr>
                                                <td>{{ $video->id }}</td>
                                                <td><img src="{{ asset('/storage/products/'.$video->cover_path) }}" class="rounded" style="width: 100%"></td>
                                                <td>{{ $video->judul }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dbvideos.destroy', $video->id) }}" method="POST">
                                                        <a href="{{ route('dbvideos.show', $video->id) }}" class="btn btn-sm btn-dark">LIHAT</a>
                                                        <a href="{{ route('dbvideos.edit', $video->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                    {{ $videos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>

</div>
  
@endsection