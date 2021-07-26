$(document).ready(function () {
    Sinkron();
    count()

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
    var table = $('#TblStatus').DataTable({
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
            "url": BASE_URL + "/dashboard/json_status",
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
                    return '<div class="text-left">' + data.nm_bln + '</div>'

                }
            },


            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status == 0) {
                        return '<div class="text-center "><a class="text-danger" href="' + BASE_URL + 'apbd"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'apbd"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_50 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'ppbj/ppbj_50"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'ppbj/ppbj_50"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_200 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'ppbj/ppbj_200"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'ppbj/ppbj_200"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_25 == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'ppbj/ppbj_25"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'ppbj/ppbj_25"><i class="mdi mdi-check"></i></a></div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_pd == 0) {
                        return '<div class="text-center"><a class="text-danger" href="' + BASE_URL + 'pendapatan"><i class="mdi mdi-close"></i></a></div>'
                    } else {
                        return '<div class="text-center "><a class="text-success" href="' + BASE_URL + 'pendapatan"><i class="mdi mdi-check"></i></a></div>'
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

    /* Formatting function for row details - modify as you need */
    function count() {
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

                var ctx = document.getElementById('apbd').getContext('2d');
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
                var ctx = document.getElementById('grafik_pd').getContext('2d');
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

        $.ajax({
            url: BASE_URL + 'dashboard/json_grafik_ppbj',
            method: "GET",
            success: function (data) {
                console.log(data);
                var label = [];
                var value = [];
                var value2 = [];
                for (var i in data) {
                    label.push(data[i].nm_bln);
                    value.push(data[i].jml_pkt_50);
                    value2.push(data[i].bp_pkt_50);

                }
                var ctx = document.getElementById('grafik_ppbj50').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jmlh Paket',
                            backgroundColor: 'rgb(51, 161, 252)',
                            borderColor: 'rgb(255, 255, 255)',
                            data: value
                        }, {
                            label: 'Paket Blm Pelaksanaan',
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

        $.ajax({
            url: BASE_URL + 'dashboard/json_grafik_ppbj',
            method: "GET",
            success: function (data) {
                console.log(data);
                var label = [];
                var value = [];
                var value2 = [];
                for (var i in data) {
                    label.push(data[i].nm_bln);
                    value.push(data[i].jml_pkt_200);
                    value2.push(data[i].bp_pkt_200);

                }
                var ctx = document.getElementById('grafik_ppbj200').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jmlh Paket',
                            backgroundColor: 'rgb(51, 161, 252)',
                            borderColor: 'rgb(255, 255, 255)',
                            data: value
                        }, {
                            label: 'Paket Blm Pelaksanaan',
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

        $.ajax({
            url: BASE_URL + 'dashboard/json_grafik_ppbj',
            method: "GET",
            success: function (data) {
                console.log(data);
                var label = [];
                var value = [];
                var value2 = [];
                for (var i in data) {
                    label.push(data[i].nm_bln);
                    value.push(data[i].jml_pkt_25);
                    value2.push(data[i].bp_pkt_25);

                }
                var ctx = document.getElementById('grafik_ppbj25').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jmlh Paket',
                            backgroundColor: 'rgb(51, 161, 252)',
                            borderColor: 'rgb(255, 255, 255)',
                            data: value
                        }, {
                            label: 'Paket Blm Pelaksanaan',
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

});

function Sinkron() {
    $.ajax({
        url: BASE_URL + "dashboard/btn_sinkron",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (response) {
            if (response == 0) {
                document.getElementById('BtnSinkron').innerHTML = '<div class="alert alert-warning">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>' +
                    '<h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Perhatian</h3> Anda belum melakukan Sinkron data, mohon untuk melakukan Sinkron Data.</h3>' +
                    '<div class="col-12 text-center"><button type="button" onClick="BtnSinkron(this)" data-id="' + id_unit + '" class="btn btn-info  "><i class="mdi mdi-refresh"></i> Sinkron Data</button></div>' +
                    '</div>';



            } else if (response == 1) {
                document.getElementById('BtnSinkron').innerHTML = '';

            }

        }
    });
}

function BtnSinkron(elem) {
    var id = $(elem).data("id");
    var nm = $(elem).data("nm");
    swal({
        title: 'Sinkronkan Data.?',
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
            url: BASE_URL + 'dashboard/sinkron',
            type: "POST",
            data: {

                id: id,

            },
            success: function () {
                swal({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Telah Sinkron',
                    timer: 2000,
                })
                location.reload();
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

function DalamProses() {
    swal({
        type: 'warning',
        title: '',
        text: 'Menu ini dalam pengembangan',
        timer: 2000,
    })

}

function UbahPass(elem) {
    var id = $(elem).data("id");


    $('#ModalUbahPass').modal('show');


}


