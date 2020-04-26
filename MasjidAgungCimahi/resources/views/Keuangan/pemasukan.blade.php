@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">PEMASUKAN DI MASJID AGUNG KOTA CIMAHI
                <div class="btn-actions-pane-right">
                 @foreach ($total as $t)

                    TOTAL PEMASUKAN : Rp. {{ $t->total }} &nbsp; &nbsp; &nbsp; &nbsp; 

                @endforeach
                </div>
                <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahpemasukan"><i class="fa fa-plus"> Tambah</i></button></td>
            </div>
            <div class="table-responsive">
            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama Pemasukan</th>
                            <th class="text-center">Jumlah Pemasukan</th>
                            <th class="text-center">Nama Pemberi</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                        @foreach( $pemasukan as $p)
                        @php
                            $no++;
                        @endphp
                        <tr>
                            <td class="text-center text-muted">{{$no}}</td>
                             <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $p->judul }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Rp. {{ $p->jumlah }}</td>
                            <td class="text-center"> {{ $p->nama_pemberi }}</td>
                            <td class="text-center"> {{ $p->tanggal }}</td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updatepemasukan"><i class="fa fa-edit"> Edit </i></button>
                                <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-delete" data-id="{{ $p->id }}"><i class="fa fa-trash"> Hapus</i></button>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="d-block text-center card-footer"> </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
                 
    <div id="tambahpemasukan" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Pemasukan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data" >
                    <div class="form-group">           
                    <label for="">Judul Pemasukan</label>
                        <input type="text" id="nama" name="judul" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" id="nama" name="jumlah" class="form-control">
                             </div>
                            <br>
                            <div class="form-group">
                                <label for="">Nama Pemberi</label>
                                <input type="text" id="nama" name="nama_pemberi" class="form-control">
                             </div>
                            <br>
                            <div class="form-group">
                                <label for="">Tanggal Pemasukan</label>
                                <input type="date" id="nama" name="tanggal" class="form-control">
                             </div>
                            <br>
                            
                    </div> 
                </form>  
                <center> <button type="button" class="btn btn-success btn-simpan">Simpan Data</button></center>
                        <br>
                        <br>
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

    <div id="updatepemasukan" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Mengubah Pemasukan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                <div class="form-group">           
                        <label for="">Judul Pemasukan</label>
                        <input type="text" id="nama" name="judul_edit" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" id="nama" name="jumlah_edit" class="form-control">
                             </div>
                            <br>
                            <div class="form-group">
                                <label for="">Nama Pemberi</label>
                                <input type="text" id="nama" name="nama_pemberi_edit" class="form-control">
                             </div>
                            <br>
                            <div class="form-group">
                                <label for="">Tanggal Pemasukan</label>
                                <input type="date" id="nama" name="tanggal_edit" class="form-control">
                             </div>
                            <br>
                    </div> 
                </form>  
                <center> <button type="button" class="btn btn-success btn-update" data-id="0">Simpan Data</button></center>
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
                    url: '{{ url("pemasukan")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'DELETE',
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        });


        $('.btn-simpan').click(function(){
            var judul = $('input[name="judul"]').val(),
                jumlah = $('input[name="jumlah"]').val(),
                nama_pemberi = $('input[name="nama_pemberi"]').val(),
                tanggal = $('input[name="tanggal"]').val(),


                dataform= new FormData();
                dataform.append('judul', judul);
                dataform.append('jumlah', jumlah);
                dataform.append('nama_pemberi', nama_pemberi);
                dataform.append('tanggal', tanggal);

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("pemasukan") }}',
                    type: 'POST',
                    data : dataform,
                    success: function (response) {
                         location.reload();
                    }
                });
            
        });


        $('.btn-edit').click(function(){
                $.ajax({
                    url: '{{ url("pemasukan")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="judul_edit"]').val(response.judul);
                         $('input[name="jumlah_edit"]').val(response.jumlah);
                         $('input[name="nama_pemberi_edit"]').val(response.nama_pemberi);
                         $('input[name="tanggal_edit"]').val(response.tanggal);
                         $('.btn-update').data('id', response.id);
                    }
                });
            
        });

        $('.btn-update').click(function(){
            var judul_edit = $('input[name="judul_edit"]').val(),
                jumlah_edit = $('input[name="jumlah_edit"]').val(),
                nama_pemberi_edit = $('input[name="nama_pemberi_edit"]').val(),
                tanggal_edit = $('input[name="tanggal_edit"]').val(),


                dataform= new FormData();
                dataform.append('judul', judul_edit);
                dataform.append('jumlah', jumlah_edit);
                dataform.append('nama_pemberi', nama_pemberi_edit);
                dataform.append('tanggal', tanggal_edit);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("pemasukan")."/" }}' + $(this).data('id'),
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