<div class="card">
    <div class="card-header">
        <h4>APBD KABUPATEN BARITO TIMUR TA <?php echo $this->session->userdata('ta') ?></h4> <!-- Nav tabs -->
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs tabs-bordered">
            <li class="nav-item">
                <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    Rekapitulasi Kab/Kota
                </a>
            </li>
            <li class="nav-item">
                <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                    Rekapitulasi Per SKPD
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home-b1">
                <div class="row">
                    <div class="col-md-8">
                        <table cellspacing="0" cellpadding="5" border="1">
                            <col width="373">
                            <col width="165">
                            <col width="165">
                            <col width="150">
                            <col width="95">
                            <tr class="bg-primary text-white">
                                <th rowspan="2" width="373" class="text-center">REALISASI APBD</th>
                                <th rowspan="2" width="165" class="text-center">Pagu</th>
                                <th colspan="2" width="315" class="text-center"> Realisasi Keuangan </th>
                                <th width="95" class="text-center"> Fisik (%) </th>
                            </tr>
                            <tr class="bg-primary text-white">
                                <th class="text-center"> Rp </th>
                                <th class="text-center"> % </th>
                                <th class="text-center">&nbsp;</th>
                            </tr>
                            <tr>
                                <th width="373">Belanja Operasi</th>
                                <th class="text-right"><span id="pg_bl_op"></span></th>
                                <th class="text-right"><span id="rk_keu_op_rp"></span></th>
                                <th class="text-right"><span id="rk_keu_op_per"></th>
                                <th class="text-right"><span id="rf_op"></th>
                            </tr>
                            <tr>
                                <th width="373">Belanja Modal</th>
                                <th class="text-right"><span id="pg_bl_bm"></span></th>
                                <th class="text-right"><span id="rk_keu_bm_rp"></th>
                                <th class="text-right"><span id="rk_keu_bm_per"></th>
                                <th class="text-right"><span id="rf_bm"></th>
                            </tr>
                            <tr>
                                <th width="373">Belanja Tidak Terduga</th>
                                <th class="text-right"><span id="pg_btt"></span></th>
                                <th class="text-right"><span id="rk_keu_btt_rp"></th>
                                <th class="text-right"><span id="rk_keu_btt_per"></th>
                                <th class="text-right"><span id="rf_btt"></th>
                            </tr>
                            <tr>
                                <th width="373">Belanja Transfer</th>
                                <th class="text-right"><span id="pg_bl_bt"></span></th>
                                <th class="text-right"><span id="rk_keu_bt_rp"></th>
                                <th class="text-right"><span id="rk_keu_bt_per"></th>
                                <th class="text-right"><span id="rf_bt"></th>
                            </tr>
                            <tr class="bg-warning">
                                <th width="373">Total (BO+BM+BTT+BT)</th>
                                <th class="text-right"><span id="pg_apbd"></span></th>
                                <th class="text-right"><span id="real_apbd"></th>
                                <th class="text-right"><span id="real_apbd_per"></th>
                                <th class="text-right"><span id="real_apbd_fisik"></th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group row">
                            <label for="example-month-input2" class="col-2 col-form-label">U/B</label>
                            <div class="col-10">
                                <select class="form-control custom-select" id="select_bln">
                                    <option value="">--Pilih Bulan--</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btn waves-effect waves-light btn-sm btn-success" onclick="ReloadApbd()"><i class="mdi mdi-loop"></i> Refresh</button>
                        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakApbd()"><i class="mdi mdi-printer"></i> PDF</button>
                        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakApbdExcel()"><i class="mdi mdi-printer"></i> EXCEL</button>


                    </div>
                </div>

                <hr>

                <div class="table-responsive">
                    <table id="TabelApbdAdmin" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="35%" class="text-center">SKPD</th>
                                <th width="15%" class="text-center">Pagu</th>
                                <th width="15%" class="text-center" >Realisasi Keu (Rp)</th>
                                <th width="5%" class="text-center">Realisasi Keu (%)</th>
                                <th width="5%" class="text-center">Fisik</th>
                                <th width="10%" class="text-center">Status</th>
                                <th width="10%" class="text-center">SETTING</th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show " id="profile-b1">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <div class="form-group mt-0 row">
                        <label for="example-text-input" class="col-2 col-form-label">SKPD</label>
                        <div class="col-8">
                            <select name="skpd_view" id="skpd_view" class="form-control " required data-validation-required-message="Tidak Boleh Kosong">
                                <option value="">-- Pilih SKPD --</option>
                                <?php foreach ($skpd as $u) { ?>
                                    <option value="<?php echo $u->id_unit ?>"><?php echo $u->nm_unit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="TabelPagu" class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center" width="1%">No</th>
                                    <th class="text-center" width="8%">SKPD</th>
                                    <th class="text-center" width="8%">Bulan</th>
                                    <th class="text-center" width="8%">Pagu APBD</th>
                                    <th class="text-center" width="8%">Realisasi Keu</th>
                                    <th class="text-center" width="8%">Realisasi Keu (%)</th>
                                    <th class="text-center" width="8%">Fisik (%)</th>
                                    <th class="text-center" width="8%"></th>



                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- Nav tabs -->

    </div>
</div>




<div class="modal bs-example-modal-lg" id="DetailApbd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail APBD U/B <span id="nmbln"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <h6>SKPD : <span id="NmSkpd"></span></h6>
                <table cellspacing="0" cellpadding="5" border="1" width="100%">
                    
                    <tr class="bg-primary text-white">
                        <th rowspan="2" width="373" class="text-center">REALISASI APBD</th>
                        <th rowspan="2" width="165" class="text-center">Pagu</th>
                        <th colspan="2" width="315" class="text-center"> Realisasi Keuangan </th>
                        <th rowspan="2" width="95" class="text-center"> Fisik (%) </th>
                    </tr>
                    <tr>
                        <th class="text-center bg-primary text-white"> Rp </th>
                        <th class="text-center bg-primary text-white"> % </th>
                        
                    </tr>
                    <tr>
                        <th width="373">Belanja Operasi</th>
                        <th class="text-right"><span id="pg_bl_op_detail"></span></th>
                        <th class="text-right"><span id="rk_keu_op_rp_detail"></span></th>
                        <th class="text-right"><span id="rk_keu_op_per_detail"></th>
                        <th class="text-right"><span id="rf_op_detail"></th>
                    </tr>
                    <tr>
                        <th width="373">Belanja Modal</th>
                        <th class="text-right"><span id="pg_bl_bm_detail"></span></th>
                        <th class="text-right"><span id="rk_keu_bm_rp_detail"></th>
                        <th class="text-right"><span id="rk_keu_bm_per_detail"></th>
                        <th class="text-right"><span id="rf_bm_detail"></th>
                    </tr>
                    <tr>
                        <th width="373">Belanja Tidak Terduga</th>
                        <th class="text-right"><span id="pg_btt_detail"></span></th>
                        <th class="text-right"><span id="rk_keu_btt_rp_detail"></th>
                        <th class="text-right"><span id="rk_keu_btt_per_detail"></th>
                        <th class="text-right"><span id="rf_btt_detail"></th>
                    </tr>
                    <tr>
                        <th width="373">Belanja Transfer</th>
                        <th class="text-right"><span id="pg_bl_bt_detail"></span></th>
                        <th class="text-right"><span id="rk_keu_bt_rp_detail"></th>
                        <th class="text-right"><span id="rk_keu_bt_per_detail"></th>
                        <th class="text-right"><span id="rf_bt_detail"></th>
                    </tr>
                    <tr class="bg-warning">
                        <th width="373">Total (BO+BM+BTT+BT)</th>
                        <th class="text-right"><span id="pg_apbd_detail"></span></th>
                        <th class="text-right"><span id="real_apbd_detail"></th>
                        <th class="text-right"><span id="real_apbd_per_detail"></th>
                        <th class="text-right"><span id="real_apbd_fisik_detail"></th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalApbdAdmin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnApbdAdmin"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormApbdAdmin" method="post">
                    <input type="text" hidden class="form-control" id="id_unitAdmin" name="id_unitAdmin">
                    <input type="text" hidden class="form-control" id="id_blnAdmin" name="id_blnAdmin">

                    <h4>I. Total APBD </h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Pagu APBD</label>
                                <input type="text" readonly class="form-control" id="pg_apbdAdmin" name="pg_apbdAdmin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" readonly class="form-control" id="real_apbdAdmin" name="real_apbdAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="real_apbd_perAdmin" name="real_apbd_perAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" readonly class="form-control" id="real_apbd_fisikAdmin" name="real_apbd_fisikAdmin">
                            </div>
                        </div>
                    </div>
                    <h4>II. Belanja Operasi</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_opAdmin" name="pg_bl_opAdmin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_op_rpAdmin" name="rk_keu_op_rpAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_op_perAdmin" name="rk_keu_op_perAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_opAdmin" name="rf_opAdmin">
                            </div>
                        </div>
                    </div>
                    <h4>III. Belanja Modal</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_bmAdmin" name="pg_bl_bmAdmin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_bm_rpAdmin" name="rk_keu_bm_rpAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_bm_perAdmin" name="rk_keu_bm_perAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_bmAdmin" name="rf_bmAdmin">
                            </div>
                        </div>
                    </div>
                    <h4>IV. Belanja Tidak Terduga</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bttAdmin" name="pg_bttAdmin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_btt_rpAdmin" name="rk_keu_btt_rpAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_btt_perAdmin" name="rk_keu_btt_perAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_bttAdmin" name="rf_bttAdmin">
                            </div>
                        </div>
                    </div>
                    <h4>V. Belanja Transfer</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_btAdmin" name="pg_bl_btAdmin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_bt_rpAdmin" name="rk_keu_bt_rpAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_bt_perAdmin" name="rk_keu_bt_perAdmin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_btAdmin" name="rf_btAdmin">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn waves-effect waves-light btn-success">Simpan</button>
                        <button type="reset" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- /.modal -->