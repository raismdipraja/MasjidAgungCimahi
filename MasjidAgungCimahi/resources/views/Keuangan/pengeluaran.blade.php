@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">PENGELUARAN DI MASJID AGUNG KOTA CIMAHI
                <div class="btn-actions-pane-right">
                @foreach ($total as $t)

                    TOTAL PENGELUARAN : Rp. {{ $t->total }} &nbsp; &nbsp; &nbsp; &nbsp; 

                @endforeach
                </div>
                <button class="btn-wide btn btn-success"  data-toggle="modal" data-target="#tambahpengeluaran"><i class="fa fa-plus"> Tambah</i></button>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama Pengeluaran</th>
                            <th class="text-center">Jumlah Pengeluaran</th>
                            <th class="text-center">Tanggal Pengeluaran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                        @foreach( $pengeluaran as $p)
                        @php
                            $no++;
                            @endphp
                        <tr>
                            <td class="text-center text-muted">{{$no}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3"> </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $p->judul }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">Rp. {{ $p->pengeluaran }}</td>
                            <td class="text-center"> {{ $p->tanggal }} </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updatepengeluaran"><i class="fa fa-edit"> Edit </i></button>
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

    <div id="tambahpengeluaran" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Pengeluaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Pengeluaran</label>
                        <input type="text" id="nama" name="judul" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" id="nama" name="pengeluaran" class="form-control">
                             </div>
                            <br>
                            <div class="form-group">
                                <label for="">Tanggal Pengeluaran</label>
                                <input type="date" id="nama" name="tanggal" class="form-control">
                             </div>
                            <br>
                    </div> 
                </form>  
                <center> <button type="button" class="btn btn-success btn-simpan">Simpan Data</button></center>
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

    <div id="updatepengeluaran" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Mengubah Pengeluaran</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                <div class="form-group">           
                        <label for="">Judul Pengeluaran</label>
                        <input type="text" id="nama" name="judul_edit" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" id="nama" name="pengeluaran_edit" class="form-control">
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

        $('.btn-simpan').click(function(){
            var judul = $('input[name="judul"]').val(),
                pengeluaran = $('input[name="pengeluaran"]').val(),
                tanggal = $('input[name="tanggal"]').val(),


                dataform= new FormData();
                dataform.append('judul', judul);
                dataform.append('pengeluaran', pengeluaran);
                dataform.append('tanggal', tanggal);

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("pengeluaran") }}',
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
                    url: '{{ url("pengeluaran")."/" }}' + $(this).data('id'), //data-id=""
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
                    url: '{{ url("pengeluaran")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="judul_edit"]').val(response.judul);
                         $('input[name="pengeluaran_edit"]').val(response.pengeluaran);
                         $('input[name="tanggal_edit"]').val(response.tanggal);
                         $('.btn-update').data('id', response.id);
                    }
                });
            
        });

        $('.btn-update').click(function(){
            var judul_edit = $('input[name="judul_edit"]').val(),
                pengeluaran_edit = $('input[name="pengeluaran_edit"]').val(),
                tanggal_edit = $('input[name="tanggal_edit"]').val(),


                dataform= new FormData();
                dataform.append('judul', judul_edit);
                dataform.append('pengeluaran', pengeluaran_edit);
                dataform.append('tanggal', tanggal_edit);
                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("pengeluaran")."/" }}' + $(this).data('id'),
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
