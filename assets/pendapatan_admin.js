$(document).ready(function () {

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
});

$('#BlnPd').change(function () {
    var bln = $(this).val();

    TabelPd(bln)
    count_pd(bln)
    $('#TabelPdAdmin').DataTable().ajax.reload(null, false);


});

function count_pd(bln) {
    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/pendapatan/json_total/" + bln,
        dataType: "JSON",
        success: function (data) {
            document.getElementById("pad_target").innerHTML = Rupiah(data.pad_target);
            document.getElementById("pad_real").innerHTML = Rupiah(data.pad_real);
            document.getElementById("pad_real_per").innerHTML = data.pad_real_per.toFixed(2);

            document.getElementById("tp_target").innerHTML = Rupiah(data.tp_target);
            document.getElementById("tp_keu").innerHTML = Rupiah(data.tp_keu);
            document.getElementById("tp_per").innerHTML = data.tp_per.toFixed(2);

            document.getElementById("tad_target").innerHTML = Rupiah(data.tad_target);
            document.getElementById("tad_keu").innerHTML = Rupiah(data.tad_keu);
            document.getElementById("tad_per").innerHTML = data.tad_per.toFixed(2);

            document.getElementById("pad_sah_target").innerHTML = Rupiah(data.pad_sah_target);
            document.getElementById("pad_sah_keu").innerHTML = Rupiah(data.pad_sah_keu);
            document.getElementById("pad_sah_per").innerHTML = data.pad_sah_per.toFixed(2);

            document.getElementById("target_total").innerHTML = Rupiah(data.target_total);
            document.getElementById("keu_total").innerHTML = Rupiah(data.keu_total);
            document.getElementById("keu_per_total").innerHTML = data.keu_per_total.toFixed(2);

        },

    })

}

function TabelPd(bln) {
    var table = $('#TabelPdAdmin').DataTable({


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

            "url": BASE_URL + "admin/pendapatan/json_pd/" + bln,
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
                    if (data.pad_target == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-right">' + Rupiah(data.pad_target) + '</div>'
                    }

                }
            },
            {
                "orderable": true,
                "class": "bg-warning",
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pad_real == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-right">' + Rupiah(data.pad_real) + '</div>'
                    }

                }
            },
            {
                "orderable": true,
                "class": "bg-warning",
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.pad_real_per == null) {
                        return '<div class="text-center text-danger">Mohon Sinkron</div>'
                    } else {
                        return '<div class="text-center">' + data.pad_real_per + '</div>'
                    }

                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (akses == 1) {
                        return '<div class="text-center">' +
                            '<button type="button" class="btn waves-effect waves-light btn-sm btn-primary" onClick="DetailPd(this)" data-unit="' + data.id_unit + '" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '" data-skpd="' + data.nm_unit + '" title="Detail"><i class="mdi mdi-eye-circle-outline"></i></button>&nbsp' +
                            '<a href="' + BASE_URL + 'pendapatan/cetak_pd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light btn-sm btn-warning" title="Cetak"><i class="mdi mdi-printer"></i> </a>&nbsp;' +
                            '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalPdAdmin(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" title="Edit"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;</div>'

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


}

function DetailPd(elem) {
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


function ModalPdAdmin(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    $.ajax({
        type: "POST",
        "url": BASE_URL + "pendapatan/get_pd/" + bln + "/" + unit,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalPdAdmin').modal('show');
            document.getElementById('NmBlnPdAdmin').innerHTML = nm_bln;

            $('#id_unit_pd_admin').val(data['id_unit']);
            $('#id_bln_pd_admin').val(data['id_bln']);
            
            
            $('#target_total_admin').val(data['target_total']).formatCurrency();
            $('#keu_total_admin').val(data['keu_total']).formatCurrency();
            $('#keu_per_total_admin').val(data['keu_per_total']);

            $('#pad_target_admin').val(data['pad_target']).formatCurrency();
            $('#pad_real_admin').val(data['pad_real']).formatCurrency();
            $('#pad_real_per_admin').val(data['pad_real_per']);

            $('#tp_target_admin').val(data['tp_target']).formatCurrency();
            $('#tp_keu_admin').val(data['tp_keu']).formatCurrency();
            $('#tp_per_admin').val(data['tp_per']);

            $('#tad_target_admin').val(data['tad_target']).formatCurrency();
            $('#tad_keu_admin').val(data['tad_keu']).formatCurrency();
            $('#tad_per_admin').val(data['tad_per']);

            $('#pad_sah_target_admin').val(data['pad_sah_target']).formatCurrency();
            $('#pad_sah_keu_admin').val(data['pad_sah_keu']).formatCurrency();
            $('#pad_sah_per_admin').val(data['pad_sah_per']);
            

        },

    })
    return false;
}

$('#pad_target_admin, #pad_real_admin').keyup(function (e) {

    var pad_target = $('#pad_target_admin').val().replace(/,/g, '');
    var pad_real = $('#pad_real_admin').val().replace(/,/g, '');

    var pad_real_per = pad_real / pad_target * 100;
    var per = pad_real_per.toFixed(2)
    $('#pad_real_per_admin').val(per);
});

$('#tp_target_admin, #tp_keu_admin').keyup(function (e) {

    var tp_target = $('#tp_target_admin').val().replace(/,/g, '');
    var tp_keu = $('#tp_keu_admin').val().replace(/,/g, '');

    var tp_per = tp_keu / tp_target * 100;
    var per = tp_per.toFixed(2)
    $('#tp_per_admin').val(per);
});

$('#tad_target_admin, #tad_keu_admin').keyup(function (e) {

    var tad_target = $('#tad_target_admin').val().replace(/,/g, '');
    var tad_keu = $('#tad_keu_admin').val().replace(/,/g, '');

    var tad_per = tad_keu / tad_target * 100;
    var per = tad_per.toFixed(2)
    $('#tad_per_admin').val(per);
});

$('#pad_sah_target_admin, #pad_sah_keu_admin').keyup(function (e) {

    var pad_sah_target = $('#pad_sah_target_admin').val().replace(/,/g, '');
    var pad_sah_keu = $('#pad_sah_keu_admin').val().replace(/,/g, '');

    var pad_sah_per = pad_sah_keu / pad_sah_target * 100;
    var per = pad_sah_per.toFixed(2)
    $('#pad_sah_per_admin').val(per);
});


$('#pad_target_admin, #tp_target_admin, #tad_target_admin, #pad_sah_target_admin').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'sumpd']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#target_total_admin").val(sum).formatCurrency({});
});

$('#pad_real_admin, #tp_keu, #tad_keu_admin, #pad_sah_keu_admin').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'keu']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#keu_total_admin").val(sum).formatCurrency({});
});


$('#pad_target_admin, #pad_real_admin, #tp_target_admin, #tp_keu_admin, #tad_target_admin, #tad_keu_admin, #pad_sah_target_admin, #pad_sah_keu_admin').keyup(function (e) {

    var target_total = $('#target_total_admin').val().replace(/,/g, '');
    var keu_total = $('#keu_total_admin').val().replace(/,/g, '');

    var keu_per_total = keu_total / target_total * 100;
    var per_pd = keu_per_total.toFixed(2)
    $('#keu_per_total_admin').val(per_pd);
});


$('#FormPdAdmin').on('submit', function (e) {
    var postData = new FormData($("#FormPdAdmin")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "admin/pendapatan/post_pd",
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
            $('#ModalPdAdmin').modal('hide');
            $('#TabelPdAdmin').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelPdAdmin').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function CetakPd() {
    var bln = $('#BlnPd').val();
    var url = BASE_URL + "admin/pendapatan/cetak_pd/" + bln
    window.open(url, '_blank');
}