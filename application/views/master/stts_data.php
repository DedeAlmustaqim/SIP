<div class="card">
    <div class="card-header">
        <h4>KABUPATEN BARITO TIMUR TA <?php echo $this->session->userdata('ta') ?></h4> <!-- Nav tabs -->
    </div>
    <div class="card-body">
        <!-- Nav tabs -->
        <div class="row">

            <div class="col-md-4">

                <div class="form-group row">
                    <label for="example-month-input2" class="col-2 col-form-label">U/B</label>
                    <div class="col-10">
                        <select class="form-control custom-select" id="bln_status">
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

                <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakSttsData()"><i class="mdi mdi-printer"></i> Cetak</button>


            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table id="TabelDataStatus" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="1%" class="text-center">No</th>
                        <th width="25%" class="text-center">SKPD</th>
                        <th width="12%" class="text-center">APBD</th>
                        <th width="12%" class="text-center">PPBJ Rp 50 jt s/d Rp 200 jt</th>
                        <th width="12%" class="text-center">PPBJ Rp 200 jt s/d Rp 2,5 M</th>
                        <th width="12%" class="text-center">PPBJ Rp 2,5 M s/d Rp 5 M</th>
                        <th width="12%" class="text-center">Pendapatan</th>

                    </tr>

                </thead>
            </table>
        </div>
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
                <table cellspacing="0" cellpadding="5" border="1" width="100%">
                    <col width="373">
                    <col width="165">
                    <col width="165">
                    <col width="150">
                    <col width="95">
                    <tr>
                        <th rowspan="2" width="373" class="text-center">REALISASI APBD</th>
                        <th rowspan="2" width="165" class="text-center">Pagu</th>
                        <th colspan="2" width="315" class="text-center"> Realisasi Keuangan </th>
                        <th width="95" class="text-center"> Fisik (%) </th>
                    </tr>
                    <tr>
                        <th class="text-center"> Rp </th>
                        <th class="text-center"> % </th>
                        <th class="text-center">&nbsp;</th>
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
                    <tr>
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
<div class="modal bs-example-modal-lg" id="ModalApbd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnApbd"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormApbd" method="post">
                    <input type="text" hidden class="form-control" id="id_unit" name="id_unit">
                    <input type="text" hidden class="form-control" id="id_bln" name="id_bln">

                    <h4>I. Total APBD </h4>
                    <hr>
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
                                <input type="text" readonly class="form-control" id="real_apbd_per" name="real_apbd_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" readonly class="form-control" id="real_apbd_fisik" name="real_apbd_fisik">
                            </div>
                        </div>
                    </div>
                    <h4>II. Belanja Operasi</h4>
                    <hr>
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
                                <input type="text" readonly class="form-control" id="rk_keu_op_per" name="rk_keu_op_per">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Fisik (%)</label>
                                <input type="text" class="form-control" id="rf_op" name="rf_op">
                            </div>
                        </div>
                    </div>
                    <h4>III. Belanja Modal</h4>
                    <hr>
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
                                <input type="text" class="form-control" id="rf_bm" name="rf_bm">
                            </div>
                        </div>
                    </div>
                    <h4>IV. Belanja Tidak Terduga</h4>
                    <hr>
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
                                <input type="text" class="form-control" id="rf_btt" name="rf_btt">
                            </div>
                        </div>
                    </div>
                    <h4>V. Belanja Transfer</h4>
                    <hr>
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
                                <input type="text" class="form-control" id="rf_bt" name="rf_bt">
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