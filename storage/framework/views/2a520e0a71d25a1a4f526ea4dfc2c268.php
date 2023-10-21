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
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex justify-content-center" href="<?php echo e(url('Dashboard')); ?>">
                
                <div class="sidebar-brand-text">SDN 73</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link">
                    <b>
                        <?php echo e(session('log.nama')); ?>

                    </b>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo e($page == 'Dashboard' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Dashboard')); ?>">
                    <span>Dashboard</span>
                </a>
            </li>

            <?php if(session('log.id_user_level') == '1'): ?>
            <li class="nav-item <?php echo e($page == 'Aspek' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Aspek')); ?>">
                    <span>Data Aspek</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Kriteria' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Kriteria')); ?>">
                    <span>Data Kriteria</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Alternatif' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Alternatif')); ?>">
                    <span>Data Alternatif</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Penilaian' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Penilaian')); ?>">
                    <span>Data Penilaian</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Perhitungan' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Perhitungan')); ?>">
                    <span>Data Perhitungan</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Hasil' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Hasil')); ?>">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(session('log.id_user_level') == '2'): ?>
            <li class="nav-item <?php echo e($page == 'Aspek' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Aspek')); ?>">
                    <span>Data Aspek</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Kriteria' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Kriteria')); ?>">
                    <span>Data Kriteria</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Alternatif' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Alternatif')); ?>">
                    <span>Data Alternatif</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Perhitungan' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Perhitungan')); ?>">
                    <span>Data Perhitungan</span>
                </a>
            </li>

            <li class="nav-item <?php echo e($page == 'Hasil' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Hasil')); ?>">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(session('log.id_user_level') == '3'): ?>
            <li class="nav-item <?php echo e($page == 'Hasil' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Hasil')); ?>">
                    <span>Data Hasil Akhir</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(session('log.id_user_level') == '1'): ?>
            <li class="nav-item <?php echo e($page == 'User' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('User')); ?>">
                    <span>Data User</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(session('log.id_user_level') == '2'): ?>
            <li class="nav-item <?php echo e($page == 'User' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('User')); ?>">
                    <span>Data User</span>
                </a>
            </li>
            <?php endif; ?>

            <li class="nav-item <?php echo e($page == 'Profile' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(url('Profile')); ?>">
                    <span>Data Profile</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('Login')); ?>">
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

                    <div class="container-fluid"><?php /**PATH C:\Users\wahyu\Desktop\SPK-Profile-Matching\resources\views/layouts/header_admin.blade.php ENDPATH**/ ?>