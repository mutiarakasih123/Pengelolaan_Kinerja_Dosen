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
    $('#kaprodi').change(function () {
        var id = $(this).val();
        $('.hideJur').removeClass('d-none');
        $('.hideJur').addClass('d-none');
        $('.Sjur' + id).removeClass('d-none');
    })
    $('#subUnsur').change(function () {
        var id = $(this).val();
        if (id == 1) {
            $content = 'Melaksanakan perkulihan / tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan bengkel / studio / kebun pada fakultas / sekolah tinggi / Akademik / Politeknik sendiri, pada fakultas lain dalam lingkungan Universitas / Institut sendiri, maupun di luar perguruan tinggi sendiri secara melembaga tiap sks(paling banyak 12 sks) per semester';
        }else if (id == 2) {
            $content = 'Membimbing mahasiswa seminar';
        } else if (id == 3) {
            $content = 'Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan';
        } else if (id == 4) {
            $content = 'Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi';
        } else if (id == 5) {
            $content = 'Menguji mahasiswa yang mengikuti ujian akhir';
        } else if (id == 6) {
            $content = 'Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan';
        } else {
            $content = '';
        }
        $('#kegiatan').val($content);
    })

    // for set form sub unsur
    $('#subUnsur').change(function () {
        var status = $(this).val()
        $('#tempatCloneT').addClass('d-none');
        $('#tempatCloneP').addClass('d-none');
        $('#tempatCloneSubUnsur2').addClass('d-none');
        $('#subUnsur4').addClass('d-none');
        $('#subUnsur5').addClass('d-none');
        $('#subUnsur6').addClass('d-none');
        if (status == 1) {
            $('#tempatCloneT').removeClass('d-none');
            $('#tempatCloneP').removeClass('d-none');
        } else if (status == 2 || status == 3) {
            $('#tempatCloneSubUnsur2').removeClass('d-none');
        }else if (status == 4) {
            $('#subUnsur4').removeClass('d-none');
        } else if (status == 5) {
            $('#subUnsur5').removeClass('d-none');
        } else if (status == 6) {
            $('#subUnsur6').removeClass('d-none');
        } else {
            $('#tempatCloneT').addClass('d-none');
            $('#tempatCloneP').addClass('d-none');
            $('#tempatCloneSubUnsur2').addClass('d-none');
            $('#subUnsur4').addClass('d-none');
            $('#subUnsur5').addClass('d-none');
            $('#subUnsur6').addClass('d-none');
        }
    })

// function for sub unsur 1
    // function clone nama dosen
    $('#sksT').keyup(function () {
        var count = $(this).val();
        $('.forRemoveCloneT').remove();
        for (let i = 0; i < count; i++) {
            let n = i + 1;
            var cloneT = $('#cloneDosenT').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneT');
            cloneT.removeAttr('id');
            cloneT.children('label').text('Dosen Teori Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenT' + n);
            cloneT.appendTo('#tempatCloneT');
        }
    })
    if ($('#sksT').val() > 0) {
        for (let i = 0; i < $('#sksT').val(); i++) {
            let n = i + 1;
            var cloneT = $('#cloneDosenT').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneT');
            cloneT.removeAttr('id');
            cloneT.children('label').text('Dosen Teori Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenT' + n);
            cloneT.appendTo('#tempatCloneT');
        }
    }

    $('#sksP').keyup(function () {
        var count = $(this).val();
        $('.forRemoveCloneP').remove();
        if (count > 0) {
            for (let i = 0; i < 4; i++) {
                let n = i + 1;
                var cloneT = $('#cloneDosenP').clone();
                cloneT.removeClass('d-none');
                cloneT.addClass('forRemoveCloneP');
                cloneT.removeAttr('id');
                cloneT.children('label').text('Dosen Prakter Sesi ' + n);
                cloneT.find('select').attr('name', 'dosenP' + n);
                cloneT.appendTo('#tempatCloneP');
            }
        } else {
            $('.forRemoveCloneP').remove();
        }
    })
    if ($('#sksP').val() > 0) {
        for (let i = 0; i < 4; i++) {
            let n = i + 1;
            var cloneT = $('#cloneDosenP').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneP');
            cloneT.removeAttr('id');
            cloneT.children('label').text('Dosen Prakter Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenP' + n);
            cloneT.appendTo('#tempatCloneP');
        }
    }

// function for sub unsur 2 dan 3
    $('#jumMhs').keyup(function () {
        var sum = $(this).val();
        var sks = Number(sum) / 25;
        $('#jumSksMhs').val(Math.ceil(sks));
    })
    $('.btnplus').click(function () {
        var n = $(this).attr('sum');
        var no = Number(n) + 1;
        $(this).attr('sum', no);
        $('.btnminus').removeClass('d-none');
        var clone = $('#cloneDosenunsur').clone();
        clone.attr('id', 'cloneDosenunsur' + no);
        clone.children('label').text('Nama Dosen Ke ' + no);
        clone.children('input').remove();
        clone.find('select').attr('name', 'dosenU' + n);
        clone.find('#btnminus').attr('id', 'remove'+no);
        clone.find('.btnplus').addClass('d-none');
        clone.find('.btnminus').attr('minus',no);
        clone.appendTo('#tempatCloneSubUnsur2');
        $('#btnminus').addClass('d-none');
        for (let i = 1; i < no; i++) {
            $('#remove' + i).addClass('d-none');
        }
        $('#countDosen').val(no);
        minus();
    })
    function minus() {
        $('.btnminus').click(function () {
            var n = $(this).attr('minus');
            var no = Number(n) - 1;
            $('#cloneDosenunsur' + n).remove();
            $('#remove' + no).removeClass('d-none');
            $('.btnplus').attr('sum', no);
            $('#countDosen').val(no);
        })

    }

// function for sub unsur 4
    $('#jumMhsis').keyup(function () {
        var jns = $('#jnsBim').val();
        var sum = $(this).val();
        if (jns == 1) {
            var sks = Number(sum) / 2;
        }else if (jns == 2) {
            var sks = Number(sum) / 3;
        } else if (jns == 3) {
            var sks = Number(sum) / 6;
        } else {
            var sks = 0;
        }
        $('#jumSKS4').val(Math.ceil(sks));
    })
    $('#jnsBim').change(function () {
        var jns = $(this).val();
        var sum = $('#jumMhsis').val();
        if (jns == 1) {
            var sks = Number(sum) / 2;
        } else if (jns == 2) {
            var sks = Number(sum) / 3;
        } else if (jns == 3) {
            var sks = Number(sum) / 6;
        } else {
            var sks = 0;
        }
        $('#jumSKS4').val(Math.ceil(sks));
    })
});

// tematClone1 btnminus
