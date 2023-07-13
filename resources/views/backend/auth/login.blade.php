@extends('backend.auth.index')
@section('content')
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<div class="login-bg2 h-100">
    <div class="container-fluid h-100" style="height: 720px !important;">
        <div class="row justify-content-between h-100">
            <div class="col-xl-4">
                <div class="login-info">
                    {{-- <h2>Manage Your Order</h2>
                    <p class="mb-5">A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country in which roasted parts of sentences fly
                        into your mouth.</p> --}}
                    <h5>Telp: +6281276769149</h5>
                    <h5>Email: hmti@uis.ac.id</h5>
                </div>
            </div>
            <div class="col-xl-3 p-0">
                <div class="form-input-content login-form bg-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="logo text-center">
                                <a href="index.html">
                                    <img src="{{ asset('backend/img/logoHmti.svg') }}" alt="">
                                </a>
                            </div>
                            <h4 class="text-center mt-4">Login Akun Kamu</h4>
                            <form class="my-5" method="POST" action="{{ route('login') }}" >
                                @csrf

                                @if (session()->has('errorLogin'))
                                    <div class="alert alert-danger d-flex align-items-center mt-5" role="alert">
                                        <i class="bi bi-check-circle-fill"></i>
                                        <div>
                                            {{ session('errorLogin') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="form-check p-l-0">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label ml-3" for="remember">
                                                Check Selalu
                                            </label>
                                        </div>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="form-group col-md-6 text-right text-danger">
                                        <a href="{{ route('password.request') }}">
                                            Lupa Password ?
                                        </a>
                                    </div>
                                    @endif
                                </div>
                                <div class="text-center mb-4 mt-4">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-5">
                                    Belum Mempunyai Akun? <a href="{{ route('register') }}"> Daftar Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection