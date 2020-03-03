@extends('layouts.master')

@section('content')
<section class="container">
<div style="margin: 1rem 0 1rem 0">
    <div class="row">
        <div class="col-lg-6 col-sm-12 py-5 px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 font-weight-bold">Daftar</h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_user" class="form-label">{{ __('Jenis User') }}</label>
                            <div class="">
                                <select id="jenis_user" name="jenis_user" class="browser-default custom-select">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('jenis_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('Nama Lengkap') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">{{ __('Nama Pengguna') }}</label>

                            <div class="">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('Alamat E-mail') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="form-label">{{ __('Ulangi Kata Sandi') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button class="btn btn-color white-text btn-block m-0 mb-3 border-0" type="submit">Daftar</button>
                            </div>
                        </div>
                    </form>
                    <p>Sudah Punya Akun?
                    <a href="../login">Masuk</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
