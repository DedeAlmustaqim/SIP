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
            <h3 class="text-center">DANA ALOKASI KHUSUS ( DAK ) <?php echo $this->session->userdata('ses_nm_unit') ?></h3>
            <h4 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata('ta') ?></h4>
            <hr>

            <div class="form-group row">
                <label class="col-sm-1 col-form-label">
                    <h5>Data Bulan </h5>
                </label>
                <div class="col-sm-3">
                    <select class="custom-select" id="bln_dak_fisik_admin">
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
                <div class="col-sm-6">
                    <span id="BtnDakFisikAdmin"></span>
                    <span id="BtnDakNonFisikAdmin"></span>
                    <a href="<?php echo base_url()?>admin/dak/kegiatan"  class="btn waves-effect waves-light  btn-info" >+ Kegiatan</a>

                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <table width="100%" class="table table-bordered">
                        <thead>
                            <tr class="text-center text-white bg-info">
                                <td rowspan="3" width="2%">NO.</td>
                                <td rowspan="3" width="523">UB BIDANG/KEGIATAN</td>
                                </td>
                                <td height="24%" colspan="4">PERENCANAAN KEGIATAN</td>
                                <td colspan="5">MEKANISME PELAKSANAAN</td>
                                <td colspan="3">REALISASI</td>
                                <td rowspan="3" width="5%">Kodefikasi /Keterangan Permasalahan</td>
                                <td rowspan="3" width="5%">AKSI</td>
                            </tr>
                            <tr class="text-center text-white bg-info">
                                <td width="3%" rowspan="2">Volume</td>
                                <td width="3%" rowspan="2">Satuan</td>
                                <td rowspan="2" width="5%">Jumlah Penerima Manfaat </td>
                                <td rowspan="2" width="9%"> Pagu DAK Fisik (Rp) </td>
                                <td height="24%" colspan="2">Swakelola</td>
                                <td colspan="2">Kontraktual</td>
                                <td rowspan="2" width="8%">Metode Pembayaran</td>
                                <td width="9%" rowspan="2">Keuangan</td>
                                <td width="1%" rowspan="2">%</td>
                                <td width="2%" rowspan="2">Fisik (%)</td>
                            </tr>
                            <tr class="text-center text-white bg-info">
                                <td width="4%" height="52%">Volume</td>
                                <td width="2%">Nilai (Rp)</td>
                                <td width="3%">Volume</td>
                                <td width="2%">Nilai (Rp)</td>
                            </tr>
                        </thead>
                        <tbody id="show_dak_fisik_admin"></tbody>
                        <tbody id="show_dak_non_fisik_admin"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal Dak Fisik -->
<div class="modal bs-example-modal-lg" id="ModalDakFisik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnDakFisik"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body bg">

                <form class="m-t-0" novalidate="" id="FormDakFisikInput" method="post">
                    <input type="text" hidden class="form-control" id="id_dak_fisik" name="id_dak_fisik">
                    <div class="row show-grid">
                        <div class="col-md-12">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Kegiatan</label>
                                <input type="text" readonly class="form-control" id="keg_fisik" name="keg_fisik">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h6>PERENCANAAN KEGIATAN </h6>
                    <div class="row show-grid">
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Volume</label>
                                <input type="text" class="form-control" id="per_vol_fisik" name="per_vol_fisik">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Satuan</label>
                                <input type="text" class="form-control" id="per_satuan_fisik" name="per_satuan_fisik">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Jumlah Penerima Manfaat </label>
                                <input type="text" class="form-control " id="per_jlm_penerima_fisik" name="per_jlm_penerima_fisik">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Pagu DAK Fisik (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="pagu_fisik" name="pagu_fisik">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>MEKANISME PELAKSANAAN </h6>
                    <div class="row show-grid">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Jenis Mekanisme Pelaksanaan</label>

                            <div class="form-group has-success">
                                <select class="custom-select" id="jns_mekanisme_fisik" name="jns_mekanisme_fisik">
                                    <option value="">--Pilih--</option>
                                    <option value="Swakelola">Swakelola</option>
                                    <option value="Kontraktual">Kontraktual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" hidden class="form-control" id="mek_metode_fisik" name="mek_metode_fisik">
                        </div>
                    </div>
                    <div class="row show-grid">
                        <div class="col-md-6">
                            <h4>Swakelola</h4>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Volume</label>
                                    <input type="text" class="form-control cek_mekanisme" id="mek_vol_swa_fisik" name="mek_vol_swa_fisik">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Nilai (Rp)</label>
                                    <input type="text" class="form-control rp cek_mekanisme" id="mek_nilai_swa_fisik" name="mek_nilai_swa_fisik">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Kontraktual</h4>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Volume</label>
                                    <input type="text" class="form-control cek_mekanisme" id="mek_vol_kon_fisik" name="mek_vol_kon_fisik">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Nilai (Rp)</label>
                                    <input type="text" class="form-control rp cek_mekanisme" id="mek_nilai_kon_fisik" name="mek_nilai_kon_fisik">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h6>REALISASI </h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Keuangan (Rp)</label>

                            <div class="form-group has-success">
                                <input type="text" class="form-control rp" id="real_keu_fisik" name="real_keu_fisik">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Keu (%)</label>

                            <div class="form-group has-success">
                                <input type="text" readonly class="form-control decimal" id="real_keu_per_fisik" name="real_keu_per_fisik">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Fisik (%)</label>

                            <div class="form-group has-success">
                                <input type="text" class="form-control decimal" id="real_fik_fisik" name="real_fik_fisik">
                            </div>
                        </div>
                    </div>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Kodefikasi</label>

                            <div class="form-group has-success">
                                <textarea cols="80" id="kodefikasi_fisik" name="kodefikasi_fisik"></textarea>
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

<!-- Modal Dak Non Fisik -->
<div class="modal bs-example-modal-lg" id="ModalDakNonFisik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnDakNonFisik"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body bg">

                <form class="m-t-0" novalidate="" id="FormDakNonFisikInput" method="post">
                    <input type="text" hidden class="form-control" id="id_dak_non_fisik" name="id_dak_non_fisik">
                    <div class="row show-grid">
                        <div class="col-md-12">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Kegiatan</label>
                                <input type="text" readonly class="form-control" id="keg_non_fisik" name="keg_non_fisik">
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h6>PERENCANAAN KEGIATAN </h6>
                    <div class="row show-grid">
                        <div class="col-md-2">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Volume</label>
                                <input type="text" class="form-control" id="per_vol_non_fisik" name="per_vol_non_fisik">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Satuan</label>
                                <input type="text" class="form-control" id="per_satuan_non_fisik" name="per_satuan_non_fisik">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-success">
                                <label for="exampleInputEmail1">Jumlah Penerima Manfaat </label>
                                <input type="text" class="form-control " id="per_jlm_penerima_non_fisik" name="per_jlm_penerima_non_fisik">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-warning">
                                <label for="exampleInputEmail1">Pagu DAK Fisik (Rp)</label>
                                <input type="text" readonly class="form-control rp" id="pagu_non_fisik" name="pagu_non_fisik">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>MEKANISME PELAKSANAAN </h6>
                    <div class="row show-grid">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Jenis Mekanisme Pelaksanaan</label>

                            <div class="form-group has-success">
                                <select class="custom-select" id="jns_mekanisme_non_fisik" name="jns_mekanisme_non_fisik">
                                    <option value="">--Pilih--</option>
                                    <option value="Swakelola">Swakelola</option>
                                    <option value="Kontraktual">Kontraktual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" hidden class="form-control" id="mek_metode_non_fisik" name="mek_metode_non_fisik">
                        </div>
                    </div>
                    <div class="row show-grid">
                        <div class="col-md-6">
                            <h4>Swakelola</h4>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Volume</label>
                                    <input type="text" class="form-control cek_mekanisme" id="mek_vol_swa_non_fisik" name="mek_vol_swa_non_fisik">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Nilai (Rp)</label>
                                    <input type="text" class="form-control rp cek_mekanisme" id="mek_nilai_swa_non_fisik" name="mek_nilai_swa_non_fisik">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Kontraktual</h4>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Volume</label>
                                    <input type="text" class="form-control cek_mekanisme" id="mek_vol_kon_non_fisik" name="mek_vol_kon_non_fisik">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label for="exampleInputEmail1">Nilai (Rp)</label>
                                    <input type="text" class="form-control rp cek_mekanisme" id="mek_nilai_kon_non_fisik" name="mek_nilai_kon_non_fisik">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <h6>REALISASI </h6>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Keuangan (Rp)</label>

                            <div class="form-group has-success">
                                <input type="text" class="form-control rp" id="real_keu_non_fisik" name="real_keu_non_fisik">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Keu (%)</label>

                            <div class="form-group has-success">
                                <input type="text" readonly class="form-control decimal" id="real_keu_per_non_fisik" name="real_keu_per_non_fisik">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Fisik (%)</label>

                            <div class="form-group has-success">
                                <input type="text" class="form-control decimal" id="real_fik_non_fisik" name="real_fik_non_fisik">
                            </div>
                        </div>
                    </div>
                    <div class="row show-grid">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Kodefikasi</label>

                            <div class="form-group has-success">
                                <textarea cols="80" id="kodefikasi_non_fisik" name="kodefikasi_non_fisik"></textarea>
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