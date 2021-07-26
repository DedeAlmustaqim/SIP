<div class="card">
<div class="card-header bg-info">
<h4 class="text-center">PROSES PENGADAAN BARANG DAN JASA PAKET NON STRATEGIS (>RP. 50 JUTA S/D Rp. 200 JUTA)</h4>
    </div>
    <div class="card-body collapse show">
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">

                <div class="form-group row">
                    <label for="example-month-input2" class="col-2 col-form-label">U/B</label>
                    <div class="col-10">
                        <select class="form-control custom-select" id="bln_ppbj_50">
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

                <button type="button" class="btn waves-effect waves-light btn-sm btn-success" onclick="ReloadPpbj50()"><i class="mdi mdi-loop"></i> Refresh</button>
                <button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onclick="CetakPpbj50()"><i class="mdi mdi-printer"></i> Cetak</button>


            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="TblPpbj50Admin" class="table-bordered" width="100%" cellpadding="5">
                <thead>
                    <tr class="text-center">
                        <th rowspan="4">NO</th>
                        <th rowspan="4">SKPD</th>
                        <th rowspan="4">JUMLAH PAKET</th>
                        <th rowspan="4">JUMLAH PAGU (Rp.)</th>
                        <th colspan="11">PROSES PENGADAAN</th>
                    </tr>
                    <tr class="text-center">
                        <th colspan="8">SUDAH PENGADAAN</th>
                        <th colspan="2">BELUM PENGADAAN</th>
                    </tr>
                    <tr class="text-center">
                        <th colspan="2">PEMILIHAN/PELAKSANAAN</th>
                        <th colspan="2">HASIL PEMILIHAN</th>
                        <th colspan="2">KONTRAK</th>
                        <th colspan="2">SERAH TERIMA</th>
                        <th>PAKET</th>
                        <th>Rp.</th>
                    </tr>
                    <tr class="text-center">
                        <th>PAKET</th>
                        <th>Rp.</th>
                        <th>PAKET</th>
                        <th>Rp.</th>
                        <th>PAKET</th>
                        <th>Rp.</th>
                        <th>PAKET</th>
                        <th>Rp.</th>
                        <th>PAKET</th>
                        <th>Rp.</th>
                    </tr>
                    <tr class="text-center">
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
                        <th>13=</th>
                        <th>14=</th>
                        <th width="8%"></th>
                        <th width="8%"></th>
                    </tr>
                </thead>
            </table>
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