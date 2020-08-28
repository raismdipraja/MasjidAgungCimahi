<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Masjid Agung Cimahi{{isset($title) ? ' | '.$title : ''}} </title>
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
                            <a href="{{route('anggota')}}" class="nav-link" >
                                <i class="nav-link-icon fas fa-mosque"> </i>
                                Anggota DKM
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
                                            {{ Auth::user()->nama }}
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
                                            <li >
                                                <a href="{{route('beranda')}}" class="{{ isset($menu) ? $menu == 'Beranda' ? 'mm-active' : '' : ''}}">
                                                <b><i class="metismenu-icon fas fa-home"></i></b>
                                                <font size="3px"> Beranda</font>
                                                </a>
                                            </li>
                                
                                        <li >
                                            <a href="{{route('kajian')}}" class="{{ isset($menu) ? $menu == 'Kajian' ? 'mm-active' : '' : ''}}" >
                                                <i class="metismenu-icon fas fa-user-friends" ></i>
                                                <font size="3px"> Kajian</font>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('pelatihan')}}"  class="{{isset($menu) ? $menu == 'Pelatihan' ? 'mm-active' : '' : '' }}">
                                                <i class="metismenu-icon fas fa-book-reader"></i>
                                                Pelatihan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('kegiatanislam')}}" class="{{isset($menu) ? $menu == 'Kegiatan Islam' ? 'mm-active' : '' : '' }}">
                                                <i class="metismenu-icon fas fa-users"></i>
                                                    Kegiatan Islam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('berita')}}"  class="{{isset($menu) ? $menu == 'Berita' ? 'mm-active' : '' : '' }}">
                                                <i class="metismenu-icon fas fa-book-reader"></i>
                                                Berita
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('pengajianrutin')}}" class="{{isset($menu) ? $menu == 'Pengajian Rutin' ? 'mm-active' : '' : '' }}">
                                                <i class="metismenu-icon fas fa-quran"></i>
                                                Pengajian Rutin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('jadwalkhutbah')}}" class="{{isset($menu) ? $menu == 'Jadwal Khutbah' ? 'mm-active' : '' : '' }}">
                                                <i class="metismenu-icon fas fa-hot-tub"></i>
                                                Jadwal Khutbah
                                            </a>
                                        </li>
                                        <li class="{{ isset($subMenu) ? $subMenu == 'Pemasukan' ? 'mm-active' : '' : ''}} , {{ isset($subMenu2) ? $subMenu2 == 'Pengeluaran' ? 'mm-active' : '' : ''}}" >
                                            <a href="#" >
                                                <i class="metismenu-icon fas fa-money-check-alt"></i>
                                                Keuangan
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul class="{{isset($menu) ? $menu == 'Keuangan' ? 'mm-show' : '' : '' }}">
                                                <li>
                                                    <a href="{{route('keuangan.pemasukan')}}" class="{{ isset($subMenu) ? $subMenu == 'Pemasukan' ? 'mm-active' : '' : ''}}">
                                                        <i class="{{isset($subMenu) ? $subMenu == 'Pemasukan' ? '' : '' : '' }} metismenu-icon"></i>
                                                        Pemasukan
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('keuangan.pengeluaran')}}" class="{{ isset($subMenu2) ? $subMenu2 == 'Pengeluaran' ? 'mm-active' : '' : ''}}">
                                                        <i class="{{isset($subMenu2) ? $subMenu2 == 'Pengeluaran' ? '' : '' : '' }} metismenu-icon">
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
                            @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@yield('modal')
</body>                        
@yield('js')                      
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</html>
