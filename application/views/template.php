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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatables.net-bs4/css/responsive.dataTables.min.css">
  <link href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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
              <li class="has-submenu">
                <?php $akses = $this->session->userdata('akses') ?>
                <?php if (($akses == 1 || $akses == 2)) { ?>
                  <a href="<?php echo base_url() ?>admin/dashboard">
                    <i class="ti-home"></i><span> Dashboard </span>
                  </a>

                <?php } else if ($akses == 3) { ?>
                  <a href="<?php echo base_url() ?>dashboard">
                    <i class="ti-home"></i><span> Dashboard </span>
                  </a>
                <?php } ?>

              </li>

              <li class="has-submenu">
                <?php if (($akses == 1 || $akses == 2)) { ?>
                  <a href="<?php echo base_url() ?>admin/apbd">
                    <i class="ti-pie-chart"></i><span> APBD </span>
                  </a>

                <?php } else if ($akses == 3) { ?>
                  <a href="<?php echo base_url() ?>apbd">
                    <i class="ti-pie-chart"></i><span> APBD </span>
                  </a>
                <?php } ?>
              </li>
              <?php if ($akses == 3) { ?>
                <li class="has-submenu">
                  <a href="<?php echo base_url() ?>ppbj"><span><i class="mdi mdi-cart"></i> <span> PPBJ </span> </a>

                </li>
              <?php } else { ?>
                <li class="has-submenu">
                  <a href="#"><span><i class="mdi mdi-cart"></i> <span> PPBJ </span> </a>
                  <ul class="submenu">
                    <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_50">PAKET NON STRATEGIS (>RP. 50 JT S/D Rp. 200 JT) </a></li>
                    <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_200">PAKET NON STRATEGIS (>RP. 200 JT S/D Rp. 2,5 M) </a></li>
                    <li><a href="<?php echo base_url() ?>admin/ppbj/ppbj_25">PAKET NON STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)</a></li>
                  </ul>

                </li>
              <?php } ?>


              <li class="has-submenu">
                <?php if (($akses == 1 || $akses == 2)) { ?>
                  <a href="<?php echo base_url() ?>admin/pendapatan">
                    <i class="ti-pie-chart"></i><span> Pendapatan </span>
                  </a>

                <?php } else if ($akses == 3) { ?>
                  <a href="<?php echo base_url() ?>pendapatan">
                    <i class="ti-pie-chart"></i><span> Pendapatan </span>
                  </a>
                <?php } ?>
              </li>

              <?php if ($akses == 3) { ?>
                <li class="has-submenu">
                  <a href="<?php echo base_url() ?>dak"> <span><i class="ti-pie-chart"></i></span><span> DAK </span> </a>

                </li>
              <?php } else { ?>
                <li class="has-submenu">
                  <a href="<?php echo base_url() ?>admin/dak"> <span><i class="ti-pie-chart"></i></span><span> DAK </span> </a>

                </li>
              <?php } ?>

              <?php if ($akses == 1 || $akses == 2) { ?>
                <li class="has-submenu">
                  <a href="<?php echo base_url() ?>admin/data_skpd"> <span><i class="ti-pie-chart"></i></span><span> Data SKPD </span> </a>

                </li>
              <?php } ?>
              <li class="has-submenu">
                <?php if (($akses == 1 || $akses == 2)) { ?>


                <?php } else if ($akses == 3) { ?>
                  <a href="<?php echo base_url() ?>laporan">
                    <i class="mdi mdi-file-document"></i><span> Laporan </span>
                  </a>
                <?php } ?>
              </li>

              <li class="has-submenu">

                <?php if ($akses == 1) { ?>
                  <a href="#"> <span><i class="ti-widget"></i></span><span> Setting </span> </a>
                  <ul class="submenu">
                    <li><a href="<?php echo base_url() ?>master/unit">SKPD</a></li>
                    <li><a href="<?php echo base_url() ?>master/data_status">Status Input Data </a></li>
                    <li><a href="<?php echo base_url() ?>master/setting_bln">Jadwal</a></li>
                    <li><a href="<?php echo base_url() ?>master/backup">Backup DB</a></li>




                  <?php } else if ($akses == 3) { ?>
                    <a href="#"> <span><i class="ti-widget"></i></span><span> Setting </span> </a>
                    <ul class="submenu">
                      <li><a href="<?php echo base_url() ?>master/unit">Profil SKPD</a></li>
                      <li><a href="javascript: void(0);" onClick="UbahPass(this)" data-id="<?php echo $this->session->userdata('ses_id_unit') ?>">Ubah Password</a></li>
                    <?php } ?>
                    </ul>
              </li>
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
              <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="<?php echo base_url() ?>assets/images/logo-bartim.png" alt="user" class=""> <span class="ml-1 pro-user-name"> <?php if ($akses != 3) {
                                                                                                                                          echo $this->session->userdata('ses_nm');
                                                                                                                                        } else if ($akses == 3) {

                                                                                                                                          echo $this->session->userdata('ses_nm_unit');
                                                                                                                                        } ?> <i class="mdi mdi-chevron-down"></i> </span>
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
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

      </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

  </header>
  <!-- End Navigation Bar-->


  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="header-title m-t-0 m-b-20">SISTEM INFORMASI PELAPORAN (SIP)<small> V.2.0</small></h4>
        </div>
        <div class="col-sm-6">
          <a href="https://api.whatsapp.com/send?phone=6285248457510" target="_blank" class="btn btn-default btn-sm m-t-0 m-b-20 float-right"><img src="<?php echo base_url()?>/assets/images/icons8-whatsapp-50.png" height="25px">&nbsp;Lapor Admin/Web Programmer </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <?php echo $konten ?>
        </div>
      </div>



    </div> <!-- end container -->

    <!-- Footer -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="pull-right hide-phone">
              Dalam pengembangan <strong class="text-custom">80%</strong>.
            </div>
            <div>
              <strong>SIP KAB. BARTIM</strong> - BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM

            </div>

          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

  </div>
  <!-- end wrapper -->

  <div class="modal fade bs-example-modal-lg" id="ModalUbahPass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myLargeModalLabel">Ubah Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" novalidate id="FormUbahPass">
            <input type="text" class="form-control" hidden id="id_unit_pass" name="id_unit_pass" value="<?php echo $this->session->userdata('ses_id_unit') ?>">

            <div class="card-body">
              <div class="form-group row">
                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Password Baru</label>
                <div class="col-sm-5">
                  <div class="controls">
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" id="pass" name="pass" placeholder="Minimal 8 Karakter" required minlength="8" maxlength="20" data-validation-required-message="Tidak Boleh Kosong">
                      <div class="input-group-append">
                        <span class="input-group-text pass"> <i class="mdi mdi-eye-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-3 text-left control-label col-form-label">Ulangi Password</label>
                <div class="col-sm-5">
                  <div class="controls">
                    <div class="input-group mb-3">
                      <input type="password" name="pass2" id="pass2" data-validation-match-match="pass" class="form-control" data-validation-required-message="Tidak Boleh Kosong" required="" aria-invalid="false">
                      <div class="input-group-append">
                        <span class="input-group-text pass2"> <i class="mdi mdi-eye-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group m-b-0 text-center">
                  <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                  <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Batal</button>
                </div>
              </div>
          </form>
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
    var BASE_URL = "<?php echo base_url() ?>"
    var id_unit = "<?php echo $this->session->userdata('ses_id_unit') ?>";
    var akses = "<?php echo $this->session->userdata('akses') ?>";
  </script>

  <!-- jQuery  -->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>





  <!-- App js -->
  <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

  <?php if (($akses == 1) || ($akses == 2)) {
  ?>


    <script src="<?php echo base_url() ?>assets/dashboard_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/apbd_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/ppbj_50_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/ppbj_200_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/ppbj_25_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/progress.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
    <script src="<?php echo base_url() ?>assets/pendapatan_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <?php } ?>


  <!-- sep js -->
  <script src="<?php echo base_url() ?>assets/dashboard.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/master.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/apbd.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/pendapatan.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_200.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj_25.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/ppbj.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/validation.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/rupiah.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/laporan.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/apps.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/dak.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/dak_admin.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/clear_modal.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>
  <script src="<?php echo base_url() ?>assets/view_skpd.js?=<?php echo date('Y-m-d H:i:s') ?>"></script>


  <script src="<?php echo base_url() ?>assets/currency/jquery.formatCurrency-1.4.0.js"></script>
  <!-- This is data table -->
  <script src="<?php echo base_url() ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
  <!-- Sweet-Alert  -->
  <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert/jquery.sweet-alert.custom.js"></script>

  <script src="<?php echo base_url() ?>assets/Chart.js/chartjs.init.js"></script>
  <script src="<?php echo base_url() ?>assets/Chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery.countdown-2.2.0/jquery.countdown.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    ! function(window, document, $) {
      "use strict";
      $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
        checkboxClass: "icheckbox_square-green",
        radioClass: "iradio_square-green"
      }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    });
  </script>



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

  <script>
    $('.pass').hover(function() {
      $('#pass').attr('type', 'text');
    }, function() {
      $('#pass').attr('type', 'password');
    });

    $('.pass2').hover(function() {
      $('#pass2').attr('type', 'text');
    }, function() {
      $('#pass2').attr('type', 'password');
    });

   
  </script>


</body>

</html>