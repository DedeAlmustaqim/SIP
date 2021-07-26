
$(document).ready(function () {
    var id_bln = $('#bln_dak_fisik').val()
    var unit = $('#unit_dak_fisik').val()

    var mekanisme = $('#jns_mekanisme_fisik').val()

    select_mekanisme(mekanisme)

    show_dak_fisik(id_bln, unit)

    grafik_apbd()
    $('#bln_dak_fisik').change(function () {
        var id_bln = $(this).val();
        var unit = $('#unit_dak_fisik').val()
        swal({
            title: 'Menampilkan Data ' + GetMonthName(id_bln),
            timer: 700,

        })
        show_dak_fisik(id_bln, unit)

    });

    $('#jns_mekanisme_fisik').change(function () {
        var mekanisme = $(this).val();

        if (mekanisme == "Swakelola") {
            $('#mek_vol_swa_fisik').prop('readonly', false);
            $('#mek_nilai_swa_fisik').prop('readonly', false);
            $('#mek_vol_kon_fisik').prop('readonly', true);
            $('#mek_nilai_kon_fisik').prop('readonly', true);
        } else if (mekanisme == "Kontraktual") {
            $('#mek_vol_swa_fisik').prop('readonly', true);
            $('#mek_nilai_swa_fisik').prop('readonly', true);
            $('#mek_vol_kon_fisik').prop('readonly', false);
            $('#mek_nilai_kon_fisik').prop('readonly', false);
        }

    });

    $('#jns_mekanisme_non_fisik').change(function () {
        var mekanisme = $(this).val();

        if (mekanisme == "Swakelola") {
            $('#mek_vol_swa_non_fisik').prop('readonly', false);
            $('#mek_nilai_swa_non_fisik').prop('readonly', false);
            $('#mek_vol_kon_non_fisik').prop('readonly', true);
            $('#mek_nilai_kon_non_fisik').prop('readonly', true);
        } else if (mekanisme == "Kontraktual") {
            $('#mek_vol_swa_non_fisik').prop('readonly', true);
            $('#mek_nilai_swa_non_fisik').prop('readonly', true);
            $('#mek_vol_kon_non_fisik').prop('readonly', false);
            $('#mek_nilai_kon_non_fisik').prop('readonly', false);
        }

    });

    
});

function select_mekanisme(mekanisme) {
    if (mekanisme == "Swakelola") {
        $('#mek_vol_kon_fisik').prop('readonly', true);
    }
}

function show_dak_fisik(id_bln, unit) {
    $.ajax({
        type: "get",
        "url": BASE_URL + "dak/get_dak_fisik/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            document.getElementById('BtnDakFisik').innerHTML =
            '<a href="' + BASE_URL + 'dak/cetak_dak_fisik/' + id_bln + '/' + unit + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak DAK Fisik</a>';

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
                $('#show_dak_fisik').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) FISIK REGULER</h5></td></tr>' + html);
            }
        },

    })
    $.ajax({
        type: "get",
        "url": BASE_URL + "dak/get_dak_non_fisik/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            document.getElementById('BtnDakNonFisik').innerHTML =
            '<a href="' + BASE_URL + 'dak/cetak_dak_non_fisik/' + id_bln + '/' + unit + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak DAK Non Fisik</a>';

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
                $('#show_dak_non_fisik').html('<tr class="bg-dark"><td colspan="16" class="text-white"><h5>DANA ALOKASI KHUSUS ( DAK ) NON FISIK </h5></td></tr>' + html);
            }
        },

    })
}


function ModalDakFisik(elem) {
    var kunci = $(elem).data("kunci");
    var id = $(elem).data("id");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    $.ajax({
        type: "POST",
        "url": BASE_URL + "dak/get_dak_fisik_by_id/" + id,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalDakFisik').modal('show');
            document.getElementById('NmBlnDakFisik').innerHTML = "DAK Fisik Bulan  " + nm_bln
            $('#id_dak_fisik').val(data['id_dak_fisik']);
            $('#keg_fisik').val(data['keg']);
            $('#per_vol_fisik').val(data['per_vol']);
            $('#per_satuan_fisik').val(data['per_satuan']);
            $('#per_jlm_penerima_fisik').val(data['per_jlm_penerima']);
            $('#pagu_fisik').val(data['pagu']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#jns_mekanisme_fisik').val(data['jns_mekanisme']);
            $('#mek_metode_fisik').val(data['mek_metode']);
            $('#mek_vol_swa_fisik').val(data['mek_vol_swa']);
            $('#mek_nilai_swa_fisik').val(data['mek_nilai_swa']);
            $('#mek_vol_kon_fisik').val(data['mek_vol_swa']);
            $('#mek_nilai_kon_fisik').val(data['mek_nilai_swa']);
            if (data['jns_mekanisme'] == "Swakelola") {

                $('#mek_vol_kon_fisik').val(data['mek_vol_kon']).prop('readonly', true);
                $('#mek_nilai_kon_fisik').val(data['mek_nilai_kon']).prop('readonly', true);

            } else if (data['jns_mekanisme'] == "Kontraktual") {
                $('#mek_vol_swa_fisik').val(data['mek_vol_swa']).prop('readonly', true);
                $('#mek_nilai_swa_fisik').val(data['mek_nilai_swa']).prop('readonly', true);
            }
            $('#real_keu_fisik').val(data['real_keu']);
            $('#real_keu_per_fisik').val(data['real_keu_per']);
            $('#real_fik_fisik').val(data['real_fik']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#kodefikasi_fisik').val(data['kodefikasi']);

        },

    })
    return false;
}


function ModalDakNonFisik(elem) {
    var kunci = $(elem).data("kunci");
    var id = $(elem).data("id");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");

    $.ajax({
        type: "POST",
        "url": BASE_URL + "dak/get_dak_non_fisik_by_id/" + id,
        //processData: false,
        contentType: false,
        dataType: "JSON",
        async: true,
        success: function (data) {
            $('#ModalDakNonFisik').modal('show');
            document.getElementById('NmBlnDakNonFisik').innerHTML = "DAK Non Fisik Bulan  " + nm_bln
            $('#id_dak_non_fisik').val(data['id_non_fisik']);
            $('#keg_non_fisik').val(data['keg']);
            $('#per_vol_non_fisik').val(data['per_vol']);
            $('#per_satuan_non_fisik').val(data['per_satuan']);
            $('#per_jlm_penerima_non_fisik').val(data['per_jlm_penerima']);
            $('#pagu_non_fisik').val(data['pagu']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#jns_mekanisme_non_fisik').val(data['jns_mekanisme']);
            $('#mek_metode_non_fisik').val(data['mek_metode']);
            $('#mek_vol_swa_non_fisik').val(data['mek_vol_swa']);
            $('#mek_nilai_swa_non_fisik').val(data['mek_nilai_swa']);
            $('#mek_vol_kon_non_fisik').val(data['mek_vol_swa']);
            $('#mek_nilai_kon_non_fisik').val(data['mek_nilai_swa']);
            if (data['jns_mekanisme'] == "Swakelola") {

                $('#mek_vol_kon_non_fisik').val(data['mek_vol_kon']).prop('readonly', true);
                $('#mek_nilai_kon_non_fisik').val(data['mek_nilai_kon']).prop('readonly', true);

            } else if (data['jns_mekanisme'] == "Kontraktual") {
                $('#mek_vol_swa_non_fisik').val(data['mek_vol_swa']).prop('readonly', true);
                $('#mek_nilai_swa_non_fisik').val(data['mek_nilai_swa']).prop('readonly', true);
            }
            $('#real_keu_non_fisik').val(data['real_keu']);
            $('#real_keu_per_non_fisik').val(data['real_keu_per']);
            $('#real_fik_non_fisik').val(data['real_fik']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
            $('#kodefikasi_non_fisik').val(data['kodefikasi']);

        },

    })
    return false;
}

$('#FormDakFisikInput').on('submit', function (e) {
    var id_bln = $('#bln_dak_fisik').val()
    var unit = $('#unit_dak_fisik').val()
    var real_keu_fisik = $('#real_keu_fisik').val()
    var real_fik_fisik = $('#real_fik_fisik').val()
    var jns_mekanisme_fisik = $('#jns_mekanisme_fisik').val()
    if (jns_mekanisme_fisik == "") {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Jenis Mekanisme harus dipilih ',
            timer: 3000,
        })


    } else if (real_keu_fisik != 0 && real_fik_fisik == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Realisasi Fisik tidak boleh 0 ',
            timer: 3000,
        })
    } else {
        var postData = new FormData($("#FormDakFisikInput")[0]);
        $.ajax({
            type: "post",
            "url": BASE_URL + "dak/post_dak_fisik",
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
                $('#ModalDakFisik').modal('hide');
                show_dak_fisik(id_bln, unit)
            },
            error: function (data) {

                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
                $('#ModalDakFisik').modal('hide');
                show_dak_fisik(id_bln, unit)

            },
        })

    }
    return false;
});

$('#real_keu_fisik').keyup(function (e) {
    var pagu_fisik = $('#pagu_fisik').val().replace(/,/g, '');
    var real_keu_fisik = $('#real_keu_fisik').val().replace(/,/g, '');
    var real_keu_per_fisik = real_keu_fisik / pagu_fisik * 100;
    var per = real_keu_per_fisik.toFixed(2)
    $('#real_keu_per_fisik').val(per);
});

$('#real_keu_non_fisik').keyup(function (e) {
    var pagu_non_fisik = $('#pagu_non_fisik').val().replace(/,/g, '');
    var real_keu_non_fisik = $('#real_keu_non_fisik').val().replace(/,/g, '');
    var real_keu_per_non_fisik = real_keu_non_fisik / pagu_non_fisik * 100;
    var per = real_keu_per_non_fisik.toFixed(2)
    $('#real_keu_per_non_fisik').val(per);
});

$('#FormDakNonFisikInput').on('submit', function (e) {
    var id_bln = $('#bln_dak_fisik').val()
    var unit = $('#unit_dak_fisik').val()
    var real_keu_non_fisik = $('#real_keu_non_fisik').val()
    var real_fik_non_fisik = $('#real_fik_non_fisik').val()
    var jns_mekanisme_non_fisik = $('#jns_mekanisme_non_fisik').val()
    if (jns_mekanisme_non_fisik == "") {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Jenis Mekanisme harus dipilih ',
            timer: 3000,
        })


    } else if (real_keu_non_fisik != 0 && real_fik_non_fisik == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Realisasi Fisik tidak boleh 0 ',
            timer: 3000,
        })
    } else {
        var postData = new FormData($("#FormDakNonFisikInput")[0]);
        $.ajax({
            type: "post",
            "url": BASE_URL + "dak/post_dak_non_fisik",
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
                $('#ModalDakNonFisik').modal('hide');
                show_dak_fisik(id_bln, unit)
            },
            error: function (data) {

                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
                $('#ModalDakFisik').modal('hide');
                show_dak_fisik(id_bln, unit)

            },
        })

    }
    return false;
});
