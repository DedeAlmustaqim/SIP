<!DOCTYPE html>
<html>

<head>
    <title>Report Table</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
            margin-bottom: 30px;
        }

        header {
            position: fixed;
            top: -40px;
            left: 10px;
            right: 10px;
            height: 50px;

            /** Extra personal styles **/
            color: #000000;
            text-align: center;
            line-height: 30px;
        }

        table {
            border-collapse: collapse;
            font-size: 14px;
        }



        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 80px;

            /** Extra personal styles **/
            color: #000000;
            text-align: left;
            line-height: 35px;
        }

        h1 {
            display: block;
            font-size: 24px;
            margin-top: 0.2em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h2 {
            display: block;
            font-size: 20px;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.0em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        h4 {
            display: block;
            font-size: 0.8em;
            margin-top: 0.02em;
            margin-bottom: 0.02em;
            margin-left: 0;
            margin-right: 0;
            font-weight: bold;
        }

        .text_td {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 8px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
        }

        .text_utama {
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 8px;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            padding: 2;
        }


        .text-center {

            text-align: center;
        }

        .text-right {

            text-align: right;
        }

        .text-left {

            text-align: left;
        }
    </style>
</head>
<?php

function blnIndo($blnInggris)
{
    switch ($blnInggris) {
        case '1':
            return 'Januari';
        case '2':
            return 'Februari';
        case '3':
            return 'Maret';
        case '4':
            return 'April';
        case '5':
            return 'Mei';
        case '6':
            return 'Juni';
        case '7':
            return 'Juli';
        case '8':
            return 'Agustus';
        case '9':
            return 'September';
        case '10':
            return 'Oktober';
        case '11':
            return 'November';
        case '12':
            return 'Desember';
        default:
            return 'hari tidak valid';
    }
}

?>

<body>


    <?php
    $bln = $this->uri->segment('4');
    $ta = $this->session->userdata('ta');
    ?>
    <table width="100%">
        <tr>
            <td width="10%"></td>
            <td width="80%">
                <h2 class="text-center">PROSES PENGADAAN BARANG DAN JASA PAKET NON STRATEGIS (>RP. 50 JUTA S/D Rp. 200 JUTA)</h2>
                <h2 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
                    Per
                    <?php
                    $d = new DateTime($ta . '-' . $bln);
                    echo $d->format('t');
                    ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h2>
            </td>

            <td width="10%" class="text-center">
                <font size="10px">Printed by SIP BARTIM</font><br>

                <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . "/assets/images/sip-qr.png";
                            ?>" alt="" width="80px"><br>
                <font size="10px"><?php echo base_url() ?></font>
            </td>
        </tr>
    </table>



    <table border="1" width="100%" cellpadding="2" class="text_utama">
        <thead>

            <tr class="text-center">
                <td rowspan="4" width="3%">NO</td>
                <td rowspan="4" width="20%">SKPD</td>
                <td rowspan="4">JUMLAH PAKET</td>
                <td rowspan="4">JUMLAH PAGU (Rp.)</td>
                <td colspan="10">PROSES PENGADAAN</td>
            </tr>
            <tr class="text-center">
                <td colspan="8">SUDAH PENGADAAN</td>
                <td colspan="2" rowspan="2">BELUM PENGADAAN</td>
            </tr>
            <tr class="text-center">
                <td colspan="2" width="5%">PEMILIHAN/PELAKSANAAN</td>
                <td colspan="2">HASIL PEMILIHAN</td>
                <td colspan="2">KONTRAK</td>
                <td colspan="2">SERAH TERIMA</td>

            </tr>
            <tr class="text-center">
                <td>PAKET</td>
                <td>Rp.</td>
                <td>PAKET</td>
                <td>Rp.</td>
                <td>PAKET</td>
                <td>Rp.</td>
                <td>PAKET</td>
                <td>Rp.</td>
                <td>PAKET</td>
                <td>Rp.</td>
            </tr>
            <tr class="text-center">
                <td>(1)</td>
                <td>(2)</td>
                <td>(3)</td>
                <td>(4)</td>
                <td>(5)</td>
                <td>(6)</td>
                <td>(7)</td>
                <td>(8)</td>
                <td>(9)</td>
                <td>(10)</td>
                <td>(11)</td>
                <td>(12)</td>
                <td>(13)</td>
                <td>(14)</td>
            </tr>
        </thead>
        <?php $no = 1 ?>
        <?php foreach ($main as $u) { ?>

            <tr>
                <td align="center"><?php echo $no++ ?></td>
                <td><?php echo $u->nm_unit ?></td>
                <td width="3%" class="text-center"><?php if ($u->jml_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->jml_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->jml_pg_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->jml_pg_50);
                                        } ?></td>
                <td width="3%" class="text-center"><?php if ($u->pl_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->pl_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->pl_rp_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->pl_rp_50);
                                        } ?></td>
                <td width="3%" class="text-center"><?php if ($u->h_pl_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->h_pl_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->h_pl_rp_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->h_pl_rp_50);
                                        } ?></td>
                <td width="3%" class="text-center"><?php if ($u->kontrak_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->kontrak_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->kontrak_rp_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->kontrak_rp_50);
                                        } ?></td>
                <td width="3%" class="text-center"><?php if ($u->st_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->st_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->st_rp_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->st_rp_50);
                                        } ?></td>
                <td width="3%" class="text-center"><?php if ($u->bp_pkt_50 == 0) {
                                                        echo "-";
                                                    } else {
                                                        echo $u->bp_pkt_50;
                                                    } ?></td>
                <td class="text-right"><?php if ($u->bp_rp_50 == 0) {
                                            echo "-";
                                        } else {
                                            echo rupiah($u->bp_rp_50);
                                        } ?></td>

            </tr>
        <?php } ?>
        <tr>
            <td colspan="2" class="text-center">Jumlah</td>

            <td class="text-center"><?php echo $jml_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($jml_pg_50) ?></td>
            <td class="text-center"><?php echo $pl_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($pl_rp_50) ?></td>
            <td class="text-center"><?php echo $h_pl_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($h_pl_rp_50) ?></td>
            <td class="text-center"><?php echo $kontrak_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($kontrak_rp_50) ?></td>
            <td class="text-center"><?php echo $st_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($st_rp_50) ?></td>
            <td class="text-center"><?php echo $bp_pkt_50 ?></td>
            <td class="text-right"><?php echo rupiah($bp_rp_50) ?></td>



        </tr>
    </table>

    <br><br><br>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td width="75%">&nbsp;</td>
                <td class="text-center">Tamiang Layang, <?php echo date("d M Y") ?><br>KEPALA <?php foreach ($pemda as $pem) {
                                                                                                    echo $pem->nm_institusi;
                                                                                                } ?><br>
                    <?php foreach ($pemda as $pem) {
                        echo $pem->pemda;
                    } ?>
                    <br><br><br><br>
                    <font size="12"><b><u><?php foreach ($pemda as $pem) {
                                                echo $pem->nm_pimpinan;
                                            } ?></u></b></font><br><?php foreach ($pemda as $pem) {
                                                                        echo $pem->jabatan_gol;
                                                                    } ?><br>NIP. <?php foreach ($pemda as $pem) {
                                                                                        echo $pem->nip;
                                                                                    } ?>
                </td>
            </tr>
        </tbody>
    </table>





    <footer>
        <table width="100%">
            <tr>
                <td width="85%">
                    <i><u>
                            <font size="10px">Printed by SIP Kab. Barito Timur <?php echo date("d-m-Y") ?> <?php echo date("H:i:s") ?> WIB</font>
                        </u></i>
                </td>
                <td>
                    <i><u>
                            <font size="10px"><?php echo base_url() ?></font>
                        </u></i>
                </td>
            </tr>
    </footer>
</body>

</html>