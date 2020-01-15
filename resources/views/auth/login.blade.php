@extends('layouts.master')

@section('content')
<section class="container">
<div style="margin: 2rem 0 2rem 0">
    <div class="row">
        <div class="col-lg-6 col-sm-12 py-5 px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 font-weight-bold">Masuk</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="">{{ __('Username') }}</label>
<!-- 
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->


                            <div class="">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Kata sandi') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="">
                            <button class="btn btn-color white-text btn-block m-0 mb-3 border-0" type="submit">Masuk</button>
                            <a class="lupakatasandi" href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        </div>

                            <!-- <div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div> -->
                        </div>
                    </form>
                    <p>Tidak Punya Akun?
                    <a href="/register">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-6 col-sm-12" style="background: url(../asset/image/undraw_complete_task_u2c3.svg); background-size: contain; background-repeat: no-repeat; background-position: center;">
    </div> -->
</div>
</div>
</section>
@endsection
