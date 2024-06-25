@extends('admin.layout.main')

@section('content-page')

<div class="container mt-5 mb-5">
  <div class="row">
      <div class="col-md-12">
          <div class="card border-0 shadow-sm rounded">
              <div class="card-body">
                  <form action="{{ route('dbvideos.update', $videos->id) }}" method="POST" enctype="multipart/form-data">
                  
                      @csrf
                      @method('PUT')

                      <div class="form-group mb-3">
                        <label class="font-weight-bold">User</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" name='user_id' value="{{ old('user_id',$videos->user_id) }}" placeholder="user_id">
                    
                        <!-- error message untuk title -->
                        @error('user_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                      <label class="font-weight-bold">Judul</label>
                      <input type="text" class="form-control @error('judul') is-invalid @enderror" name='judul' value="{{ old('judul',$videos->judul) }}" placeholder="Masukkan Judul Product">
                  
                      <!-- error message untuk title -->
                      @error('judul')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>


                      <div class="form-group mb-3">
                          <label class="font-weight-bold">IMAGE</label>
                          <input type="file" class="form-control @error('cover_path') is-invalid @enderror" name='cover_path'>
                      
                          <!-- error message untuk image -->
                          @error('cover_path')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group mb-3">
                          <label class="font-weight-bold">DESCRIPTION</label>
                          <textarea class="form-control @error('deskripsi') is-invalid @enderror" name='deskripsi'  placeholder="Masukkan Description ">{{ old('deskripsi',$videos->deskripsi) }}</textarea>
                      
                          <!-- error message untuk description -->
                          @error('deskripsi')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <div class="form-group mb-3">
                        <label class="font-weight-bold">Video URL</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" name='video_url' value="{{ old('video_url') }}" placeholder="Masukkan link">
                    
                        <!-- error message untuk price -->
                        @error('video_url')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>

            <div class="row">
              <div class="col-md-6 ml-4 mb-3">
                <div class="form-group mb-3">
                  <label class="font-weight-bold">Status : </label>
                      <select name="status" id="status">
                          <option value="aktif">Aktif</option>
                          <option value="non_aktif">Non-aktif</option>
                       </select>
                </div>
                
                <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
              </div>
            </div>

                  </form> 
              </div>
          </div>
      </div>
  </div>
</div>
  
@endsection