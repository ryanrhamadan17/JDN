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
                <div class="card-header">Daftar User</div>

                <div class="card-body">

                <table class="table cell-border yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
				<th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
                </div>
            </div>
        </div>
					</div>
						
						
				</div>
			</div>
</div>
		
@endsection
@push('js')
<script type="text/javascript">
$(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pelanggan.index') }}",
		lengthMenu: [
            [10, 25, 50, -1],
            [10, 50, 100, 'All'],
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'alamat', name: 'alamat'},
			{data: 'tlp', name: 'tlp'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
			
        ]
    });
    





$('body').on('click', '.deleteProduct', function () {

let product_id = $(this).data('id');
let token   = $("meta[name='csrf-token']").attr("content");

Swal.fire({
	title: 'Apakah Kamu Yakin?',
	text: "ingin menghapus data ini!",
	icon: 'warning',
	showCancelButton: true,
	cancelButtonText: 'TIDAK',
	confirmButtonText: 'YA, HAPUS!'
}).then((result) => {
	if (result.isConfirmed) {

		console.log('test');

		//fetch to delete data
		$.ajax({

			url: "{{ route('pelanggan.store') }}"+'/'+product_id,
			type: "DELETE",
			cache: false,
			data: {
				"_token": token
			},
			success:function(response){ 

				//show success message
				Swal.fire({
					type: 'success',
					icon: 'success',
					title: `${response.message}`,
					showConfirmButton: false,
					timer: 3000
				});
				table.draw();

				//remove post on table
				$(`#index_${product_id}`).remove();
				
			}
			
		});

		
	}


})

});
});
</script>
@endpush