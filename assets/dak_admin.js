
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

    var id_bln = $('#bln_dak_fisik_admin').val()

   

    show_dak(id_bln)

    $('#bln_dak_fisik_admin').change(function () {
        var id_bln = $(this).val();
        swal({
            title: 'Menampilkan Data ' + GetMonthName(id_bln),
            timer: 700,

        })
        show_dak(id_bln)

    });


    var table = $('#TabelDakFisikKeg').DataTable({
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
            "url": BASE_URL + "admin/dak/json_dak_fisik",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "urut_unit",
                "className": 'details-control text-center',
                "orderable": true,
            },

            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_unit + '</div>'


                }
            },





            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.keg + '</div>'


                }
            },
            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.pagu) + '</div>'


                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="EditDakFisikKeg(this)" data-unit="' + data.id_unit + '" data-id="' + data.id_dak_fisik + '" data-keg="' + data.keg + '" "Edit"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;' +

                        '<button type="button" class="btn waves-effect waves-light btn-sm btn-danger" onClick="DelDakFisik(this)" data-unit="' + data.id_unit + '" data-id="' + data.id_dak_fisik + '" data-keg="' + data.keg + '" "Detail"><i class="mdi mdi-delete"></i></button>&nbsp' +
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

    var table = $('#TabelDakNonFisikKeg').DataTable({
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
            "url": BASE_URL + "admin/dak/json_dak_non_fisik",
            "dataSrc": "data",
            "dataType": "json",
        },
        "columns": [
            {
                "data": "urut_unit",
                "className": 'details-control text-center',
                "orderable": true,
            },

            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_unit + '</div>'


                }
            },





            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.keg + '</div>'


                }
            },
            {
                "orderable": false,
                "className": 'details-control',

                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.pagu) + '</div>'


                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="EditDakNonFisikKeg(this)" data-unit="' + data.id_unit + '" data-id="' + data.id_non_fisik + '" data-keg="' + data.keg + '" "Edit"><i class="mdi mdi-square-edit-outline"></i></button>&nbsp;' +

                        '<button type="button" class="btn waves-effect waves-light btn-sm btn-danger" onClick="DelDakNonFisik(this)" data-unit="' + data.id_unit + '" data-id="' + data.id_non_fisik + '" data-keg="' + data.keg + '" "Detail"><i class="mdi mdi-delete"></i></button>&nbsp' +
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

});

function show_dak(id_bln) {
    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/dak/get_dak_fisik/" + id_bln,
        dataType: "JSON",

        success: function (data) {
            document.getElementById('BtnDakFisikAdmin').innerHTML =
            '<a href="' + BASE_URL + 'admin/dak/cetak_dak_fisik/' + id_bln + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak DAK Fisik</a>';

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
                    '<td class="text-center">' +
                    '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalDakFisik(this)" data-id="' + data[i].id_dak_fisik + '" data-kunci="' + data[i].kunci_bln + '" data-bln="' + data[i].id_bln + '" data-unit="' + data[i].id_unit + '" data-nm_bln="' + data[i].nm_bln + '" title="Edit"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                    '</td>' +
                    '</tr>';
                $('#show_dak_fisik_admin').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER</h5></td></tr>' + html);
            }
        },

    })

    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/dak/get_dak_non_fisik/" + id_bln ,
        dataType: "JSON",

        success: function (data) {
            document.getElementById('BtnDakNonFisikAdmin').innerHTML =
            '<a href="' + BASE_URL + 'admin/dak/cetak_dak_non_fisik/' + id_bln + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak DAK Non Fisik</a>';

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
                    '<td class="text-center">' +
                    '<button type="button" class="btn waves-effect waves-light  btn-sm btn-info" onClick="ModalDakNonFisik(this)" data-id="' + data[i].id_non_fisik + '" data-kunci="' + data[i].kunci_bln + '" data-bln="' + data[i].id_bln + '" data-unit="' + data[i].id_unit + '" data-nm_bln="' + data[i].nm_bln + '" title="Edit"><i class="mdi mdi-pencil"></i></button>&nbsp' +
                    '</td>' +
                    '</tr>';
                $('#show_dak_non_fisik_admin').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) NON FISIK </h5></td></tr>' + html);
            }
        },

    })
    
}

$('#FormDakFisikAdmin').on('submit', function (e) {

    var postData = new FormData($("#FormDakFisikAdmin")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "admin/dak/post_dak_fisik",
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
            $('#ModalDakFisikKeg').modal('hide');
            $('#TabelDakFisikKeg').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            //$('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});


$('#FormDakNonFisikAdmin').on('submit', function (e) {

    var postData = new FormData($("#FormDakNonFisikAdmin")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "admin/dak/post_dak_non_fisik",
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
            $('#ModalDakNonFisikKeg').modal('hide');
            $('#TabelDakNonFisikKeg').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            //$('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});


function DelDakFisik(elem) {
    var id = $(elem).data("id");
    var keg = $(elem).data("keg");
    swal({
        title: 'Hapus.?',
        text: keg,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'YA',

        closeOnConfirm: false,
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: BASE_URL + 'admin/dak/del_dak_fisik/',
            type: "POST",
            data: {

                keg: keg,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelDakFisikKeg').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    timer: 3000,
                })

            }
        });
    });

}

function EditDakFisikKeg(elem) {
    var id = $(elem).data("id");
    $.ajax({
        type: "get",
        "url": BASE_URL + "admin/dak/get_dak_fisik_keg/" + id,
        dataType: "JSON",
        success: function (data) {
            $('#ModalEditDakFisikKeg').modal('show');
            $('#id_dak_fisik').val(data['id_dak_fisik'])
            $('#id_unit_fisik_edit').val(data['id_unit'])
            $('#keg_fisik_edit').val(data['keg'])
            $('#pagu_dak_fisik_edit').val(data['pagu']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
        },

    })

}

$('#FormEditDakFisik').on('submit', function (e) {

    var postData = new FormData($("#FormEditDakFisik")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "admin/dak/edit_dak_fisik",
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
            $('#ModalEditDakFisikKeg').modal('hide');
            $('#TabelDakFisikKeg').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            //$('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

function DelDakNonFisik(elem) {
    var id = $(elem).data("id");
    var keg = $(elem).data("keg");
    swal({
        title: 'Hapus.?',
        text: keg,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'YA',

        closeOnConfirm: false,
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: BASE_URL + 'admin/dak/del_dak_non_fisik/',
            type: "POST",
            data: {

                keg: keg,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelDakNonFisikKeg').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    timer: 3000,
                })

            }
        });
    });

}