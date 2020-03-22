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
});