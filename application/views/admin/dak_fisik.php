<div class="card">
    <div class="card-header">
        <h4><?php echo $judul ?> KABUPATEN BARITO TIMUR TA <?php echo $this->session->userdata('ta') ?></h4> <!-- Nav tabs -->
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs tabs-bordered">
            <li class="nav-item">
                <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER
                </a>
            </li>
            <li class="nav-item">
                <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
                    DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="home-b1">
                <div class="row">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ModalDakFisikKeg">+ Kegiatan</button>
                    <hr>

                    <div class="table-responsive m-t-10">
                        <table id="TabelDakFisikKeg" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="5%" class="text-center">SKPD</th>
                                    <th width="35%" class="text-center">NAMA KEGIATAN</th>
                                    <th width="15%" class="text-center">PAGU</th>
                                    <th width="10%" class="text-center">SETTING</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade show " id="profile-b1">
            <div class="row">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ModalDakNonFisikKeg">+ Kegiatan</button>
                    <hr>

                    <div class="table-responsive m-t-10">
                        <table id="TabelDakNonFisikKeg" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="5%" class="text-center">SKPD</th>
                                    <th width="35%" class="text-center">NAMA KEGIATAN</th>
                                    <th width="15%" class="text-center">PAGU</th>
                                    <th width="10%" class="text-center">SETTING</th>
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


<div class="modal bs-example-modal-lg" id="ModalDakFisikKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Kegiatan DAK FISIK <span id="nmbln"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="FormDakFisikAdmin" class="form-validation" novalidate="">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">SKPD</label>
                        <div class="col-sm-8">
                            <select name="id_unit_fisik" id="id_unit_fisik" class="custom-select" required data-validation-required-message="Tidak Boleh Kosong">
                                <option value="">-- Pilih SKPD --</option>
                                <?php foreach ($skpd as $u) { ?>
                                    <option value="<?php echo $u->id_unit ?>"><?php echo $u->nm_unit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="keg_fisik" id="keg_fisik"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Dak Fisik</label>
                        <div class="col-sm-8">
                            <input type="text" id="pagu_dak_fisik" name="pagu_dak_fisik" class="form-control rp">
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

<div class="modal bs-example-modal-lg" id="ModalEditDakFisikKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="FormEditDakFisik" class="form-validation" novalidate="">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">SKPD</label>
                        <div class="col-sm-8">
                            <select name="id_unit_fisik_edit" id="id_unit_fisik_edit" class="custom-select" required data-validation-required-message="Tidak Boleh Kosong">
                                <option value="">-- Pilih SKPD --</option>
                                <?php foreach ($skpd as $u) { ?>
                                    <option value="<?php echo $u->id_unit ?>"><?php echo $u->nm_unit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="keg_fisik_edit" id="keg_fisik_edit"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Dak Fisik</label>
                        <div class="col-sm-8">
                            <input type="text" id="pagu_dak_fisik_edit" name="pagu_dak_fisik_edit" class="form-control rp">
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


<div class="modal bs-example-modal-lg" id="ModalDakNonFisikKeg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Kegiatan DAK FISIK <span id="nmbln"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form" id="FormDakNonFisikAdmin" class="form-validation" novalidate="">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">SKPD</label>
                        <div class="col-sm-8">
                            <select name="id_unit_non_fisik" id="id_unit_non_fisik" class="custom-select" required data-validation-required-message="Tidak Boleh Kosong">
                                <option value="">-- Pilih SKPD --</option>
                                <?php foreach ($skpd as $u) { ?>
                                    <option value="<?php echo $u->id_unit ?>"><?php echo $u->nm_unit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Kegiatan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="keg_non_fisik" id="keg_non_fisik"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="example-input-normal">Pagu Dak Fisik</label>
                        <div class="col-sm-8">
                            <input type="text" id="pagu_dak_non_fisik" name="pagu_dak_non_fisik" class="form-control rp">
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