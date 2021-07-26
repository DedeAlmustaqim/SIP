$(document).ready(function () {
    grafik_admin();
    
    /* Formatting function for row details - modify as you need */
    function grafik_admin() {
        
        $.ajax({
            type: "post",
            "url": BASE_URL + "admin/dashboard/json_grafik",
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                var label = [];
                var value = [];
                var value2 = [];

                for (var i in data) {
                    label.push(data[i].nm_bln);
                   
                    value.push(data[i].real_apbd_per);
                    value2.push(data[i].real_apbd_fisik);


                }

                var ctx = document.getElementById('grafik_admin').getContext('2d');
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
            url: BASE_URL + 'admin/dashboard/json_grafik_pd/',
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
                var ctx = document.getElementById('grafik_pd_admin').getContext('2d');
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
            url: BASE_URL + 'admin/dashboard/json_grafik_ppbj_50/',
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
                var ctx = document.getElementById('grafik_ppbj50_admin').getContext('2d');
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
            url: BASE_URL + 'admin/dashboard/json_grafik_ppbj_200/',
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
                var ctx = document.getElementById('grafik_ppbj200_admin').getContext('2d');
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
            url: BASE_URL + 'admin/dashboard/json_grafik_ppbj_25/' ,
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
                var ctx = document.getElementById('grafik_ppbj25_admin').getContext('2d');
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
                    text: 'Data dihapus',
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


var table = $('#TabelApbd').DataTable({
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
        "url": BASE_URL + "/apbd/json_apbd",
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
                    return '<div class="text-left"><i class="ti-lock text-danger"></i> ' + data.nm_bln + '</div>'

                } else {
                    return '<div class="text-left"><i class="ti-unlock text-success"></i> ' + data.nm_bln + ' <br>Batas Input : <br><small class="badge badge-warning">' + data.tgl1 + '  s/d ' + data.tgl2 + '</small></div>'

                }
            }
        },


        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.pg_apbd == null) {
                    return '<div class="text-center text-danger">Mohon Sinkron</div>'
                } else {
                    return '<div class="text-center">' + Rupiah(data.pg_apbd) + '</div>'
                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.pg_bl_op == null) {
                    return '<div class="text-center text-danger">Mohon Sinkron</div>'
                } else {
                    return '<div class="text-center">' + Rupiah(data.pg_bl_op) + '</div>'
                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.pg_bl_bm == null) {
                    return '<div class="text-center text-danger">Mohon Sinkron</div>'
                } else {
                    return '<div class="text-center">' + Rupiah(data.pg_bl_bm) + '</div>'
                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.pg_bl_bt == null) {
                    return '<div class="text-center text-danger">Mohon Sinkron</div>'
                } else {
                    return '<div class="text-center">' + Rupiah(data.pg_bl_bt) + '</div>'
                }

            }
        },
        {
            "orderable": false,
            "data": function (data, type, row, meta, dataToSet) {
                if (data.pg_btt == null) {
                    return '<div class="text-center text-danger">Mohon Sinkron</div>'
                } else {
                    return '<div class="text-center">' + Rupiah(data.pg_btt) + '</div>'
                }

            }
        },
        {
            "orderable": false,
            "className": 'details-control',
            "data": function (data, type, row, meta, dataToSet) {
                return '<div class="text-center">' +
                    '<button type="button" class="btn waves-effect waves-light btn-sm btn-success">Realisasi</button>'

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

function DalamProses() {
    swal({
        type: 'warning',
        title: '',
        text: 'Menu ini dalam pengembangan',
        timer: 2000,
    })

}