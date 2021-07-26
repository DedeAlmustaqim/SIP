
$(document).ready(function () {



    var id_bln = $('#bln_view_skpd').val()
    var unit = $('#unit_view_skpd').val()

    show_apbd_view(id_bln, unit)
    show_pd_view(id_bln, unit)
    show_ppbj_view(id_bln, unit)
    show_dak_view(id_bln, unit)

    $('#unit_view_skpd').change(function () {
        var id_bln = $('#bln_view_skpd').val()
        var option = $('option:selected', this).attr('tag');
        var unit = $(this).val()
        swal({
            title: option,
            timer: 1000,

        })
        show_apbd_view(id_bln, unit)
        show_pd_view(id_bln, unit)
        show_ppbj_view(id_bln, unit)
        show_dak_view(id_bln, unit)

    });

    $('#bln_view_skpd').change(function () {
        var id_bln = $(this).val()
        var unit = $('#unit_view_skpd').val()
        swal({
            title: 'Menampilkan Data ',
            timer: 700,

        })
        show_apbd_view(id_bln, unit)
        show_pd_view(id_bln, unit)
        show_ppbj_view(id_bln, unit)
        show_dak_view(id_bln, unit)

    });

});




function show_apbd_view(id_bln, unit) {
    $.ajax({
        type: "post",
        "url": BASE_URL + "apbd/get_apbd/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            //Navigasi APBD
            //document.getElementById("BulanApbd").innerHTML = 'Data Bulan : '+data.nm_bln;

            document.getElementById("pg_bl_op_detail_view").innerHTML = Rupiah(data.pg_bl_op);
            document.getElementById("rk_keu_op_rp_detail_view").innerHTML = Rupiah(data.rk_keu_op_rp);
            document.getElementById("rk_keu_op_per_detail_view").innerHTML = data.rk_keu_op_per;
            document.getElementById("rf_op_detail_view").innerHTML = data.rf_op;
            document.getElementById("pg_bl_bm_detail_view").innerHTML = Rupiah(data.pg_bl_bm);
            document.getElementById("rk_keu_bm_rp_detail_view").innerHTML = Rupiah(data.rk_keu_bm_rp);
            document.getElementById("rk_keu_bm_per_detail_view").innerHTML = data.rk_keu_bm_per;
            document.getElementById("rf_bm_detail_view").innerHTML = data.rf_bm;
            document.getElementById("pg_btt_detail_view").innerHTML = Rupiah(data.pg_btt);
            document.getElementById("rk_keu_btt_rp_detail_view").innerHTML = Rupiah(data.rk_keu_btt_rp);
            document.getElementById("rk_keu_btt_per_detail_view").innerHTML = data.rk_keu_btt_per;
            document.getElementById("rf_btt_detail_view").innerHTML = data.rf_btt;
            document.getElementById("pg_bl_bt_detail_view").innerHTML = Rupiah(data.pg_bl_bt);
            document.getElementById("rk_keu_bt_rp_detail_view").innerHTML = Rupiah(data.rk_keu_bt_rp);
            document.getElementById("rk_keu_bt_per_detail_view").innerHTML = data.rk_keu_bt_per;
            document.getElementById("rf_bt_detail_view").innerHTML = data.rf_btt;
            document.getElementById("pg_apbd_detail_view").innerHTML = Rupiah(data.pg_apbd);
            document.getElementById("real_apbd_detail_view").innerHTML = Rupiah(data.real_apbd);
            document.getElementById("real_apbd_per_detail_view").innerHTML = data.real_apbd_per;
            document.getElementById("real_apbd_fisik_detail_view").innerHTML = data.real_apbd_fisik;
            //Pie Chart APBD
            if (data['status'] == 1) {
                var status = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'

            }else{
                var status = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
   
            }
            document.getElementById("status_apbd_view").innerHTML = status;

        },

    })
}

function show_pd_view(id_bln, unit) {
    $.ajax({
        type: "post",
        "url": BASE_URL + "pendapatan/get_pd/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            //Navigasi pendapatan
            //document.getElementById("BulanApbd").innerHTML = 'Data Bulan : '+data.nm_bln;
            //Tabel Pendapatan
            document.getElementById("pad_target_detail_view").innerHTML = Rupiah(data.pad_target);
            document.getElementById("pad_real_detail_view").innerHTML = Rupiah(data.pad_real);
            document.getElementById("pad_real_per_detail_view").innerHTML = data.pad_real_per;
            document.getElementById("tp_target_detail_view").innerHTML = Rupiah(data.tp_target);
            document.getElementById("tp_keu_detail_view").innerHTML = Rupiah(data.tp_keu);
            document.getElementById("tp_per_detail_view").innerHTML = data.tp_per;
            document.getElementById("tad_target_detail_view").innerHTML = Rupiah(data.tad_target);
            document.getElementById("tad_keu_detail_view").innerHTML = Rupiah(data.tad_keu);
            document.getElementById("tad_per_detail_view").innerHTML = data.tad_per;
            document.getElementById("pad_sah_target_detail_view").innerHTML = Rupiah(data.pad_sah_target);
            document.getElementById("pad_sah_keu_detail_view").innerHTML = Rupiah(data.pad_sah_keu);
            document.getElementById("pad_sah_per_detail_view").innerHTML = data.pad_sah_per;
            document.getElementById("target_total_detail_view").innerHTML = Rupiah(data.target_total);
            document.getElementById("keu_total_detail_view").innerHTML = Rupiah(data.keu_total);
            document.getElementById("keu_per_total_detail_view").innerHTML = data.keu_per_total;
            //Pie Chart APBD
            if (data['status_pd'] == 1) {
                var status = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'

            }else{
                var status = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
   
            }
            document.getElementById("status_pd_view").innerHTML = status;
        },

    })
}

function show_ppbj_view(id_bln, unit) {
    $.ajax({
        url: BASE_URL + "ppbj/get_ppbj/" + id_bln + "/" + unit,
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function (data) {
            if (data.status_ppbj_50 == 0) {
                var stts_50 = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
            } else {
                var stts_50 = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
            }
            if (data.status_ppbj_200 == 0) {
                var stts_200 = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
            } else {
                var stts_200 = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
            }
            if (data.status_ppbj_200 == 0) {
                var stts_200 = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
            } else {
                var stts_200 = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
            }
            if (data.status_ppbj_25 == 0) {
                var stts_25 = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
            } else {
                var stts_25 = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
            }
            if (data.status_ppbj_25 == 0) {
                var stts_25 = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
            } else {
                var stts_25 = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
            }

            ppbj50 = '<td class="text-center">1</td>' +
                '<td><b>PAKET NON STRATEGIS (>RP. 50 JT S/D Rp. 200 JT)</b><br>' + stts_50 + ' </td>' +
                '<td class="text-center">' + data.jml_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.jml_pg_50) + '</td>' +
                '<td class="text-center">' + data.pl_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.pl_rp_50) + '</td>' +
                '<td class="text-center">' + data.h_pl_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.h_pl_rp_50) + '</td>' +
                '<td class="text-center">' + data.kontrak_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.kontrak_rp_50) + '</td>' +
                '<td class="text-center">' + data.st_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.st_rp_50) + '</td>' +
                '<td class="text-center">' + data.bp_pkt_50 + '</td>' +
                '<td class="text-right">' + Rupiah(data.bp_rp_50) + '</td>';

            ppbj200 = '<td class="text-center">2</td>' +
                '<td><b>PAKET NON STRATEGIS (>RP. 200 JT S/D Rp. 2,5 M)</b><br> ' + stts_200 + '</td>' +
                '<td class="text-center">' + data.jml_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.jml_pg_200) + '</td>' +
                '<td class="text-center">' + data.pl_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.pl_rp_200) + '</td>' +
                '<td class="text-center">' + data.h_pl_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.h_pl_rp_200) + '</td>' +
                '<td class="text-center">' + data.kontrak_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.kontrak_rp_200) + '</td>' +
                '<td class="text-center">' + data.st_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.st_rp_200) + '</td>' +
                '<td class="text-center">' + data.bp_pkt_200 + '</td>' +
                '<td class="text-right">' + Rupiah(data.bp_rp_200) + '</td>';

            ppbj25 = '<td class="text-center">2</td>' +
                '<td><b>PAKET NON STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)</b><br>' + stts_25 + '</td>' +
                '<td class="text-center">' + data.jml_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.jml_pg_25) + '</td>' +
                '<td class="text-center">' + data.pl_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.pl_rp_25) + '</td>' +
                '<td class="text-center">' + data.h_pl_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.h_pl_rp_25) + '</td>' +
                '<td class="text-center">' + data.kontrak_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.kontrak_rp_25) + '</td>' +
                '<td class="text-center">' + data.st_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.st_rp_25) + '</td>' +
                '<td class="text-center">' + data.bp_pkt_25 + '</td>' +
                '<td class="text-right">' + Rupiah(data.bp_rp_25) + '</td>';

            $('.show_ppbj_50_view').html(ppbj50);
            $('.show_ppbj_200_view').html(ppbj200);
            $('.show_ppbj_25_view').html(ppbj25);
        }

    });

}


function show_dak_view(id_bln, unit) {
    $.ajax({
        type: "get",
        "url": BASE_URL + "dak/get_dak_fisik/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            if (data == 0) {
                html += '<tr>' +
                    '<td colspan="16"><h6>Tidak Ada Data yang ditampilkan</h6></td>' +
                    '</tr>';
                $('#show_dak_fisik_view').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER</h5></td></tr>' + html);

            }
            var html = '';
            var count = 1;
            var i;
            for (i = 0; i < data.length; i++) {
                if (data[i].status_dak_fisik == 0) {
                    var status = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
                } else {
                    var status = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
                }
                html += '<tr>' +
                    '<td>' + count++ + '</td>' +
                    '<td>' + data[i].keg + '<br>' + status + '</td>' +
                    '<td>' + data[i].per_vol + '</td>' +
                    '<td>' + data[i].per_satuan + '</td>' +
                    '<td>' + data[i].per_jlm_penerima + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].pagu) + '</td>' +
                    '<td>' + data[i].mek_vol_swa + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].mek_nilai_swa) + '</td>' +
                    '<td>' + data[i].mek_vol_kon + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].mek_nilai_kon) + '</td>' +
                    '<td>' + data[i].mek_metode + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].real_keu) + '</td>' +
                    '<td>' + data[i].real_keu_per + '</td>' +
                    '<td>' + data[i].real_fik + '</td>' +
                    '<td>' + data[i].kodefikasi + '</td>' +

                    '</tr>';
                $('#show_dak_fisik_view').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER</h5></td></tr>' + html);
            }
        },

    })
    $.ajax({
        type: "get",
        "url": BASE_URL + "dak/get_dak_non_fisik/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            if (data == 0) {
                html += '<tr>' +
                    '<td colspan="16"><h6>Tidak Ada Data yang ditampilkan</h6></td>' +
                    '</tr>';
                $('#show_dak_non_fisik_view').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) NON FISIK REGULER</h5></td></tr>' + html);

            }
            var html = '';
            var count = 1;
            var i;
            for (i = 0; i < data.length; i++) {
                if (data[i].status_dak_non_fisik == 0) {
                    var status = '<span class="badge badge-danger badge-pill noti-icon-badge">Belum Input</span>'
                } else {
                    var status = '<span class="badge badge-success badge-pill noti-icon-badge">Sudah Input</span>'
                }
                html += '<tr>' +
                    '<td>' + count++ + '</td>' +
                    '<td>' + data[i].keg + '<br>' + status + '</td>' +
                    '<td>' + data[i].per_vol + '</td>' +
                    '<td>' + data[i].per_satuan + '</td>' +
                    '<td>' + data[i].per_jlm_penerima + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].pagu) + '</td>' +
                    '<td>' + data[i].mek_vol_swa + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].mek_nilai_swa) + '</td>' +
                    '<td>' + data[i].mek_vol_kon + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].mek_nilai_kon) + '</td>' +
                    '<td>' + data[i].mek_metode + '</td>' +
                    '<td class="text-right">' + Rupiah(data[i].real_keu) + '</td>' +
                    '<td>' + data[i].real_keu_per + '</td>' +
                    '<td>' + data[i].real_fik + '</td>' +
                    '<td>' + data[i].kodefikasi + '</td>' +

                    '</tr>';
                $('#show_dak_non_fisik_view').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) NON FISIK </h5></td></tr>' + html);
            }
        },

    })
}
