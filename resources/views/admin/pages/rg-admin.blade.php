@extends('admin/layout/main-form')

@section('content-page')
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
              <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
              <div class="col-lg-7">
                  <div class="p-5">
                      <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                      </div>
                      <form method="post" action="{{ route('register') }}" class="user" id="form-register" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group ml-4">
                              <input type="checkbox" class="form-check-input" id="cek_ustad">
                              <label class="form-check-label" for="terms">Daftar Sebagai Ustad</label>
                          </div>
                          <div class="form-group">
                              <input type="text" name="name" class="form-control form-control-user" value="{{ old('name') }}" id="name"
                              placeholder="Name">
                              @if ($errors->has('name'))
                                      <span>{{ $errors->first('name') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" id="email"
                                  placeholder="Email Address"/>
                                  @if ($errors->has('email'))
                                  <span>{{ $errors->first('email') }}</span>
                                  @endif
                          </div>
                          <div id="additional_field">

                          </div>
                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                  <input type="password" name="password" class="form-control form-control-user"
                                      id="password" placeholder="Password"/>
                                      @if ($errors->has('password'))
                                          <span>{{ $errors->first('password') }}</span>
                                      @endif
                              </div>
                              <div class="col-sm-6">
                                  <input type="password" name="password_confirmation" class="form-control form-control-user"
                                      id="password-confirm" placeholder="Repeat Password">
                              </div>
                          </div>
                          <button type="submit" class="btn-primary btn-lg btn-block">Register</button>
                          
                      </form>
                      <hr>
                      <div class="text-center">
                          <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>  
@endsection

@section('footer-scripts')
    @include('admin.script.rg-script')
@endsection
