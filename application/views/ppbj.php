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
        <h3 class="text-center">PROSES PENGADAAN BARANG DAN JASA PAKET  <?php echo $this->session->userdata('ses_nm_unit') ?></h3>
            <h4 class="text-center">PADA APBD TAHUN ANGGARAN  <?php echo $this->session->userdata('ta') ?></h3>


            <input type="text" hidden id="unit_ppbj" value="<?php echo $this->session->userdata('ses_id_unit') ?>">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">
                    <h5>Data Bulan </h5>
                </label>
                <div class="col-sm-3">
                    <select class="custom-select" id="bln_ppbj">
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


            </div>
            <div class="form-group row">

                <div class="col-12">
                    <div class="table-responsive">
                        <table  class="table-bordered table-striped" width="100%" cellpadding="5">
                            <thead >
                                <tr class="text-center bg-primary text-white">
                                    <th rowspan="4">NO</th>
                                    <th rowspan="4" width="28%">JENIS PAKET</th>
                                    <th rowspan="4" width="5%">JUMLAH PAKET</th>
                                    <th rowspan="4"  width="8%">JUMLAH PAGU (Rp.)</th>
                                    <th colspan="10">PROSES PENGADAAN</th>
                                    <th rowspan="5" width="25%">AKSI</th>
                                </tr>
                                <tr class="text-center bg-primary text-white">
                                    <th colspan="8">SUDAH PENGADAAN</th>
                                    <th colspan="2">BELUM PENGADAAN</th>
                                </tr>
                                <tr class="text-center bg-primary text-white">
                                    <th colspan="2" >PEMILIHAN/PELAKSANAAN</th>
                                    <th colspan="2">HASIL PEMILIHAN</th>
                                    <th colspan="2">KONTRAK</th>
                                    <th colspan="2">SERAH TERIMA</th>
                                    <th rowspan="2">PAKET</th>
                                    <th rowspan="2">Rp.</th>
                                </tr>
                                <tr class="text-center bg-primary text-white">
                                    <th  width="5%">PAKET</th>
                                    <th  width="8%">Rp.</th>
                                    <th  width="5%">PAKET</th>
                                    <th  width="8%">Rp.</th>
                                    <th  width="5%">PAKET</th>
                                    <th  width="8%">Rp.</th>
                                    <th  width="5%">PAKET</th>
                                    <th  width="8%">Rp.</th>
                                   
                                </tr>
                                <tr class="text-center bg-primary text-white">
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>13=3-5</th>
                                    <th>14=4-6</th>
                                </tr>
                            <tr height="75px" class="show_ppbj_50">
                            <tr height="75px" class="show_ppbj_200">
                            <tr height="75px" class="show_ppbj_25">

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalPpbj50" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnPpbj50"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5>PROSES PENGADAAN BARANG DAN JASA PAKET NON STRATEGIS (>RP. 50 JUTA S/D Rp. 200 JUTA)</h5>

                <form novalidate="" id="FormPpbj50" method="post">
                    <input type="text" hidden class="form-control" id="id_unit" name="id_unit">
                    <input type="text" hidden class="form-control" id="id_bln" name="id_bln">

                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">

                                        <label class="control-label">JUMLAH PAKET</label>
                                        <input type="text" id="jml_pkt_50" name="jml_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">JUMLAH PAGU (Rp.)</label>
                                        <input type="text" id="jml_pg_50" name="jml_pg_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        <h6 class="card-title">PEMILIHAN/PELAKSANAAN</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="pl_pkt_50" name="pl_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="pl_rp_50" name="pl_rp_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">HASIL PEMILIHAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="h_pl_pkt_50" name="h_pl_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="h_pl_rp_50" name="h_pl_rp_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">KONTRAK </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="kontrak_pkt_50" name="kontrak_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="kontrak_rp_50" name="kontrak_rp_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">SERAH TERIMA</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="st_pkt_50" name="st_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="st_rp_50" name="st_rp_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">BELUM PENGADAAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-warning">
                                        <label>PAKET</label>
                                        <input type="text" readonly id="bp_pkt_50" name="bp_pkt_50" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-warning">
                                        <label>Rp.</label>
                                        <input type="text" readonly id="bp_rp_50" name="bp_rp_50" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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

<!-- MODAL PPBJ 200 --><!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalPpbj200" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnPpbj200"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5>PROSES PENGADAAN BARANG DAN JASA PAKET NON STRATEGIS (>RP. 200 JUTA S/D Rp. 2,5 M)</h5>

                <form novalidate="" id="FormPpbj200" method="post">
                    <input type="text"  class="form-control" id="id_unit_ppbj_200" name="id_unit_ppbj_200">
                    <input type="text"  class="form-control" id="id_bln_ppbj_200" name="id_bln_ppbj_200">

                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">

                                        <label class="control-label">JUMLAH PAKET</label>
                                        <input type="text" id="jml_pkt_200" name="jml_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">JUMLAH PAGU (Rp.)</label>
                                        <input type="text" id="jml_pg_200" name="jml_pg_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        <h6 class="card-title">PEMILIHAN/PELAKSANAAN</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="pl_pkt_200" name="pl_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="pl_rp_200" name="pl_rp_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">HASIL PEMILIHAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="h_pl_pkt_200" name="h_pl_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="h_pl_rp_200" name="h_pl_rp_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">KONTRAK </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="kontrak_pkt_200" name="kontrak_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="kontrak_rp_200" name="kontrak_rp_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">SERAH TERIMA</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="st_pkt_200" name="st_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="st_rp_200" name="st_rp_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">BELUM PENGADAAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-warning">
                                        <label>PAKET</label>
                                        <input type="text" readonly id="bp_pkt_200" name="bp_pkt_200" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-warning">
                                        <label>Rp.</label>
                                        <input type="text" readonly id="bp_rp_200" name="bp_rp_200" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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

<!-- sample modal content -->
<div class="modal bs-example-modal-lg" id="ModalPpbj25" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    <h3 id="NmBlnPpbj25"></h3>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5>PROSES PENGADAAN BARANG DAN JASA PAKET NON STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)</h5>

                <form novalidate="" id="FormPpbj25" method="post">
                    <input type="text" hidden class="form-control" id="id_unit_ppbj_25" name="id_unit_ppbj_25">
                    <input type="text"  hidden class="form-control" id="id_bln_ppbj_25" name="id_bln_ppbj_25">

                    <div class="form-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">

                                        <label class="control-label">JUMLAH PAKET</label>
                                        <input type="text" id="jml_pkt_25" name="jml_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">JUMLAH PAGU (Rp.)</label>
                                        <input type="text" id="jml_pg_25" name="jml_pg_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        <h6 class="card-title">PEMILIHAN/PELAKSANAAN</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="pl_pkt_25" name="pl_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="pl_rp_25" name="pl_rp_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">HASIL PEMILIHAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="h_pl_pkt_25" name="h_pl_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="h_pl_rp_25" name="h_pl_rp_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">KONTRAK </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="kontrak_pkt_25" name="kontrak_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="kontrak_rp_25" name="kontrak_rp_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">SERAH TERIMA</h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-success">
                                        <label>PAKET</label>
                                        <input type="text" id="st_pkt_25" name="st_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label>Rp.</label>
                                        <input type="text" id="st_rp_25" name="st_rp_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>

                        <h6 class="card-title">BELUM PENGADAAN </h6>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-warning">
                                        <label>PAKET</label>
                                        <input type="text" readonly id="bp_pkt_25" name="bp_pkt_25" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-warning">
                                        <label>Rp.</label>
                                        <input type="text" readonly id="bp_rp_25" name="bp_rp_25" class="form-control rp">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
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