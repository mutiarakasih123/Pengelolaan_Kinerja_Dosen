$(function () {
    $('#tableUsers').DataTable();
    $('.editkaprodi').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "/Kaprodi/edit/" + id,
            success: function (result) {
                $('#nama_prodi').val(result.kaprodi.nama_prodi);
                $('#formEditKarodi').attr('action', '/Kaprodi/update/' + id);
            }
        });
    })
    $('.editJurusan').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: "/Jurusan/edit/" + id,
            success: function (result) {
                $('#nama_jurusan').val(result.jurusan.nama_jurusan);
                $('#formEditJurusan').attr('action', '/Jurusan/update/' + id);
                $('#select' + result.jurusan.idKaprodi).attr('selected', 'selected');
            }
        });
    })
});