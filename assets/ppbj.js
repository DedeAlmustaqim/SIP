
$(document).ready(function () {

    var id_bln = $('#bln_ppbj').val()
    var unit = $('#unit_ppbj').val()

    show_ppbj(id_bln, unit)

    $('#bln_ppbj').change(function () {
        var id_bln = $(this).val();
        var unit = $('#unit_ppbj').val()
        swal({
            title: 'Menampilkan Data ' + GetMonthName(id_bln),
            timer: 700,
        })
        show_ppbj(id_bln, unit)

    });
});

function show_ppbj(id_bln, unit) {
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
                '<td class="text-right">' + Rupiah(data.bp_rp_50) + '</td>' +
                '<td class="text-center">' +
                '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalPpbj50(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                '<a href="' + BASE_URL + 'ppbj/cetak_ppbj_50/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-sm btn-warning" ><i class="mdi mdi-printer"></i></a>' +
                '</td>';

            ppbj200 = '<td class="text-center">2</td>' +
                '<td><b>PAKET NON STRATEGIS (>RP. 200 JT S/D Rp. 2,5 M)</b><br>' + stts_200 + ' </td>' +
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
                '<td class="text-right">' + Rupiah(data.bp_rp_200) + '</td>' +
                '<td class="text-center">' +
                '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalPpbj200(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                '<a href="' + BASE_URL + 'ppbj/cetak_ppbj_200/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-sm btn-warning" ><i class="mdi mdi-printer"></i></a>' +
                '</td>';

            ppbj25 = '<td class="text-center">2</td>' +
                '<td><b>PAKET NON STRATEGIS (>RP. 2,5 M S/D Rp. 5 M)</b><br>' + stts_25 + ' </td>' +
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
                '<td class="text-right">' + Rupiah(data.bp_rp_25) + '</td>' +
                '<td class="text-center">' +
                '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalPpbj25(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                '<a href="' + BASE_URL + 'ppbj/cetak_ppbj_25/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-sm btn-warning" ><i class="mdi mdi-printer"></i></a>' +
                '</td>';
            $('.show_ppbj_50').html(ppbj50);
            $('.show_ppbj_200').html(ppbj200);
            $('.show_ppbj_25').html(ppbj25);
        }

    });

}

function ModalPpbj50(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    if (kunci == 0) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Input Data dikunci ',
            timer: 3000,
        })
    } else {

        $.ajax({
            type: "POST",
            "url": BASE_URL + "ppbj/get_ppbj/" + bln + "/" + unit,
            //processData: false,
            contentType: false,
            dataType: "JSON",
            async: true,
            success: function (data) {
                $('#ModalPpbj50').modal('show');
                document.getElementById('NmBlnPpbj50').innerHTML = nm_bln;

                $('#id_unit').val(data['id_unit']);
                $('#id_bln').val(data['id_bln']);
                $('#jml_pkt_50').val(data['jml_pkt_50']);
                $('#jml_pg_50').val(data['jml_pg_50']).formatCurrency();;
                $('#pl_pkt_50').val(data['pl_pkt_50']);
                $('#pl_rp_50').val(data['pl_rp_50']).formatCurrency();;
                $('#h_pl_pkt_50').val(data['h_pl_pkt_50']);
                $('#h_pl_rp_50').val(data['h_pl_rp_50']).formatCurrency();;
                $('#kontrak_pkt_50').val(data['kontrak_pkt_50']);
                $('#kontrak_rp_50').val(data['kontrak_rp_50']).formatCurrency();;
                $('#st_pkt_50').val(data['st_pkt_50']);
                $('#st_rp_50').val(data['st_rp_50']).formatCurrency();;
                $('#bp_pkt_50').val(data['bp_pkt_50']);
                $('#bp_rp_50').val(data['bp_rp_50']).formatCurrency();;

            },

        })
        return false;

    }
}

$('#jml_pkt_50, #pl_pkt_50, #h_pl_pkt_50, #kontrak_pkt_50, #st_pkt_50').keyup(function (e) {

    var jml_pkt_50 = $('#jml_pkt_50').val();
    var pl_pkt_50 = $('#pl_pkt_50').val();
    var pkt_50 = jml_pkt_50 - pl_pkt_50;
    $('#bp_pkt_50').val(pkt_50);
});

$('#jml_pg_50, #pl_rp_50, #h_pl_rp_50, #kontrak_rp_50, #st_rp_50').keyup(function (e) {

    var jml_pg_50 = $('#jml_pg_50').val().replace(/,/g, '');
    var pl_rp_50 = $('#pl_rp_50').val().replace(/,/g, '');
    var rp_50 = jml_pg_50 - pl_rp_50;
    $('#bp_rp_50').val(rp_50);
});

$('#FormPpbj50').on('submit', function (e) {
    var id_bln = $('#bln_ppbj').val()
    var unit = $('#unit_ppbj').val()
    var postData = new FormData($("#FormPpbj50")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "ppbj/post_ppbj_50",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalPpbj50').modal('hide');
            $('#TblPpbj50Admin').DataTable().ajax.reload(null, false);

            show_ppbj(id_bln, unit)
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            show_ppbj(id_bln, unit)

        },
    })
    return false;
});

function ModalPpbj200(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    if (kunci == 0) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Input Data dikunci ',
            timer: 3000,
        })
    } else {

        $.ajax({
            type: "POST",
            "url": BASE_URL + "ppbj/get_ppbj/" + bln + "/" + unit,
            //processData: false,
            contentType: false,
            dataType: "JSON",
            async: true,
            success: function (data) {
                $('#ModalPpbj200').modal('show');
                document.getElementById('NmBlnPpbj200').innerHTML = nm_bln;

                $('#id_unit_ppbj_200').val(data['id_unit']);
                $('#id_bln_ppbj_200').val(data['id_bln']);
                $('#jml_pkt_200').val(data['jml_pkt_200']);
                $('#jml_pg_200').val(data['jml_pg_200']).formatCurrency();;
                $('#pl_pkt_200').val(data['pl_pkt_200']);
                $('#pl_rp_200').val(data['pl_rp_200']).formatCurrency();;
                $('#h_pl_pkt_200').val(data['h_pl_pkt_200']);
                $('#h_pl_rp_200').val(data['h_pl_rp_200']).formatCurrency();;
                $('#kontrak_pkt_200').val(data['kontrak_pkt_200']);
                $('#kontrak_rp_200').val(data['kontrak_rp_200']).formatCurrency();;
                $('#st_pkt_200').val(data['st_pkt_200']);
                $('#st_rp_200').val(data['st_rp_200']).formatCurrency();;
                $('#bp_pkt_200').val(data['bp_pkt_200']);
                $('#bp_rp_200').val(data['bp_rp_200']).formatCurrency();;

            },

        })
        return false;

    }
}


$('#jml_pkt_200, #pl_pkt_200, #h_pl_pkt_200, #kontrak_pkt_200, #st_pkt_200').keyup(function (e) {

    var jml_pkt_200 = $('#jml_pkt_200').val();
    var pl_pkt_200 = $('#pl_pkt_200').val();
    var pkt_200 = jml_pkt_200 - pl_pkt_200;
    $('#bp_pkt_200').val(pkt_200);
});

$('#jml_pg_200, #pl_rp_200, #h_pl_rp_200, #kontrak_rp_200, #st_rp_200').keyup(function (e) {

    var jml_pg_200 = $('#jml_pg_200').val().replace(/,/g, '');
    var pl_rp_200 = $('#pl_rp_200').val().replace(/,/g, '');
    var rp_200 = jml_pg_200 - pl_rp_200;
    $('#bp_rp_200').val(rp_200);
});

$('#FormPpbj200').on('submit', function (e) {
    var id_bln = $('#bln_ppbj').val()
    var unit = $('#unit_ppbj').val()
    var postData = new FormData($("#FormPpbj200")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "ppbj/post_ppbj_200",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalPpbj200').modal('hide');
            show_ppbj(id_bln, unit)
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TblPpbj200').DataTable().ajax.reload(null, false);
            $('#TblPpbj200Admin').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function ModalPpbj25(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    if (kunci == 0) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Input Data dikunci ',
            timer: 3000,
        })
    } else {

        $.ajax({
            type: "POST",
            "url": BASE_URL + "ppbj/get_ppbj/" + bln + "/" + unit,
            //processData: false,
            contentType: false,
            dataType: "JSON",
            async: true,
            success: function (data) {
                $('#ModalPpbj25').modal('show');
                document.getElementById('NmBlnPpbj25').innerHTML = nm_bln;

                $('#id_unit_ppbj_25').val(data['id_unit']);
                $('#id_bln_ppbj_25').val(data['id_bln']);
                $('#jml_pkt_25').val(data['jml_pkt_25']);
                $('#jml_pg_25').val(data['jml_pg_25']).formatCurrency();;
                $('#pl_pkt_25').val(data['pl_pkt_25']);
                $('#pl_rp_25').val(data['pl_rp_25']).formatCurrency();;
                $('#h_pl_pkt_25').val(data['h_pl_pkt_25']);
                $('#h_pl_rp_25').val(data['h_pl_rp_25']).formatCurrency();;
                $('#kontrak_pkt_25').val(data['kontrak_pkt_25']);
                $('#kontrak_rp_25').val(data['kontrak_rp_25']).formatCurrency();;
                $('#st_pkt_25').val(data['st_pkt_25']);
                $('#st_rp_25').val(data['st_rp_25']).formatCurrency();;
                $('#bp_pkt_25').val(data['bp_pkt_25']);
                $('#bp_rp_25').val(data['bp_rp_25']).formatCurrency();;

            },

        })
        return false;

    }
}


$('#jml_pkt_25, #pl_pkt_25, #h_pl_pkt_25, #kontrak_pkt_25, #st_pkt_25').keyup(function (e) {

    var jml_pkt_25 = $('#jml_pkt_25').val();
    var pl_pkt_25 = $('#pl_pkt_25').val();
    var pkt_25 = jml_pkt_25 - pl_pkt_25;
    $('#bp_pkt_25').val(pkt_25);
});

$('#jml_pg_25, #pl_rp_25, #h_pl_rp_25, #kontrak_rp_25, #st_rp_25').keyup(function (e) {

    var jml_pg_25 = $('#jml_pg_25').val().replace(/,/g, '');
    var pl_rp_25 = $('#pl_rp_25').val().replace(/,/g, '');
    var rp_25 = jml_pg_25 - pl_rp_25;
    $('#bp_rp_25').val(rp_25);
});








$('#FormPpbj25').on('submit', function (e) {
    var id_bln = $('#bln_ppbj').val()
    var unit = $('#unit_ppbj').val()
    var postData = new FormData($("#FormPpbj25")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "ppbj/post_ppbj_25",
        processData: false,
        contentType: false,
        data: postData,
        dataType: "JSON",
        success: function (data) {
            swal({
                type: 'success',
                title: 'Simpan',
                text: 'Berhasil Simpan Data',
                timer: 2000,
            })
            $('#ModalPpbj25').modal('hide');
            show_ppbj(id_bln, unit)
            $('#TblPpbj25Admin').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            show_ppbj(id_bln, unit)

        },
    })
    return false;
});