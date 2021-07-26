
$('#select_bln').change(function () {
    var id_bln_select = $(this).val();

    TabelApbd(id_bln_select)
    count(id_bln_select)
    $('#TabelApbdAdmin').DataTable().ajax.reload(null, false);


});

function ReloadApbd() {
    var id_bln_select = $('#select_bln').val();
    TabelApbd(id_bln_select)
}
function ReloadSKPD() {
    var id_unit = $('#skpd_view').val();
    TabelView(id_unit)
}

function CetakApbd() {
    var id_bln_select = $('#select_bln').val();
    var url = BASE_URL + "admin/apbd/cetak_apbd/" + id_bln_select
    window.open(url, '_blank');
}

function CetakApbdExcel() {
    var id_bln_select = $('#select_bln').val();
    var url = BASE_URL + "admin/apbd/export_excel/" + id_bln_select
    window.open(url, '_blank');
}

function TabelApbd(id_bln_select) {
    var table = $('#TabelApbdAdmin').DataTable({


        destroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true,
        "columnDefs": [{
            "visible": false,

        }],
        "order": [
            [0, 'asc']
        ],

        "language": {
            "lengthMenu": "Tampilkan _MENU_ item per halaman",
            "zeroRecords": "Tidak ada data yang ditampilkan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang ditampilkan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            },
        },
        "displayLength": 25,
        "ajax": {

            "url": BASE_URL + "admin/apbd/json_apbd/" + id_bln_select,
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "id_bln",
                "orderable": true,
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_unit + '</div>'

                }
            },


            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pg_apbd == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-right">' + Rupiah(data.pg_apbd) + '</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pg_bl_op == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-right">' + Rupiah(data.real_apbd) + '</div>'
                    }

                }
            },
            {
                "orderable": true,
                "class": "bg-warning",
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pg_bl_bm == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + data.real_apbd_per + '</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pg_bl_bt == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + data.real_apbd_fisik + '</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status == 0) {
                        return '<div class="text-center text-danger">Belum Input</div>'
                    } else {
                        return '<div class="text-center text-success">Sudah Input</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (akses == 1) {
                        return '<div class="text-center">' +
                            '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailApbd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                            '<a href="' + BASE_URL + 'apbd/cetak_apbd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light btn-sm btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> </a>&nbsp;' +
                            '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalApbdAdmin(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;</div>'

                    } else if (akses == 2) {
                        return '<div class="text-center">' +
                            '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailApbd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                            '<a href="' + BASE_URL + 'apbd/cetak_apbd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light btn-sm btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> </a>&nbsp;'

                    }

                }
            },



        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },


    });
    $('#TabelApbdAdmin tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

}

function count(id_bln_select) {
    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/apbd/json_total/" + id_bln_select,
        dataType: "JSON",
        success: function (data) {
            document.getElementById("pg_bl_op").innerHTML = Rupiah(data.pg_bl_op);
            document.getElementById("rk_keu_op_rp").innerHTML = Rupiah(data.rk_keu_op_rp);
            document.getElementById("rk_keu_op_per").innerHTML = data.rk_keu_op_per.toFixed(2);
            document.getElementById("rf_op").innerHTML = data.rf_op.toFixed(2);

            document.getElementById("pg_bl_bm").innerHTML = Rupiah(data.pg_bl_bm);
            document.getElementById("rk_keu_bm_rp").innerHTML = Rupiah(data.rk_keu_bm_rp);
            document.getElementById("rk_keu_bm_per").innerHTML = data.rk_keu_bm_per.toFixed(2);
            document.getElementById("rf_bm").innerHTML = data.rf_bm.toFixed(2);

            document.getElementById("pg_btt").innerHTML = Rupiah(data.pg_btt);
            document.getElementById("rk_keu_btt_rp").innerHTML = Rupiah(data.rk_keu_btt_rp);
            document.getElementById("rk_keu_btt_per").innerHTML = data.rk_keu_btt_per.toFixed(2);
            document.getElementById("rf_btt").innerHTML = data.rf_btt.toFixed(2);

            document.getElementById("pg_bl_bt").innerHTML = Rupiah(data.pg_bl_bt);
            document.getElementById("rk_keu_bt_rp").innerHTML = Rupiah(data.rk_keu_bt_rp);
            document.getElementById("rk_keu_bt_per").innerHTML = data.rk_keu_bt_per.toFixed(2);
            document.getElementById("rf_bt").innerHTML = data.rf_btt.toFixed(2);

            document.getElementById("pg_apbd").innerHTML = Rupiah(data.pg_apbd);
            document.getElementById("real_apbd").innerHTML = Rupiah(data.real_apbd);
            document.getElementById("real_apbd_per").innerHTML = data.real_apbd_per.toFixed(2);
            document.getElementById("real_apbd_fisik").innerHTML = data.real_apbd_fisik.toFixed(2);





        },

    })

}

function DetailApbd(elem) {
    var bln = $(elem).data("bln");
    var unit = $(elem).data("unit");
    var nm_bln = $(elem).data("nmbln");
    var skpd = $(elem).data("skpd");


    $('#DetailApbd').modal('show');
    document.getElementById("nmbln").innerHTML = nm_bln;
    document.getElementById('NmSkpd').innerHTML = skpd;

    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/apbd/json_detail/" + unit + "/" + bln,
        dataType: "JSON",
        success: function (data) {
            document.getElementById("pg_bl_op_detail").innerHTML = Rupiah(data.pg_bl_op);
            document.getElementById("rk_keu_op_rp_detail").innerHTML = Rupiah(data.rk_keu_op_rp);
            document.getElementById("rk_keu_op_per_detail").innerHTML = data.rk_keu_op_per.toFixed(2);
            document.getElementById("rf_op_detail").innerHTML = data.rf_op.toFixed(2);

            document.getElementById("pg_bl_bm_detail").innerHTML = Rupiah(data.pg_bl_bm);
            document.getElementById("rk_keu_bm_rp_detail").innerHTML = Rupiah(data.rk_keu_bm_rp);
            document.getElementById("rk_keu_bm_per_detail").innerHTML = data.rk_keu_bm_per.toFixed(2);
            document.getElementById("rf_bm_detail").innerHTML = data.rf_bm.toFixed(2);

            document.getElementById("pg_btt_detail").innerHTML = Rupiah(data.pg_btt);
            document.getElementById("rk_keu_btt_rp_detail").innerHTML = Rupiah(data.rk_keu_btt_rp);
            document.getElementById("rk_keu_btt_per_detail").innerHTML = data.rk_keu_btt_per.toFixed(2);
            document.getElementById("rf_btt_detail").innerHTML = data.rf_btt.toFixed(2);

            document.getElementById("pg_bl_bt_detail").innerHTML = Rupiah(data.pg_bl_bt);
            document.getElementById("rk_keu_bt_rp_detail").innerHTML = Rupiah(data.rk_keu_bt_rp);
            document.getElementById("rk_keu_bt_per_detail").innerHTML = data.rk_keu_bt_per.toFixed(2);
            document.getElementById("rf_bt_detail").innerHTML = data.rf_btt.toFixed(2);

            document.getElementById("pg_apbd_detail").innerHTML = Rupiah(data.pg_apbd);
            document.getElementById("real_apbd_detail").innerHTML = Rupiah(data.real_apbd);
            document.getElementById("real_apbd_per_detail").innerHTML = data.real_apbd_per.toFixed(2);
            document.getElementById("real_apbd_fisik_detail").innerHTML = data.real_apbd_fisik.toFixed(2);





        },

    })
}


function ModalApbdAdmin(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    $.ajax({
        type: "POST",
        "url": BASE_URL + "apbd/get_apbd/" + bln + "/" + unit,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalApbdAdmin').modal('show');
            document.getElementById('NmBlnApbdAdmin').innerHTML = nm_bln;

            $('#id_unitAdmin').val(data['id_unit']);
            $('#id_blnAdmin').val(data['id_bln']);
            $('#pg_apbdAdmin').val(data['pg_apbd']).formatCurrency();
            $('#real_apbdAdmin').val(data['real_apbd']).formatCurrency();;
            $('#real_apbd_perAdmin').val(data['real_apbd_per']);
            $('#real_apbd_fisikAdmin').val(data['real_apbd_fisik']);
            //$('#pg_bl_opAdmin').val(data['pg_bl_op']).formatCurrency();;
            $('#rk_keu_op_rpAdmin').val(data['rk_keu_op_rp']).formatCurrency();;
            $('#rk_keu_op_perAdmin').val(data['rk_keu_op_per']);
            $('#rf_opAdmin').val(data['rf_op']);
            //$('#pg_bl_bmAdmin').val(data['pg_bl_bm']).formatCurrency();;
            $('#rk_keu_bm_rpAdmin').val(data['rk_keu_bm_rp']).formatCurrency();;
            $('#rk_keu_bm_perAdmin').val(data['rk_keu_bm_per']);
            $('#rf_bmAdmin').val(data['rf_bm']);
            //$('#pg_bttAdmin').val(data['pg_btt']).formatCurrency();;
            $('#rk_keu_btt_rpAdmin').val(data['rk_keu_btt_rp']).formatCurrency();;
            $('#rk_keu_btt_perAdmin').val(data['rk_keu_btt_per']);
            $('#rf_bttAdmin').val(data['rf_btt']);
            //$('#pg_bl_btAdmin').val(data['pg_bl_bt']).formatCurrency();;
            $('#rk_keu_bt_rpAdmin').val(data['rk_keu_bt_rp']).formatCurrency();;
            $('#rk_keu_bt_perAdmin').val(data['rk_keu_bt_per']);
            $('#rf_btAdmin').val(data['rf_bt']);

        },

    })
    $.ajax({
        type: "POST",
        "url": BASE_URL + "master/get_pagu/" + unit,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#pg_bl_opAdmin').val(data['pg_bl_op']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bl_bmAdmin').val(data['pg_bl_bm']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bttAdmin').val(data['pg_btt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bl_btAdmin').val(data['pg_bt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });

        },

    })
}

$('#pg_bl_opAdmin, #rk_keu_op_rpAdmin').keyup(function (e) {

    var pg_bl_op = $('#pg_bl_opAdmin').val().replace(/,/g, '');
    var rk_keu_op_rp = $('#rk_keu_op_rpAdmin').val().replace(/,/g, '');

    var rk_keu_op_per = rk_keu_op_rp / pg_bl_op * 100;
    var per = rk_keu_op_per.toFixed(2)
    $('#rk_keu_op_perAdmin').val(per);
});


$('#pg_bl_bmAdmin, #rk_keu_bm_rpAdmin').keyup(function (e) {

    var pg_bl_bm = $('#pg_bl_bmAdmin').val().replace(/,/g, '');
    var rk_keu_bm_rp = $('#rk_keu_bm_rpAdmin').val().replace(/,/g, '');

    var rk_keu_bm_per = rk_keu_bm_rp / pg_bl_bm * 100;
    var per_bm = rk_keu_bm_per.toFixed(2)
    $('#rk_keu_bm_perAdmin').val(per_bm);
});

$('#pg_bttAdmin, #rk_keu_btt_rpAdmin').keyup(function (e) {

    var pg_btt = $('#pg_bttAdmin').val().replace(/,/g, '');
    var rk_keu_btt_rp = $('#rk_keu_btt_rpAdmin').val().replace(/,/g, '');

    var rk_keu_btt_per = rk_keu_btt_rp / pg_btt * 100;
    var per_btt = rk_keu_btt_per.toFixed(2)
    $('#rk_keu_btt_perAdmin').val(per_btt);
});

$('#pg_bl_btAdmin, #rk_keu_bt_rpAdmin').keyup(function (e) {

    var pg_bl_bt = $('#pg_bl_btAdmin').val().replace(/,/g, '');
    var rk_keu_bt_rp = $('#rk_keu_bt_rpAdmin').val().replace(/,/g, '');

    var rk_keu_bt_per = rk_keu_bt_rp / pg_bl_bt * 100;
    var per_bl_bt = rk_keu_bt_per.toFixed(2)
    $('#rk_keu_bt_perAdmin').val(per_bl_bt);
});

$('#pg_bl_opAdmin, #pg_bl_bmAdmin, #pg_bttAdmin, #pg_bl_btAdmin').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'sumapbd']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#pg_apbdAdmin").val(sum).formatCurrency({});
});

$('#rk_keu_op_rpAdmin, #rk_keu_bm_rpAdmin, #rk_keu_btt_rpAdmin, #rk_keu_bt_rpAdmin').keyup(function (e) {

    var sum2 = 0;
    $("input[class *= 'apbd_real']").each(function () {
        sum2 += +$(this).val().replace(/,/g, '');
    });
    $("#real_apbdAdmin").val(sum2).formatCurrency({});;
});


$('#pg_bl_opAdmin, #pg_bl_bmAdmin, #pg_bttAdmin, #pg_bl_btAdmin, #rk_keu_op_rpAdmin, #rk_keu_bm_rpAdmin, #rk_keu_btt_rpAdmin, #rk_keu_bt_rpAdmin').keyup(function (e) {

    var pg_apbd = $('#pg_apbdAdmin').val().replace(/,/g, '');
    var real_apbd = $('#real_apbdAdmin').val().replace(/,/g, '');

    var real_apbd_per = real_apbd / pg_apbd * 100;
    var per_apbd = real_apbd_per.toFixed(2)
    $('#real_apbd_perAdmin').val(per_apbd);
});

$('#rf_opAdmin, #rf_bmAdmin, #rf_bttAdmin, #rf_btAdmin').keyup(function (e) {
    var rf_op = $('#rf_opAdmin').val().replace(/,/g, '');
    var rf_bm = $('#rf_bmAdmin').val().replace(/,/g, '');
    var rf_btt = $('#rf_bttAdmin').val().replace(/,/g, '');
    var rf_bt = $('#rf_btAdmin').val().replace(/,/g, '');

    var pg_bl_op = $('#pg_bl_opAdmin').val().replace(/,/g, '');
    var pg_bl_bm = $('#pg_bl_bmAdmin').val().replace(/,/g, '');
    var pg_btt = $('#pg_bttAdmin').val().replace(/,/g, '');
    var pg_bl_bt = $('#pg_bl_btAdmin').val().replace(/,/g, '');

    var pg_apbd = $('#pg_apbdAdmin').val().replace(/,/g, '');


    fisik_op = (rf_op * pg_bl_op) / 100
    fisik_op_keu = fisik_op

    fisik_bm = (rf_bm * pg_bl_bm) / 100
    fisik_bm_keu = fisik_bm

    fisik_btt = (rf_btt * pg_btt) / 100
    fisik_btt_keu = fisik_btt

    fisik_bt = (rf_bt * pg_bl_bt) / 100
    fisik_bt_keu = fisik_bt

    total_fisik_keu = fisik_op_keu + fisik_bm_keu + fisik_btt_keu + fisik_bt_keu;

    fisik_apbd = total_fisik_keu / pg_apbd * 100;

    $('#real_apbd_fisikAdmin').val(fisik_apbd.toFixed(2));


});

$('#FormApbdAdmin').on('submit', function (e) {


    var postData = new FormData($("#FormApbdAdmin")[0]);
    var id_unit = $('#skpd_view').val();
    $.ajax({
        type: "post",
        "url": BASE_URL + "admin/apbd/post_apbd",
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
            $('#ModalApbdAdmin').modal('hide');
            $('#TabelApbdAdmin').DataTable().ajax.reload(null, false);

            var reloadskpd = $('#skpd_view').val()

            if (reloadskpd != "") {
                ReloadSKPD()
            }
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelApbdAdmin').DataTable().ajax.reload(null, false);


        },
    })
    return false;
});

$('#skpd_view').change(function () {
    var id_unit = $(this).val();

    TabelView(id_unit)


});


function TabelView(id_unit) {
    var table = $('#TabelPagu').DataTable({


        destroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bAutoWidth": true,
        "columnDefs": [{
            "visible": false,
            "targets": [1],

        }],
        "order": [
            [0, 'asc']
        ],

        "language": {
            "lengthMenu": "Tampilkan _MENU_ item per halaman",
            "zeroRecords": "Tidak ada data yang ditampilkan",
            "info": "Menampilkan Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang ditampilkan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            },
        },
        "displayLength": 25,
        "ajax": {

            "url": BASE_URL + "admin/apbd/json_apbd_skpd/" + id_unit,
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "urut",
                "orderable": true,
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_unit + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_bln + '</div>'

                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-right">' + Rupiah(data.pg_apbd) + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-right">' + Rupiah(data.real_apbd) + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-right text-warning">' + data.real_apbd_per + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-right">' + data.real_apbd_fisik + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (akses == 1) {
                        return '<div class="text-center">' +
                            '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailApbd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                            '<a href="' + BASE_URL + 'apbd/cetak_apbd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light btn-sm btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> </a>&nbsp;' +
                            '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalApbdAdmin(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;</div>'

                    } else if (akses == 2) {
                        return '<div class="text-center">' +
                            '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailApbd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                            '<a href="' + BASE_URL + 'apbd/cetak_apbd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light btn-sm btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> </a>&nbsp;'

                    }

                }
            },





        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        },
        "drawCallback": function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(1, { page: 'current' }).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="group bg-secondary text-white"><td colspan="7"> ' + group + '</td></tr>'
                    );

                    last = group;
                }
            });
        }


    });
}