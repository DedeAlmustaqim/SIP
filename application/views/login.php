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
</head>

<body style="background-image: url('<?php echo base_url() ?>assets/images/bg-login.jpg');   background-size: 100% 100%;">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 card-box">
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/images/logo-bartim.png" width="80px">
                                <hr>
                                <h1 class="text-center m-b-20">SIP KAB. BARTIM</h1>
                                <h6 class="text-center m-b-20">SISTEM INFORMASI PELAPORAN</h6>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" action="<?php echo base_url() ?>login/auth" method="post" novalidate>
                                    <?php if ($this->session->flashdata('no_user')) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <small>
                                                <?php echo $this->session->flashdata('no_user'); ?></small>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('cap_error')) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <small>
                                                <?php echo $this->session->flashdata('cap_error'); ?></small>
                                        </div> <?php } ?>
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label class="text-center">Tahun Anggaran</label>
                                            <select class="form-control custom-select" name="ta" required data-validation-required-message="Tidak Boleh Kosong">
                                                <option value="">--Pilih--</option>
                                                <option value="2021">2021</option>

                                            </select>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="col-xs-12 p-b-20 m-t-30">
                                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Masuk</button>
                                            </div>
                                        </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted"> BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="<?php echo base_url() ?>assets/validation.js"></script>
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
</body>

</html>