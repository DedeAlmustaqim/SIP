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
            <h3 class="text-center">TABEL REALISASI PENERIMAAN PENDAPATAN <?php echo $this->session->userdata('ses_nm_unit') ?></h3>
            <h4 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata('ta') ?></h3>
                <hr>

                <input type="text"  hidden id="unit_pd" value="<?php echo $this->session->userdata('ses_id_unit') ?>">
                <div class="form-group row">
                    <label class="col-sm-1 col-form-label">
                        <h5>Data Bulan </h5>
                    </label>
                    <div class="col-sm-3">
                        <select class="custom-select get_apbd" id="bln_pd">
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
                        <div id="BtnNavigasiPd"></div>
                    </div>

                </div>
                <div class="form-group row">

                    <div class="col-8">

                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered">

                                <tr class="text-center bg-primary text-white">
                                    <td width="5%"><b>NO</b></td>
                                    <td width="30%"><b>KETERANGAN</b></td>
                                    <td width="20%"><b>PAGU</b></td>
                                    <td width="20%"><b>REALISASI</b></td>
                                    <td width="11%"><b>%</b></td>
                                </tr>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><b>PENDAPATAN ASLI DAERAH</b></td>
                                    <td class="text-right"><span id="pad_target_detail"></span></td>
                                    <td class="text-right"><span id="pad_real_detail"></span></td>
                                    <td class="text-right"><span id="pad_real_per_detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td colspan="4"><b>PENDAPATAN TRANSFER</b></td>

                                </tr>
                                <tr>
                                    <td class="text-center">-</td>
                                    <td>TRANSFER PUSAT</td>
                                    <td class="text-right"><span id="tp_target_detail"></span></td>
                                    <td class="text-right"><span id="tp_keu_detail"></span></td>
                                    <td class="text-right"><span id="tp_per_detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">-</td>
                                    <td>TRANSFER ANTAR DAERAH</td>
                                    <td class="text-right"><span id="tad_target_detail"></span></td>
                                    <td class="text-right"><span id="tad_keu_detail"></span></td>
                                    <td class="text-right"><span id="tad_per_detail"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td><b>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</b></td>
                                    <td class="text-right"><span id="pad_sah_target_detail"></span></td>
                                    <td class="text-right"><span id="pad_sah_keu_detail"></span></td>
                                    <td class="text-right"><span id="pad_sah_per_detail"></span></td>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-center ">4</td>
                                    <td><b>TARGET TOTAL</b></td>
                                    <td class="text-right"><span id="target_total_detail"></span></td>
                                    <td class="text-right"><span id="keu_total_detail"></span></td>
                                    <td class="text-right"><span id="keu_per_total_detail"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <h6 class="card-title">PROGRESS REALISASI PENDAPATAN <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                        <div>
                            <canvas id="grafik_pd_modul" height="200px"></canvas>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalPd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnPd"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormPd" method="post">
                    <input type="text" hidden class="form-control" id="id_unit_pd" name="id_unit_pd">
                    <input type="text" hidden class="form-control" id="id_bln_pd" name="id_bln_pd">

                    <h4>TOTAL PENDAPATAN </h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">TARGET TOTAL (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="target_total" name="target_total">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="keu_total" name="keu_total">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control rp" id="keu_per_total" name="keu_per_total">
                            </div>
                        </div>

                    </div>
                    <h4>PENDAPATAN ASLI DAERAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="pad_target" name="pad_target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="pad_real" name="pad_real">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="pad_real_per" name="pad_real_per">
                            </div>
                        </div>

                    </div>

                    <h4>TRANSFER PUSAT</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="tp_target" name="tp_target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="tp_keu" name="tp_keu">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="tp_per" name="tp_per">
                            </div>
                        </div>

                    </div>

                    <h4>TRANSFER ANTAR DAERAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="tad_target" name="tad_target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="tad_keu" name="tad_keu">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="tad_per" name="tad_per">
                            </div>
                        </div>

                    </div>

                    <h4>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="pad_sah_target" name="pad_sah_target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="pad_sah_keu" name="pad_sah_keu">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control rp" id="pad_sah_per" name="pad_sah_per">
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