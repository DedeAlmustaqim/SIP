function LapApbd(elem) {
    var id = $(elem).data("id");
    var bln = $('#blnapbd').val();
    var url = BASE_URL + "apbd/cetak_apbd/" + bln + "/" + id
    window.open(url, '_blank');
}
function LapApbdAdmin(elem) {
    var bln = $('#BlnApbdLap').val();
    var url = BASE_URL + "admin/apbd/cetak_apbd/" + bln 
    window.open(url, '_blank');
}


function LapPd(elem) {
    var id = $(elem).data("id");
    var bln = $('#blnpd').val();
    var url = BASE_URL + "pendapatan/cetak_pd/" + bln + "/" + id
    window.open(url, '_blank');
}

function LapPdAdmin(elem) {
    var bln = $('#blnpdAdmin').val();
    var url = BASE_URL + "admin/pendapatan/cetak_pd/" + bln
    window.open(url, '_blank');
}

function Lap50(elem) {
    var id = $(elem).data("id");
    var bln = $('#bln50').val();
    var url = BASE_URL + "ppbj/cetak_ppbj_50/" + bln + "/" + id
    window.open(url, '_blank');
}

function Lap50Admin(elem) {
    var bln = $('#bln50Admin').val();
    var url = BASE_URL + "admin/ppbj/cetak_ppbj_50/" + bln 
    window.open(url, '_blank');
}


function Lap200(elem) {
    var id = $(elem).data("id");
    var bln = $('#bln200').val();
    var url = BASE_URL + "ppbj/cetak_ppbj_200/" + bln + "/" + id
    window.open(url, '_blank');
}

function Lap200Admin(elem) {
    var bln = $('#bln200Admin').val();
    var url = BASE_URL + "admin/ppbj/cetak_ppbj_200/" + bln
    window.open(url, '_blank');
}

function Lap25(elem) {
    var id = $(elem).data("id");
    var bln = $('#bln25').val();
    var url = BASE_URL + "ppbj/cetak_ppbj_25/" + bln + "/" + id
    window.open(url, '_blank');
}
function Lap25Admin(elem) {
    var bln = $('#bln25Admin').val();
    var url = BASE_URL + "admin/ppbj/cetak_ppbj_25/" + bln 
    window.open(url, '_blank');
}