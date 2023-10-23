<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK SDN 73</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex justify-content-center" href="{{ url('Dashboard') }}">
                
                <div class="sidebar-brand-text">SDN 73</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link">
                    <b>
                        {{ session('log.nama') }}
                    </b>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $page == 'Dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>

            @if(session('log.id_user_level') == '1')
            <li class="nav-item {{ $page == 'Aspek' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Aspek') }}">
                    <span>Data Aspek</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Kriteria' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Kriteria') }}">
                    <span>Data Kriteria</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Alternatif' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Alternatif') }}">
                    <span>Data Alternatif</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Penilaian' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Penilaian') }}">
                    <span>Data Penilaian</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Perhitungan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Perhitungan') }}">
                    <span>Data Perhitungan</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Hasil' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Hasil') }}">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            @endif

            @if(session('log.id_user_level') == '2')
            <li class="nav-item {{ $page == 'Aspek' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Aspek') }}">
                    <span>Data Aspek</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Kriteria' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Kriteria') }}">
                    <span>Data Kriteria</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Alternatif' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Alternatif') }}">
                    <span>Data Alternatif</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Perhitungan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Perhitungan') }}">
                    <span>Data Perhitungan</span>
                </a>
            </li>

            <li class="nav-item {{ $page == 'Hasil' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Hasil') }}">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            @endif

            @if(session('log.id_user_level') == '3')
            <li class="nav-item {{ $page == 'Hasil' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Hasil') }}">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            @endif

            @if(session('log.id_user_level') == '1')
            <li class="nav-item {{ $page == 'User' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('User') }}">
                    <span>Data User</span>
                </a>
            </li>
            @endif

            @if(session('log.id_user_level') == '2')
            <li class="nav-item {{ $page == 'User' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('User') }}">
                    <span>Data User</span>
                </a>
            </li>
            @endif

            <li class="nav-item {{ $page == 'Profile' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('Profile') }}">
                    <span>Data Profile</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('Login') }}">
                    Logout
                </a>
            </li>
            
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <marquee><h4>Sistem Pendukung Keputusan Pemilihan Guru Terbaik SDN 73 Kota Bengkulu</h4></marquee>
                    </nav>
                    <!-- End of Topbar -->

                    <div class="container-fluid">