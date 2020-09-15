<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Warung') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS SENDIRI -->
    <link rel="stylesheet" href="{{ url('/css/style.css') }} "/>
</head>
<body>
      <!-- register -->
      
      <div class="container">
        <div class="registrasi-form">
          <div class="row mt-5">
            <div class="col d-flex justify-content-center">
              <div
                class="card w-50 mx-auto"
              >
                <div class="card-header text-center" >
                <h4>
                    DAFTAR
                </h4>  
                </div>
                <div class="card-body card-body-registration" >
                  <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <!-- Nama lengkap -->
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input id="name" placeholder="Nama lengkap" type="text" class="form-control rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                      <!-- Email -->
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input id="email" placeholder="Email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                      <!-- Kata Sandi -->
                    <div class="form-group">
                      <label for="password">Kata Sandi</label>
                      <input id="password" placeholder="Kata sandi" type="password" class="form-control rounded-pill  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <!-- Kata sandi ulang -->
                    <div class="form-group">
                      <label for="password-confirm">Ulangi Kata Sandi</label>
                      <input id="password-confirm" placeholder="Kata sandi ulang" type="password" class="form-control rounded-pill" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <p class="message">
                      Sudah punya akun? <a href="/login">Masuk sekarang</a>
                    </p>
                    <p style="text-align:center" class="message"> atau daftar menggunakan </p>
                  <p style="text-align:center"><a href="/auth/google">Google</a></p>
                    <button type="submit" class="btn btn-block rounded-pill" style="background-color: black; color: white;">
                      Daftar
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html> 
