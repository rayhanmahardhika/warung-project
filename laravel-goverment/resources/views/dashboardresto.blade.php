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

    <!-- CSS SENDIRI -->
    <link rel="stylesheet" href="{{ url('/css/dashboard.css') }} " />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
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
            <a class="nav-link" id="data-input-tab" data-toggle="tab" href="#data-input" role="tab" aria-controls="data-input" aria-selected="false">data-input</a>
          </li>
        </ul>

      </nav>

      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
              <span>Tombol</span>
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
                <li class="nav-item active">
                  <a class="nav-link" href="#">jjjj</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">jjjj</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="tab-content">
          <div class="tab-pane active" id="infografis" role="tabpanel" aria-labelledby="infografis-tab">
            <h2>Chart</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
              ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
              pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
              ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
              pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="tab-pane" id="pengumuman" role="tabpanel" aria-labelledby="pengumuman-tab">
            <h3>Pengumuman</h3>
            <div class="table-responsive-sm">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="">Detail</th>
                    <th style="width: 30%;">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-th="Pengumuman">
                      <div class="col">
                        <h4 class="nomargin">Restauran 1</h4>
                        <p>
                          Quis aute iure reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor
                          sit amet.
                        </p>
                      </div>
                    </td>
                    <td class="actions" data-th="Tindakan">
                      <div class="row">
                        <ul class="list">
                          <li class="list-inline-item">
                            <a
                              href="#"
                              class="btn btn-outline-success"
                              data-toggle="modal"
                              data-target="#checkoutModal"
                            >
                              Buka
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="" class="btn btn-outline-danger">Remove</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
          </div>
          <div class="tab-pane" id="data-input" role="tabpanel" aria-labelledby="data-input-tab">
            <h3>Input Transaksi</h3>

              <div class="input-data">
                  <div class="container">
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
                                          <form>
                                              <div class="form-group">
                                                  <label for="">Pemasukan per Hari</label>
                                                  <input type="text" class="form-control rounded-pill" />
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label for="">Jumlah transaksi per Hari</label>
                                                  <input type="text" class="form-control rounded-pill" />
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
    <script>
      $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
          $("#sidebar").toggleClass("active");
        });
      });
    </script>
  </body>
</html>
