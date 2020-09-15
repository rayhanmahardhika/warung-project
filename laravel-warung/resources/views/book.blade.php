@extends('layouts.app')

@section('content')
    <!-- breadcrumbs -->
    <div class="container mt-5">
      <nav>
        <ol class="breadcrumb bg-transparent pl-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            BOOKING
          </li>
        </ol>
      </nav>
    </div>
    <!-- akhir breadcrumbs -->

    <!-- book-list -->
    <section class="book-list mb-5">
      <div class="container">
        <div class="row mb-3">

          <div class="col">
          <table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%;">Restauran</th>
							<th style="width:60%;">Detail</th>
							<th style="width:10%;">Status</th>
							<th style="width:20%;">Tindakan</th>
						</tr>
					</thead>
					<tbody>
                            @foreach($bookings as $b)
						<tr>
							<td data-th="Restauran">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
								</div>
							</td>
							<td data-th="Tindakan">
                                    <div class="col-sm-10">
										<h4 class="nomargin">{{$b['resto_name']}}</h4>
										<p>Tanggal dan Waktu     : {{$b['Tanggal']}}</p>
										<p>Jumlah orang : {{$b['jumlah']}}</p>
									</div>
                            </td>
                            <td data-th="Tindakan">
                                    <div class="col-sm-10">
										<div class="alert"><p>{{$b['status']}}</p></div>
									</div>
                            </td>
							<td class="actions" data-th="Tindakan">
                                <div class="row">
                                    @if(Session::has('alertBuka'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('alertBuka')}}
                                      </div>
                                    @endif
                                    @if($b['statusInt'] == 1)
                                    <div class="col">
                                        <a id="booked" data-id_resto="{{$b['resto_id']}}" name="booked" class="btn btn-success btn-block" data-toggle="modal" data-target="#checkoutModal">
                                            BOOK
                                        </a>    								
                                    </div>
                                    <div class="col">
                                            <a href="/unbook/{{$b['resto_id']}}" class="btn btn-outline-danger"> Remove</a>						
                                    </div>
                                    @elseif($b['statusInt'] == 2)
                                    <div class="alert alert-warning" role="alert">
                                        {{$b['status']}}
                                      </div>
                                    @elseif($b['statusInt'] == 4)
                                    <div class="col">
                                        <a href="/unbook/{{$b['resto_id']}}" class="btn btn-outline-danger"> Remove</a>						
                                    </div>
                                    @elseif($b['statusInt'] == 3)
                                    <div class="col">
                                    <a href="http://maps.google.com?q={{$b['xcoor']}},{{$b['ycoor']}}" class="btn btn-outline-success">Lihat Lokasi</a>						
                                    </div>
                                    <div class="col">
                                        <div class="alert alert-success" role="alert">
                                            {{$b['status']}}
                                          </div>
                                    </div>
                                    @endif
                                    
                                </div>
							</td>
						</tr>
                            @endforeach
					</tbody>
				</table>
          </div>

        </div>
      </div>
    </section>
    <!-- akhir book-list -->

    <!-- Modal -->
        <div
            class="modal fade checkout-modal-success"
            id="checkoutModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="checkoutModalLabel"
            aria-hidden="true"
            >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">RESERVASI RESTAURAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>  
                    </div>
                    <div class="modal-body text-center">
                        <div class="container">

                            <form id="" action="/addbook" method="POST">
                                @csrf
                            <div class="row form-group">
                                <input type="date" class="form-control rounded-pill" id="date" name="date" placeholder="Tentukan tanggal" required>
                            </div>
                            <div class="row form-group">
                                <input type="time" class="form-control rounded-pill" script="" id="time" name="time" placeholder="Tentukan waktu" required >
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <button type="button" class="btn btn-success mt-3 btn-block" onclick="decAmount()">-</button>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Jumlah orang" readonly>
                                </div>
                                <div class="col">
                                    <button type="button" id="addamount" class="btn btn-success mt-3 btn-block" onclick="addAmount()">+</button>
                                </div>
                            </div>
                            <input type="hidden" name="id_rest" id="id_rest" value="">
                            <div class="row form-group">
                                <button
                                type="submit"
                                class="btn btn-success mt-3 btn-block rounded-pill"
                                style="color: white; border: 0;"
                                >
                                RESERVASI
                            </button>
                        </div>
                        
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Akhir Modal -->

<!-- ========================== Scripts ============================= -->

<!-- Display modal data -->
<script type="text/javascript">
function decAmount() {
    if(document.getElementById("amount").value != 0) {
        document.getElementById("amount").value--;
    }
}

function addAmount() {
  document.getElementById("amount").value++;
}

$(document).ready(function(){
    var x = document.getElementById("date").value;
    if(x == null) {
        document.getElementById("time").readOnly = true;
    }else{
        document.getElementById("time").readOnly = false;
    }

    $('#checkoutModal').on('show.bs.modal',function(event) {
        // alert("Data Saved");
    
    var button = $(event.relatedTarget);
    var resto_id = button.data('id_resto');
    var amount = 0;
    
    var modal = $(this);
    modal.find('.modal-body #id_rest').val(resto_id);
    modal.find('.modal-body #amount').val(amount);
    
    // alert(modal.find('.modal-body #id_rest').val());
    });
    

    


});
</script>
<!-- End of Display modal data -->

<!-- Insert Book script -->
<script type="text/javascript">
$(document).ready(function(){
    $('#bookform').on('submit', function(e) {
    e.preventDefault();

    // var id = modal.find('.modal-body #id_rest').val();

    $.ajax({
        type: "PUT",
        url: "/addbook",
        data: $('#bookform').serialize(),
        success: function(response) {
            console.log(response)
            $('#checkoutModal').modal('hide');
            alert("Data Saved");
        },
            error: function(error) {
            console.log(error)
            alert("Data Not Saved");
        }

    });

    });
});
</script>
       <!-- End of Insert Book script -->
<!-- ========================== Scripts ============================= -->

@endsection