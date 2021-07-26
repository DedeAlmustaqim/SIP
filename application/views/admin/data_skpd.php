<div class="row">
    <div class="col-lg-12 m-b-20">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label>
                            <h3>Bulan</h3>
                        </label>
                        <select class="custom-select select2" id="bln_view_skpd">
                            <?php
                            foreach ($bln as $bl) {
                            ?>
                                <option value="<?php echo $bl->id_bln ?>" <?php if ($bl->aktif == 1) {
                                                                                echo "selected";
                                                                            } ?>><?php echo strtoupper($bl->nm_bln) ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>
                            <h3>SKPD</h3>
                        </label>

                        <select class="custom-select select2" id="unit_view_skpd">
                            <?php
                            foreach ($skpd as $u) {
                            ?>
                                <option value="<?php echo $u->id_unit ?>" tag="<?php echo $u->nm_unit ?>"><?php echo $u->nm_unit ?></option>

                            <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">PROGRESS APBD</h4>
                <div>
                <div id="status_apbd_view"></div><br>

                    <table cellspacing="0" width="100%" class="table table-striped table-bordered wy-table-bordered-all">
                        <tr class="bg-primary text-white">
                            <th rowspan="2" width="35%" class="text-center">Keterangan</th>
                            <th rowspan="2" width="20%" class="text-center">Pagu</th>
                            <th colspan="2" width="20%" class="text-center"> Realisasi Keuangan </th>
                            <th rowspan="2" width="15%" class="text-center"> Fisik (%) </th>
                        </tr>
                        <tr>
                            <th width="20%" class="text-center bg-primary text-white"> Rp </th>
                            <th width="15%" class="text-center bg-primary text-white"> % </th>

                        </tr>
                        <tr>
                            <th>Belanja Operasi</th>
                            <th class="text-right"><span id="pg_bl_op_detail_view"></span></th>
                            <th class="text-right bg-warning"><span id="rk_keu_op_rp_detail_view"></span></th>
                            <th class="text-right"><span id="rk_keu_op_per_detail_view"></th>
                            <th class="text-right"><span id="rf_op_detail_view"></th>
                        </tr>
                        <tr>
                            <th>Belanja Modal</th>
                            <th class="text-right"><span id="pg_bl_bm_detail_view"></span></th>
                            <th class="text-right bg-warning"><span id="rk_keu_bm_rp_detail_view"></th>
                            <th class="text-right"><span id="rk_keu_bm_per_detail_view"></th>
                            <th class="text-right"><span id="rf_bm_detail_view"></th>
                        </tr>
                        <tr>
                            <th>Belanja Tidak Terduga</th>
                            <th class="text-right"><span id="pg_btt_detail_view"></span></th>
                            <th class="text-right bg-warning"><span id="rk_keu_btt_rp_detail_view"></th>
                            <th class="text-right"><span id="rk_keu_btt_per_detail_view"></th>
                            <th class="text-right"><span id="rf_btt_detail_view"></th>
                        </tr>
                        <tr>
                            <th>Belanja Transfer</th>
                            <th class="text-right"><span id="pg_bl_bt_detail_view"></span></th>
                            <th class="text-right bg-warning"><span id="rk_keu_bt_rp_detail_view"></th>
                            <th class="text-right"><span id="rk_keu_bt_per_detail_view"></th>
                            <th class="text-right"><span id="rf_bt_detail_view"></th>
                        </tr>
                        <tr class="bg-warning">
                            <th>Total (BO+BM+BTT+BT)</th>
                            <th class="text-right"><span id="pg_apbd_detail_view"></span></th>
                            <th class="text-right"><span id="real_apbd_detail_view"></th>
                            <th class="text-right"><span id="real_apbd_per_detail_view"></th>
                            <th class="text-right"><span id="real_apbd_fisik_detail_view"></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">PROGRESS PENDAPATAN</h4>
                <div>
                    <div class="table-responsive">
                    <div id="status_pd_view"></div><br>
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
                                <td class="text-right"><span id="pad_target_detail_view"></span></td>
                                <td class="text-right"><span id="pad_real_detail_view"></span></td>
                                <td class="text-right"><span id="pad_real_per_detail_view"></span></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td colspan="4"><b>PENDAPATAN TRANSFER</b></td>

                            </tr>
                            <tr>
                                <td class="text-center">-</td>
                                <td>TRANSFER PUSAT</td>
                                <td class="text-right"><span id="tp_target_detail_view"></span></td>
                                <td class="text-right"><span id="tp_keu_detail_view"></span></td>
                                <td class="text-right"><span id="tp_per_detail_view"></span></td>
                            </tr>
                            <tr>
                                <td class="text-center">-</td>
                                <td>TRANSFER ANTAR DAERAH</td>
                                <td class="text-right"><span id="tad_target_detail_view"></span></td>
                                <td class="text-right"><span id="tad_keu_detail_view"></span></td>
                                <td class="text-right"><span id="tad_per_detail_view"></span></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td><b>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</b></td>
                                <td class="text-right"><span id="pad_sah_target_detail_view"></span></td>
                                <td class="text-right"><span id="pad_sah_keu_detail_view"></span></td>
                                <td class="text-right"><span id="pad_sah_per_detail_view"></span></td>
                            </tr>
                            <tr class="bg-warning">
                                <td class="text-center ">4</td>
                                <td><b>TARGET TOTAL</b></td>
                                <td class="text-right"><span id="target_total_detail_view"></span></td>
                                <td class="text-right"><span id="keu_total_detail_view"></span></td>
                                <td class="text-right"><span id="keu_per_total_detail_view"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 m-b-20">
        <div class="card-body">
            <h4 class="card-title text-center">PROGRESS PPBJ</h4>

            <div class="table-responsive">
                <table class="table-bordered table-striped" width="100%" cellpadding="5">
                    <thead>
                        <tr class="text-center bg-primary text-white">
                            <th rowspan="4">NO</th>
                            <th rowspan="4" width="28%">JENIS PAKET</th>
                            <th rowspan="4" width="5%">JUMLAH PAKET</th>
                            <th rowspan="4" width="8%">JUMLAH PAGU (Rp.)</th>
                            <th colspan="10">PROSES PENGADAAN</th>

                        </tr>
                        <tr class="text-center bg-primary text-white">
                            <th colspan="8">SUDAH PENGADAAN</th>
                            <th colspan="2">BELUM PENGADAAN</th>
                        </tr>
                        <tr class="text-center bg-primary text-white">
                            <th colspan="2">PEMILIHAN/PELAKSANAAN</th>
                            <th colspan="2">HASIL PEMILIHAN</th>
                            <th colspan="2">KONTRAK</th>
                            <th colspan="2">SERAH TERIMA</th>
                            <th rowspan="2">PAKET</th>
                            <th rowspan="2">Rp.</th>
                        </tr>
                        <tr class="text-center bg-primary text-white">
                            <th width="5%">PAKET</th>
                            <th width="8%">Rp.</th>
                            <th width="5%">PAKET</th>
                            <th width="8%">Rp.</th>
                            <th width="5%">PAKET</th>
                            <th width="8%">Rp.</th>
                            <th width="5%">PAKET</th>
                            <th width="8%">Rp.</th>

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
                        <tr height="75px" class="show_ppbj_50_view">
                        <tr height="75px" class="show_ppbj_200_view">
                        <tr height="75px" class="show_ppbj_25_view">

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-12 m-b-20">
        <div class="card-body">
            <h4 class="card-title text-center">PROGRESS DAK</h4>

            <div class="table-responsive">


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
                    <tbody id="show_dak_fisik_view"></tbody>
                    <tbody id="show_dak_non_fisik_view"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>