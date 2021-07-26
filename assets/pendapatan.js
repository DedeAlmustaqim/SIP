

$(document).ready(function () {


    var id_bln = $('#bln_pd').val()
    var unit = $('#unit_pd').val()

    show_pd(id_bln, unit)
grafik_pd()

    $('#bln_pd').change(function () {
        var id_bln = $(this).val();
        var unit = $('#unit_pd').val()
        swal({
            title: 'Menampilkan Data ' + GetMonthName(id_bln),
            timer: 700,

        })
        show_pd(id_bln, unit)

    });


});




function show_pd(id_bln, unit) {
    $.ajax({
        type: "post",
        "url": BASE_URL + "pendapatan/get_pd/" + id_bln + '/' + unit,
        dataType: "JSON",

        success: function (data) {
            //Navigasi pendapatan
            //document.getElementById("BulanApbd").innerHTML = 'Data Bulan : '+data.nm_bln;
            document.getElementById('BtnNavigasiPd').innerHTML =
                '<button type="button" class="btn waves-effect waves-light   btn-info" onClick="ModalPd(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '" data-pagu="' + data.kunci_pagu + '" data-aktif="' + data.aktif + '"  title="Input Data"><i class="mdi mdi-square-edit-outline"></i> Edit</button>' +
                '&nbsp;<a href="' + BASE_URL + 'pendapatan/cetak_pd/' + data.id_bln + '/' + data.id_unit + '" target="_blank" class="btn waves-effect waves-light  btn-warning" ><i class="mdi mdi-printer"></i> Cetak</a>';
            //Tabel Pendapatan
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
    var id_bln = $('#bln_pd').val()
    var unit = $('#unit_pd').val()
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
            show_pd(id_bln, unit)
            grafik_pd()
        },
        error: function (data) {

            swal({
                type: 'warning',
                title: 'Gagal',
                text: 'Gagal Simpan Data',
                timer: 2000,
            })
            grafik_pd()
        },
    })
    return false;
});


function grafik_pd(){
    $.ajax({
        url: BASE_URL + 'dashboard/json_grafik_pd',
        method: "GET",
        success: function (data) {
            console.log(data);
            var label = [];
            var value = [];
            var value2 = [];
            for (var i in data) {
                label.push(data[i].nm_bln);
                value.push(data[i].keu_per_total);


            }
            var ctx = document.getElementById('grafik_pd_modul').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Real. Keu (%)',
                        backgroundColor: 'rgb(51, 161, 252)',
                        borderColor: 'rgb(255, 255, 255)',
                        data: value
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
                                userCallback: function (value, index, values) {
                                    // Convert the number to a string and splite the string every 3 charaters from the end
                                    value = value.toString();
                                    value = value.split(/(?=(?:...)*$)/);
                                    // Convert the array to a string and format the output
                                    value = value.join('.');
                                    return value;
                                }
                            }
                        }]
                    },
                }
            });
        }
    });
}