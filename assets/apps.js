$(document).ready(function () {

    $('.rp').blur(function () {
        $('.rp').formatCurrency();
    });

    $('.decimal').keyup(function () {
        var position = this.selectionStart - 1;
        //remove all but number and .
        var fixed = this.value.replace(/[^0-9\.]/g, "");
        if (fixed.charAt(0) === ".")
            fixed = fixed.slice(1);
        var pos = fixed.indexOf(".") + 1;
        if (pos >= 0)
            fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");
        if (this.value !== fixed) {
            this.value = fixed;
            this.selectionStart = position;
            this.selectionEnd = position;
        }
    });

    $.ajax({
        url: BASE_URL + "apps/jadwal_exp",
        method: "GET",

        async: false,
        dataType: 'json',
        success: function (data) {
            if (data.tgl_akhir == null) {
                document.getElementById("jadwalinput").innerHTML = "<h4 class='text-danger'>Jadwal Terkunci</h4>";

            } else {
                $('#jadwalinput').countdown(data.tgl_akhir)
                    .on('update.countdown', function (event) {
                        var format = '%H Jam %M Menit %S Detik';
                        if (event.offset.totalDays > 0) {
                            format ='<h4 class="text-dark"> Bulan Aktif : ' + data.nm_bln + '</h4>'+ '<h5>Jadwal Input : %-D Hari ' + format +'<h/5>';
                        }


                        $(this).html(event.strftime(format));
                    })
                    .on('finish.countdown', function (event) {
                        $(this).html('<h4 class="text-dark"> Bulan Aktif : ' + data.nm_bln + '</h4> <h5 class="text-danger">Jadwal Input : Expired ' + data.tgl_akhir + '  </h5>')
                            .parent().addClass('disabled');

                    });
            }




        }
    });
});


function GetMonthName(monthNumber) {

    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return months[monthNumber - 1];

}