<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="./main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="{{route('anggota')}}" class="nav-link" class="mm-active">
                                <i class="nav-link-icon fa fa-database"> </i>
                                Anggota DKM
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Apa yah
                            </a>
                        </li>
                       
                    </ul>       
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <div class="widget-heading">
                                            {{ Auth::user()->name }}
                                             <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 {{ __('Logout') }}
                                             </a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                             </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>        
        <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                             <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                                 <div class="switch-animate switch-off">
                                                                     <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                        <h3 class="themeoptions-heading">
                                            <div>Main Content Options</div>
                                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default</button>
                                        </h3>
                                        <div class="p-3">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <h5 class="pb-2">Page Section Tabs</h5>
                                                    <div class="theme-settings-swatches">
                                                        <div role="group" class="mt-2 btn-group">
                                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">Line</button>
                                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">Shadow</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>       
                    <div class="app-main">
                        <div class="app-sidebar sidebar-shadow">   
                            <div class="scrollbar-sidebar">
                                 <div class="app-sidebar__inner">
                                    <ul class="vertical-nav-menu">
                                        <li class="app-sidebar__heading">Dashboards</li>
                                            <li>
                                                <a href="{{route('beranda')}}" >
                                                <i class="metismenu-icon pe-7s-rocket"></i>
                                                    Beranda
                                                </a>
                                            </li>
                                
                                        <li>
                                            <a href="{{route('kajian')}}">
                                                <i class="metismenu-icon fas fa-chalkboard-teacher" ></i>
                                                <font size="3px"> Kajian</font>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('pelatihan')}}">
                                                <i class="metismenu-icon pe-7s-display2"></i>
                                                Pelatihan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('kegiatanislam')}}">
                                                <i class="metismenu-icon pe-7s-display2"></i>
                                                    Kegiatan Islam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('pengajianrutin')}}">
                                                <i class="metismenu-icon pe-7s-display2"></i>
                                                Pengajian Rutin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-diamond"></i>
                                                Keuangan
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="{{route('keuangan.pemasukan')}}">
                                                        <i class="metismenu-icon"></i>
                                                        Pemasukan
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('keuangan.pengeluaran')}}">
                                                        <i class="metismenu-icon">
                                                        </i>Pengeluaran
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>    
                                </div>
                            </div>
                        </div>
                        <div class="app-main__outer">
                        <div class="app-main__inner">
                        <div class="app-page-title">
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
                                        <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#tambahkajian"><i class="fa fa-plus"> Tambah</i></button></td>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nama DKM</th>
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
                                                    <td class="text-center">{{ $p->alamat }}</td>
                                                    <td class="text-center"> </td>
                                                    <td class="text-center">
                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary " data-toggle="modal" data-target="#updatekajian"><i class="fa fa-edit"> Edit </i></button>
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
                </div>
            </div>
        </div>
    </div>
    
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
                <form action="" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Kajian</label>
                        <input type="text" id="nama" name="jatuh_tempo" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="jatuh_tempo" class="form-control">
                             </div>
                            <br>
                            
                        <center> <button class="btn btn-success">Simpan Data</button></center>
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
                <form action="" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}   
                    <div class="form-group">           
                        <label for="">Judul Kajian</label>
                        <input type="text" id="nama" name="jatuh_tempo" class="form-control">
                            <br>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" id="nama" name="jatuh_tempo" class="form-control">
                             </div>
                            <br>
                            
                        <center> <button class="btn btn-success">Simpan Data</button></center>
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

</body>                                              
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</html>
