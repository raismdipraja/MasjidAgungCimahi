@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">DATA BERITA
                <div class="btn-actions-pane-right">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Masukan Judul Kajian">
                            <button class="search-icon"><span></span></button>
                        </div>
                         <button class="close"></button>
                    </div>
                </div>
                <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahberita"><i class="fa fa-plus"> Tambah</i></button></td>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Judul Berita</th>
                            <th class="text-center">Gambar</th>
                            <th>Isi Berita</th>
                            <th class="text-center">Dibuat pada</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                    <tbody>
                     @php $no = 0 @endphp
                          @foreach( $berita as $p)
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
                            <td class="text-center"><img src="{{ url('/image/'.$p->gambar) }}" alt="image" height="200px" width="150px"></td>
                            <td class="text-center"> {{ $p->teks }}</td>
                            <td class="text-center"> {{ $p->created_at }}</td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-edit" data-id="{{ $p->id }}" data-toggle="modal" data-target="#updateberita"><i class="fa fa-edit"> Edit </i></button>
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

    <div id="tambahberita" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					
					<h4 class="modal-title">Tambah Data Berita</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
                <div style=margin-left:10px;>
                <div style=margin-right:10px;>
                <form action="" enctype="multipart/form-data">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Berita</label>
                        <input type="text" id="nama" name="judul" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="gambar" class="form-control">
                             </div>
                            <br>
                            <label for="">Teks</label>
                        <textarea id="nama" name="teks" class="form-control"></textarea>
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

    <div id="updateberita" class="modal fade" role="dialog">
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
                        <label for="">Judul Berita</label>
                        <input type="text" id="nama" name="judul_edit" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="gambar_edit" class="form-control">
                             </div>
                            <br>
                            <label for="">teks</label>
                        <input type="text" id="nama" name="teks_edit" class="form-control">
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
  <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-messaging.js"></script>
  <script type="text/javascript" src="./firebase-messaging-sw.js"></script>
<script>
$(document).ready(function() {
    var firebaseToken = "";
    var firebaseConfig = {
            apiKey: "AIzaSyAYJ8ym3G-5dPWN6MH8CmuU4lknVnvSOrU",
            authDomain: "masjid-6a47b.firebaseapp.com",
            databaseURL: "https://masjid-6a47b.firebaseio.com",
            projectId: "masjid-6a47b ",
            storageBucket: "masjid-6a47b.appspot.com",
            messagingSenderId: "796713950364",
            appID: "1:796713950364:android:40ce4db528b996bbde2159",
        };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();
    messaging.usePublicVapidKey("BB6QY4Q99eXSf_SiJxpD9FetLfy7CRiANcgvmzEMpli9XSM61ILzzdVMqJUo7dTmjCYD4D3Cw6T7ktB9VHWAKxs");

    messaging.requestPermission().then(function() {
    console.log('Notification permission granted.');
    // TODO(developer): Retrieve an Instance ID token for use with FCM.
    // ...
    }).catch(function(err) {
    console.log('Unable to get permission to notify.', err);
    });

    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then(function(currentToken) {
    if (currentToken) {
        firebaseToken = currentToken;
        console.log(currentToken);
        updateUIForPushEnabled(currentToken);
    } else {
        // Show permission request.
        console.log('No Instance ID token available. Request permission to generate one.');
        // Show permission UI.
        updateUIForPushPermissionRequired();
        setTokenSentToServer(false);
    }
    }).catch(function(err) {
    console.log('An error occurred while retrieving token. ', err);
    showToken('Error retrieving Instance ID token. ', err);
    setTokenSentToServer(false);
    });
    function setTokenSentToServer(sent) {
            window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })

        $('.btn-simpan').click(function(){
            var judul = $('input[name="judul"]').val(),
                gambar = $('input[name="gambar"]').prop("files")[0],
                teks = $('textarea[name="teks"]').val(),
                firebaseToken = firebaseToken;

                dataform= new FormData();
                dataform.append('judul', judul);
                dataform.append('gambar', gambar);
                dataform.append('teks', teks);
                dataform.append('firebase_token', firebaseToken);
                

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("berita") }}',
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
                    url: '{{ url("berita")."/" }}' + $(this).data('id'), //data-id=""
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
                    url: '{{ url("berita")."/" }}' + $(this).data('id'), //data-id=""
                    type: 'GET',
                    success: function (response) {
                         $('input[name="judul_edit"]').val(response.judul);
                         $('input[name="teks_edit"]').val(response.teks);
                         $('.btn-update').data('id', response.id);
                    }
                });
        });

        $('.btn-update').click(function(){
            var judul_edit = $('input[name="judul_edit"]').val(),
                teks_edit = $('input[name="teks_edit"]').val(),
                gambar_edit = $('input[name="gambar_edit"]').prop("files")[0];

                dataform= new FormData();
                dataform.append('judul', judul_edit);
                dataform.append('gambar', gambar_edit);
                dataform.append('teks', teks_edit);

                
                $.ajax({
                    processData : false,
                    contentType : false,
                    url: '{{ url("berita")."/" }}' + $(this).data('id'),
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