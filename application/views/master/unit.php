<div class="card border-info">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4>
    </div>
    <div class="card-body">
        <?php
        $akses = $this->session->userdata('akses');
        if ($akses == 1) { ?>
            <button type="button" onClick="TambahSkpd(this)" data-akses="<?php echo $this->session->userdata('akses') ?>" class="btn btn-default">+ SKPD</button>
            <a href="<?php echo base_url() ?>master/cetak_sinkron" target="_blank" class="btn btn-primary">Cetak Data Sinkron</a>
        <?php }
        ?>
        <div class="table-responsive">
            <table id="TabelUnit" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">NO</th>
                        <th width="25%" class="text-center">SKPD</th>
                        <th width="25%" class="text-center">PIMPINAN</th>
                        <th width="10%" class="text-center">SINKRON</th>
                        <th width="10%" class="text-center">DAK FISIK</th>
                        <th width="25%" class="text-center">SETTING</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalSkpd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h4 id="NmSkpd"></h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="m-t-0" novalidate="" id="FormSkpd" method="post">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">SKPD</label>
                                <div class="col-8">
                                    <input class="form-control" hidden type="text" id="id_unit" name="id_unit" id="example-text-input">
                                    <input class="form-control" type="text" id="skpd" name="skpd" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">Nama Pimpinan</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="pimpinan" name="pimpinan" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">Status Kepala</label>
                                <div class="col-6">
                                    <select class="form-control" name="stts_pimpinan" id="stts_pimpinan">
                                        <option value="">--Pilih--</option>
                                        <option value="Kepala">Pengguna Anggaran (Kepala)</option>
                                        <option value="Plt">Pelaksana Tugas (Plt)</option>
                                        <option value="Plh">Pelaksana Harian (Plh)</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">NIP</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="nip" name="nip" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-month-input2" class="col-2 col-form-label">Jabatan</label>
                                <div class="col-5">
                                    <select class="custom-select col-12" id="gol" name="gol">
                                        <option selected="">Pilih</option>
                                        <option selected="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                                        <option selected="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                                        <option selected="Pembina Tingkat I (IV/b)">Pembina Tingkat I (IV/b)</option>
                                        <option selected="Pembina (IV/a)">Pembina (IV/a)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-3 col-form-label">Ditandatangani oleh</label>
                                <div class="col-8">
                                    <textarea class="form-control" rows="5" id="ttd" name="ttd"></textarea>
                                </div>

                            </div>
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
<!-- /.modal -->

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalTambahSkpd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h4 id="NmBln"></h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="m-t-0" novalidate="" id="FormTambahSkpd" method="post">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">SKPD</label>
                                <div class="col-8">
                                    <input class="form-control" hidden type="text" id="id_unit" name="id_unit" id="example-text-input">
                                    <input class="form-control" type="text" id="skpd" name="skpd" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">Nama Pimpinan</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="pimpinan" name="pimpinan" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">Status Kepala</label>
                                <div class="col-6">
                                    <select class="form-control" name="stts_pimpinan" id="stts_pimpinan">
                                        <option value="">--Pilih--</option>
                                        <option value="Kepala">Pengguna Anggaran (Kepala)</option>
                                        <option value="Plt">Pelaksana Tugas (Plt)</option>
                                        <option value="Plh">Pelaksana Harian (Plh)</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">NIP</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" id="nip" name="nip" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-month-input2" class="col-2 col-form-label">Jabatan</label>
                                <div class="col-5">
                                    <select class="custom-select col-12" id="gol" name="gol">
                                        <option selected="">Pilih</option>
                                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                                        <option value="Pembina Tingkat I (IV/b)">Pembina Tingkat I (IV/b)</option>
                                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn waves-effect waves-light btn-success">Simpan</button>
                        <button type="reset" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalSetUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h4 id="NmSkpdUser"></h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <table id="TabelUser" class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">NO</th>
                            <th width="25%" class="text-center">USERNAME</th>
                            <th width="25%" class="text-center">SETTING</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalTambahUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h4 id="NmSkpdTambah"></h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="m-t-0" novalidate="" id="FormTambahUser" method="post">
                    <div class="card">
                        <div class="card-body">
                            <input class="form-control" type="text" id="id_unit_user" hidden name="id_unit_user" required data-validation-required-message="Tidak Boleh Kosong">


                            <div class="form-group mt-0 row">
                                <label for="example-text-input" class="col-2 col-form-label">Username</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="username" name="username" required data-validation-required-message="Tidak Boleh Kosong">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn waves-effect waves-light btn-success">Simpan</button>
                        <button type="reset" class="btn waves-effect waves-light btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalPagu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h4 id="NmSkpdPagu"></h4>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?php $akses = $this->session->userdata('akses'); ?>
            <div class="modal-body">
                <form role="form" id="FormPagu" class="form-horizontal">
                    <input type="text" hidden id="id_unit_pg" name="id_unit_pg" class="form-control">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Total</label>
                        <div class="col-sm-6">
                            <input type="text" readonly id="pg_apbd_pg" name="pg_apbd_pg" class="form-control rp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Belanja Operasi</label>
                        <div class="col-sm-6">
                            <input type="text" <?php if ($akses == 3) echo "readonly"; ?> id="pg_bl_op_pg" name="pg_bl_op_pg" class="form-control pg rp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Belanja Modal</label>
                        <div class="col-sm-6">
                            <input type="text" <?php if ($akses == 3) echo "readonly"; ?> id="pg_bl_bm_pg" name="pg_bl_bm_pg" class="form-control pg rp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Belanja Tidak Terduga</label>
                        <div class="col-sm-6">
                            <input type="text" <?php if ($akses == 3) echo "readonly"; ?> id="pg_btt_pg" name="pg_btt_pg" class="form-control pg rp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Belanja Transfer</label>
                        <div class="col-sm-6">
                            <input type="text" <?php if ($akses == 3) echo "readonly"; ?> id="pg_bt_pg" name="pg_bt_pg" class="form-control rp pg">
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