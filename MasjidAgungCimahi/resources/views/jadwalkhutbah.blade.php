@extends('layouts.master')
@section('content')

<div class="row">
        <div class="table-responsive">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">JADWAL KHUTBAH
                        <div class="btn-actions-pane-right">
                            <div class="search-wrapper">
                                <div class="input-holder">
                                    <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>
                        </div>
                        <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahjadwalkhutbah"><i class="fa fa-plus"> Tambah</i></button></td>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Ustadz</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 0 @endphp
                                @foreach( $jadwalkhutbah as $p)
                                @php
                                    $no++;
                                @endphp
                                <tr>
                                    <td class="text-center text-muted">{{$no}}</td>
                                    <td>
                                        <div class="text-center widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $p->nama_ustad }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $p->tanggal }}</td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updatejadwalkhutbah"><i class="fa fa-edit"> Edit </i></button>
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-delete"  data-id="{{ $p->id }}"><i class="fa fa-trash"> Hapus </i></button>
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
</div>
@endsection
@section('modal')

<div id="tambahjadwalkhutbah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Jadwal Khutbah</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Nama </label>
                        <input type="text" id="nama" name="nama_ustad" class="form-control">
                     </div>   
                     <div class="form-group">           
                        <label for="">Waktu </label>
                        <input type="date" id="nama" name="tanggal" class="form-control">
                     </div>     
                </form>  
                <br>
                        <center> <button type="button" class="btn btn-success btn-simpan" >Simpan Data</button></center>
                        <br>
                        <br>
                    </div> 
                </div>  
                </div>
				</div>
			</div>
		</div>
	</div>

    <div id="updatejadwalkhutbah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Mengubah Jadwal Khutbah</h4>
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
                                    <input type="text" id="nama" name="nama_ustad_edit" class="form-control">
                                    <br>
                                </div>
                                <div class="form-group">           
                                    <label for="">Waktu </label>
                                    <input type="date" id="nama" name="tanggal_edit" class="form-control">
                                </div>     
                            </form>
                            <center> <button type="button" class="btn btn-success btn-update" data-id="0">Simpan Data</button>
                            </center>
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

        $('.btn-delete').click(function(){
            if(confirm('Apa Anda yakin ingin Menghapus?')){
                $.ajax({
                    url: '{{ url("jadwalkhutbah")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'DELETE',
                    success: function (response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        });

        $('.btn-simpan').click(function(){
            var nama_ustad = $('input[name="nama_ustad"]').val(),
                tanggal = $('input[name="tanggal"]').val(),

                dataform= new FormData();
                dataform.append('nama_ustad', nama_ustad);
                dataform.append('tanggal', tanggal);

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("jadwalkhutbah") }}',
                    type: 'POST',
                    data : dataform,
                    success: function (response) {
                         location.reload();
                    }
                });
            
        });


        $('.btn-edit').click(function(){
                $.ajax({
                    url: '{{ url("jadwalkhutbah")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="nama_ustad_edit"]').val(response.nama_ustad);
                         $('input[name="tanggal_edit"]').val(response.tanggal);
                         $('.btn-update').data('id', response.id);
                    }
                });
            
        });

        $('.btn-update').click(function(){
                nama_ustad_edit = $('input[name="nama_ustad_edit"]').val(),
                tanggal_edit = $('input[name="tanggal_edit"]').val(),


                dataform= new FormData();
                dataform.append('nama_ustad', nama_ustad_edit);
                dataform.append('tanggal', tanggal_edit);

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("jadwalkhutbah")."/" }}' + $(this).data('id'),
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