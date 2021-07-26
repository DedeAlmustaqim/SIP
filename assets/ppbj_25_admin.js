$('#bln_ppbj_25').change(function () {
    var id_bln = $(this).val();

    TabelPpbj25(id_bln)



});

function ReloadPpbj25() {
    var id_bln = $('#bln_ppbj_25').val();
    TabelPpbj25(id_bln)
}

function CetakPpbj25() {
    var id_bln = $('#bln_ppbj_25').val();
    var url = BASE_URL+"admin/ppbj/cetak_ppbj_25/"+id_bln
    window.open(url, '_blank');
}

function TabelPpbj25(id_bln) {
    var table = $('#TblPpbj25Admin').DataTable({
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
            "url": BASE_URL + "admin/ppbj/json_ppbj_25/" + id_bln,
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
                    return '<div class="text-left">' + data.nm_unit + '</div>'

                }
            },


            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.jml_pkt_25 + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.jml_pg_25) + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.pl_pkt_25 + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.pl_rp_25) + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.h_pl_pkt_25 + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.h_pl_rp_25) + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.kontrak_pkt_25 + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.kontrak_rp_25) + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.st_pkt_25 + '</div>'

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.st_rp_25) + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + data.bp_pkt_25 + '</div>'


                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    return '<div class="text-center">' + Rupiah(data.bp_rp_25) + '</div>'
                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (data.status_ppbj_25 == 0) {
                        return '<div class="text-center text-danger">Belum Input</div>'
                    } else {
                        return '<div class="text-center text-success">Sudah Input</div>'
                    }

                }
            },
            {
                "orderable": false,
                "data": function (data, type, row, meta, dataToSet) {
                    if (akses==1){
                        return '<div class="text-center"><button type="button" class="btn waves-effect waves-light btn-rounded btn-sm btn-success" onClick="ModalPpbj25(this)" data-kunci="' + data.kunci_bln + '" data-bln="' + data.id_bln + '" data-unit="' + data.id_unit + '" data-nm_bln="' + data.nm_bln + '">Input Data</button>&nbsp' 

                    }else {
                        return ''
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

