<!DOCTYPE html>
<html>

<head>
    <title>DAK FISIK <?php echo $nm_unit ?></title>
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
    <h2 class="text-center">LAPORAN KEMAJUAN PELAKSANAAN KEGIATAN</h2>
    <h2 class="text-center">DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER </h2>
    <h2 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
        Per
        <?php
        $d = new DateTime($ta . '-' . $bln);
        echo $d->format('t');
        ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h2><br>
    SKPD : <?php echo $nm_unit ?>
    <table width="100%" class="table table-bordered" border="1">
        <tr class="text-center text-white bg-info">
            <td rowspan="3" width="2%">NO.</td>
            <td rowspan="3" width="17%">UB BIDANG/KEGIATAN</td>
            </td>
            <td colspan="4">PERENCANAAN KEGIATAN</td>
            <td colspan="5">MEKANISME PELAKSANAAN</td>
            <td colspan="3">REALISASI</td>
            <td rowspan="3" width="5%">Kodefikasi /Keterangan Permasalahan</td>
        </tr>
        <tr class="text-center text-white bg-info">
            <td width="3%" rowspan="2">Volume</td>
            <td width="3%" rowspan="2">Satuan</td>
            <td rowspan="2" width="4%">Jumlah Penerima Manfaat </td>
            <td rowspan="2" width="7%"> Pagu DAK Fisik (Rp) </td>
            <td colspan="2">Swakelola</td>
            <td colspan="2">Kontraktual</td>
            <td rowspan="2" width="6%">Metode Pembayaran</td>
            <td width="8%" rowspan="2">Keuangan</td>
            <td width="3%" rowspan="2">%</td>
            <td width="3%" rowspan="2">Fisik (%)</td>
        </tr>
        <tr class="text-center text-white bg-info">
            <td width="3%">Volume</td>
            <td width="8%">Nilai (Rp)</td>
            <td width="3%">Volume</td>
            <td width="8%">Nilai (Rp)</td>
        </tr>


        <?php
        $no = 1;
        $pagu = 0;
        $mek_nilai_swa = 0;
        $mek_nilai_kon = 0;
        $real_keu = 0;
        ?>
        <?php foreach ($main as $u) { ?>
            <tr>
                <td height="5%" class="text-center"><?php echo $no++ ?></td>
                <td><?php echo $u->keg ?></td>
                <td class="text-center"><?php echo $u->per_vol ?></td>
                <td class="text-center"><?php echo $u->per_satuan ?></td>
                <td class="text-center"><?php echo $u->per_jlm_penerima ?></td>
                <td class="text-right"><?php echo rupiah($u->pagu) ?></td>
                <td class="text-center"><?php echo $u->mek_vol_swa ?></td>
                <td class="text-right"><?php echo $u->mek_nilai_swa ?></td>
                <td class="text-center"><?php echo $u->mek_vol_kon ?></td>
                <td class="text-right"><?php echo $u->mek_nilai_kon ?></td>
                <td class="text-center"><?php echo $u->mek_metode ?></td>
                <td class="text-right"><?php echo rupiah($u->real_keu) ?></td>
                <td class="text-right"><?php echo $u->real_keu_per ?></td>
                <td class="text-right"><?php echo $u->real_fik ?></td>
                <td class="text-center"><?php echo $u->kodefikasi ?></td>

                <?php
                $pagu += $u->pagu;
                $mek_nilai_swa += $u->mek_nilai_swa;
                $mek_nilai_kon += $u->mek_nilai_kon;
                $real_keu += $u->real_keu;

                ?>

            </tr>
        <?php  } ?>
        <?php $real_keu_per = $real_keu/$pagu*100 ?>
        <!-- <tr>
            <td colspan="5" class="text-center"><b>Jumlah</b>
            <td class="text-right"><b><?php echo rupiah($pagu) ?></b></td>
            <td colspan="2" class="text-right"><b><?php echo rupiah($mek_nilai_swa) ?></b>
            <td colspan="2" class="text-right"><b><?php echo rupiah($mek_nilai_kon) ?></b>
            <td colspan="2" class="text-right"><b><?php echo rupiah($real_keu) ?></b>
            <td  class="text-right"><b><?php echo rupiah($real_keu_per) ?></b>
            <td  class="text-right"><b>-</b>
            <td  class="text-center"><b>-</b>
        </tr> -->

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