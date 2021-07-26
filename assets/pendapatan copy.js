
$(document).ready(function () {



    var html = "";
    function format(data) {
        return '<table width="100%" height="17%" cellpadding="0" cellspacing="0" class="table-info">' +
            '<col width = "108" span = "2" >' +
            '<col width="52">' +
            '<col width="86">' +
            '<col width="79">' +
            '<col width="52">' +
            '<col width="86">' +
            '<col width="79">' +
            '<col width="52">' +
            '<col width="86">' +
            '<col width="79">' +
            '<col width="47">' +
            '<tr class="text-center">' +
            '<td colspan="3" rowspan="2">PENDAPATAN    ASLI DAERAH</td>' +
            '<td height="24%" colspan="6">PENDAPATAN TRANSFER</td>' +
            '<td colspan="3" rowspan="2">LAIN - LAIN PENDAPATAN DAERAH    YANG SAH</td>' +
            '</tr>' +
            '<tr class="text-center">' +
            '<td height="24%" colspan="3">TRANSFER PUSAT</td>' +
            '<td colspan="3">TRANSFER ANTAR DAERAH</td>' +
            '</tr>' +
            '<tr class="text-center">' +
            '<td width="13%" height="52%">TARGET (Rp)</td>' +
            '<td width="13%">REALISASI    (Rp)</td>' +
            '<td width="3%">(%)</td>' +
            '<td width="11%">TARGET  (Rp)</td>' +
            '<td width="10%">REALISASI    (Rp)</td>' +
            '<td width="3%">(%)</td>' +
            '<td width="11%">TARGET  (Rp)</td>' +
            '<td width="10%">REALISASI    (Rp)</td>' +
            '<td width="3%">(%)</td>' +
            '<td width="10%">TARGET    (Rp)</td>' +
            '<td width="10%">REALISASI    (Rp)</td>' +
            '<td width="3%">(%)</td>' +
            '</tr>' +
            '<tr>' +
            '<td class="text-right">' + Rupiah(data.pad_target) + '</td>' +
            '<td class="text-right">' + Rupiah(data.pad_real) + '</td>' +
            '<td class="text-right">' + data.pad_real_per + '</td>' +


            '<td class="text-right">' + Rupiah(data.tp_target) + '</td>' +
            '<td class="text-right">' + Rupiah(data.tp_keu) + '</td>' +
            '<td class="text-right">' + data.tp_per + '</td>' +

            '<td class="text-right">' + Rupiah(data.tad_target) + '</td>' +
            '<td class="text-right">' + Rupiah(data.tad_keu) + '</td>' +
            '<td class="text-right">' + data.tad_per + '</td>' +

            '<td class="text-right">' + Rupiah(data.pad_sah_target) + '</td>' +
            '<td class="text-right">' + Rupiah(data.pad_sah_keu) + '</td>' +
            '<td class="text-right">' + data.pad_sah_per + '</td>' +
            '</tr>' +
            '</table>'



    }

    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    var table = $('#TabelPd').DataTable({
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
            "url": BASE_URL + "/pendapatan/json_pd",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "id_bln",
                "orderable": true,
                "className": 'details-control text-center',
            },

            {
                "className": 'details-control',
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.kunci_bln == 0) {
                        return '<div class="text-left"><h6><i class="ti-lock text-danger"></i> ' + data.nm_bln + '</h6></div>'

                    } else {
                        return '<div class="text-left"><h6><i class="ti-unlock text-success"></i> ' + data.nm_bln + ' </h6>Batas Input : <small class="badge badge-warning">' + data.tgl1 + '  s/d ' + data.tgl2 + '</small></div>'

                    }
                }
            },


            {
                "className": 'details-control',
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.target_total == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + Rupiah(data.target_total) + '</div>'
                    }

                }
            },
            {
                "className": 'details-control',
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.keu_total == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + Rupiah(data.keu_total) + '</div>'
                    }

                }
            },
            {
                "className": 'details-control',
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.keu_per_total == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + data.keu_per_total + '</div>'
                    }

                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalPd(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Input Data"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;' +
                        '<a href="' + BASE_URL + 'pendapatan/cetak_pd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-sm btn-warning" ><i class="mdi mdi-printer"></i></a>&nbsp' +
                        '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailPdSkpd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                        '</div>'

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
    $('#TabelPd tbody').on('click', 'td.details-control', function () {
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

});




function ModalPd(elem) {
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
            "url": BASE_URL + "pendapatan/get_pd/" + bln + "/" + unit,
            //processData: false,
            contentType: false,
            dataType: "JSON",
            async: true,
            success: function (data) {
                $('#ModalPd').modal('show');
                document.getElementById('NmBlnPd').innerHTML = nm_bln;

                $('#id_unit_pd').val(data['id_unit']);
                $('#id_bln_pd').val(data['id_bln']);
                
                
                $('#target_total').val(data['target_total']).formatCurrency();
                $('#keu_total').val(data['keu_total']).formatCurrency();
                $('#keu_per_total').val(data['keu_per_total']);

                $('#pad_target').val(data['pad_target']).formatCurrency();
                $('#pad_real').val(data['pad_real']).formatCurrency();
                $('#pad_real_per').val(data['pad_real_per']);

                $('#tp_target').val(data['tp_target']).formatCurrency();
                $('#tp_keu').val(data['tp_keu']).formatCurrency();
                $('#tp_per').val(data['tp_per']);

                $('#tad_target').val(data['tad_target']).formatCurrency();
                $('#tad_keu').val(data['tad_keu']).formatCurrency();
                $('#tad_per').val(data['tad_per']);

                $('#pad_sah_target').val(data['pad_sah_target']).formatCurrency();
                $('#pad_sah_keu').val(data['pad_sah_keu']).formatCurrency();
                $('#pad_sah_per').val(data['pad_sah_per']);
                

            },

        })
        return false;

    }
}

$('.rp').blur(function () {
    $('.rp').formatCurrency();
});


$('#pad_target, #pad_real').keyup(function (e) {

    var pad_target = $('#pad_target').val().replace(/,/g, '');
    var pad_real = $('#pad_real').val().replace(/,/g, '');

    var pad_real_per = pad_real / pad_target * 100;
    var per = pad_real_per.toFixed(2)
    $('#pad_real_per').val(per);
});

$('#tp_target, #tp_keu').keyup(function (e) {

    var tp_target = $('#tp_target').val().replace(/,/g, '');
    var tp_keu = $('#tp_keu').val().replace(/,/g, '');

    var tp_per = tp_keu / tp_target * 100;
    var per = tp_per.toFixed(2)
    $('#tp_per').val(per);
});

$('#tad_target, #tad_keu').keyup(function (e) {

    var tad_target = $('#tad_target').val().replace(/,/g, '');
    var tad_keu = $('#tad_keu').val().replace(/,/g, '');

    var tad_per = tad_keu / tad_target * 100;
    var per = tad_per.toFixed(2)
    $('#tad_per').val(per);
});

$('#pad_sah_target, #pad_sah_keu').keyup(function (e) {

    var pad_sah_target = $('#pad_sah_target').val().replace(/,/g, '');
    var pad_sah_keu = $('#pad_sah_keu').val().replace(/,/g, '');

    var pad_sah_per = pad_sah_keu / pad_sah_target * 100;
    var per = pad_sah_per.toFixed(2)
    $('#pad_sah_per').val(per);
});


$('#pad_target, #tp_target, #tad_target, #pad_sah_target').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'sumpd']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#target_total").val(sum).formatCurrency({});
});

$('#pad_real, #tp_keu, #tad_keu, #pad_sah_keu').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'keu']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#keu_total").val(sum).formatCurrency({});
});


$('#pad_target, #pad_real, #tp_target, #tp_keu, #tad_target, #tad_keu, #pad_sah_target, #pad_sah_keu').keyup(function (e) {

    var target_total = $('#target_total').val().replace(/,/g, '');
    var keu_total = $('#keu_total').val().replace(/,/g, '');

    var keu_per_total = keu_total / target_total * 100;
    var per_pd = keu_per_total.toFixed(2)
    $('#keu_per_total').val(per_pd);
});


$('#FormPd').on('submit', function (e) {
    var postData = new FormData($("#FormPd")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "pendapatan/post_pd",
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
            $('#ModalPd').modal('hide');
            $('#TabelPd').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPd').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});


function DetailPdSkpd(elem) {
    var bln = $(elem).data("bln");
    var unit = $(elem).data("unit");
    var nm_bln = $(elem).data("nmbln");
    var skpd = $(elem).data("skpd");
    $('#DetailPd').modal('show');
    document.getElementById("NmBlnPd").innerHTML = nm_bln;
    document.getElementById('NmSkpdPd').innerHTML = skpd;
    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/pendapatan/get_pd/" + bln + "/" + unit,
        dataType: "JSON",
        success: function (data) {
            document.getElementById("pad_target_detail").innerHTML = Rupiah(data.pad_target);
            document.getElementById("pad_real_detail").innerHTML = Rupiah(data.pad_real);
            document.getElementById("pad_real_per_detail").innerHTML = data.pad_real_per;
            document.getElementById("tp_target_detail").innerHTML = Rupiah(data.tp_target);
            document.getElementById("tp_keu_detail").innerHTML = Rupiah(data.tp_keu);
            document.getElementById("tp_per_detail").innerHTML = data.tp_per;
            document.getElementById("tad_target_detail").innerHTML = Rupiah(data.tad_target);
            document.getElementById("tad_keu_detail").innerHTML = Rupiah(data.tad_keu);
            document.getElementById("tad_per_detail").innerHTML = data.tad_per;
            document.getElementById("pad_sah_target_detail").innerHTML = Rupiah(data.pad_sah_target);
            document.getElementById("pad_sah_keu_detail").innerHTML = Rupiah(data.pad_sah_keu);
            document.getElementById("pad_sah_per_detail").innerHTML = data.pad_sah_per;
            document.getElementById("target_total_detail").innerHTML = Rupiah(data.target_total);
            document.getElementById("keu_total_detail").innerHTML = Rupiah(data.keu_total);
            document.getElementById("keu_per_total_detail").innerHTML = data.keu_per_total;
        },
    })
}
