@extends('layouts.master')

@section('content')
<section class="container">
<div style="margin: 2rem 0 2rem 0">
    <div class="row">
        <div class="col-lg-6 col-sm-12 py-5 px-0 px-sm-0 px-md-0 px-lg-3 px-xl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Atur Ulang kata sandi</h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button class="btn btn-color white-text btn-block m-0 mb-3 border-0" type="submit">Kirim tautan atur ulang kata sandi</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-sm-12" style="background: url(../asset/image/undraw_complete_task_u2c3.svg); background-size: contain; background-repeat: no-repeat; background-position: center;">
                    </div> -->
                </div>
            </div>
        </section>
@endsection
