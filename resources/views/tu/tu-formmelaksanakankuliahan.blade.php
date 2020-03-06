@include('tu.tu-navbar')

<div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a class="float-left bg-blue href="#"><?php echo(session('email')); ?> </a>
        <a class="float-right mt-10" href="/keluar">Keluar</a>
        </div>
      </div>
       @csrf
<body>
      <div class="container-fluid h-100">
          <main role="main" class="col-md-25 ml-sm-auto col-lg-25 px-25">
      <div class="container-fluid">
      </div>
	<form class="mt-3" action="/formmelaksanakankuliaha" method="POST">

				<center> <h3> Form Kegiatan Dosen </h3> </center>
    
        <div class="form-group row">
        <label class="col-sm-2" for="jurusan">Jurusan</label>
			    <select class="custom-select col-sm-5" id="jurusan"  >
              <option selected> Pilih Jurusan </option>
              <option value="3">Teknik Informatika</option>
              <option value="4">Teknik Mesin</option>
              </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2" for="subunsur">Sub Unsur</label>
			    <select class="custom-select col-sm-5" id="subunsur"  >
              <option selected> Pilih Sub Unsur </option>
              <option value="3">Melaksanakan perkuliahan/tutorial dan membimbing</option>
              <option value="4">Membimbing seminar</option>
              <option value="5">Membimbing kuliah kerja nyata</option>
              <option value="6">Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi</option>
              <option value="7">Bertugas sebagai penguji pada ujian akhir</option>
              <option value="8">Membina Kegiatan mahasiswa</option>
              <option value="9">Mengembangkan program kuliah</option>
              <option value="10">Mengembangkan bahan kuliah</option> 
              <option value="12">Membimbing Akademik Dosen yang lebih rendah jabatannya</option>
              <option value="13">Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen</option>
              <option value="14">Melakukan kegiatan pengembangan diri untuk meningkatan kompetensi</option>
			    </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2" for="kegiatan">Kegiatan</label>
			    <select class="custom-select col-sm-5" id="kegiatan"  >
              <option selected> Pilih Kegiatan </option>
              <option value="4">Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta</option>
              <option value="5">Membimbing seminar</option>
              <option value="6">Membimbing kuliah kerja nyata</option>
              <option value="7">Pembimbing Utama</option>
              <option value="8">Pembimbing pendamping/pembantu</option>
              <option value="6">Membimbing kuliah kerja nyata</option>
              <option value="6">Membimbing kuliah kerja nyata</option>
			    </select>
      </div>

      
      
      <div class="form-group row">
                  <label  class="col-sm-2 col-form-label" for="prodi">Prodi</label>
                <select class="custom-select col-sm-5" id="prodi"  >
                      <option selected> Pilih Prodi </option>
                      <option value="1">Teknik Informatika</option>
                      <option value="2">Teknik Geomatika</option>
                      <option value="2">Teknik Geomatika & Jaringan</option>
                      <option value="2">Animasi</option>
                      <option value="2">Rekayasa Keamanan Siber</option>
			          </select>
      </div>

      <div class="form-group row">
		                <label class="col-sm-2" for="th_ajaran">Tahun Ajaran</label>
			            <select class="custom-select col-sm-5" id="th_ajaran"  >
                      <option selected> Pilih Tahun Ajaran </option>
                      <option value="1">2019</option>
                      <option value="2">2020</option>
			            </select>
	    </div>

      <div class="form-group row">
		                  <label class="col-sm-2" for="semester">Semester</label>
		              <select class="custom-select col-sm-5" id="semester">
                      <option selected> Pilih Semester</option>
                      <option value="1">Genap</option>
                      <option value="2">Ganjil</option>
                  </select>
	    </div>

      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label" for="tgl_mulai">Tanggal Mulai</label>
                        <input class="custom-select col-sm-5" type="date" id="date" name="date" placeholder="tanggal">
      </div>

      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"for="tgl_selesai">Tanggal Selesai</label>
                        <input class="custom-select col-sm-5" type="date" id="date" name="date" placeholder="tanggal">
      </div>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Upload File </label>
                        <input class="custom-select col-sm-5" type="file" name="image" >
       </div>               
     

      <td>
                        <a class="btn btn-sm btn-primary" href="tu.tu-inputdetail" style=" margin-left: 475px;">Simpan</a>
                        <a class = "btn btn-sm btn-primary" href="#">Batal</a>
	    </td>

  </div>
    </form>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script>
        $('#subunsur').change( event =>{
          fetch("/getKegiatanByIdSubUnsur/"+ event.target.value)
          .then(res => res.json())
          .then(activities => {
            $("#kegiatan")[0].innerHTML = null
            activities.forEach(({ id_kegiatan, nama_kegiatan}) => {
              $("#kegiatan")[0].add(new Option(nama_kegiatan, id_kegiatan))
            })

          })
          
        })
        </script>
	</body>
