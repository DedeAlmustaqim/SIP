$(document).ready(function () {
    grafiklanding();
    tabeltotallanding();
    /* Formatting function for row details - modify as you need */
    function grafiklanding() {
        var ta = $('#ta_landing').val();
        var bln = $('#bln_ppbj_50').val();
        $.ajax({
            type: "post",
            "url": BASE_URL + "landing/json_grafik_apbd/" + ta,
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

                var ctx = document.getElementById('grafik_landing').getContext('2d');
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
            url: BASE_URL + 'landing/json_grafik_pd/' + ta,
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
                var ctx = document.getElementById('grafik_pd_landing').getContext('2d');
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
            url: BASE_URL + 'landing/json_grafik_ppbj_50/' + ta,
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
                var ctx = document.getElementById('grafik_ppbj50_landing').getContext('2d');
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
            url: BASE_URL + 'landing/json_grafik_ppbj_200/' + ta,
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
                var ctx = document.getElementById('grafik_ppbj200_landing').getContext('2d');
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
            url: BASE_URL + 'landing/json_grafik_ppbj_25/' + ta,
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
                var ctx = document.getElementById('grafik_ppbj25_landing').getContext('2d');
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





