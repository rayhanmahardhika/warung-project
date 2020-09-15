@extends('layouts.app')

@section('content')
<!-- carousel Rekomendasi -->
<div
      id="carouselExampleControls"
      class="carousel slide mt-5"
      data-ride="carousel"
    >
      <div class="carousel-inner">
          @foreach($restoRekomen as $key => $rekomen)
          <!-- Items -->
      <div class="carousel-item {{$key == 0 ? 'active' : ''}}" >
            <div class="row pt-5 justify-content-center">
              <!-- pt-5 = padding top 5 -->
              <div class="col-9 col-sm-4 col-md-6 col-lg-5">
              <h1 class="mb-4">{{$rekomen['name']}}</h1>
                <p mb-4>
                  {{$rekomen['deskripsi']}}
                </p>
              <a href="/restoran/{{$rekomen['id']}}" class="btn btn-warning text-white"> Cek sekarang!</a>
              </div>
              <div
                class="col-3 col-sm-6 col-md-4 ol-lg-4 d-none d-sm-block offset-1"
              >
            <img src="" class="img-fluid" alt="...">
              </div>
            </div>
            <div class="row pt-5 justify-content-center">
              {{-- <div class="col-sm-3 "> --}}
                <div class="alert alert-success" role="alert">Fresh Restos! {{$rekomen['usia']}} old</div>
              {{-- </div> --}}

            </div>
          </div>
          <!-- End of Items -->
          @endforeach
          
          <!-- $datarekomendasi ditaro sampe sini -->
        </div>
        {{-- <h6>Fresh Restos</h6> --}}
      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- akhir carousel -->

    <!-- all restauran with filter -->
    <section class="designer p-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col-6">
            <h3>Restauran</h3>
            <p>Daftar restauran di Yogya</p>
          </div>
          <div class="col-6 d-flex justify-content-end">
            <div >
                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#staticBackdrop" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
            </div>
          </div>
        </div>
      </div>

          @csrf
        <div id="post_data" class="container">
        <!-- List Restoran -->
          

        
        </div>
    </section>
    <!-- akhir all restauran with filter -->


  <!-- Modal Filter -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Filter Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="container-fluid">
        
          <form id="filterform">
            @csrf
            <div class="form-group row justify-content-md-center" id="rating">
            <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"> -->
              <div class="form-group col">
                <label id="sad">
                  <input type="radio" name="price" id="murah" value="1"> 
                  <img id="sad1" src="/img/icon/low.png" style="width : 30%; height: 30%;" alt="">
                </label>
              </div>
              <div class="form-group col">
                <label id="disappointed">
                  <input type="radio" name="price" id="sedang" value="2">
                  <img id="sad1" src="/img/icon/standard.png" style="width : 30%; height: 30%;" alt="">
                </label>
              </div>
              <div class="form-group col">
                <label id="neutral">
                  <input type="radio" name="price" id="medium" value="3">
                  <img id="sad1" src="/img/icon/medium.png" style="width : 30%; height: 30%;" alt="">
                </label>
              </div>
              <div class="form-group col">
                <label id="happy">
                  <input type="radio" name="price" id="mahal" value="4">
                  <img id="sad1" src="/img/icon/expensive.png" style="width : 30%; height: 30%;" alt="">
                </label>
              </div>
            <!-- </div> -->
        </div> 
        <div class="row">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary">
              <input type="radio" name="timeFilter" id="sarapan" value="1"> Sarapan
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="timeFilter" id="siang" value="2"> Makan Siang
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="timeFilter" id="malam" value="3"> Makan Malam
            </label>
          </div>
        </div>
        <div class="row">
        
        </div>

          </div>

        </div>
            
        <div class="modal-footer">
          <button id="filterbutt" type="button" class="btn btn-primary">Terapkan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- End of Modal Filter -->


<script>
  $(document).ready(function() {
    var _token = $('input[name="_token"]').val();
    // var status = 1;

    load_data('', _token);

    function load_data(id="", _token) {
      $.ajax({
        url: "{{ route ('loadmore.load_data') }}",
        method: "POST",
        data:{id:id, _token:_token},
        success:function(data) {
          $('#load_more_button').remove();
          $('#post_data').append(data);
        }

      });
    }

    $(document).on('click', '#load_more_button', function() {
      var id = $(this).data('id');
      $('#load_more_button').html('<b>Harap tunggu ...</b>');
      load_data(id, _token);
    });

    $(document).on('click', '#filterbutt', function() {
            // e.preventDefault();
            // status = 2;
            var price = document.getElementsByName('price');
            var time = document.getElementsByName('timeFilter');
            var checkedTime = null;
            var checkedPrice = null;

            for(i = 0; i < time.length; i++) { 
                if(time[i].checked) 
                checkedTime = time[i].value; 
            } 

            for(i = 0; i < price.length; i++) { 
                if(price[i].checked) 
                checkedPrice = price[i].value; 
            } 

            console.log(checkedTime);
            console.log(checkedPrice);

            $.ajax({
              type: "POST",
              url: "{{ route ('filterdata') }}",
              data: {
                _token:_token,
                price:checkedPrice,
                time:checkedTime
              },
              success: function(data) {
                $('#post_data').empty();
                $('#load_more_button').remove();
                $('#staticBackdrop').modal('hide');
                $('#post_data').append(data);
              },
              error: function(error) {
                console.log(error);
                alert("Data Not Saved");
              }
            });

          });

  });
</script>

@endsection
