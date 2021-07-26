<div class="row">
    <div class="col-sm-6">
        <div class="card-box">
            <h2 class="m-t-0  header-title">LAPORAN APBD</h2>


            <div class="form-group row">
                <label for="example-month-input2" class="col-2 col-form-label">Bulan</label>
                <div class="col-10">
                    <select class="form-control custom-select" id="blnapbd">
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
            <button type="button" class="btn btn-primary " onclick="LapApbd(this)" data-id="<?php echo $this->session->userdata('ses_id_unit')?>">CETAK</button>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card-box">
            <h2 class="m-t-0  header-title">LAPORAN PENDAPATAN</h2>


            <div class="form-group row">
                <label for="example-month-input2" class="col-2 col-form-label">Bulan</label>
                <div class="col-10">
                    <select class="form-control custom-select" id="blnpd">
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
            <button type="button" class="btn btn-primary " onclick="LapPd(this)" data-id="<?php echo $this->session->userdata('ses_id_unit')?>">CETAK</button>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card-box">
            <h2 class="m-t-0  header-title">LAPORAN PAKET NON STRATEGIS (>RP. 50 JUTA S/D Rp. 200 JUTA)</h2>


            <div class="form-group row">
                <label for="example-month-input2" class="col-2 col-form-label">Bulan</label>
                <div class="col-10">
                    <select class="form-control custom-select" id="bln50">
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
            <button type="button" class="btn btn-primary " onclick="Lap50(this)" data-id="<?php echo $this->session->userdata('ses_id_unit')?>">CETAK</button>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card-box">
            <h2 class="m-t-0  header-title">LAPORAN PAKET STRATEGIS (>RP. 200 JUTA S/D Rp. 2,5 MILIAR)</h2>


            <div class="form-group row">
                <label for="example-month-input2" class="col-2 col-form-label">Bulan</label>
                <div class="col-10">
                    <select class="form-control custom-select" id="bln200">
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
            <button type="button" class="btn btn-primary " onclick="Lap200(this)" data-id="<?php echo $this->session->userdata('ses_id_unit')?>">CETAK</button>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card-box">
            <h2 class="m-t-0  header-title">LAPORAN PAKET STRATEGIS (>RP. 2,5 MILIAR S/D Rp. 50 MILIAR</h2>


            <div class="form-group row">
                <label for="example-month-input2" class="col-2 col-form-label">Bulan</label>
                <div class="col-10">
                    <select class="form-control custom-select" id="bln25">
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
            <button type="button" class="btn btn-primary " onclick="Lap25(this)" data-id="<?php echo $this->session->userdata('ses_id_unit')?>">CETAK</button>
        </div>
    </div>
</div>