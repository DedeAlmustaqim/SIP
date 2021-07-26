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
    $bln = $this->uri->segment('3');
    $ta = $this->session->userdata('ta');
    ?>
    <h2 class="text-center">TABEL REALISASI KEUANGAN DAN FISIK APBD <?php echo $nm_unit ?></h2>
    <h2 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
        Per
        <?php
        $d = new DateTime($ta . '-' . $bln);
        echo $d->format('t');
        ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h2><br>
    SKPD : <?php echo $nm_unit ?>
    <table width="100%" border="1" cellpadding="2" cellspacing="0">

        <tr class="text-center text_td">
            <td rowspan="4" width="1%">No</td>
            <td rowspan="4" width="15%">PERANGKAT DAERAH</td>
            <td rowspan="4" width="6%">PAGU APBD (Rp.)</td>
            <td height="3%" colspan="4">BELANJA OPERASI</td>
            <td colspan="4">BELANJA MODAL</td>
            <td colspan="4">BELANJA TIDAK TERDUGA</td>
            <td colspan="4">BELANJA TRANSFER</td>
            <td colspan="3">REALISASI APBD</td>
        </tr>
        <tr class="text-center text_td">
            <td rowspan="3" width="5%">PAGU BELANJA OPERASI (Rp.)</td>
            <td colspan="2" rowspan="2">REALISASI KEUANGAN</td>
            <td rowspan="3" width="3%">REAL FISIK (%)</td>
            <td rowspan="3" width="5%">PAGU BELANJA MODAL (Rp.)</td>
            <td colspan="2" rowspan="2">REALISASI KEUANGAN</td>
            <td rowspan="3" width="3%">REAL FISIK (%)</td>
            <td rowspan="3" width="5%">PAGU BELANJA TIDAK TERDUGA (Rp.)</td>
            <td colspan="2" rowspan="2">REALISASI KEUANGAN</td>
            <td rowspan="3" width="3%">REAL FISIK (%)</td>
            <td rowspan="3" width="5%">PAGU BELANJA TRANSFER (Rp.)</td>
            <td colspan="2" rowspan="2">REALISASI KEUANGAN</td>
            <td rowspan="3" width="3%">REAL FISIK (%)</td>
            <td colspan="2" rowspan="2">REALISASI KEUANGAN</td>
            <td rowspan="3" width="5%">REAL FISIK (%)</td>
        </tr>
        <tr> </tr>
        <tr class="text-center text_td">
            <td width="1%">Rp</td>
            <td width="3%">(%)</td>
            <td width="1%">Rp</td>
            <td width="3%">(%)</td>
            <td width="1%">Rp</td>
            <td width="3%">(%)</td>
            <td width="1%">Rp</td>
            <td width="3%">(%)</td>
            <td width="6%">Rp</td>
            <td width="3%">(%)</td>
        </tr>

        <tr class="text-center text_td">
            <td>1</td>
            <td>2</td>
            <td>3=4+8+12+16</td>
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
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
            <td>22</td>
        </tr>
        <?php foreach ($main as $u) { ?>

            <tr class="text_utama">
                <td height="10%" class="text-center text_td">1</td>
                <td width="20%"><?php echo $u->nm_unit ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->pg_apbd) ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->pg_bl_op) ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->rk_keu_op_rp) ?></td>
                <td class="text-right" width="1%"><?php echo $u->rk_keu_op_per ?></td>
                <td class="text-right" width="1%"><?php echo $u->rf_op ?></td>
                <td class="text-right" width="1%"><?php echo rupiah($u->pg_bl_bm) ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->rk_keu_bm_rp) ?></td>
                <td class="text-right" width="1%"><?php echo $u->rk_keu_bm_per ?></td>
                <td class="text-right" width="1%"><?php echo $u->rf_bm ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->pg_btt) ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->rk_keu_btt_rp) ?></td>
                <td class="text-right" width="1%"><?php echo $u->rk_keu_btt_per  ?></td>
                <td class="text-right" width="1%"><?php echo $u->rf_btt  ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->pg_bl_bt) ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->rk_keu_bt_rp) ?></td>
                <td class="text-right" width="1%"><?php echo $u->rk_keu_bt_per  ?></td>
                <td class="text-right" width="1%"><?php echo $u->rf_bt  ?></td>
                <td class="text-right" width="7%"><?php echo rupiah($u->real_apbd) ?></td>
                <td class="text-right" width="1%"><?php echo $u->real_apbd_per  ?></td>
                <td class="text-right" width="1%"><?php echo $u->real_apbd_fisik  ?></td>
            </tr>
        <?php } ?>
    </table>
    <br><br>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td width="75%">&nbsp;</td>
            <?php if($ttd==null){
                $ttd_x= "Mohon Setting pejabat yg menandatangani pada menu Setting->Profil Skpd<br>";
            } else {
                $ttd_x = $ttd;
            }?>
                <td class="text-center">Tamiang Layang, <?php echo date("d") ?> <?php echo blnIndo(date("m")) ?> <?php echo date("Y") ?><br><?php echo $ttd_x ?>&nbsp;<?php echo $nm_unit ?> :<br><br><br><br>
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