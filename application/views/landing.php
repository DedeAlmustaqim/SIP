<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $judul ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/logo-bartim.png">

    <!-- App css -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>

</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                    <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Simple</span>-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="<?php echo base_url() ?>" class="logo">
                        <img src="<?php echo base_url() ?>assets/images/logo_sm.png" alt="" height="70" class="logo-small">
                        <img src="<?php echo base_url() ?>assets/images/logo.png" alt="" height="45" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="navbar-custom">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">


                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end navbar-custom -->


                <div class="menu-extras topbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                        <li class="dropdown notification-list">
                            <br>
                            <a href="<?php echo base_url() ?>login" class="btn btn-dark m-b-10">Login</a>
                            <a href="#" data-toggle="modal" data-target="#ModalAbout" class="btn btn-dark m-b-10"><i class="fa fa-question-circle-o"></i></a>

                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end container -->
        </div>
    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">Tahun Anggaran</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="ta_landing">
                                <option value="2021">2021</option>

                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS REALISASI APBD
                                <?php
                                foreach ($pemda as $pem) {
                                    echo $pem->pemda;
                                }
                                ?>

                            </h6>
                            <div>
                                <canvas id="grafik_landing" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 m-b-20">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS REALISASI APBD

                                <?php
                                foreach ($pemda as $pem) {
                                    echo $pem->pemda;
                                }
                                ?>
                            </h6>
                            <div>
                                <table width="100%" cellpadding="3" border="1" class="">
                                    <tbody>
                                        <tr class="text-center bg-primary text-white">
                                            <td width="15%">Bulan</td>
                                            <td>Pagu</td>
                                            <td>Realisasi Keu</td>
                                            <td>Realisasi Keu (%)</td>
                                            <td>Realisasi Fis (%)</td>
                                        </tr>
                                        <?php foreach ($apbd as $u) { ?>
                                            <tr>
                                                <td>&nbsp;<?php echo $u->nm_bln ?></td>
                                                <td class="text-right" width="30%"><?php echo rupiah($u->pg_apbd) ?></td>
                                                <td class="text-right"><?php echo rupiah($u->real_apbd) ?></td>
                                                <td class="text-right" width="10%"><?php echo round($u->real_apbd_per, 2) ?></td>
                                                <td class="text-right" width="10%"><?php echo round($u->real_apbd_fisik, 2) ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 m-b-20">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS REALISASI PENDAPATAN </h6>
                            <div>
                                <canvas id="grafik_pd_landing" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 m-b-20">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS PPBJ Rp 50 jt s/d 200 jt</h6>


                            <div>
                                <canvas id="grafik_ppbj50_landing" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 m-b-20">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS PPBJ Rp 200 jt s/d 2,5 M</h6>


                            <div>
                                <canvas id="grafik_ppbj200_landing" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 m-b-20">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">PROGRESS PPBJ Rp 200 jt s/d 2,5 M</h6>


                            <div>
                                <canvas id="grafik_ppbj25_landing" height="150"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="pull-right hide-phone">
                            Project Completed <strong class="text-custom">80%</strong>.
                        </div>
                        <div>
                            <strong>PEMERINTAH KABUPATEN BARITO TIMUR</strong>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <div class="modal bs-example-modal-lg" id="ModalAbout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default panel-fill">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sistem Informasi Pelaporan Kab. Barito Timur</h3>
                        </div>
                        <div class="panel-body">
                            <h5 class="font-14 mb-3 text-uppercase">Tentang</h5>
                            <p>SIP (Sistem Informasi Pelaporan) Kab. Barito Timur adalah sebuah aplikasi berbasis web yang dikembangkan oleh BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM dan bekerja sama dengan DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK KABUPATEN BARITO TIMUR</p>

                            <p>Dikembangkan dan dikelola secara mandiri oleh BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM dengan tujuan mempermudah Satuan Organisasi Perangkat Daerah (SOPD) se Kabupaten Barito Timur untuk melakukan pelaporan Realisasi Anggaran perbulannya</p>
                            <hr>
                            <div class="m-t-10">
                                <h5 class="font-14  text-uppercase">Kepala Bidang PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH</h5>
                                <h5 class="font-14  text-uppercase">FIKTORY WAHYUNO, SP</h5>
                            </div>
                            <hr>
                            <div class="m-t-10">
                                <h5 class="font-14  text-uppercase">KEPALA SUB BIDANG PENGENDALIAN, EVALUASI DAN PELAPORAN PEMBANGUNAN DAERAH</h5>
                                <h5 class="font-14  text-uppercase">KRISNA SUDARTY, SP., M.Si</h5>
                            </div>
                            <hr>
                            <div class="m-t-10">
                                <h5 class="font-14  text-uppercase">WEb Programmer</h5>
                                <h5 class="font-14  text-uppercase">dede almustaqim, s.kom</h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- end wrapper -->
            <script>
                var BASE_URL = "<?php echo base_url() ?>"
            </script>
            <!-- jQuery  -->
            <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>

            <!-- App js -->
            <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
            <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>
            <script src="<?php echo base_url() ?>assets/Chart.js/chartjs.init.js"></script>
            <script src="<?php echo base_url() ?>assets/Chart.js/Chart.min.js"></script>
            <script src="<?php echo base_url() ?>assets/landing.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
            <script src="<?php echo base_url() ?>assets/rupiah.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
</body>
</html>