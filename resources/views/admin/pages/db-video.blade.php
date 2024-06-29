@extends('admin.layout.main')

@section('content-page')

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
                            <div class="pl-3">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                    </label>
                                    <button type="button" class="btn btn-primary " style="height: auto"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Nama Pengupload</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" style="width: 30%">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($videos as $video)
                                            <tr>
                                                <td>{{ $video->user_id }}</td>
                                                <td>UDIN</td>
                                                <td>{{ $video->judul }}</td>
                                                <td>Aktif</td>
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