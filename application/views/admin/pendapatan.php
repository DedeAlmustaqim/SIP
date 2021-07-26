<div class="card">
    <div class="card-header">
        <h4>PENDAPATAN KABUPATEN BARITO TIMUR TA <?php echo $this->session->userdata('ta') ?></h4> <!-- Nav tabs -->
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
                        <div class="table-responsive">
                            <table width="90%" cellpadding="2" cellspacing="0" border="1">

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
                                    <td class="text-right"><span id="pad_target"></span></td>
                                    <td class="text-right"><span id="pad_real"></span></td>
                                    <td class="text-right"><span id="pad_real_per"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td colspan="4"><b>PENDAPATAN TRANSFER</b></td>

                                </tr>
                                <tr>
                                    <td class="text-center">-</td>
                                    <td>TRANSFER PUSAT</td>
                                    <td class="text-right"><span id="tp_target"></span></td>
                                    <td class="text-right"><span id="tp_keu"></span></td>
                                    <td class="text-right"><span id="tp_per"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">-</td>
                                    <td>TRANSFER ANTAR DAERAH</td>
                                    <td class="text-right"><span id="tad_target"></span></td>
                                    <td class="text-right"><span id="tad_keu"></span></td>
                                    <td class="text-right"><span id="tad_per"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td><b>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</b></td>
                                    <td class="text-right"><span id="pad_sah_target"></span></td>
                                    <td class="text-right"><span id="pad_sah_keu"></span></td>
                                    <td class="text-right"><span id="pad_sah_per"></span></td>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-center ">4</td>
                                    <td><b>TARGET TOTAL</b></td>
                                    <td class="text-right"><span id="target_total"></span></td>
                                    <td class="text-right"><span id="keu_total"></span></td>
                                    <td class="text-right"><span id="keu_per_total"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group row">
                            <label for="example-month-input2" class="col-2 col-form-label">U/B</label>
                            <div class="col-10">
                                <select class="form-control custom-select" id="BlnPd">
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
                        <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakPd()"><i class="mdi mdi-printer"></i> PDF</button>
                        <!-- <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakApbdExcel()"><i class="mdi mdi-printer"></i> EXCEL</button> -->


                    </div>
                </div>

                <hr>

                <div class="table-responsive">
                    <div class="table-responsive">
                        <table id="TabelPdAdmin" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="5%">NO</th>
                                    <th width="60%">BULAN</th>
                                    <th width="10%">TARGET TOTAL (Rp)</th>
                                    <th width="10%">REALISASI (Rp)</th>
                                    <th width="5%">(%)</th>
                                    <th></th>
                                </tr>


                            </thead>
                        </table>
                    </div>
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




<div class="modal bs-example-modal-lg" id="DetailPd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail APBD U/B <span id="NmBlnPd"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h6>SKPD : <span id="NmSkpdPd"></span></h6>
                <table width="100%" cellpadding="2" cellspacing="0" border="1">

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
<div class="modal bs-example-modal-lg" id="ModalPdAdmin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnPdAdmin"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="m-t-0" novalidate="" id="FormPdAdmin" method="post">
                    <input type="text" hidden class="form-control" id="id_unit_pd_admin" name="id_unit_pd_admin">
                    <input type="text" hidden class="form-control" id="id_bln_pd_admin" name="id_bln_pd_admin">

                    <h4>TOTAL PENDAPATAN </h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">TARGET TOTAL (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="target_total_admin" name="target_total_admin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="keu_total_admin" name="keu_total_admin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control rp" id="keu_per_total_admin" name="keu_per_total_admin">
                            </div>
                        </div>

                    </div>
                    <h4>PENDAPATAN ASLI DAERAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="pad_target_admin" name="pad_target_admin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="pad_real_admin" name="pad_real_admin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="pad_real_per_admin" name="pad_real_per_admin">
                            </div>
                        </div>

                    </div>

                    <h4>TRANSFER PUSAT</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="tp_target_admin" name="tp_target_admin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="tp_keu_admin" name="tp_keu_admin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="tp_per_admin" name="tp_per_admin">
                            </div>
                        </div>

                    </div>

                    <h4>TRANSFER ANTAR DAERAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="tad_target_admin" name="tad_target_admin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="tad_keu_admin" name="tad_keu_admin">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control" id="tad_per_admin" name="tad_per_admin">
                            </div>
                        </div>

                    </div>

                    <h4>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</h4>
                    <hr>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">TARGET (Rp)</label>
                                <input type="text" class="form-control rp sumpd" id="pad_sah_target_admin" name="pad_sah_target_admin">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Real. Keu (Rp)</label>
                                <input type="text" class="form-control rp keu" id="pad_sah_keu_admin" name="pad_sah_keu_admin"_admin>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Real. Keu (%)</label>
                                <input type="text" readonly class="form-control rp" id="pad_sah_per_admin" name="pad_sah_per_admin">
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