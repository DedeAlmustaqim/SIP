$('#SkpdProgress').change(function () {
    var id_unit = $(this).val();
    var bln = $('#BlnPorgress').val();

    if (bln == "") {
        swal({
            type: 'warning',
            title: 'Gagal',
            text: 'Pilih bulan terlebih dulu',
            timer: 2000,
        })
    } else {
        TampilProgress(bln, id_unit);
    }
});

function TampilProgress(bln, id_unit) {

}