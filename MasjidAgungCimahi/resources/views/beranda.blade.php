@extends('layouts.master')
@section('content')
<div class="row">
    <div class="table-responsive">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">DATA KAJIAN
                    <div class="btn-actions-pane-right">
                        <div class="search-wrapper">
                            <div class="input-holder">
                                <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                        </div>
                    </div>
                    <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahkajian"><i class="fa fa-plus"> Tambah</i></button></td>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class=text-center">#</th>
                                <th>Judul kajian</th>
                                <th class="text-center">Nama Ustadz</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Ditambahkan Oleh</th>
                                <th class="text-center">Dibuat pada</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="d-block text-center card-footer"> </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

    <div id="tambahkajian" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Data Kajian</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Kajian</label>
                        <input type="text" id="nama" name="nama_acara" class="form-control">
                            <br>
                        <label for="">Nama Ustadz</label>
                        <input type="text" id="nama" name="nama_ustad" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="gambar" class="form-control">
                             </div>
                            <br>
                            
                </form>  
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

    <div id="updatekajian" class="modal fade" role="dialog">
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
                            <form action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Judul Kajian</label>
                                    <input type="text" id="nama" name="nama_acara_edit" class="form-control">
                                    <br>
                                    <label for="">Nama Ustadz</label>
                                    <input type="text" id="nama" name="nama_ustad_edit" class="form-control">
                                    <br>
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" id="nama" name="gambar_edit" class="form-control">
                                    </div>
                                    <br>
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

</script>

@endsection

