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
                                @if (session()->has('error'))
                                  <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <div>
                                        {{ session('error') }}
                                    </div>
                                  </div>
                                @endif
                                @if (session()->has('success'))
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <div>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            </div>
                            <form method="post" action="{{ route('register') }}" class="user" id="form-register"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ml-4">
                                    <input type="checkbox" class="form-check-input" id="cek_ustad">
                                    <label class="form-check-label" for="terms">Daftar Sebagai Ustad</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user"
                                        value="{{ old('name') }}" id="name" placeholder="Name">
                                    @if ($errors->has('name'))
                                        <span>{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control form-control-user" id="email" placeholder="Email Address" />
                                    @if ($errors->has('email'))
                                        <span>{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div id="additional_field">

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" />
                                        @if ($errors->has('password'))
                                            <span>{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-user" id="password-confirm"
                                            placeholder="Repeat Password">
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
