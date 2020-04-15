$(function () {
    $('#tableUsers').DataTable();
    $('#kaprodiSend').val($('#kaprodi').val());
    $('#jurusanSend').val($('#jurusan').val());
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
    var kaprodi = $('#kaprodi').val();
    if (kaprodi !== "" || kaprodi !== null) {
        $('.hideJur').removeClass('d-none');
        $('.hideJur').addClass('d-none');
        $('.Sjur' + kaprodi).removeClass('d-none');
    }
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
            var sesi = $('#sesiKe'+i);
            let n = i + 1;
            var cloneT = $('#cloneDosenT').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneT');
            cloneT.removeAttr('id');
            cloneT.children('.label').text('Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenT' + n).attr('sendBkd','bkdt'+n).attr('sendSkp','skpt'+n).attr('id','dosenT'+n);
            cloneT.find('.bkd').attr('name','bkdt'+n).attr('id','bkdt'+n);
            cloneT.find('.skp').attr('name','skpt'+n).attr('id','skpt'+n);
            var select = cloneT.find('select').children('option');
            select.each(function(){
                if ($(this).val() !== "") {
                    if ($(this).val() == sesi.attr('idDosenT')) {
                        $(this).attr('selected','selected');

                    }
                }
            });
            cloneT.appendTo('#tempatCloneT');
            var jakademi = $('#dosenT'+n).children('option').filter(':selected').attr('jakademi');
            var bkd = $('#dosenT'+n).attr('sendBkd');
            var skp = $('#dosenT'+n).attr('sendSkp');
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(1);
                $('#'+skp).val(1);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(0.5);
                $('#'+skp).val(0.5);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        }
        $('.cekJakademit').change(function(){
            var jakademi = $(this).children('option').filter(':selected').attr('jakademi');
            var bkd = $(this).attr('sendBkd');
            var skp = $(this).attr('sendSkp');
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(1);
                $('#'+skp).val(1);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(0.5);
                $('#'+skp).val(0.5);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        });
    })
    if ($('#sksT').val() > 0) {
        for (let i = 0; i < $('#sksT').val(); i++) {
            var sesi = $('#sesiKe'+i);
            let n = i + 1;
            var cloneT = $('#cloneDosenT').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneT');
            cloneT.removeAttr('id');
            cloneT.children('.label').text('Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenT' + n).attr('sendBkd','bkdt'+n).attr('sendSkp','skpt'+n).attr('id','dosenT'+n);
            cloneT.find('.bkd').attr('name','bkdt'+n).attr('id','bkdt'+n);
            cloneT.find('.skp').attr('name','skpt'+n).attr('id','skpt'+n);
            var select = cloneT.find('select').children('option');
            select.each(function(){
                if ($(this).val() !== "") {
                    if ($(this).val() == sesi.attr('idDosenT')) {
                        $(this).attr('selected','selected');

                    }
                }
            });
            cloneT.appendTo('#tempatCloneT');
            var jakademi = $('#dosenT'+n).children('option').filter(':selected').attr('jakademi');
            var bkd = $('#dosenT'+n).attr('sendBkd');
            var skp = $('#dosenT'+n).attr('sendSkp');
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(1);
                $('#'+skp).val(1);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(0.5);
                $('#'+skp).val(0.5);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        }
        $('.cekJakademit').change(function(){
            var jakademi = $(this).children('option').filter(':selected').attr('jakademi');
            var bkd = $(this).attr('sendBkd');
            var skp = $(this).attr('sendSkp');
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(1);
                $('#'+skp).val(1);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(0.5);
                $('#'+skp).val(0.5);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        });
        
    }

    $('#sksP').keyup(function () {
        var count = $(this).val();
        $('.forRemoveCloneP').remove();
        if (count > 0) {
            for (let i = 0; i < 4; i++) {
                var sesi = $('#sesiKe'+i);
                let n = i + 1;
                var cloneT = $('#cloneDosenP').clone();
                cloneT.removeClass('d-none');
                cloneT.addClass('forRemoveCloneP');
                cloneT.removeAttr('id');
                cloneT.children('.label').text('Sesi ' + n);
                cloneT.find('select').attr('name', 'dosenP' + n).attr('sendBkd','bkdp'+n).attr('sendSkp','skpp'+n).attr('id','dosenP'+n);
                cloneT.find('.sumSKSPbkd').attr('name','bkdp'+n).attr('id','bkdp'+n);
                cloneT.find('.sumSKSPskp').attr('name','skpp'+n).attr('id','skpp'+n);
                // cloneT.find('.sumSKSP').val(Number(count)/4);
                var select = cloneT.find('select').children('option');
                select.each(function(){
                    if ($(this).val() !== "") {
                        if ($(this).val() == sesi.attr('idDosenP')) {
                            $(this).attr('selected','selected');
                        }
                    }
                });
                cloneT.appendTo('#tempatCloneP');
                var jakademi = $('#dosenP'+n).children('option').filter(':selected').attr('jakademi');
                var bkd = $('#dosenP'+n).attr('sendBkd');
                var skp = $('#dosenP'+n).attr('sendSkp');
                var lektor = (Number(count)/4)*1;
                var ahli = (Number(count)/4)*0.5;
                if (jakademi == 'Lektor') {
                    $('#'+bkd).val(lektor);
                    $('#'+skp).val(lektor);
                }else if (jakademi == 'Asisten Ahli') {
                    $('#'+bkd).val(ahli);
                    $('#'+skp).val(ahli);
                }else{
                    $('#'+bkd).val(0);
                    $('#'+skp).val(0);
                }
            }
            $('.cekJakademip').change(function(){
                var jakademi = $(this).children('option').filter(':selected').attr('jakademi');
                var bkd = $(this).attr('sendBkd');
                var skp = $(this).attr('sendSkp');
                var lektor = (Number(count)/4)*1;
                var ahli = (Number(count)/4)*0.5;
                if (jakademi == 'Lektor') {
                    $('#'+bkd).val(lektor);
                    $('#'+skp).val(lektor);
                }else if (jakademi == 'Asisten Ahli') {
                    $('#'+bkd).val(ahli);
                    $('#'+skp).val(ahli);
                }else{
                    $('#'+bkd).val(0);
                    $('#'+skp).val(0);
                }
            });
        } else {
            $('.forRemoveCloneP').remove();
        }
    })
    if ($('#sksP').val() > 0) {
        var count = $('#sksP').val();
        for (let i = 0; i < 4; i++) {
            var sesi = $('#sesiKe'+i);
            let n = i + 1;
            var cloneT = $('#cloneDosenP').clone();
            cloneT.removeClass('d-none');
            cloneT.addClass('forRemoveCloneP');
            cloneT.removeAttr('id');
            cloneT.children('.label').text('Sesi ' + n);
            cloneT.find('select').attr('name', 'dosenP' + n).attr('sendBkd','bkd'+n).attr('sendSkp','skp'+n).attr('id','dosenP'+n);
            cloneT.find('.sumSKSPbkd').attr('name','bkd'+n).attr('id','bkd'+n);
            cloneT.find('.sumSKSPskp').attr('name','skp'+n).attr('id','skp'+n);
            // cloneT.find('.sumSKSP').val(Number($('#sksP').val())/4);
            var select = cloneT.find('select').children('option');
            select.each(function(){
                if ($(this).val() !== "") {
                    if ($(this).val() == sesi.attr('idDosenP')) {
                        $(this).attr('selected','selected');
                    }
                }
            });
            cloneT.appendTo('#tempatCloneP');
            var jakademi = $('#dosenP'+n).children('option').filter(':selected').attr('jakademi');
            var bkd = $('#dosenP'+n).attr('sendBkd');
            var skp = $('#dosenP'+n).attr('sendSkp');
            var lektor = (Number(count)/4)*1;
            var ahli = (Number(count)/4)*0.5;
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(lektor);
                $('#'+skp).val(lektor);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(ahli);
                $('#'+skp).val(ahli);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        }
        $('.cekJakademip').change(function(){
            var jakademi = $(this).children('option').filter(':selected').attr('jakademi');
            var bkd = $(this).attr('sendBkd');
            var skp = $(this).attr('sendSkp');
            var lektor = (Number(count)/4)*1;
            var ahli = (Number(count)/4)*0.5;
            if (jakademi == 'Lektor') {
                $('#'+bkd).val(lektor);
                $('#'+skp).val(lektor);
            }else if (jakademi == 'Asisten Ahli') {
                $('#'+bkd).val(ahli);
                $('#'+skp).val(ahli);
            }else{
                $('#'+bkd).val(0);
                $('#'+skp).val(0);
            }
        });
    }

// function for sub unsur 2 dan 3
    $('#jumMhs').keyup(function () {
        var sum = $(this).val();
        var sks = Number(sum) / 25;
        var coun = Number($('#countDosen').val());
        $('#jumSksMhs').val(Math.ceil(sks));
        var skssesi = Number($('#jumSksMhs').val())/coun;
        $('.sksSub2bkd').val(skssesi.toFixed(2));
        $('.sksSub2skp').val(skssesi.toFixed(2));
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
        clone.find('.sksSub2bkd').attr('name','bkd'+no);
        clone.find('.sksSub2skp').attr('name','skp'+no);
        clone.appendTo('#tempatCloneSubUnsur2');
        $('#btnminus').addClass('d-none');
        for (let i = 1; i < no; i++) {
            $('#remove' + i).addClass('d-none');
        }
        $('#countDosen').val(no);
        var changeSKS = Number($('#jumSksMhs').val())/Number($('#countDosen').val());
        $('.sksSub2bkd').val(changeSKS.toFixed(2));
        $('.sksSub2skp').val(changeSKS.toFixed(2));
        minus();
    })
    $('.btnplusEdit').click(function(){
        var n = $(this).attr('sum');
        var no = Number(n) + 1;
        $(this).attr('sum', no);
        // $(this).attr('id','btnPlus'+n);
        var clone = $('#cloneDosenunsur'+n).clone();
        clone.attr('id', 'cloneDosenunsur' + no);
        clone.children('label').text('Nama Dosen Ke ' + no);
        clone.children('input').remove();
        clone.find('select').attr('name', 'dosenU' + n);
        clone.find('#remove'+n).attr('id', 'remove'+no);
        clone.find('.btnminus').attr('minus',no);
        clone.find('.btnplusEdit').remove();
        clone.find('.sksSub2bkd').attr('name','bkd'+no);
        clone.find('.sksSub2skp').attr('name','skp'+no);
        clone.appendTo('#tempatCloneSubUnsur2');
        $('#remove'+n).addClass('d-none');
        $('#remove'+no).removeClass('d-none');
        $('#countDosen').val(no);
        var changeSKS = Number($('#jumSksMhs').val())/Number($('#countDosen').val());
        $('.sksSub2bkd').val(changeSKS.toFixed(2));
        $('.sksSub2skp').val(changeSKS.toFixed(2));
        minus();
    })
    minus();
    function minus() {
        $('.btnminus').click(function () {
            var n = $(this).attr('minus');
            var no = Number(n) - 1;
            $('#cloneDosenunsur' + n).remove();
            $('#remove' + no).removeClass('d-none');
            $('.btnplusEdit').attr('sum', no);
            $('.btnplus').attr('sum', no);
            $('#countDosen').val(no);
            $('#remove1').addClass('d-none');
            var changeSKS = Number($('#jumSksMhs').val())/Number($('#countDosen').val());
            $('.sksSub2skp').val(changeSKS.toFixed(2));
            $('.sksSub2bkd').val(changeSKS.toFixed(2));
        })
    }

// function for sub unsur 4
    $('#jumMhsis').keyup(function () {
        var jns = $('#jnsBim').val();
        var sum = $(this).val();
        if (jns == 1) {
            var sksBkdU = (Number(sum) / 4)*5;
            var sksSkpU = (Number(sum) / 4)*8;
            var sksBkdP = (Number(sum) / 4)*4;
            var sksSkpP = (Number(sum) / 4)*6;
        } else if (jns == 2) {
            var sksBkdU = (Number(sum) / 6)*3;
            var sksSkpU = (Number(sum) / 6)*3;
            var sksBkdP = (Number(sum) / 6)*2;
            var sksSkpP = (Number(sum) / 6)*2;
        } else if (jns == 3) {
            var sksBkdU = (Number(sum) / 8)*2;
            var sksSkpU = (Number(sum) / 8)*1;
            var sksBkdP = (Number(sum) / 8)*1;
            var sksSkpP = (Number(sum) / 8)*0.5;
        } else if (jns == 4) {
            var sksBkdU = (Number(sum) / 10)*1;
            var sksSkpU = (Number(sum) / 10)*1;
            var sksBkdP = (Number(sum) / 10)*1;
            var sksSkpP = (Number(sum) / 10)*0.5;
        } else {
            var sks = 0;
        }
        $('.sksSub4bkd1').val(sksBkdU);
        $('.sksSub4skp1').val(sksSkpU);
        $('.sksSub4bkd2').val(sksBkdP);
        $('.sksSub4skp2').val(sksSkpP);
    })
    $('#jnsBim').change(function () {
        var jns = $(this).val();
        var sum = $('#jumMhsis').val();
        if (jns == 1) {
            var sksBkdU = (Number(sum) / 4)*5;
            var sksSkpU = (Number(sum) / 4)*8;
            var sksBkdP = (Number(sum) / 4)*4;
            var sksSkpP = (Number(sum) / 4)*6;
        } else if (jns == 2) {
            var sksBkdU = (Number(sum) / 6)*3;
            var sksSkpU = (Number(sum) / 6)*3;
            var sksBkdP = (Number(sum) / 6)*2;
            var sksSkpP = (Number(sum) / 6)*2;
        } else if (jns == 3) {
            var sksBkdU = (Number(sum) / 8)*2;
            var sksSkpU = (Number(sum) / 8)*1;
            var sksBkdP = (Number(sum) / 8)*1;
            var sksSkpP = (Number(sum) / 8)*0.5;
        } else if (jns == 4) {
            var sksBkdU = (Number(sum) / 10)*1;
            var sksSkpU = (Number(sum) / 10)*1;
            var sksBkdP = (Number(sum) / 10)*1;
            var sksSkpP = (Number(sum) / 10)*0.5;
        } else {
            var sks = 0;
        }
        $('.sksSub4bkd1').val(sksBkdU);
        $('.sksSub4skp1').val(sksSkpU);
        $('.sksSub4bkd2').val(sksBkdP);
        $('.sksSub4skp2').val(sksSkpP);
    })

//function for sub unsur 5
    $('#jumMhsiswa').keyup(function(){
        var count = $(this).val();
        $('.sksSub5K').val(Number(count)/4);
        $('.sksSub5A').val(((Number(count)/4)*0.5).toFixed(2));
//         sksSub5K
// sksSub5A
    })
});

// tematClone1 btnminus
