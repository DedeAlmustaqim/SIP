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
  <link href="<?php echo base_url() ?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables.net-bs4/css/responsive.dataTables.min.css">
  <link href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">


</head>


<body>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left" style="background-image: url('<?php echo base_url() ?>assets/images/form-login.jpg'); background-repeat: no-repeat;  background-size: 100% 100%;">
        <a href="index.html" class="logo">
          <span>
            <img src="<?php echo base_url() ?>assets/images/logo.png" alt="">
          </span>
          <i>
            <img src="<?php echo base_url() ?>assets/images/logo_sm.png" alt="">
          </i>
        </a>
      </div>

      <nav class="navbar-custom" >


        <ul class="list-unstyled topbar-right-menu float-right mb-0">

          <li class="dropdown notification-list">
            <!-- <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <span class="ml-1 text-danger">
                jadwal input data
            </a> -->
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->


              <!-- item-->
              <a href="<?php echo base_url() ?>login/logout" class="dropdown-item notify-item">
                <i class="ti-power-off"></i> <span>Logout</span>
              </a>

            </div>
          </li>
          <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <span class="ml-1">
                <?php if ($this->session->userdata('akses') != 3) {
                  echo $this->session->userdata('ses_nm');
                } else if ($this->session->userdata('akses') == 3) {

                  echo $this->session->userdata('ses_nm_unit');
                } ?>
                <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->


              <!-- item-->
              <a href="<?php echo base_url() ?>login/logout" class="dropdown-item notify-item">
                <i class="ti-power-off"></i> <span>Logout</span>
              </a>

            </div>
          </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
          <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
              <i class="mdi mdi-menu"></i>
            </button>
          </li>

        </ul>

      </nav>

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">


      <!--- Sidemenu -->
      <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
          <li class="menu-title">Navigasi</li>
          <?php if ($this->session->userdata('akses') == 1) { ?>
            <li>
              <a href="<?php echo base_url() ?>admin/dashboard">
                <i class="ti-home"></i><span> Dashboard </span>
              </a>
            </li>

          <?php } else if ($this->session->userdata('akses') == 3) { ?>
            <li>
              <a href="<?php echo base_url() ?>dashboard">
                <i class="ti-home"></i><span> Dashboard </span>
              </a>
            </li>
          <?php } ?>


          <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings "></i> <span> Setting </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
              <?php if ($this->session->userdata('akses') == 1) { ?>
                <li><a href="<?php echo base_url() ?>master/unit">SKPD</a></li>
                <li><a href="<?php echo base_url() ?>master/setting_bln">Jadwal</a></li>

              <?php } else if ($this->session->userdata('akses') == 3) { ?>
                <li><a href="<?php echo base_url() ?>master/unit">SKPD</a></li>

              <?php } ?>

            </ul>
          </li>
          <li>

            <?php if ($this->session->userdata('akses') == 1) { ?>
              <a href="<?php echo base_url() ?>admin/apbd">
                <i class="ti-pie-chart"></i><span> APBD </span>
              </a>

            <?php } else if ($this->session->userdata('akses') == 3) { ?>
              <a href="<?php echo base_url() ?>apbd">
                <i class="ti-pie-chart"></i><span> APBD </span>
              </a>
            <?php } ?>


          </li>


          <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cart"></i> <span> PPBJ </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
              <?php if ($this->session->userdata('akses') == 1) { ?>
                <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_50">Rp 50 jt s/d Rp 200 jt</a></li>


              <?php } else if ($this->session->userdata('akses') == 3) { ?>
                <li><a href="<?php echo base_url() ?>ppbj/ppbj_50">Rp 50 jt s/d Rp 200 jt</a></li>

              <?php } ?>



              <?php if ($this->session->userdata('akses') == 1) { ?>
                <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_200">Rp 200 jt s/d Rp 2,5 M</a></li>


              <?php } else if ($this->session->userdata('akses') == 3) { ?>
                <li><a href="<?php echo base_url() ?>ppbj/ppbj_200">Rp 200 jt s/d Rp 2,5 M</a></li>

              <?php } ?>

              <?php if ($this->session->userdata('akses') == 1) { ?>
                <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_25">Rp 2,5 M s/d Rp 5 M</a></li>


              <?php } else if ($this->session->userdata('akses') == 3) { ?>
                <li><a href="<?php echo base_url() ?>ppbj/ppbj_25">Rp 2,5 M s/d Rp 5 M</a></li>

              <?php } ?>


            </ul>
          </li>

          <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cart"></i> <span> DAK </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
              <li><a onClick="proses()">DAK FISIK</a></li>
              <li><a onClick="proses()">DAK NON FISIK</a></li>



            </ul>
          </li>
          <li>

            <?php if ($this->session->userdata('akses') == 1) { ?>
              <a href="<?php echo base_url() ?>admin/apbd">
                <i class="ti-pie-chart"></i><span> Pendapatan </span>
              </a>

            <?php } else if ($this->session->userdata('akses') == 3) { ?>
              <a href="<?php echo base_url() ?>pendapatan">
                <i class="ti-pie-chart"></i><span> Pendapatan </span>
              </a>
            <?php } ?>


          </li>
          <li>
            <a href="<?php echo base_url() ?>login/logout">
              <i class="mdi mdi-power "></i><span> Logout </span>
            </a>
          </li>


        </ul>

      </div>
      <!-- Sidebar -->
      <div class="clearfix"></div>

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-sm-12">
              <h4 class="header-title m-t-0 m-b-20"><?php echo $judul ?></h4>
              <?php echo $konten ?>
            </div>
          </div>

        </div> <!-- container -->


        <div class="footer">
          <div class="pull-right hide-phone">
            Dalam pengembangan <strong class="text-custom">80%</strong>.
          </div>
          <div>
            <strong>SIP KAB. BARTIM</strong> - BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM

          </div>
        </div>

      </div> <!-- content -->

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->

  <script>
    var BASE_URL = "<?php echo base_url() ?>"
    var id_unit = "<?php echo $this->session->userdata('ses_id_unit') ?>";
  </script>

  <!-- jQuery  -->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

  <!-- sep js -->
  <script src="<?php echo base_url() ?>assets/dashboard.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/dashboard_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/master.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/apbd.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/pendapatan.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/apbd_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_50.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_50_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_200_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_25_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_200.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_25.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/validation.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/rupiah.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>


  <script src="<?php echo base_url() ?>assets/currency/jquery.formatCurrency-1.4.0.js"></script>
  <!-- This is data table -->
  <script src="<?php echo base_url() ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
  <!-- Sweet-Alert  -->
  <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert/jquery.sweet-alert.custom.js"></script>

  <script src="<?php echo base_url() ?>assets/Chart.js/chartjs.init.js"></script>
  <script src="<?php echo base_url() ?>assets/Chart.js/Chart.min.js"></script>

  <script>
    function proses() {
      swal({
        type: 'warning',
        title: 'Mohon Maaf',
        text: 'Menu ini sedang kami kembangkan',
        timer: 3000,
      })
    }
  </script>
</body>

</html>