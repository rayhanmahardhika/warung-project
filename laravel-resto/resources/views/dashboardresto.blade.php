<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Warung') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito"
      rel="stylesheet"
    />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS SENDIRI -->
    <link rel="stylesheet" href="{{ url('/css/dashboard.css') }} " />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar" class="active">
        <div class="sidebar-header">
          <h3>Restauran</h3>
        </div>

        <ul class="nav flex-column components" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="infografis-tab" data-toggle="tab" href="#infografis" role="tab" aria-controls="infografis" aria-selected="true">infografis</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pengumuman-tab" data-toggle="tab" href="#pengumuman" role="tab" aria-controls="pengumuman" aria-selected="false">pengumuman</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="reservasi-tab" data-toggle="tab" href="#reservasi" role="tab" aria-controls="pengumuman" aria-selected="false">Reservasi</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="data-input-tab" data-toggle="tab" href="#data-input" role="tab" aria-controls="data-input" aria-selected="false">data-input</a>
          </li>
        </ul>

      </nav>

      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
              <span>Menu</span>
            </button>
            <button
              class="btn btn-dark d-inline-block d-lg-none ml-auto"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link disabled" href="#"></a>
                </li>
                <li class="nav-item">
                  <div class="input-group mr-sm-2">
                    <input
                      type="search"
                      class="form-control search-rounded-left"
                      placeholder="search"
                      aria-label="search"
                      aria-describedby="button-addon2"
                    />
                    <div class="input-group-append">
                      <button
                        class="btn btn-outline-secondary search-rounded-right"
                        type="button"
                        id="button-addon2"
                      >
                        <img
                          src="/img/icon/search.png"
                          style="width: 50%; height: 50%;"
                          alt=""
                        />
                      </button>
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{$restaurant->name}}<span class="caret"></span>
                  </a>
                  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          {{-- <a class="dropdown-item" href="/profile">Profile</a> --}}
                          <a class="dropdown-item" href="/logout"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="/logout" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
              </li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="tab-content">
          <div class="tab-pane active" id="infografis" role="tabpanel" aria-labelledby="infografis-tab">
            <div class="container">
              <div class="row">
                <div class="col">
                  <h2>Monitor Bisnis</h2>
                  <!-- Area Chart -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Charta Penghasilan</h6>
                    </div>
                    <div class="card-body">
                      <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                      </div>
                      <hr></div>
                    </div>
                    {{-- End of Area Chart --}}
                  </div>
                <div class="col">
                  <h2>Monitor Kualitas</h2>
                  <!-- Bar Chart -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Charta Penilaian</h6>
                    </div>
                    <div class="card-body">
                      <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                      </div>
                      <hr> </div>
                    </div>
                    {{-- End of Bar Chart --}}
                  </div>
                </div>
                </div>

          </div>
          <div class="tab-pane" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
            <div class="container">
              <h3>pengumuman-dinas</h3>
              <div class="table-responsive-md">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="">Detail</th>
                    <th style="width: 25%;">Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach($pengumuman as $p)
                    <tr>
                      <td data-th="pengumuman-dinas">
                        <div class="col">
                          <h6 class="nomargin">{{$p['asal']}}</h4>
                            <p>
                              {{$p['konten']}}
                            </p>
                          </div>
                      </td>
                      <td class="actions" data-th="Tindakan">
                        <div class="row">
                          <div class="col">
                            <a
                            href="#"
                            class="btn btn-success btn-block"
                            data-toggle="modal"
                            data-target="#bukaisiModal"
                            >
                            Buka
                            </a>
                          </div>
                          @if($p['asal'] == 'Himbauan Sistem')
                          <div class="col">
                            <a
                            href="/pengumuman/hapus/{{$p['id']}}"
                            class="btn btn-danger btn-block"
                            data-toggle="modal"
                            data-target="#removeModal"
                            >
                            X
                          </a>
                        </div>
                        @endif
                      </div>
                    </td>
                  </tr>
                  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
            
          </div>

          {{-- Cek reservasi --}}
          <div class="tab-pane" id="reservasi" role="tabpanel" aria-labelledby="reservasi-tab">
            <div class="container">
              <h3>Reservasi</h3>
              <div class="table-responsive-md">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="">Detail</th>
                    <th style="width: 25%;">Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($bookings as $b)
                      @if($b['statusInt'] != 4)
                      <tr>
                        <td data-th="pengumuman-dinas">
                          <div class="col">
                            <h6 class="nomargin">{{$b['traveler_name']}}</h4>
                            <p>Tanggal dan Waktu     : {{$b['Tanggal']}}</p>
                            <p>Jumlah orang : {{$b['jumlah']}}</p>
                            </div>
                        </td>
                        <td class="actions" data-th="Tindakan">
                          <div class="row">
                            @if($b['statusInt'] == 2)
                            <div class="col">
                              <a
                              href="/booking/terima/{{$b['traveler_id']}}"
                              class="btn btn-success btn-block"
                              >
                              Terima
                              </a>
                            </div>
                            <div class="col">
                              <a
                              href="/booking/tolsk/{{$b['traveler_id']}}"
                              class="btn btn-danger btn-block"
                              >
                              Tolak
                            </a>
                          </div>
                          @elseif($b['statusInt'] == 3)
                          <div class="alert alert-success" role="alert">
                            {{$b['status']}}
                          </div>
                          @endif
                        </div>
                      </td>
                    </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
            
          </div>

          <div class="tab-pane" id="data-input" role="tabpanel" aria-labelledby="data-input-tab">
            
            <div class="input-data">
              <div class="container">
                <h3>Input Transaksi</h3>
                      <div class="input-data-form">
                          <div class="row mt-5">
                              <div class="col d-flex justify-content-center">
                                  <div class="card w-50 mx-auto">
                                      <div class="card-header card-header-dashboardresto text-center">
                                          <h4>
                                              Input Data
                                          </h4>
                                      </div>
                                      <div class="card-body card-input-resto">
                                        @if($alertIncome != null) 
                                        <div class="alert alert-danger" role="alert">
                                          {{$alertIncome}}
                                        </div>
                                        @endif
                                          <form action="/data-penghasilan/tambah" method="POST">
                                            @csrf
                                              <div class="form-group">
                                              <label for="">Pemasukan Hari {{$dateNow}}</label>
                                                  <input type="text" name="income" class="form-control rounded-pill" />
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label for="">Jumlah transaksi Hari {{$dateNow}}</label>
                                                  <input type="text" name="trans" class="form-control rounded-pill" />
                                              </div>
                                              
                                              <button
                                              type="submit"
                                              class="btn btn-block rounded-pill"
                                              style="background-color: black; color: white;"
                                              >
                                              Submit
                                              </button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
    <script>
      $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      });
    </script>
  </body>
</html>
