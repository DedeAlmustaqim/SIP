<div class="text-center" id="BtnSinkron"></div>
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
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">STATUS INPUT DATA <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <div class="table-responsive">
                        <table id="TblStatus" border="1" class="table-hover table-striped table-warning" cellpadding="3" width="100%">
                            <thead>
                                <tr>
                                    <th width="1%" class="text-center">No</th>
                                    <th width="15%" class="text-center">Bulan</th>
                                    <th width="12%" class="text-center">APBD</th>
                                    <th width="12%" class="text-center">PPBJ Rp 50 jt s/d Rp 200 jt</th>
                                    <th width="12%" class="text-center">PPBJ Rp 200 jt s/d Rp 2,5 M</th>
                                    <th width="12%" class="text-center">PPBJ Rp 2,5 M s/d Rp 5 M</th>
                                    <th width="12%" class="text-center">Pendapatan</th>

                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS REALISASI APBD <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <canvas id="apbd" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->

    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS REALISASI PENDAPATAN <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <canvas id="grafik_pd" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 50 jt s/d 200 jt <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <canvas id="grafik_ppbj50" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 200 jt s/d 2,5 M <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <canvas id="grafik_ppbj200" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->

    <!-- column -->
    <div class="col-lg-6 m-b-20">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">PROGRESS PPBJ Rp 2,5 M s/d 5 M <?php echo $this->session->userdata('ses_nm_unit') ?></h6>
                <div>
                    <canvas id="grafik_ppbj25" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
  

</div>