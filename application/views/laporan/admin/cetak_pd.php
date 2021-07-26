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
            bottom: -60px;
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
                <h2 class="text-center">TABEL REALISASI PENERIMAAN <?php
                                                                    foreach ($pemda as $pem) {
                                                                        echo $pem->pemda;
                                                                    }
                                                                    ?> <br></h2>
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

    <table cellspacing="0" cellpadding="3" border="1" width="100%">

        <tr class="text-center text_utama">
            <td rowspan="3">NO</td>
            <td rowspan="3">OPD</td>
            <td rowspan="3">TARGET TOTAL (Rp)</td>
            <td colspan="2" rowspan="2">TOTAL</td>
            <td colspan="3" rowspan="2">PENDAPATAN ASLI DAERAH</td>
            <td colspan="6">PENDAPATAN TRANSFER</td>
            <td colspan="3" rowspan="2">LAIN - LAIN PENDAPATAN DAERAH YANG SAH</td>
        </tr>
        <tr class="text-center text_utama">
            <td colspan="3">TRANSFER PUSAT</td>
            <td colspan="3">TRANSFER ANTAR DAERAH</td>
        </tr>
        <tr class="text-center text_utama">
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td>TARGET (Rp)</td>
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td>TARGET  (Rp)</td>
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td>TARGET  (Rp)</td>
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td>TARGET (Rp)</td>
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
        </tr>
        <tr class="text-center text_utama">
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($main as $u) { ?>
            <tr class="text_utama">
                <td class="text-center" width="1%"><?php echo $no++ ?></td>
                <td width="12%"><?php echo $u->nm_unit ?></td>

                <td class="text-right"><?php if ($u->target_total == 0) { echo "-";} else { ?><?php echo rupiah($u->target_total); } ?></td>
                <td class="text-right"><?php if ($u->keu_total == 0) { echo "-";} else { ?><?php echo rupiah($u->keu_total) ;} ?></td>
                <td class="text-right"><?php if ($u->keu_per_total == 0) { echo "-";} else { ?><?php echo $u->keu_per_total ; }?></td>

                <td class="text-right"><?php if ($u->pad_target == 0) { echo "-";} else { ?><?php echo rupiah($u->pad_target) ;} ?></td>
                <td class="text-right"><?php if ($u->pad_real == 0) { echo "-";} else { ?><?php echo rupiah($u->pad_real) ;}?></td>
                <td class="text-right"><?php if ($u->pad_real_per == 0) { echo "-";} else { ?><?php echo $u->pad_real_per ;}?></td>

                <td class="text-right"><?php if ($u->tp_target == 0) { echo "-";} else { ?><?php echo rupiah($u->tp_target) ;} ?></td>
                <td class="text-right"><?php if ($u->tp_keu == 0) { echo "-";} else { ?><?php echo rupiah($u->tp_keu) ;}?></td>
                <td class="text-right"><?php if ($u->tp_per == 0) { echo "-";} else { ?><?php echo $u->tp_per ;}?></td>

                <td class="text-right"><?php if ($u->tad_target == 0) { echo "-";} else { ?><?php echo rupiah($u->tad_target) ;}?></td>
                <td class="text-right"><?php if ($u->tad_keu == 0) { echo "-";} else { ?><?php echo rupiah($u->tad_keu) ;}?></td>
                <td class="text-right"><?php if ($u->tad_per == 0) { echo "-";} else { ?><?php echo $u->tad_per ;}?></td>

                <td class="text-right"><?php if ($u->pad_sah_target == 0) { echo "-";} else { ?><?php echo rupiah($u->pad_sah_target) ;}?></td>
                <td class="text-right"><?php if ($u->pad_sah_keu == 0) { echo "-";} else { ?><?php echo rupiah($u->pad_sah_keu) ;}?></td>
                <td class="text-right"><?php if ($u->pad_sah_per == 0) { echo "-";} else { ?><?php echo $u->pad_sah_per ;}?></td>

            </tr>
        <?php } ?>
    </table><br>
    <table width="60%" cellpadding="2" cellspacing="0" border="1">

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
                        <td class="text-right"><?php echo Rupiah($pad_target) ?></span></td>
                        <td class="text-right"><?php echo Rupiah($pad_real) ?></span></td>
                        <td class="text-right"><?php echo $pad_real_per ?></span></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td colspan="4"><b>PENDAPATAN TRANSFER</b></td>

                    </tr>
                    <tr>
                        <td class="text-center">-</td>
                        <td>TRANSFER PUSAT</td>
                        <td class="text-right"><?php echo Rupiah($tp_target) ?></span></td>
                        <td class="text-right"><?php echo Rupiah($tp_keu) ?></span></td>
                        <td class="text-right"><?php echo $tp_per ?></span></td>
                    </tr>
                    <tr>
                        <td class="text-center">-</td>
                        <td>TRANSFER ANTAR DAERAH</td>
                        <td class="text-right"><?php echo Rupiah($tad_target) ?></span></td>
                        <td class="text-right"><?php echo Rupiah($tad_keu) ?></span></td>
                        <td class="text-right"><?php echo $tad_per ?></span></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td><b>LAIN - LAIN PENDAPATAN DAERAH YANG SAH</b></td>
                        <td class="text-right"><?php echo Rupiah($pad_sah_target) ?></span></td>
                        <td class="text-right"><?php echo Rupiah($pad_sah_keu) ?></span></td>
                        <td class="text-right"><?php echo $pad_sah_per ?></span></td>
                    </tr>
                    <tr class="bg-warning">
                        <td class="text-center ">4</td>
                        <td><b>TARGET TOTAL</b></td>
                        <td class="text-right"><?php echo Rupiah($target_total) ?></span></td>
                        <td class="text-right"><?php echo Rupiah($keu_total) ?></span></td>
                        <td class="text-right"><?php echo $keu_per_total ?></span></td>
                    </tr>
                </table>
    <br><br>
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

<br>




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
        </table>
    </footer>
</body>

</html>