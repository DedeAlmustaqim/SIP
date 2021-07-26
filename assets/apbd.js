
$(document).ready(function () {



    var id_bln = $('#bln_apbd').val()
    var unit = $('#unit_apbd').val()

    show_apbd(id_bln, unit)

    grafik_apbd()
    $('#bln_apbd').change(function () {
        var id_bln = $(this).val();
        var unit = $('#unit_apbd').val()
        swal({
            title: 'Menampilkan Data ' + GetMonthName(id_bln),
            timer: 700,

        })
        show_apbd(id_bln, unit)

    });


});




function show_apbd(id_bln, unit) {
    $.ajax({
        type: "post",
        "url": BASE_URL + "apbd/get_apbd/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            //Navigasi APBD
            //document.getElementById("BulanApbd").innerHTML = 'Data Bulan : '+data.nm_bln;
            document.getElementById('BtnNavigasiApbd').innerHTML =
                '<button type="button" class="btn waves-effect waves-light   btn-info" onClick="ModalApbd(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" data-pagu="' + data.kunci_pagu + '" data-aktif="' + data.aktif + '"  title="Input Data"><i class="mdi mdi-square-edit-outline"></i> Edit</button>' +
                '&nbsp;<a href="' + BASE_URL + 'apbd/cetak_apbd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak</a>';
            //Tabel APBD
            document.getElementById("pg_bl_op_detail").innerHTML = Rupiah(data.pg_bl_op);
            document.getElementById("rk_keu_op_rp_detail").innerHTML = Rupiah(data.rk_keu_op_rp);
            document.getElementById("rk_keu_op_per_detail").innerHTML = data.rk_keu_op_per;
            document.getElementById("rf_op_detail").innerHTML = data.rf_op;
            document.getElementById("pg_bl_bm_detail").innerHTML = Rupiah(data.pg_bl_bm);
            document.getElementById("rk_keu_bm_rp_detail").innerHTML = Rupiah(data.rk_keu_bm_rp);
            document.getElementById("rk_keu_bm_per_detail").innerHTML = data.rk_keu_bm_per;
            document.getElementById("rf_bm_detail").innerHTML = data.rf_bm;
            document.getElementById("pg_btt_detail").innerHTML = Rupiah(data.pg_btt);
            document.getElementById("rk_keu_btt_rp_detail").innerHTML = Rupiah(data.rk_keu_btt_rp);
            document.getElementById("rk_keu_btt_per_detail").innerHTML = data.rk_keu_btt_per;
            document.getElementById("rf_btt_detail").innerHTML = data.rf_btt;
            document.getElementById("pg_bl_bt_detail").innerHTML = Rupiah(data.pg_bl_bt);
            document.getElementById("rk_keu_bt_rp_detail").innerHTML = Rupiah(data.rk_keu_bt_rp);
            document.getElementById("rk_keu_bt_per_detail").innerHTML = data.rk_keu_bt_per;
            document.getElementById("rf_bt_detail").innerHTML = data.rf_btt;
            document.getElementById("pg_apbd_detail").innerHTML = Rupiah(data.pg_apbd);
            document.getElementById("real_apbd_detail").innerHTML = Rupiah(data.real_apbd);
            document.getElementById("real_apbd_per_detail").innerHTML = data.real_apbd_per;
            document.getElementById("real_apbd_fisik_detail").innerHTML = data.real_apbd_fisik;
            //Pie Chart APBD
            new Chart(document.getElementById("ChartApbd"),
                {
                    "type": "bar",
                    "data": {
                        "labels": ["Operasi", "Modal", "Tidak Terduga", "Transfer"],
                        "datasets": [{
                            "label": "Progress Keuangan (%)",
                            "data": [data.rk_keu_op_per, data.rk_keu_bm_per, rk_keu_btt_per, rk_keu_bt_per],
                            "fill": false,
                            "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                            "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                            "borderWidth": 1
                        }
                        ]
                    },
                    "options": {
                        "scales": { "yAxes": [{ "ticks": { "beginAtZero": true, "stepSize": 100 } }] }
                    }
                });
        },

    })
}

function ModalApbd(elem) {
    var kunci = $(elem).data("kunci");
    var bln = $(elem).data("bln");
    var nm_bln = $(elem).data("nm_bln");
    var unit = $(elem).data("unit");
    var pagu = $(elem).data("pagu");
    var aktif = $(elem).data("aktif");
    if (kunci == 0 && aktif == 0) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Input Data dikunci ',
            timer: 3000,
        })
    } else if (kunci == 1 && aktif == 0) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Jadwal Ditentukan, Status NON-AKTIF ',
            timer: 3000,
        })
    }
    else if (kunci == 0 && aktif == 1) {
        swal({
            type: 'warning',
            title: 'Dikunci',
            text: 'Jadwal Input Expired ',
            timer: 3000,
        })
    } else {

        $('#ModalApbd').modal('show');
        document.getElementById('NmBlnApbd').innerHTML = nm_bln;
        //document.getElementById('BtnCopy').innerHTML = '<button type="button" class="btn btn-primary" onClick="CopyPagu(this)" data-bln="' + blnminus + '" data-unit="' + unit + '">Copy Pagu Bulan sebelumnya</button>';


        if (pagu == 0) {
            $.ajax({
                type: "POST",
                "url": BASE_URL + "apbd/get_apbd/" + bln + "/" + unit,
                //processData: false,
                contentType: false,
                dataType: "JSON",
                async: true,
                success: function (data) {

                    $('#id_unit').val(data['id_unit']);
                    $('#id_bln').val(data['id_bln']);
                    $('#pg_apbd').val(data['pg_apbd']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#real_apbd').val(data['real_apbd']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#real_apbd_per').val(data['real_apbd_per']);
                    $('#real_apbd_fisik').val(data['real_apbd_fisik']);
                    $('#pg_bl_op').val(data['pg_bl_op']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_op_rp').val(data['rk_keu_op_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_op_per').val(data['rk_keu_op_per']);
                    $('#rf_op').val(data['rf_op']);
                    $('#pg_bl_bm').val(data['pg_bl_bm']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bm_rp').val(data['rk_keu_bm_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bm_per').val(data['rk_keu_bm_per']);
                    $('#rf_bm').val(data['rf_bm']);
                    $('#pg_btt').val(data['pg_btt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_btt_rp').val(data['rk_keu_btt_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_btt_per').val(data['rk_keu_btt_per']);
                    $('#rf_btt').val(data['rf_btt']);
                    $('#pg_bl_bt').val(data['pg_bl_bt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bt_rp').val(data['rk_keu_bt_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bt_per').val(data['rk_keu_bt_per']);
                    $('#rf_bt').val(data['rf_bt']);

                },

            })
        } else if (pagu == 1) {
            $('#pg_bl_op').attr('readonly', 'readonly');
            $('#pg_bl_bm').attr('readonly', 'readonly');
            $('#pg_btt').attr('readonly', 'readonly');
            $('#pg_bl_bt').attr('readonly', 'readonly');
            $.ajax({
                type: "POST",
                "url": BASE_URL + "master/get_pagu/" + unit,
                //processData: false,
                contentType: false,
                dataType: "JSON",
                async: true,
                success: function (data) {


                    $('#pg_apbd').val(data['pg_apbd']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#pg_bl_op').val(data['pg_bl_op']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#pg_bl_bm').val(data['pg_bl_bm']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#pg_btt').val(data['pg_btt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#pg_bl_bt').val(data['pg_bt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });

                },

            })
            $.ajax({
                type: "POST",
                "url": BASE_URL + "apbd/get_apbd/" + bln + "/" + unit,
                //processData: false,
                contentType: false,
                dataType: "JSON",
                async: true,
                success: function (data) {

                    $('#id_unit').val(data['id_unit']);
                    $('#id_bln').val(data['id_bln']);
                    $('#real_apbd').val(data['real_apbd']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#real_apbd_per').val(data['real_apbd_per']);
                    $('#real_apbd_fisik').val(data['real_apbd_fisik']);
                    $('#rk_keu_op_rp').val(data['rk_keu_op_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_op_per').val(data['rk_keu_op_per']);
                    $('#rf_op').val(data['rf_op']);
                    $('#rk_keu_bm_rp').val(data['rk_keu_bm_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bm_per').val(data['rk_keu_bm_per']);
                    $('#rf_bm').val(data['rf_bm']);
                    $('#pg_btt').val(data['pg_btt']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_btt_rp').val(data['rk_keu_btt_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_btt_per').val(data['rk_keu_btt_per']);
                    $('#rf_btt').val(data['rf_btt']);
                    $('#rk_keu_bt_rp').val(data['rk_keu_bt_rp']).formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: -1, eventOnDecimalsEntered: true });
                    $('#rk_keu_bt_per').val(data['rk_keu_bt_per']);
                    $('#rf_bt').val(data['rf_bt']);

                },

            })

        }





    }
}


$('#pg_bl_op, #rk_keu_op_rp').keyup(function (e) {
    var pg_bl_op = $('#pg_bl_op').val().replace(/,/g, '');
    var rk_keu_op_rp = $('#rk_keu_op_rp').val().replace(/,/g, '');
    var rk_keu_op_per = rk_keu_op_rp / pg_bl_op * 100;
    var per = rk_keu_op_per.toFixed(2)
    $('#rk_keu_op_per').val(per);
});

$('#pg_bl_bm, #rk_keu_bm_rp').keyup(function (e) {
    var pg_bl_bm = $('#pg_bl_bm').val().replace(/,/g, '');
    var rk_keu_bm_rp = $('#rk_keu_bm_rp').val().replace(/,/g, '');
    var rk_keu_bm_per = rk_keu_bm_rp / pg_bl_bm * 100;
    var per_bm = rk_keu_bm_per.toFixed(2)
    $('#rk_keu_bm_per').val(per_bm);
});

$('#pg_btt, #rk_keu_btt_rp').keyup(function (e) {
    var pg_btt = $('#pg_btt').val().replace(/,/g, '');
    var rk_keu_btt_rp = $('#rk_keu_btt_rp').val().replace(/,/g, '');
    var rk_keu_btt_per = rk_keu_btt_rp / pg_btt * 100;
    var per_btt = rk_keu_btt_per.toFixed(2)
    $('#rk_keu_btt_per').val(per_btt);
});

$('#pg_bl_bt, #rk_keu_bt_rp').keyup(function (e) {
    var pg_bl_bt = $('#pg_bl_bt').val().replace(/,/g, '');
    var rk_keu_bt_rp = $('#rk_keu_bt_rp').val().replace(/,/g, '');
    var rk_keu_bt_per = rk_keu_bt_rp / pg_bl_bt * 100;
    var per_bl_bt = rk_keu_bt_per.toFixed(2)
    $('#rk_keu_bt_per').val(per_bl_bt);
});

$('#pg_bl_op, #pg_bl_bm, #pg_btt, #pg_bl_bt').keyup(function (e) {

    var sum = 0;
    $("input[class *= 'sumapbd']").each(function () {
        sum += +$(this).val().replace(/,/g, '');
    });
    $("#pg_apbd").val(sum).formatCurrency({});
});

$('#rk_keu_op_rp, #rk_keu_bm_rp, #rk_keu_btt_rp, #rk_keu_bt_rp').keyup(function (e) {

    var sum2 = 0;
    $("input[class *= 'apbd_real']").each(function () {
        sum2 += +$(this).val().replace(/,/g, '');
    });
    $("#real_apbd").val(sum2).formatCurrency({});;
});


$('#pg_bl_op, #pg_bl_bm, #pg_btt, #pg_bl_bt, #rk_keu_op_rp, #rk_keu_bm_rp, #rk_keu_btt_rp, #rk_keu_bt_rp').keyup(function (e) {

    var pg_apbd = $('#pg_apbd').val().replace(/,/g, '');
    var real_apbd = $('#real_apbd').val().replace(/,/g, '');

    var real_apbd_per = real_apbd / pg_apbd * 100;
    var per_apbd = real_apbd_per.toFixed(2)
    $('#real_apbd_per').val(per_apbd);
});

$('#rf_op, #rf_bm, #rf_btt, #rf_bt').keyup(function (e) {
    var rf_op = $('#rf_op').val().replace(/,/g, '');
    var rf_bm = $('#rf_bm').val().replace(/,/g, '');
    var rf_btt = $('#rf_btt').val().replace(/,/g, '');
    var rf_bt = $('#rf_bt').val().replace(/,/g, '');
    var pg_bl_op = $('#pg_bl_op').val().replace(/,/g, '');
    var pg_bl_bm = $('#pg_bl_bm').val().replace(/,/g, '');
    var pg_btt = $('#pg_btt').val().replace(/,/g, '');
    var pg_bl_bt = $('#pg_bl_bt').val().replace(/,/g, '');
    var pg_apbd = $('#pg_apbd').val().replace(/,/g, '');
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
    $('#real_apbd_fisik').val(fisik_apbd.toFixed(2));
});

function validasi_fisik() {
    var realkeu = $('#rk_keu_op_rp').val().replace(/,/g, '');
    var rf_op = $('#rf_op').val().replace(/,/g, '');
    if (realkeu !== 0) {
        if (rf_op == 0) {
            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
        }
    }
}

$('#FormApbd').on('submit', function (e) {
    var id_bln = $('#bln_apbd').val()
    var unit = $('#unit_apbd').val()
    var postData = new FormData($("#FormApbd")[0]);
    var realkeu = $('#rk_keu_op_rp').val().replace(/,/g, '');
    var rf_op = $('#rf_op').val().replace(/,/g, '');
    var rk_keu_bm_rp = $('#rk_keu_bm_rp').val().replace(/,/g, '');
    var rf_bm = $('#rf_bm').val().replace(/,/g, '');
    var rk_keu_btt_rp = $('#rk_keu_btt_rp').val().replace(/,/g, '');
    var rf_btt = $('#rf_btt').val().replace(/,/g, '');
    var rk_keu_bt_rp = $('#rk_keu_bt_rp').val().replace(/,/g, '');
    var rf_bt = $('#rf_bt').val().replace(/,/g, '');
    if (realkeu != 0 && rf_op == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Real. Fisik (%) Belanja Operasi tidak Boleh 0',
            timer: 2000,
        })
    } else if (rk_keu_bm_rp != 0 && rf_bm == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Real. Fisik (%) Belanja Modal tidak Boleh 0',
            timer: 2000,
        })
    } else if (rk_keu_btt_rp != 0 && rf_btt == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Real. Fisik (%) Belanja Tidak Terduga tidak Boleh 0',
            timer: 2000,
        })
    } else if (rk_keu_bt_rp != 0 && rf_bt == 0) {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Real. Fisik (%) Belanja Transfer tidak Boleh 0',
            timer: 2000,
        })
    } else {
        $.ajax({
            type: "post",
            "url": BASE_URL + "apbd/post_apbd",
            processData: false,
            contentType: false,
            data: postData,
            dataType: "JSON",
            success: function () {
                swal({
                    type: 'success',
                    title: 'Simpan',
                    text: 'Berhasil Simpan Data',
                    timer: 2000,
                })
                $('#ModalApbd').modal('hide');
                show_apbd(id_bln, unit)
                grafik_apbd()
            },
            error: function () {

                swal({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Gagal Simpan Data',
                    timer: 2000,
                })
                show_apbd(id_bln, unit)
                grafik_apbd()
            },
        })
    }
    return false;
});



function grafik_apbd(){
    $.ajax({
        type: "post",
        "url": BASE_URL + "dashboard/json_total",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            var label = [];
            var value = [];
            var value2 = [];

            label.push(
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            );
            value.push(
                data.real_apbd_per_1,
                data.real_apbd_per_2,
                data.real_apbd_per_3,
                data.real_apbd_per_4,
                data.real_apbd_per_5,
                data.real_apbd_per_6,
                data.real_apbd_per_7,
                data.real_apbd_per_8,
                data.real_apbd_per_9,
                data.real_apbd_per_10,
                data.real_apbd_per_11,
                data.real_apbd_per_12,
            );
            value2.push(
                data.real_apbd_fisik_1,
                data.real_apbd_fisik_2,
                data.real_apbd_fisik_3,
                data.real_apbd_fisik_4,
                data.real_apbd_fisik_5,
                data.real_apbd_fisik_6,
                data.real_apbd_fisik_7,
                data.real_apbd_fisik_8,
                data.real_apbd_fisik_9,
                data.real_apbd_fisik_10,
                data.real_apbd_fisik_11,
                data.real_apbd_fisik_12);

            var ctx = document.getElementById('grafik_apbd_modul').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Real Keu (%)',
                        backgroundColor: 'rgb(51, 161, 252)',
                        borderColor: 'rgb(255, 255, 255)',
                        data: value
                    }, {
                        label: 'Real Fisik (%)',
                        backgroundColor: '#ff5733',
                        borderColor: '#ff5733',
                        data: value2
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {}
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 100,
                                // Return an empty string to draw the tick line but hide the tick label
                                // Return `null` or `undefined` to hide the tick line entirely

                            }
                        }]
                    },
                }
            });

        },

    })
}