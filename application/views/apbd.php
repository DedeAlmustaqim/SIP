<div class="row">
    <div class="col-12">
        <div class="alert alert-info alert-rounded text-center">
            <span id="jadwalinput" class="text-warning"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-body">
        <div class="card-box">
            <h3 class="text-center">TABEL REALISASI KEUANGAN DAN FISIK APBD <?php echo $this->session->userdata('ses_nm_unit') ?></h3>
            <h4 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata('ta') ?></h3>
                <hr>
                
                <input type="text" hidden id="unit_apbd" class="get_apbd" value="<?php echo $this->session->userdata('ses_id_unit') ?>">
                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">
                        <h5>Data Bulan </h5>
                    </label>
                    <div class="col-sm-3">
                        <select class="custom-select get_apbd" id="bln_apbd">
                            <?php
                            foreach ($bln as $bl) {
                            ?>
                                <option value="<?php echo $bl->id_bln ?>" <?php if ($bl->aktif == 1) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $bl->nm_bln ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div id="BtnNavigasiApbd"></div>
                    </div>

                </div>
                <div class="form-group row">

                    <div class="col-8">

                        <table cellspacing="0"  width="100%" class="table table-striped table-bordered wy-table-bordered-all">
                            <tr class="bg-primary text-white">
                                <th rowspan="2" width="35%" class="text-center">Keterangan</th>
                                <th rowspan="2" width="20%" class="text-center">Pagu</th>
                                <th colspan="2" width="20%" class="text-center"> Realisasi Keuangan </th>
                                <th rowspan="2" width="15%" class="text-center"> Fisik (%) </th>
                            </tr>
                            <tr>
                                <th width="20%" class="text-center bg-primary text-white"> Rp </th>
                                <th width="15%" class="text-center bg-primary text-white"> % </th>

                            </tr>
                            <tr>
                                <th>Belanja Operasi</th>
                                <th class="text-right"><span id="pg_bl_op_detail"></span></th>
                                <th class="text-right bg-warning"><span id="rk_keu_op_rp_detail"></span></th>
                                <th class="text-right"><span id="rk_keu_op_per_detail"></th>
                                <th class="text-right"><span id="rf_op_detail"></th>
                            </tr>
                            <tr>
                                <th>Belanja Modal</th>
                                <th class="text-right"><span id="pg_bl_bm_detail"></span></th>
                                <th class="text-right bg-warning"><span id="rk_keu_bm_rp_detail"></th>
                                <th class="text-right"><span id="rk_keu_bm_per_detail"></th>
                                <th class="text-right"><span id="rf_bm_detail"></th>
                            </tr>
                            <tr>
                                <th>Belanja Tidak Terduga</th>
                                <th class="text-right"><span id="pg_btt_detail"></span></th>
                                <th class="text-right bg-warning"><span id="rk_keu_btt_rp_detail"></th>
                                <th class="text-right"><span id="rk_keu_btt_per_detail"></th>
                                <th class="text-right"><span id="rf_btt_detail"></th>
                            </tr>
                            <tr>
                                <th>Belanja Transfer</th>
                                <th class="text-right"><span id="pg_bl_bt_detail"></span></th>
                                <th class="text-right bg-warning"><span id="rk_keu_bt_rp_detail"></th>
                                <th class="text-right"><span id="rk_keu_bt_per_detail"></th>
                                <th class="text-right"><span id="rf_bt_detail"></th>
                            </tr>
                            <tr class="bg-warning">
                                <th>Total (BO+BM+BTT+BT)</th>
                                <th class="text-right"><span id="pg_apbd_detail"></span></th>
                                <th class="text-right"><span id="real_apbd_detail"></th>
                                <th class="text-right"><span id="real_apbd_per_detail"></th>
                                <th class="text-right"><span id="real_apbd_fisik_detail"></th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <h6 class="card-title">PROGRESS REALISASI APBD <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                        <div>
                            <canvas id="grafik_apbd_modul" height="200px"></canvas>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalApbd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnApbd"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body bg">
                <div class="float-right" id="BtnCopy"></div>
                <br>
                <form class="m-t-0" novalidate="" id="FormApbd" method="post">
                    <input type="text" hidden class="form-control" id="id_unit" name="id_unit">
                    <input type="text" hidden class="form-control" id="id_bln" name="id_bln">

                    <h6>I. Total APBD </h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Pagu APBD</label>
                                <input type="text" readonly class="form-control" id="pg_apbd" name="pg_apbd">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" readonly class="form-control" id="real_apbd" name="real_apbd">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control decimal" id="real_apbd_per" name="real_apbd_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" readonly class="form-control decimal" id="real_apbd_fisik" name="real_apbd_fisik">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>II. Belanja Operasi</h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_op" name="pg_bl_op">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_op_rp" name="rk_keu_op_rp">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="decimal form-control" id="rk_keu_op_per" name="rk_keu_op_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_op" name="rf_op">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h6>III. Belanja Modal</h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_bm" name="pg_bl_bm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_bm_rp" name="rk_keu_bm_rp">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_bm_per" name="rk_keu_bm_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_bm" name="rf_bm">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h6>IV. Belanja Tidak Terduga</h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_btt" name="pg_btt">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_btt_rp" name="rk_keu_btt_rp">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_btt_per" name="rk_keu_btt_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_btt" name="rf_btt">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h6>V. Belanja Transfer</h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Pagu</label>
                                <input type="text" class="form-control sumapbd rp" id="pg_bl_bt" name="pg_bl_bt">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control apbd_real rp" id="rk_keu_bt_rp" name="rk_keu_bt_rp">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="rk_keu_bt_per" name="rk_keu_bt_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control decimal" id="rf_bt" name="rf_bt">
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