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
    <div class="container">
      <div class="login-form">
        <div class="row mt-5">
          <div class="col d-flex justify-content-center">
            <div class="card card-login w-50 mx-auto">
              <div class="card-header text-center">
                  <h4>
                      LOGIN
                  </h4>  
              </div>
              <div class="card-body card-body-login">
                <form method="POST" action="/login">
                @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" placeholder="Email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input id="password" placeholder="Kata sandi" type="password" class="form-control rounded-pill  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>

                  <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                  <p style="text-align:center" class="message"> atau masuk menggunakan </p>
                  <p style="text-align:center"><a href="/auth/google">Google</a></p>
                  <button type="submit" class="btn btn-block rounded-pill" style="background-color: black; color: white;">Masuk</button>
                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    </body>
</html>

 