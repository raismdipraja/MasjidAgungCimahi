@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA KEGIATAN ISLAM
                <div class="btn-actions-pane-right">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                            <button class="search-icon"><span></span></button>
                        </div>
                         <button class="close"></button>
                    </div>
                </div>
                <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahkegiatanislam"><i class="fa fa-plus"> Tambah</i></button></td>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Judul Kegiatan Islam</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Dibuat pada</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                    <tbody>
                     @php $no = 0 @endphp
                          @foreach( $kegiatanislam as $p)
                         @php
                            $no++;
                           @endphp
                        <tr>
                            <td class="text-center text-muted">{{$no}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $p->nama_acara }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"><img src="{{ url('/image/'.$p->gambar) }}" alt="image" height="200px" width="150px"></td>
                            <td class="text-center"> {{ $p->created_at }}</td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updatekegiatanislam"><i class="fa fa-edit"> Edit </i></button>
                                <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-delete" data-id="{{ $p->id }}"><i class="fa fa-trash"> Hapus </i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer"> </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

    <div id="tambahkegiatanislam" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Data Kegiatan Islam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Kegiatan Islam</label>
                        <input type="text" id="nama" name="nama_acara" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="gambar" class="form-control">
                             </div>
                            <br>
                            
                        <center> <button type="button" class="btn btn-success btn-simpan" >Simpan Data</button></center>
                        <br>
                        <br>
                    </div> 
                </form>  
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

    <div id="updatekegiatanislam" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Mengubah Data Kegiatan Islam</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Kegiatan Islam</label>
                        <input type="text" id="nama" name="nama_acara_edit" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="gambar_edit" class="form-control">
                             </div>
                            <br>
                            
                        <center> <button type="button" class="btn btn-success btn-update" data-id="0">Simpan Data</button></center>
                        <br>
                        <br>
                    </div> 
                </form>  
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="./js/jquery.js"></script>
<script>
$(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })

        $('.btn-simpan').click(function(){
            var nama_acara = $('input[name="nama_acara"]').val(),
                gambar = $('input[name="gambar"]').prop("files")[0];

                dataform= new FormData();
                dataform.append('nama_acara', nama_acara);
                dataform.append('gambar', gambar);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("kegiatanislam") }}',
                    type: 'POST',
                    data : dataform,
                    success: function (response) {
                         location.reload();
                    }
                });
        });


        $('.btn-delete').click(function(){
            if(confirm('Apa Anda yakin ingin Menghapus?')){
                $.ajax({
                    url: '{{ url("kegiatanislam")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'DELETE',
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        });


        $('.btn-edit').click(function(){
                $.ajax({
                    url: '{{ url("kegiatanislam")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="nama_acara_edit"]').val(response.nama_acara);
                         $('.btn-update').data('id', response.id);
                    }
                });
        });

        $('.btn-update').click(function(){
            var nama_acara_edit = $('input[name="nama_acara_edit"]').val(),
                gambar_edit = $('input[name="gambar_edit"]').prop("files")[0];

                dataform= new FormData();
                dataform.append('nama_acara', nama_acara_edit);
                dataform.append('gambar', gambar_edit);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("kegiatanislam")."/" }}' + $(this).data('id'),
                    type: 'POST',
                    data : dataform,
                    success: function (response) {
                         location.reload();
                    }
                });
            
        });



});
</script>
    @endsection