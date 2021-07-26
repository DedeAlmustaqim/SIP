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
            font-size: 10px;
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
    $bln = $this->uri->segment('3');
    $ta = $this->session->userdata('ta');
    ?>
    <h2 class="text-center">TABEL REALISASI PENERIMAAN PENDAPATAN <?php echo $nm_unit ?></h2>
    <h2 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
        Per
        <?php
        $d = new DateTime($ta . '-' . $bln);
        echo $d->format('t');
        ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h2><br>
    SKPD : <?php echo $nm_unit ?>
    <table cellspacing="0" cellpadding="3" border="1" width="100%">

        <tr class="text-center text_utama">
            <td rowspan="3">NO</td>
            <td rowspan="3" >OPD</td>
            <td rowspan="3" >TARGET TOTAL (Rp)</td>
            <td colspan="2" rowspan="2" >TOTAL</td>
            <td colspan="3" rowspan="2">PENDAPATAN ASLI DAERAH</td>
            <td colspan="6" >PENDAPATAN TRANSFER</td>
            <td colspan="3" rowspan="2">LAIN - LAIN PENDAPATAN DAERAH YANG SAH</td>
        </tr>
        <tr class="text-center text_utama">
            <td colspan="3">TRANSFER PUSAT</td>
            <td colspan="3">TRANSFER ANTAR DAERAH</td>
        </tr>
        <tr class="text-center text_utama">
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td >TARGET (Rp)</td>
            <td>REALISASI (Rp)</td>
            <td>(%)</td>
            <td >TARGET  (Rp)</td>
            <td >REALISASI (Rp)</td>
            <td>(%)</td>
            <td >TARGET  (Rp)</td>
            <td >REALISASI (Rp)</td>
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
        <?php foreach ($main as $u) { ?>
        <tr class="text_utama">
            <td class="text-center" width="1%">1</td>
            <td width="12%"><?php echo $u->nm_unit ?></td>

            <td class="text-right" ><?php echo rupiah($u->target_total) ?></td>
            <td class="text-right"><?php echo rupiah($u->keu_total) ?></td>
            <td class="text-right" ><?php echo $u->keu_per_total ?></td>

            <td class="text-right" ><?php echo rupiah($u->pad_target) ?></td>
            <td class="text-right"><?php echo rupiah($u->pad_real) ?></td>
            <td class="text-right" ><?php echo $u->pad_real_per ?></td>

            <td class="text-right" ><?php echo rupiah($u->tp_target) ?></td>
            <td class="text-right"><?php echo rupiah($u->tp_keu) ?></td>
            <td class="text-right" ><?php echo $u->tp_per ?></td>

            <td class="text-right" ><?php echo rupiah($u->tad_target) ?></td>
            <td class="text-right"><?php echo rupiah($u->tad_keu) ?></td>
            <td class="text-right" ><?php echo $u->tad_per ?></td>

            <td class="text-right" ><?php echo rupiah($u->pad_sah_target) ?></td>
            <td class="text-right"><?php echo rupiah($u->pad_sah_keu) ?></td>
            <td class="text-right" ><?php echo $u->pad_sah_per ?></td>
            
        </tr>
        <?php } ?>
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