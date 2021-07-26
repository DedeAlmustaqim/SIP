<div class="row">
    <div class="col-12">
        <div class="alert alert-info alert-rounded text-center">
            <span id="jadwalinput" class="text-warning"></span>
        </div>
    </div>

</div>


<div class="row">
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <div>
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/_9UHodyXTxA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 m-b-20">
        <div class="panel panel-default panel-fill">
            <div class="panel-heading">
                <h3 class="panel-title">Sistem Informasi Pelaporan Kab. Barito Timur</h3>
            </div>
            <div class="panel-body">
                <h5 class="font-14 mb-3 text-uppercase">Tentang</h5>
                <p>SIP (Sistem Informasi Pelaporan) Kab. Barito Timur adalah sebuah aplikasi berbasis web yang dikembangkan oleh BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM dan bekerja sama dengan DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK KABUPATEN BARITO TIMUR</p>

                <p>Dikembangkan dan dikelola secara mandiri oleh BIDANG PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH BAPPLITBANGDA KAB. BARTIM dengan tujuan mempermudah Satuan Organisasi Perangkat Daerah (SOPD) se Kabupaten Barito Timur untuk melakukan pelaporan Realisasi Anggaran perbulannya</p>
                <hr>
                <div class="m-t-0">
                    <h5 class="font-14  text-uppercase">Kepala Bidang PERENCANAAN, PENGENDALIAN DAN EVALUASI PEMBANGUNAN DAERAH</h5>
                    <h5 class="font-14  text-uppercase">FIKTORY WAHYUNO, SP</h5>
                </div>
                <hr>
                <div class="m-t-0">
                    <h5 class="font-14  text-uppercase">KEPALA SUB BIDANG PENGENDALIAN, EVALUASI DAN PELAPORAN PEMBANGUNAN DAERAH</h5>
                    <h5 class="font-14  text-uppercase">KRISNA SUDARTY, SP., M.Si</h5>
                </div>
                <hr>
                <div class="m-t-0">
                    <h5 class="font-14  text-uppercase">WEb Programmer</h5>
                    <h5 class="font-14  text-uppercase">dede almustaqim, s.kom</h5>
                </div>
            </div>

        </div>
    </div>
    <!-- column -->
    <div class="col-lg-6">
        <div class="card bg-warning">
            <div class="card-body">
                <h6 class="card-title">PROGRESS REALISASI APBD
                    <?php
                    foreach ($pemda as $pem) {
                        echo $pem->pemda;
                    }
                    ?>

                </h6>
                <div>
                    <canvas id="grafik_admin" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS REALISASI APBD

                    <?php
                    foreach ($pemda as $pem) {
                        echo $pem->pemda;
                    }
                    ?>
                </h6>
                <div>
                    <table width="100%" cellpadding="3" border="1" class="">
                        <tbody>
                            <tr class="text-center bg-primary text-white">
                                <td width="15%">Bulan</td>
                                <td>Pagu</td>
                                <td>Realisasi Keu</td>
                                <td>Realisasi Keu (%)</td>
                                <td>Realisasi Fis (%)</td>
                            </tr>
                            <?php foreach ($apbd as $u) { ?>
                                <tr>
                                    <td>&nbsp;<?php echo $u->nm_bln ?></td>
                                    <td class="text-right" width="30%"><?php echo rupiah($u->pg_apbd) ?></td>
                                    <td class="text-right"><?php echo rupiah($u->real_apbd) ?></td>
                                    <td class="text-right" width="10%"><?php echo round($u->real_apbd_per, 2) ?></td>
                                    <td class="text-right" width="10%"><?php echo round($u->real_apbd_fisik, 2) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS REALISASI PENDAPATAN </h6>
                <div>
                    <canvas id="grafik_pd_admin" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 50 jt s/d 200 jt</h6>


                <div>
                    <canvas id="grafik_ppbj50_admin" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 200 jt s/d 2,5 M</h6>


                <div>
                    <canvas id="grafik_ppbj200_admin" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 200 jt s/d 2,5 M</h6>


                <div>
                    <canvas id="grafik_ppbj25_admin" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>