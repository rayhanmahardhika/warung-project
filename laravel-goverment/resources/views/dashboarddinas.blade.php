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
            <a class="nav-link active" id="infografis-dinas-tab" data-toggle="tab" href="#infografis-dinas" role="tab" aria-controls="infografis-dinas" aria-selected="true">infografis-dinas</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pengumuman-dinas-tab" data-toggle="tab" href="#pengumuman-dinas" role="tab" aria-controls="pengumuman-dinas" aria-selected="false">pengumuman-dinas</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="tulis-pengumuman-dinas-tab" data-toggle="tab" href="#tulis-pengumuman-dinas" role="tab" aria-controls="tulis-pengumuman-dinas" aria-selected="false">tulis-pengumuman-dinas</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="daftar-restoran-tab" data-toggle="tab" href="#daftar-restoran" role="tab" aria-controls="daftar-restoran" aria-selected="false">daftar-restoran</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="input-restoran-tab" data-toggle="tab" href="#input-restoran" role="tab" aria-controls="input-restoran" aria-selected="false">input-restoran</a>
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
          <div class="tab-pane active" id="infografis-dinas" role="tabpanel" aria-labelledby="infografis-dinas-tab">
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
          <div class="tab-pane" id="pengumuman-dinas" role="tabpanel" aria-labelledby="pengumuman-dinas-tab">
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
                    <tr>
                      <td data-th="pengumuman-dinas">
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
                          <div class="col">
                              <a
                                  href="#"
                                  class="btn btn-danger btn-block"
                                  data-toggle="modal"
                                  data-target="#removeModal"
                              >
                                  X
                              </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
              </table>
            </div>
            
          </div>
          <div class="tab-pane" id="tulis-pengumuman-dinas" role="tabpanel" aria-labelledby="tulis-pengumuman-dinas-tab">
            <h3>Input Pengumuman</h3>
            <div class="input-pengumuman">
                <div class="container">
                    <div class="input-pengumuman-form">
                        <div class="row mt-5">
                            <div class="col d-flex justify-content-center">
                                <div class="card w-50 mx-auto">
                                    <div class="card-header card-header-dashboarddinas text-center">
                                        <h4>
                                            Input pengumuman-dinas
                                        </h4>
                                    </div>
                                    <div class="card-body card-input-dinas">
                                        <form>
                                            
                                            <div class="form-group">
                                                <textarea class="form-control" id="" rows="10"></textarea>
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
          <div class="tab-pane" id="daftar-restoran" role="tabpanel" aria-labelledby="daftar-restoran-tab">
            <h3>Daftar Restauran</h3>
            <div class="table-responsive-md">
              <table id="cart" class="table table-hover table-condensed">
                  <thead>
                    <tr>
                    <th style="">Nama</th>
                    <th style="">Detail</th>
                    <th style="">Alamat</th>
                    <th style="width: 25%;">Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-th="Nama">
                        <div class="col">
                          <h5 class="nomargin">Restauran 1</h5>
                        </div>
                      </td>
                      <td data-th="Detail">
                        <div class="col">
                          <p>
                            Quis aute iure reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor
                            sit amet.
                          </p>
                        </div>
                      </td>
                      <td data-th="Alamat">
                        <div class="col">
                          <p>
                            Quis aute iure reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor
                            sit amet.
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
                              data-target="#checkoutModal"
                            >
                              Buka
                            </a>
                          </div>
                          <div class="col">
                            <a
                              href="#"
                              class="btn btn-danger btn-block"
                              data-toggle="modal"
                              data-target="#checkoutModal"
                            >
                              X
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="input-restoran" role="tabpanel" aria-labelledby="input-restoran-tab">
              <h3>Input Restauran</h3>

              <div class="input-restauran">
                  <div class="container">
                      <div class="input-restauran-form">
                          <div class="row mt-5">
                              <div class="col d-flex justify-content-center">
                                  <div class="card w-50 mx-auto">
                                      <div class="card-header card-header-dashboarddinas text-center">
                                          <h4>
                                              Input Data
                                          </h4>
                                      </div>
                                      <div class="card-body card-input-dinas">
                                          <form>
                                              
                                              <div class="form-group">
                                                  <label for="">Nama</label>
                                                  <input type="text" class="form-control rounded-pill" />
                                              </div>

                                              <div class="form-group ">
                                                  <label for="">E-mail</label>
                                                  <div class="form-inline ">
                                                      <input type="email" class="form-control input-rounded-left" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                      <div class="input-group-append">
                                                          <span class="input-group-text input-rounded-right" id="basic-addon2">@warung.com</span>
                                                      </div>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label for="">Password</label>
                                                  <div class="form-inline">
                                                      <input type="text" class="form-control input-rounded-left" rel="gp" data-size="32" data-character-set="a-z,A-Z,0-9,#">
                                                      <span class="input-group-btn"><button type="button" class="btn btn-dark getNewPass input-rounded-right">Ganti</button></span>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <label for="">Alamat</label>
                                                  <textarea class="form-control" id="" rows="3"></textarea>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label for="">Deskripsi</label>
                                                  <textarea class="form-control" id="" rows="4"></textarea>
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

      // Generate a password string
        function randString(id){
        var dataSet = $(id).attr('data-character-set').split(',');  
        var possible = '';
        if($.inArray('a-z', dataSet) >= 0){
            possible += 'abcdefghijklmnopqrstuvwxyz';
        }
        if($.inArray('A-Z', dataSet) >= 0){
            possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if($.inArray('0-9', dataSet) >= 0){
            possible += '0123456789';
        }
        if($.inArray('#', dataSet) >= 0){
            possible += '![]{}()%&*$#^<>~@|';
        }
        var text = '';
        for(var i=0; i < $(id).attr('data-size'); i++) {
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        return text;
        }

        // Create a new password on page load
        $('input[rel="gp"]').each(function(){
        $(this).val(randString($(this)));
        });

        // Create a new password
        $(".getNewPass").click(function(){
        var field = $(this).closest('div').find('input[rel="gp"]');
        field.val(randString(field));
        });

        // Auto Select Pass On Focus
        $('input[rel="gp"]').on("click", function () {
        $(this).select();
        });
    </script>
  </body>
</html>
