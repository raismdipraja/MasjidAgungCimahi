@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA Anggota DKM
                <div class="btn-actions-pane-right">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahanggota"><i class="fa fa-plus"> Tambah</i></button></td>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama DKM</th>
                            <th>Email</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Dibuat pada</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                        @foreach( $anggota as $p)
                        @php
                            $no++;
                        @endphp
                        <tr>
                            <td class="text-center text-muted">{{$no}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $p->nama }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $p->email }}</td>
                            <td class="text-center">{{ $p->alamat }}</td>
                            <td class="text-center">{{ $p->created_at }}</td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updateanggota"><i class="fa fa-edit"> Edit </i></button>
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

    
    <div id="tambahanggota" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Data Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" id="nama" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="nama" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" id="nama" name="password" class="form-control">
                    </div>
                </form>  
                <center> <button class="btn btn-success btn-simpan">Simpan Data</button></center>
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

    <div id="updateanggota" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Mengubah Data Kajian</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}   
                <div class="form-group">           
                        <label for="">Nama</label>
                        <input type="text" id="nama" name="nama_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" id="nama" name="email_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" id="nama" name="alamat_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" id="nama" name="password_edit" class="form-control">
                    </div> <br>
                    </div> 
                </form> 
                <center> <button class="btn btn-success btn-update" data-id="0">Simpan Data</button></center> 
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

        $('.btn-delete').click(function(){
            if(confirm('Apa Anda yakin ingin Menghapus?')){
                $.ajax({
                    url: '{{ url("anggotadkm")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'DELETE',
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        });

        $('.btn-simpan').click(function(){
            var nama = $('input[name="nama"]').val(),
                email = $('input[name="email"]').val(),
                alamat = $('input[name="alamat"]').val(),
                password = $('input[name="password"]').val(),


                dataform= new FormData();
                dataform.append('nama', nama);
                dataform.append('email', email);
                dataform.append('alamat', alamat);
                dataform.append('password', password);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("anggotadkm") }}',
                    type: 'POST',
                    data : dataform,
                    success: function (response) {
                         location.reload();
                    }
                });
            
        });


        $('.btn-edit').click(function(){
                $.ajax({
                    url: '{{ url("anggotadkm")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="nama_edit"]').val(response.nama);
                         $('input[name="email_edit"]').val(response.email);
                         $('input[name="alamat_edit"]').val(response.alamat);
                         $('input[name="password"]').val(response.password);
                         $('.btn-update').data('id', response.id);
                    }
                });
            
        });

        $('.btn-update').click(function(){
            var nama_edit = $('input[name="nama_edit"]').val(),
                email_edit = $('input[name="email_edit"]').val(),
                alamat_edit = $('input[name="alamat_edit"]').val(),
                password_edit = $('input[name="password_edit"]').val(),

                dataform= new FormData();
                dataform.append('nama', nama_edit);
                dataform.append('email', email_edit);
                dataform.append('alamat', alamat_edit);
                dataform.append('password', password_edit);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("anggotadkm")."/" }}' + $(this).data('id'),
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