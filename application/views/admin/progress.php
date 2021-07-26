<div class="card">
    <div class="card-header">
        <h4>PROGRESS REALISASI PER SKPD <?php echo $this->session->userdata('ta') ?></h4> <!-- Nav tabs -->
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="example-month-input2" class="col-1 col-form-label">U/B</label>
                    <div class="col-2">
                        <select class="form-control custom-select" id="BlnPorgress">
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

                <div class="form-group mt-0 row">
                    <label for="example-text-input" class="col-1 col-form-label">SKPD</label>
                    <div class="col-8">
                        <select name="skpd_view" id="SkpdProgress" class="form-control custom-select" required data-validation-required-message="Tidak Boleh Kosong">
                            <option value="">-- Pilih SKPD --</option>
                            <?php foreach ($skpd as $u) { ?>
                                <option value="<?php echo $u->id_unit ?>"><?php echo $u->nm_unit ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>