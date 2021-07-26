$(document).ready(function () {
    /* Formatting function for row details - modify as you need */

    $("#ModalSetUser").on('hide.bs.modal', function (e) {
        $('#TabelUser').dataTable().fnClearTable();
        $('#TabelUser').dataTable().fnDestroy();

    });

    $("#ModalTambahUser").on('hide.bs.modal', function (e) {
        $('#TabelUser').dataTable().fnClearTable();
        $('#TabelUser').dataTable().fnDestroy();

    });
    $("#ModalJadwal").on('hide.bs.modal', function (e) {
        $(this).find('form')[0].reset();
    });


    $("#ModalTambahUser").on('hide.bs.modal', function (e) {
        $(this).find('form')[0].reset();
    });
    $('.rp').blur(function () {
        $('.rp').html(null);
        $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 2 });
    })
        .keyup(function (e) {
            var e = window.event || e;
            var keyUnicode = e.charCode || e.keyCode;
            if (e !== undefined) {
                switch (keyUnicode) {
                    case 16: break; // Shift
                    case 17: break; // Ctrl
                    case 18: break; // Alt
                    case 27: this.value = ''; break; // Esc: clear entry
                    case 35: break; // End
                    case 36: break; // Home
                    case 37: break; // cursor left
                    case 38: break; // cursor up
                    case 39: break; // cursor right
                    case 40: break; // cursor down
                    case 78: break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
                    case 110: break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
                    case 190: break; // .
                    default: $(this).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                }
            }
        })

    $('#FormUbahPass').on('submit', function (e) {
        var postData = new FormData($("#FormUbahPass")[0]);
        //var postData = new FormData($("#form-tambah-smohongd")[1]);
        $.ajax({
            type: "post",
            "url": BASE_URL + "master/ubah_pass",
            processData: false,
            contentType: false,
            data: postData, //penggunaan FormData
            //  AMBIL VARIABEL
            dataType: "JSON",
            success: function (data) {
                swal({
                    type: 'success',
                    title: 'Simpan',
                    text: 'Berhasil Simpan Data',
                    timer: 2000,
                })
                // BERSIHKAN FORM MODAL
                $('#ModalUbahPass').modal('hide');
            },
            error: function (data) {

                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
                // BERSIHKAN FORM MODAL
                $('#ModalUbahPass').modal('hide');
            },
        })
        return false;
    });

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

    var table = $('#TabelBulan').DataTable({
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
            "url": BASE_URL + "/master/json_bln",
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
                    if (data.kunci_bln == 0) {
                        return '<div class="text-left"><h3>' + data.nm_bln + ' </h3><span class="text-danger"> Terkunci</span></div>'

                    } else {
                        return '<div class="text-left"><h3>' + data.nm_bln + ' </h3><span class="text-success">Terjadwal</span></div>'

                    }
                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.tgl1 == null) {
                        return '<div class="text-center"><small class="text-warning">Mohon Setting Tanggal</small></div>'
                    } else {
                        return '<div class="text-center">' + data.tgl1 + '<br>Pukul : ' + data.wkt1 + '</div>'

                    }
                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.tgl2 == null) {
                        return '<div class="text-center"><small class="text-warning">Mohon Setting Tanggal</small></div>'
                    } else {
                        return '<div class="text-center">' + data.tgl2 + '<br>Pukul : ' + data.wkt2 + '</div>'

                    }
                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.aktif == 0) {
                        return '<div class="text-center">' +
                            '<div class="btn-group"> ' +
                            '<button type="button"  class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'NON AKTIF' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="Aktif(this)" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '"   href="javascript:void(0)">Aktif</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    } else if (data.aktif == 1) {
                        return '<div class="text-center">' +
                            '<div class="btn-group">' +
                            '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'AKTIF' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="NonAktif(this)" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '"   href="javascript:void(0)">Non Aktif</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    }
                }

            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.kunci_pagu == 0) {
                        return '<div class="text-center">' +
                            '<div class="btn-group"> ' +
                            '<button type="button"  class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'TIDAK' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="KunciPagu(this)" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '"   href="javascript:void(0)">Kunci Pagu</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    } else if (data.kunci_pagu == 1) {
                        return '<div class="text-center">' +
                            '<div class="btn-group">' +
                            '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'YA' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="BukaKunciPagu(this)" data-bln="' + data.id_bln + '" data-nmbln="' + data.nm_bln + '"   href="javascript:void(0)">Buka Kunci Pagu</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    }
                }

            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<a href="#" class="btn waves-effect waves-light btn-success jadwal" data-toggle="modal" data-target="#ModalJadwal" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tgl1 + '" data-akhir="' + data.tgl2 + '" data-wktawal="' + data.wkt1 + '" data-wktakhir="' + data.wkt2 + '">Jadwal</a> ' +
                        '<a href="#" class="btn waves-effect waves-light btn-danger" onClick="HapusJadwal(this)" data-id="' + data.id_bln + '" data-bln="' + data.nm_bln + '" data-awal="' + data.tglawal + '" data-akhir="' + data.tglakhir + '">Hapus Jadwal</a></div>'

                }
            },



        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
    var table = $('#TabelUnit').DataTable({
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
            "url": BASE_URL + "/master/json_unit",
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
                    return '<div class="text-left">' + data.nm_unit + ' </div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-left">' + data.nm_pimpinan + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.sinkron == 0) {
                        return '<div class="text-center"><span class="badge badge-danger">Belum Sinkron</span></div>'

                    } else {
                        return '<div class="text-center"><span class="badge badge-success">Sudah Sinkron</span></div>'

                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.dak_fisik == 1) {
                        return '<div class="text-center">' +

                            '<div class="btn-group"> ' +
                            '<button type="button"  class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'ADA' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="dakfisikada(this)" data-id="' + data.id_unit + '"    href="javascript:void(0)">Tidak Ada</a>' +
                            '</div>' +
                            '</div>' +
                            '&nbsp;<a href="#" class="btn waves-effect waves-light btn-info btn-sm" onClick="SetDakFisik(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '" title="Setting"><i class="mdi mdi-cogs"></i></a> ' +

                            '</div>'
                    } else {
                        return '<div class="text-center">' +
                            '<div class="btn-group"> ' +
                            '<button type="button"  class="btn btn-warning btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'TIDAK ADA' +
                            '</button>' +
                            '<div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">' +
                            '<a class="dropdown-item" onClick="Aktif(this)"    href="javascript:void(0)">Aktif</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<a href="#" class="btn waves-effect waves-light btn-info btn-sm" onClick="ModalSkpd(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '" title="Edit"><i class="mdi mdi-square-edit-outline"></i></a> ' +
                        '<a href="#" class="btn waves-effect waves-light btn-danger btn-sm" onClick="DeleteSkpd(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '" title="Hapus"><i class="mdi mdi-delete-forever"></i></a> ' +
                        '<a href="#" class="btn waves-effect waves-light btn-primary btn-sm" onClick="PaguSkpd(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '" title="Pagu"><i class="mdi mdi-cart"></i></a> ' +
                        '<div class="btn-group">' +
                        '<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="User">' +
                        '<i class="mdi mdi-account-convert"></i>' +
                        '</button>' +
                        '<div class="dropdown-menu">' +
                        '<a class="dropdown-item" href="javascript:void(0)" onClick="SetUser(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '">Lihat User</a>' +
                        '<a class="dropdown-item" href="javascript:void(0)" onClick="TambahUser(this)" data-id="' + data.id_unit + '" data-nm="' + data.nm_unit + '">Tambah User</a>' +
                        '</div></div>'
                }
            },



        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });

});

$('#TabelBulan').on('click', '.jadwal', function () {
    var id = $(this).data('id');
    var bln = $(this).data('bln');
    var awal = $(this).data('awal');
    var akhir = $(this).data('akhir');
    var wktawal = $(this).data('wktawal');
    var wktakhir = $(this).data('wktakhir');

    $('#IdBln').val(id);
    $('#TglAwal').val(awal);
    $('#WktInputAwal').val(wktawal);
    $('#TglAkhir').val(akhir);
    $('#WktInputAkhir').val(wktakhir);

    document.getElementById('NmBln').innerHTML = bln;
});


$('#FormJadwal').on('submit', function (e) {
    var postData = new FormData($("#FormJadwal")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/jadwal",
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
            $('#ModalJadwal').modal('hide');
            $('#TabelBulan').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelBulan').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});






function HapusJadwal(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");
    swal({
        title: 'Hapus.?',
        text: nm,
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
            url: BASE_URL + 'master/hapus_jadwal/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelBulan').DataTable().ajax.reload(null, false);
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


function ModalSkpd(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");


    $.ajax({
        type: "POST",
        "url": BASE_URL + "master/get_unit/" + id,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalSkpd').modal('show');
            document.getElementById('NmSkpd').innerHTML = nm;

            $('#id_unit').val(data['id_unit']);
            $('#skpd').val(data['nm_unit']);
            $('#pimpinan').val(data['nm_pimpinan']);
            $('#nip').val(data['nip']);
            $('#gol').val(data['gol_jab']);
            $('#stts_pimpinan').val(data['stts_p']);
            $('#ttd').val(data['ttd']);


        },

    })
    return false;
}

function SetUser(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");

    $('#ModalSetUser').modal('show');
    document.getElementById('NmSkpdUser').innerHTML = nm;


    var table = $('#TabelUser').DataTable({
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
            "url": BASE_URL + "/master/json_user/" + id,
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
                    return '<div class="text-left">' + data.username + '</div>'

                }
            },

            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' +
                        '<a href="#" class="btn waves-effect waves-light btn-warning" onClick="ResetPassword(this)" data-id="' + data.id_unit + '" >Reset Password</a> ' +
                        '<a href="#" class="btn waves-effect waves-light btn-danger" onClick="DelUser(this)" data-id="' + data.id_user + '" data-user="' + data.username + '"><i class="mdi mdi-delete-forever"></i></a> '

                }
            },



        ],
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });

}

function TambahUser(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");
    $('#ModalTambahUser').modal('show');
    document.getElementById('NmSkpdTambah').innerHTML = nm;

    $('#id_unit_user').val(id);
}

$('#FormSkpd').on('submit', function (e) {
    var postData = new FormData($("#FormSkpd")[0]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/post_skpd",
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
            $('#ModalSkpd').modal('hide');
            $('#TabelUnit').DataTable().ajax.reload(null, false);
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            $('#TabelUnit').DataTable().ajax.reload(null, false);

        },
    })
    return false;
});

$('#FormUbahPass').on('submit', function (e) {

    e.preventDefault();
    var postData = new FormData($("#FormUbahPass")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/ubah_pass",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        beforeSend: function () {
            // Show image container
            swal({
                title: "Mohon Tunggu",
                showConfirmButton: false,
            });
        },
        success: function (data) {

            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data disimpan',
                timer: 2000,
            })


            $('#ModalUbahPass').modal('hide');

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                timer: 2000,
            })
        },
    })
    return false;
});

function ResetPassword(elem) {
    var id = $(elem).data("id");

    swal({
        title: 'Yakin Reset Password.?',
        text: '',
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
            url: BASE_URL + 'master/reset_pass/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Password direset "sipkabbartim"',
                    timer: 2000,
                })
                $('#TabelUnit').DataTable().ajax.reload(null, false);
            },
            error: function () {
                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: '',
                    timer: 3000,
                })

            },

        })
    });


    return false;
}

$('#bln_status').change(function () {
    var bln_status = $(this).val();

    TabelDataStatus(bln_status)
    $('#TabelDataStatus').DataTable().ajax.reload(null, false);



});

function TabelDataStatus(bln_status) {
    var table = $('#TabelDataStatus').DataTable({


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

            "url": BASE_URL + "master/status_data/" + bln_status,
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
                    if (data.status == 0) {
                        return '<div class="text-center "><a class="text-danger" href="' + BASE_URL + 'admin/apbd"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'admin/apbd"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_50 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'admin/ppbj/ppbj_50"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'admin/ppbj/ppbj_50"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_200 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'admin/ppbj/ppbj_200"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'admin/ppbj/ppbj_200"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_25 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'admin/ppbj/ppbj_25"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'admin/ppbj/ppbj_25"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_pd == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'admin/pendapatan"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'admin/pendapatan"><i class="mdi mdi-check"></i></a></div>'
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

function TambahSkpd(elem) {
    var akses = $(elem).data("akses");

    if (akses != 1) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Input Data dikunci ',
            timer: 3000,
        })
    } else {
        $('#ModalTambahSkpd').modal('show');
    }
}

$('#FormTambahSkpd').on('submit', function (e) {
    e.preventDefault();
    var postData = new FormData($("#FormTambahSkpd")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/tambah_skpd",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        beforeSend: function () {
            // Show image container
            swal({
                title: "Mohon Tunggu",
                showConfirmButton: false,
            });
        },
        success: function (data) {

            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data disimpan',
                timer: 2000,
            })


            $('#ModalTambahSkpd').modal('hide');
            $('#TabelUnit').DataTable().ajax.reload(null, false);

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                timer: 2000,
            })
        },
    })
    return false;

});

$('#FormTambahUser').on('submit', function (e) {
    e.preventDefault();
    var postData = new FormData($("#FormTambahUser")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/tambah_user",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        beforeSend: function () {
            // Show image container
            swal({
                title: "Mohon Tunggu",
                showConfirmButton: false,
            });
        },
        success: function (data) {

            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data disimpan',
                timer: 2000,
            })


            $('#ModalTambahUser').modal('hide');
            $('#TabelUnit').DataTable().ajax.reload(null, false);

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                timer: 2000,
            })
        },
    })
    return false;

});

function CetakSttsData() {
    var bln_status = $('#bln_status').val();
    var url = BASE_URL + "master/cetak_status/" + bln_status
    window.open(url, '_blank');
}

function DeleteSkpd(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");

    if (akses != 1) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Tidak diijinkan',
            timer: 3000,
        })
    } else {

        swal({
            title: 'Hapus.?',
            text: 'Semua Data ' + nm + ' juga akan terhapus ',
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
                url: BASE_URL + 'master/hapus_skpd/',
                type: "POST",
                data: {

                    id: id,

                },
                success: function () {
                    swal({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Data dihapus',
                        timer: 2000,
                    })
                    $('#TabelUnit').DataTable().ajax.reload(null, false);
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
}

function DelUser(elem) {
    var id = $(elem).data("id");
    var user = $(elem).data("user");
    swal({
        title: 'Hapus.?',
        text: user,
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
            url: BASE_URL + 'master/delete_user/',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data dihapus',
                    timer: 2000,
                })
                $('#TabelUser').DataTable().ajax.reload(null, false);
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

function PaguSkpd(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");

    $.ajax({
        type: "POST",
        "url": BASE_URL + "master/get_pagu/" + id,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalPagu').modal('show');
            document.getElementById('NmSkpdPagu').innerHTML = nm;
            $('#id_unit_pg').val(id);
            $('#pg_apbd_pg').val(data['pg_apbd']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bl_op_pg').val(data['pg_bl_op']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bl_bm_pg').val(data['pg_bl_bm']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_btt_pg').val(data['pg_btt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#pg_bt_pg').val(data['pg_bt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });

        },

    })
    return false;

}

$('.pg').keyup(function () {
    var sum = 0;
    $("input[class *= 'pg']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $('#pg_apbd_pg').val(sum).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
});

$('#FormPagu').on('submit', function (e) {
    e.preventDefault();
    var postData = new FormData($("#FormPagu")[0]);
    //var postData = new FormData($("#form-tambah-smohongd")[1]);
    $.ajax({
        type: "post",
        "url": BASE_URL + "master/pagu",
        processData: false,
        contentType: false,
        data: postData, //penggunaan FormData
        //  AMBIL VARIABEL
        dataType: "JSON",
        beforeSend: function () {
            // Show image container
            swal({
                title: "Mohon Tunggu",
                showConfirmButton: false,
            });
        },
        success: function (data) {

            swal({
                type: 'success',
                title: 'Berhasil',
                text: 'Data disimpan',
                timer: 2000,
            })


            $('#ModalPagu').modal('hide');
            $('#TabelUnit').DataTable().ajax.reload(null, false);

        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                timer: 2000,
            })
        },
    })
    return false;

});

function KunciPagu(elem) {
    var id = $(elem).data("bln");
    var bln = $(elem).data("nmbln");
    var nilai = 1;
    swal({
        title: 'Kunci Pagu ' + bln,
        text: '',
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
            url: BASE_URL + 'master/kunci_pagu/',
            type: "POST",
            data: {

                id: id,
                nilai: nilai,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data disimpan',
                    timer: 2000,
                })
                $('#TabelBulan').DataTable().ajax.reload(null, false);
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

function BukaKunciPagu(elem) {
    var id = $(elem).data("bln");
    var bln = $(elem).data("nmbln");
    var nilai = 0;
    swal({
        title: 'Buka Kunci Pagu ' + bln,
        text: '',
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
            url: BASE_URL + 'master/kunci_pagu/',
            type: "POST",
            data: {

                id: id,
                nilai: nilai,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data disimpan',
                    timer: 2000,
                })
                $('#TabelBulan').DataTable().ajax.reload(null, false);
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

function Aktif(elem) {
    var id = $(elem).data("bln");
    var bln = $(elem).data("nmbln");
    var nilai = 1;

    $.ajax({
        url: BASE_URL + "master/cek_aktif",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (response) {
            if (response == 0) {
                swal({
                    title: 'Aktifkan Bulan ' + bln,
                    text: '',
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
                        url: BASE_URL + 'master/update_stts_bln/',
                        type: "POST",
                        data: {

                            id: id,
                            nilai: nilai,

                        },
                        success: function () {
                            swal({
                                type: 'success',
                                title: 'Berhasil',
                                text: 'Data disimpan',
                                timer: 2000,
                            })
                            $('#TabelBulan').DataTable().ajax.reload(null, false);
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

            } else if (response == 1) {
                swal({
                    type: 'warning',
                    title: 'Non Aktifkan jadwal sebelumnya terlebih dulu',
                    timer: 3000,
                })

            }

        }
    });


}

function NonAktif(elem) {
    var id = $(elem).data("bln");
    var bln = $(elem).data("nmbln");
    var nilai = 0;

    $.ajax({
        url: BASE_URL + "master/cek_aktif",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (response) {
            swal({
                title: 'Aktifkan Bulan ' + bln,
                text: '',
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
                    url: BASE_URL + 'master/update_stts_bln/',
                    type: "POST",
                    data: {

                        id: id,
                        nilai: nilai,

                    },
                    success: function () {
                        swal({
                            type: 'success',
                            title: 'Berhasil',
                            text: 'Data disimpan',
                            timer: 2000,
                        })
                        $('#TabelBulan').DataTable().ajax.reload(null, false);
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
    });


}
