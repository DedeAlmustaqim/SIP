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
            top: -60px;
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
    <h2 class="text-center">PROSES PENGADAAN BARANG DAN JASA PAKET STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)</h2>
    <?php
    $bln = $this->uri->segment('3');
    $ta = $this->session->userdata('ta');
    ?>
    <h2 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
        Per
        <?php
        $d = new DateTime($ta . '-' . $bln);
        echo $d->format('t');
        ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h2><br>
    SKPD : <?php echo $nm_unit ?>

    <table border="1" width="100%" cellpadding="5">
        <thead>
            <tr class="text-center">
            <th rowspan="4" width="3%">NO</th>
                <th rowspan="4">SKPD</th>
                <th rowspan="4">JUMLAH PAKET</th>
                <th rowspan="4">JUMLAH PAGU (Rp.)</th>
                <th colspan="10">PROSES PENGADAAN</th>
            </tr>
            <tr class="text-center">
                <th colspan="8">SUDAH PENGADAAN</th>
                <th colspan="2">BELUM PENGADAAN</th>
            </tr>
            <tr class="text-center">
                <th colspan="2" width="5%">PEMILIHAN/PELAKSANAAN</th>
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
                <th>13=3-5</th>
                <th>14=4-6</th>
            </tr>
        </thead>
        <tr>
            <?php foreach ($main as $u) { ?>
                <th align="center" height="12%">1</th>
                <th width="20%"><?php echo $u->nm_unit ?></th>
                <th width="3%" class="text-center"><?php echo $u->jml_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->jml_pg_25) ?></th>
                <th width="3%" class="text-center"><?php echo $u->pl_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->pl_rp_25) ?></th>
                <th width="3%" class="text-center"><?php echo $u->h_pl_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->h_pl_rp_25) ?></th>
                <th width="3%" class="text-center"><?php echo $u->kontrak_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->kontrak_rp_25) ?></th>
                <th width="3%" class="text-center"><?php echo $u->st_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->st_rp_25) ?></th>
                <th width="3%" class="text-center"><?php echo $u->bp_pkt_25 ?></th>
                <th class="text-right"><?php echo rupiah($u->bp_rp_25) ?></th>
            <?php } ?>
        </tr>
    </table>

    <br><br>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td width="75%">&nbsp;</td>
                <td class="text-center">Tamiang Layang, <?php echo date("d") ?> <?php echo blnIndo(date("m")) ?> <?php echo date("Y") ?><br><?php echo $ttd ?><br><br><br><br>
                    <font size="12"><b><u><?php echo $nm_pimpinan ?></u></b></font><br><?php echo $gol ?><br>NIP.<?php echo $nip ?>
                </td>
            </tr>
        </tbody>
    </table>



    
    <footer>
        <table width="100%">
            <tr>
                <td width="85%">
                    <i><u>
                            <font size="10px">Printed by SIP Barito Timur <?php echo date("d-m-Y") ?> <?php echo date("H:i:s") ?> WIB</font>
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