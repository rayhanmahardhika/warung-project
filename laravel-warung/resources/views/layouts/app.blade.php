<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Warung') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('js/jqueryui/jquery-ui.min.css')}}">
    <script src="{{asset('js/jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script> 
    
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS SENDIRI -->
    <link rel="stylesheet" href="{{ url('/css/style.css') }} "/>
</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="asset/icon/Logo small.png" alt=" WARUNG " />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search Bar -->
                    <form action="" method="get" class="input-group mr-sm-2 ">
                      <div id="navbar-search" class="input-group mr-sm-2 ">
                        {{ csrf_field() }}
                        <input name="resto_search" id="resto_search" type="search" class="form-control search-rounded-left" placeholder="search" aria-label="search" aria-describedby="button-addon2">
                        <input type="hidden" name="id_resto" id="id_resto">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary search-rounded-right" type="button" id="button-addon2">
                            <img src="/img/icon/search.png" style="width : 50%; height: 50%;" alt="">
                          </button>
                        </div>
                      </div>
                      <div id="restolist" class="input-group-append">
                    </div>
                    </form>
                    <!-- End of search Bar -->

                    <!-- Left Side Of Navbar -->
                    <!-- End of Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav text-uppercase ml-auto">
                        @guest
                            <!-- login -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <!-- register -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                        <!-- booking -->
                        <li class="nav-item active">
                            <a class="nav-link" href="/booking"> Booking </a>
                        </li>

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; border-radius:50%"> <span class="caret"></span>
                                </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </li>
                        @endguest
                    </ul>
                    <!-- End of Right Side Of Navbar -->

                    
                </div>
            </div>
        </nav>
        <!-- Script -->
        
        
        <!-- End of Script   -->  

        <main >
            @yield('content')
        </main>
        
        <!-- footer -->
    <footer class="border">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-1">
            <a href="">
              <img src="asset/icon/Logo small.png" alt="" />
            </a>
          </div>

          <!-- social media icon -->
          <div class="col-4 text-right">
            <a href="">
              <img src="" alt="" />
            </a>
            <a href="">
              <img src="" alt="" />
            </a>
            <a href="">
              <img src="" alt="" />
            </a>
          </div>
        </div>

        <div class="row mt-3 justify-content-between">
          <div class="col-5">
            <p href="">
              All rights reserved by Dinas Pariwisata Yogyakarta Copyright 2020
            </p>
          </div>

          <div class="col-5">
            <nav class="nav justify-content-end">
              <a class="nav-link active" href="#">ABOUT</a>
              <a class="nav-link" href="#"></a>
              <a class="nav-link" href="#"></a>
              <a class="nav-link pr-0" href="#"></a>
            </nav>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#resto_search').keyup(function(){ 
              var query = $(this).val();
              if(query != '')
              {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                url:"{{ route('searchresto') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                  $('#restolist').fadeIn();  
                          $('#restolist').html(data);
                }
                });
              }
          });

          $(document).on('click', 'li', function(){  
              $('#resto_search').val($(this).text());  
              $('#restolist').fadeOut();  
          });  

      });

    </script>

</body>
</html>
