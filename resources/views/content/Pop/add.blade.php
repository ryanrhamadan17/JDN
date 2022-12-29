@extends('layouts.master')
@push('css')
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script> 
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
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
		  <h4 class="page-title">Forms</h4>
		  <ul class="breadcrumbs">
			<li class="nav-home">
			  <a href="#">
				<i class="flaticon-home"></i>
			  </a>
			</li>
			<li class="separator">
			  <i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
			  <a href="#">Forms</a>
			</li>
			<li class="separator">
			  <i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
			  <a href="#">Form Tambah POP</a>
			</li>
		  </ul>
		</div>
		<div class="row">
		  <div class="col-md-6">
			<div class="card">
			  <div class="card-header">
				<div class="card-title">Input Group
				 
				</div>
			  </div>
			  <form action="{{ route('pop.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
			  <div class="card-body">
				<div class="form-group">
				  <div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="basic-addon1">Nama POP</span>
					</div>
					<input type="text" class="form-control" name="nama" aria-label="nama" aria-describedby="basic-addon1">
				  </div>
				</div>
				<div class="form-group">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Kategori</span>
					<select class="form-control" name="catpop_id" id="exampleFormControlSelect1"> 
						@foreach ($catpop as $catpops) 
							<option value="{{$catpops->id}}">{{$catpops->nama}}</option>
						 @endforeach 
					</select>
				  </div>
				</div>
				<div class="form-row">
				  <div class="form-group ">
					<label for="inputEmail4">latitude</label>
					<input type="text" class="form-control" name="lat" id="latitude" placeholder="latitude">
				  </div>
				  <div class="form-group ">
					<label for="inputPassword4">longitude</label>
					<input type="text" class="form-control" name="long" id="longitude" placeholder="longitude">
				  </div>
				</div>
				<div class="form-group">
				  <div class="input-group">
					<textarea class="form-control" aria-label="With textarea" name="desc" id="my-editor"></textarea>
				  </div>
				</div>
			  </div>
			  <div class="card-action">
				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="{{route('pop.index')}}" class="btn btn-danger">Batal</a>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ajaxModel"> tampilkan peta </button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="ajaxModel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="form-row">
				<div id="map"></div>
			  </div>
			  <div class="form-group row"></div>
			  </form>
			</div>
		  </div>
		</div>
	  </div>
@endsection
@push('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
</script>


<script>

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