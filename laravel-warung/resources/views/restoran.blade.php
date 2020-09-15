@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <div class="container mt-5">
      <nav>
        <ol class="breadcrumb bg-transparent pl-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Single Product
          </li>
        </ol>
      </nav>
    </div>
    <!-- akhir breadcrumbs -->

    <!-- single restaurant -->
    <section class="single restaurant mb-5">
      <div class="container">
        <div class="row mb-3">

          <div class="col-lg-5">
            <figure class="figure">
              <img
                src="/img/restaurant/restoran.jpeg"
                class="figure-img img-fluid"
                alt="..."
              />
            </figure>
          </div>

          <div class="col-lg-7">
            <div class="card rounded-0 checkout-detail">
              <div class="card-body">
                <h5 class="card-title">{{$restoran['name']}}</h5>
                <div class="row mb-3">
                  <div class="col">
                    <!-- <h6 class="m-0">title</h6> -->
                    <p>{{$restoran['deskripsi']}}</p>
                  </div>
                </div>

                <hr />

                <div class="row mb-1">
                  <div class="col">
                    <div class="row">
                        <div class="col-2">
                        <p>Lokasi : </p>
                        </div>
                        <div class="col-10">
                        <p>{{$restoran['alamat']}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-2">
                        <p>Kisaran Harga : </p>
                        </div>
                        <div class="col-10">
                        <p>{{$restoran['price']}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                        <p>model : </p>
                        </div>
                        <div class="col-10">
                        <p>Lorem ipsum dolor sit amet.
                        </p>
                        </div>
                    </div>  
                  </div>
                </div>
                
              </div>
            </div>

            <div class="row mt-3">
              <div class="col">
              <form action="/books/{{$restoran['id']}}" method="post">
                @csrf
                @if($alertBook == null)
                <button
                  type="submit"
                  class="btn btn-block text-white"
                  style="background-color: #f9b234; font-weight: bold;"
                  data-toggle="modal"
                  data-target="#checkoutModal"
                >
                  RESERVASI SEKARANG!
                </button>
                @else
                <div class="alert alert-danger" role="alert">
                  {{$alertBook}}
                </div>
                @endif
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- akhir single restaurant -->

    <!-- Description -->
    {{-- Atau bisa dibuat galeri --}}
    <section class="restaurant-description p-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
          <div class="card rounded-0 deskripsi-detail">
              <div class="card-body">
                <h2 class="card-title">Galeri</h2>
                <div class="row mb-3">
                  <div class="col">
                    <!-- <h6 class="m-0">title</h6> -->
                    <p>Plan B : ini merupakan sebuah galery</p>
                  </div>
                </div>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </section>
    <!-- akhir Description -->

    <!-- Comment & review -->
    <section class="comment-review p-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link active"
                  id="description-tab"
                  data-toggle="tab"
                  href="#description"
                  role="tab"
                  aria-controls="description"
                  aria-selected="true"
                  > Comment </a
                >
              </li>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  id="Review-tab"
                  data-toggle="tab"
                  href="#Review"
                  role="tab"
                  aria-controls="Review"
                  aria-selected="false"
                  > Reviews ({{$restoran['jumlahrate']}})</a
                >
              </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
              <div
                class="tab-pane fade show active description product-review"
                id="description"
                role="tabpanel"
                aria-labelledby="description-tab"
              >
              <div class="pb-cmnt-container">
                    <div class="row">
                        <div class="col-10">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <form id="feedbackform" action="/feedback" method="post" class="form-group">
                                        @csrf
                                        <div class="form-group row">
                                          <div class="form-group col-md-3">
                                            <input type="text" name="code" id="code" placeholder="Kode Restoran" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <div class="form-group col-md-12">
                                            <textarea name="feed_field" id="feed_field" placeholder="Tulis kesan mu disini!" class="form-control"></textarea>
                                          </div>
                                        </div>
                                        <input type="hidden" name="id_resto" id="id_resto" value="{{$restoran['id']}}">
                                        <div class="form-group row">
                                          <div class="form-group col-md-12">
                                            <p>Kesan anda terhadap restauran ini!</p>
                                          </div>
                                        </div>
                                        <div class="form-group row justify-content-md-center" id="rating">
                                            <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"> -->
                                              <div class="form-group col">
                                                <label id="sad">
                                                  <input type="radio" name="options" id="option1" value="1"> 
                                                  <img id="sad1" src="/img/icon/sad.png" style="width : 30%; height: 30%;" alt="">
                                                </label>
                                              </div>
                                              <div class="form-group col">
                                                <label id="disappointed">
                                                  <input type="radio" name="options" id="option2" value="2">
                                                  <img id="sad1" src="/img/icon/frown.png" style="width : 30%; height: 30%;" alt="">
                                                </label>
                                              </div>
                                              <div class="form-group col">
                                                <label id="neutral">
                                                  <input type="radio" name="options" id="option3" value="3">
                                                  <img id="sad1" src="/img/icon/neutral.png" style="width : 30%; height: 30%;" alt="">
                                                </label>
                                              </div>
                                              <div class="form-group col">
                                                <label id="happy">
                                                  <input type="radio" name="options" id="option4" value="4">
                                                  <img id="sad1" src="/img/icon/smile.png" style="width : 30%; height: 30%;" alt="">
                                                </label>
                                              </div>
                                              <div class="form-group col">
                                                <label id="satisfied">
                                                  <input type="radio" name="options" id="option5" value="5">
                                                  <img id="sad1" src="/img/icon/happy.png" style="width : 30%; height: 30%;" alt="">
                                                </label>
                                              </div>
                                            <!-- </div> -->
                                        </div> 
                                            <div class="form-group row">
                                              <div class="form-group col">
                                                <button id="button_sub" class="btn btn-primary" type="submit">Share</button>
                                              </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div
                class="tab-pane fade product-review"
                id="Review"
                role="tabpanel"
                aria-labelledby="Review-tab"
              >
              <div id="feedback-side" class="comment-widgets">
                          <!-- Comment Row -->
                          @foreach($feedbacks as $f)
                          <div class="d-flex flex-row comment-row m-t-0">
                              <div class="p-2"><img src="/uploads/avatars/{{ $f['avatar'] }}" alt="user" width="50" class="rounded-circle"></div>
                              <div class="comment-text w-100">
                                  <h6 class="font-medium">{{$f['name']}}</h6><p>{{$f['feel']}}</p> <span class="m-b-15 d-block">{{$f['feed']}}</span>
                                  <div class="comment-footer"> <span class="text-muted float-right">{{$f['date']}}</span></div>
                              </div>
                          </div> 
                          <!-- Comment Row -->
                          @endforeach
                      </div> <!-- Card -->
                
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir Comment & review -->

    <!-- koleksi gambar -->
    <section class="koleksi-foto p-5">
      <script type="text/javascript">
      </script>
      <div class="container">
        <div class="row">
          <div class="col">
            <h3>Koleksi Foto</h3>
          </div>
        </div>

        <div class="row">

        </div>
    </section>
    <!-- akhir koleksi gambar -->

    <!-- Insert feedback script -->
    <script type="text/javascript">
        // insert data
        // $(document).ready(function(){
        //   $('#feedbackform').on('submit', function(e) {
        //     e.preventDefault();

        //     $.ajax({
        //       type: "POST",
        //       url: "/feedback",
        //       data: $('#feedbackform').serialize(),
        //       success: function(response) {
        //         console.log(response)
        //         $('#feed_field').val('');
        //         e.preventDefault();

        //         $.ajax({
        //           type: "GET",
        //           url: "/feedback/fetch",
        //           data: $('#feedbackform').serialize(),
        //           success: function(response) {
        //             console.log(response)
        //             $('#feed_field').val('');
                    
        //           },
        //           error: function(error) {
        //             console.log(error)
        //           }
        //         });

        //       },
        //       error: function(error) {
        //         console.log(error)
        //       }
        //     });

        //   });

        // });     
    </script>

    <style type="text/css">
      
        
      #sad > input{
        visibility: hidden;
        position: absolute;
      }
      #disappointed > input{
        visibility: hidden;
        position: absolute;
      }
      #neutral > input{
        visibility: hidden;
        position: absolute;
      }
      #happy > input{
        visibility: hidden;
        position: absolute;
      }
      #satisfied > input{
        visibility: hidden;
        position: absolute;
      }

      #sad > input + img {
        cursor:pointer;
        border:2px solid transparent;
      }
      #disappointed > input + img {
        cursor:pointer;
        border:2px solid transparent;
      }
      #neutral > input + img {
        cursor:pointer;
        border:2px solid transparent;
      }
      #happy > input + img {
        cursor:pointer;
        border:2px solid transparent;
      }
      #satisfied > input + img {
        cursor:pointer;
        border:2px solid transparent;
      }

      #sad > input:checked + img {
        border:2px solid #f00;
      }
      #disappointed > input:checked + img {
        border:2px solid #f00;
      }
      #neutral > input:checked + img {
        border:2px solid #f00;
      }
      #happy > input:checked + img {
        border:2px solid #f00;
      }
      #satisfied > input:checked + img {
        border:2px solid #f00;
      }
    </style>
       <!-- End of Insert feedback script -->

        <!-- Retrieve data feedback script -->
    <script type="text/javascript">
      
    </script>
      <!-- End of Retrieve data feedback script -->
    @endsection