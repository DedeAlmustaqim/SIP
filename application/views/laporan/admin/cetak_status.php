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
            text-align: right;
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
    <h3 class="text-center">STATUS INPUT DATA <?php
                                                foreach ($pemda as $pem) {
                                                    echo $pem->pemda;
                                                }
                                                ?> <br></h3>
    <h4 class="text-center">TAHUN ANGGARAN <?php echo $this->session->userdata("ta") ?><br>
        Per
        <?php
        $d = new DateTime($ta . '-' . $bln);
        echo $d->format('t');
        ?> <?php echo blnIndo($bln) ?> <?php echo $ta ?></h4><br>

    <table width="100%" border="1" cellpadding="2" cellspacing="0">

        <tr>
            <td width="1%" class="text-center">No</th>
            <td width="25%" class="text-center">SKPD</th>
            <td width="12%" class="text-center">APBD</th>
            <td width="12%" class="text-center">PPBJ Rp 50 jt s/d Rp 200 jt</th>
            <td width="12%" class="text-center">PPBJ Rp 200 jt s/d Rp 2,5 M</th>
            <td width="12%" class="text-center">PPBJ Rp 2,5 M s/d Rp 5 M</th>
            <td width="12%" class="text-center">Pendapatan</th>

        </tr>
        <?php $no = 1 ?>
        <?php foreach ($main as $u) { ?>

            <tr class="text_utama">
                <td class="text-center text_td"><?php echo $no++ ?></td>
                <td width="20%"><?php echo $u->nm_unit ?></td>
                <td class="text-center" width="20%"><?php  if($u->status == 1){ echo "<p style='color:green'>Sudah Input</p>"; } else if($u->status == 0){ echo "<p style='color:red'>Belum Input</p>"; }?></td>
                <td class="text-center" width="20%"><?php  if($u->status_ppbj_50 == 1){ echo "<p style='color:green'>Sudah Input</p>"; } else if($u->status_ppbj_50 == 0){ echo "<p style='color:red'>Belum Input</p>"; }?></td>
                <td class="text-center" width="20%"><?php  if($u->status_ppbj_200 == 1){ echo "<p style='color:green'>Sudah Input</p>"; } else if($u->status_ppbj_200 == 0){ echo "<p style='color:red'>Belum Input</p>"; }?></td>
                <td class="text-center" width="20%"><?php  if($u->status_ppbj_25 == 1){ echo "<p style='color:green'>Sudah Input</p>"; } else if($u->status_ppbj_25 == 0){ echo "<p style='color:red'>Belum Input</p>"; }?></td>
                <td class="text-center" width="20%"><?php  if($u->status_pd == 1){ echo "<p style='color:green'>Sudah Input</p>"; } else if($u->status_pd == 0){ echo "<p style='color:red'>Belum Input</p>"; }?></td>

            </tr>
        <?php } ?>

    </table><br>

    <br><br>
    

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