@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
         <div class="main-card mb-3 card">
             <div class="card-header">DATA PENGAJIAN RUTIN
                <div class="btn-actions-pane-right">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahpengajianrutin"><i class="fa fa-plus"> Tambah</i></button></td>
            </div>
            <div class="card-header">
                <div class="btn-actions-pane-left"><center>Senin</center></div>
            </div>
                <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Judul Pengajian Rutin</th>
                            <th class="text-center">Nama Ustadz</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Jam</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @foreach( $senin as $p)
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
                            <td class="text-center">{{ $p->nama_ustad }}</td>
                            <td class="text-center"> {{ $p->hari }}</td>
                            <td class="text-center"> {{ $p->jam }}</td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>selasa</center></div>
                </div>
                 <div class="table-responsive">
                     <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $selasa as $p)
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
                                <td class="text-center">{{ $p->nama_ustad }}</td>
                                <td class="text-center"> {{ $p->hari }}</td>
                                <td class="text-center"> {{ $p->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>rabu</center></div>
                </div>
                 <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $rabu as $p)
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
                                <td class="text-center">{{ $p->nama_ustad }}</td>
                                <td class="text-center"> {{ $p->hari }}</td>
                                <td class="text-center"> {{ $p->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>kamis</center></div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $kamis as $k)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                 <td class="text-center text-muted">{{$no}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                         <div class="widget-content-wrapper">
                                             <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $k->judul }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $k->nama_ustad }}</td>
                                <td class="text-center"> {{ $k->hari }}</td>
                                <td class="text-center">  {{ $k->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>jumat</center></div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $jumat as $k)
                            @php
                                 $no++;
                             @endphp
                            <tr>
                                <td class="text-center text-muted">{{$no}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                             <div class="widget-content-left flex2">
                                                 <div class="widget-heading">{{ $k->judul }}</div>
                                                </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $k->nama_ustad }}</td>
                                <td class="text-center"> {{ $k->hari }}</td>
                                <td class="text-center"> {{ $k->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>sabtu</center></div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $sabtu as $k)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td class="text-center text-muted">{{$no}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $k->judul }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $k->nama_ustad }}</td>
                                <td class="text-center"> {{ $k->hari }}</td>
                                <td class="text-center"> {{ $k->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-left"><center>minggu</center></div>
                </div>
                 <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Judul Pengajian Rutin</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 0 @endphp
                            @foreach( $minggu as $k)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td class="text-center text-muted">{{$no}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $k->judul }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $k->nama_ustad }}</td>
                                <td class="text-center"> {{ $k->hari }}</td>
                                <td class="text-center"> {{ $k->jam }}</td>
                                <td class="text-center">
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updaterutinan"><i class="fa fa-edit"> Edit </i></button>
                                    <button type="button" id="PopoverCustomT-1" class="btn btn-danger "><i class="fa fa-trash"> Hapus </i></button>
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

<div id="tambahpengajianrutin" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Pengajian Rutin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                 <div style=margin-left:10px;>
                     <div style=margin-right:10px;>
                        <form action="" enctype="multipart/form-data">
                        {{ csrf_field() }}   
                        <div class="form-group">           
                            <label for="">Judul Pengajian Rutin</label>
                            <input type="text" id="nama" name="judul" class="form-control">
                            <br>
                            <div class="form-group">           
                                <label for="">Nama Ustadz</label>
                                <input type="text" id="nama" name="nama_ustad" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">           
                                <label for="">Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="senin">Sennin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                    <option value="minggu">Minggu</option>
                                </select>
                                <br>
                                <div class="form-group">           
                                    <label for="">Jam</label>
                                    <input type="time" id="nama" name="jam" class="form-control">
                                </div>
                                <br>
                                <center> <button type="button" class="btn btn-success btn-simpan">Simpan Data</button></center>
                                <br>
                                <br>
                            </div> 
                        </div>
                            </form>  
                    </div>  
                </div>
			</div>
		</div>
	</div>
</div>

<div id="updaterutinan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mengubah Data Pengajian Rutin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <div style=margin-left:10px;>
                    <div style=margin-right:10px;>
                        <form action="" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}   
                        <div class="form-group">           
                            <label for="">Judul Pengajian Rutin</label>
                            <input type="text" id="nama" name="jatuh_tempo" class="form-control">
                            <br>
                            <div class="form-group">           
                                <label for="">Nama Ustadz</label>
                                <input type="text" id="nama" name="jatuh_tempo" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">           
                                <label for="">Hari</label>
                                <select name="hari" class="form-control">
                                    <option value="senin">Sennin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                    <option value="minggu">Minggu</option>
                                </select>
                            </div> 
                                <br>
                                <div class="form-group">           
                                    <label for="">Jam</label>
                                    <input type="time" id="nama" name="jam" class="form-control">
                                </div>
                                <br>
                        </div>
                        </form>  
                        <center> <button type="button" class="btn btn-success">Simpan Data</button></center>
                        <br>
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
                nama_ustad = $('input[name="nama_ustad"]').val(),
                hari = $('select[name="hari"]').val(),
                jam = $('input[name="jam"]').val(),

                dataform= new FormData();
                dataform.append('judul', judul);
                dataform.append('nama_ustad', nama_ustad);
                dataform.append('hari', hari);
                dataform.append('jam', jam);

                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("pengajianrutin") }}',
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
