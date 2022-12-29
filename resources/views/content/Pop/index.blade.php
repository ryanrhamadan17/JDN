@extends('layouts.master')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvDUXvokgjjB_rPMXwLZwOLbet0AJYfwI&callback=initMap&v=weekly"
    type="text/javascript"></script>
  <style type="text/css">    
      #map {
        margin: 10px;
        width: 100%;
        height: 400px;
        padding: 10px;
      }
</style>

 @endpush
@section('content')
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <div class="btn-group btn-group-page-header ml-auto">
          <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-h"></i>
          </button>
          <div class="dropdown-menu">
            <div class="arrow"></div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Daftar POP</div>
            <div class="card-body">	
                <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Tambah Pop</a>
            </div>
            <div class="card-body">	
              <table class="table table-striped table-bordered table-pop">
                <thead>
                  <tr>
                    <th>no</th>
                    <th>Nama</th>
                    <th>Desc</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
      <label for="inputEmail4">latitude</label>
      <input type="text" class="form-control" id="latitude" placeholder="latitude">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">longitude</label>
      <input type="text" class="form-control" id="longitude" placeholder="longitude">
    </div>
  </div>
                </div>
                   <!-- <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div> -->
       
                    
                    <div class="form-row">
                    <div id="map"></div>
                    
                    </div>  
                       
                    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
                </form>
            </div>
        </div>
    </div>
</div>
		
@endsection
@push('js')

<script type="text/javascript">
$(function () {
    
    var table = $('.table-pop').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pop.index') }}",
		lengthMenu: [
            [10, 25, 50, -1],
            [10, 50, 100, 'All'],
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'desc', name: 'desc'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
			
        ]
    });

      /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });
    


});
// -----------------------------
// ----scrip js google maps-----
// -----------------------------
   //* Fungsi untuk mendapatkan nilai latitude longitude
   function updateMarkerPosition(latLng) {
  document.getElementById('latitude').value = [latLng.lat()]
    document.getElementById('longitude').value = [latLng.lng()]
}
       
var map = new google.maps.Map(document.getElementById('map'), {
zoom: 15,
center: new google.maps.LatLng(-6.9923834,107.8421433),
 mapTypeId: google.maps.MapTypeId.ROADMAP
  });
//posisi awal marker   
var latLng = new google.maps.LatLng(-6.992095, 107.841984);
 
/* buat marker yang bisa di drag lalu 
  panggil fungsi updateMarkerPosition(latLng)
 dan letakan posisi terakhir di id=latitude dan id=longitude
 */
var marker = new google.maps.Marker({
    position : latLng,
    title : 'lokasi',
    map : map,
    draggable : true
  });
   
updateMarkerPosition(latLng);
google.maps.event.addListener(marker, 'drag', function() {
 // ketika marker di drag, otomatis nilai latitude dan longitude
 //menyesuaikan dengan posisi marker 
    updateMarkerPosition(marker.getPosition());
  });

</script>
@endpush