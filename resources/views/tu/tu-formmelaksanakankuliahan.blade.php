@include('tu.tu-navbar')
<?php

$jurusan = DB::select("select * from tbljurusan");
$prodi = DB::select("select * from tblprodi");
$th_ajaran = DB::select("select * from tblth_ajaran");
?>
<div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a class="float-left bg-blue href="#"><?php echo(session('email')); ?> </a>
        <a class="float-right mt-10" href="/keluar">Keluar</a>
        </div>
      </div>
      
      <div class="container-fluid h-100">
          <main role="main" class="col-md-25 ml-sm-auto col-lg-25 px-25">
          <br />
      <div class="container-fluid">
      <form  method ="Post" action="/inputKegiatan">
      @csrf
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="kegiatan-dosen-tab" data-toggle="tab" href="#kegiatan-dosen" role="tab" aria-controls="kegiatan-dosen" aria-selected="true">
            Kegiatan Dosen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="detail-pengajaran-tab" data-toggle="tab" href="#detail-pengajaran" role="tab" aria-controls="detail-pengajaran" aria-selected="false">
          Detail Pengajaran
          </a>
        </li>
      </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="kegiatan-dosen" role="tabpanel" aria-labelledby="kegiatan-dosen-tab">
  <div class="mt-3">

				<center> <h3> Form Kegiatan Dosen </h3> </center>
    
        <div class="form-group row">
        <label class="col-sm-2" for="jurusan">Jurusan</label>
			    <select class="custom-select col-sm-5" name="jurusan" id="jurusan"  >
              <option selected> Pilih Jurusan </option>
              <?php
              for ($i=0;$i<count($jurusan);$i++){
                echo("
                <option value='".$jurusan[$i]->id_jurusan."''>".$jurusan[$i]->nama_jurusan."</option>
                ");
              }
              ?>
                   </select>
        </div>

      <div class="form-group row">
        <label class="col-sm-2" for="subunsur">Sub Unsur</label>
			    <select class="custom-select col-sm-5" name="subunsur" id="subunsur"  >
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
			    <select class="custom-select col-sm-5" name="kegiatan" id="kegiatan"  >
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
                <select class="custom-select col-sm-5" name="prodi" id="prodi"  >
                      <option selected> Pilih Prodi </option>
                      <?php
              for ($i=0;$i<count($prodi);$i++){
                echo("
                <option value='".$prodi[$i]->id_prodi."''>".$prodi[$i]->nama_prodi."</option>
                ");
              }
              ?>
                 </select>
      </div>

      <div class="form-group row">
		                <label class="col-sm-2" for="th_ajaran">Tahun Ajaran</label>
			            <select class="custom-select col-sm-5" name="th_ajaran" id="th_ajaran"  >
                      <option selected> Pilih Tahun Ajaran </option>
                      <?php
              for ($i=0;$i<count($th_ajaran);$i++){
                echo("
                <option value='".$th_ajaran[$i]->id_thajaran."''>".$th_ajaran[$i]->tahun_ajaran."</option>
                ");
              }
              ?>
  		            </select>
	    </div>

      <div class="form-group row">
		                  <label class="col-sm-2" for="semester">Semester</label>
		              <select class="custom-select col-sm-5" name="semester" id="semester">
                      <option selected> Pilih Semester</option>
                      <option value="1">Genap</option>
                      <option value="2">Ganjil</option>
                  </select>
	    </div>

      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label" for="tgl_mulai">Tanggal Mulai</label>
                        <input class="custom-select col-sm-5" type="date" id="date" name="tgl_mulai" placeholder="tanggal">
      </div>

      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"for="tgl_selesai">Tanggal Selesai</label>
                        <input class="custom-select col-sm-5" type="date" id="date" name="tgl_selesai" placeholder="tanggal">
      </div>
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Upload File </label>
                        <input class="custom-select col-sm-5" type="file" name="image" >
       </div>               
     

      <div class="d-flex align-items-center justify-content-end col-md-7">
            <a class="btn btn-primary" href="#" onclick="nextToDetailPegajaran()" >Selanjutnya ></a>
	    </div>

</div>
  </div>
  <div class="tab-pane fade" id="detail-pengajaran" role="tabpanel" aria-labelledby="detail-pengajaran-tab">
		<div >
		
		<center> <h3> Input Detail Pengajaran </h3> </center>
		   <br />
       <div class="d-flex justify-content-end col-md-10">
        <input type="submit" class="btn btn-primary" value="Simpan" />&nbsp;
        <input type="reset" class="btn btn-danger" value="Cancel" />
       </div>
	<div class="form-group row">
        <label  class="col-sm-2 col-form-label" for="kodemakul"">Kode Mata Kuliah</label>
        <input type="text" class="form-control col-sm-4" id="varchar" name="kodemakul" placeholder="Masukkan Mata Kuliah" style=" width: 42%;">
    </div>
	<div class="form-group row">
        <label  class="col-sm-2 col-form-label" for="kodematul">Nama Mata Kuliah</label>
        <input class="form-control col-sm-4" type="text" id="varchar" name="namamakul" placeholder="Nama Mata Kuliah" style=" width: 42%;">
    </div>

	<div class="row form-group">
	<label  class="col-sm-2 col-form-label">Jumlah SKS</label>
	<input class="form-control col-sm-4" type="text" id="varchar" name="jumlah_sks" placeholder="jumlah Sks" style=" width: 42%;">
	</div>

	<div class="row form-group">
	<label  class="col-sm-2 col-form-label">Kelas</label>
	  <select class="custom-select col-sm-4" name ="kelas" id="kelas"  >
        <option selected> Pilih Kelas </option>
		      <option>Pagi</option>
        <option>Malam</option>
		</select>
	</div>

	<center><h6>Input Sks Dosen</h6></center>
  <br />
    <div class="row form-group">
      <label  class="col-sm-2 col-form-label" name = "sks_teori">Sks Teori</label>
      <input type="number" class="form-control col-sm-2" id="sks_teori" name="sks_teori" placeholder="Input Sks">
      <input type="number" class="form-control col-sm-2" id="sesi_teori" onkeyup="sesiTeori()" name="sesi_teori" placeholder="Input Sesi">
      <input type="number" class="form-control col-sm-2" id="bobot_sksteori" name="bobot_sksteori" placeholder="Bobot Sks/sesi" readonly>
	  </div>

	<div class="row form-group">
		<label  class="col-sm-2 col-form-label" name = "sks_praktek">Sks Praktek</label>
    <input type="number" class="form-control col-sm-2" id="sks_praktek" name="sks_praktek" placeholder="Input Sks">
		<input type="number" class="form-control col-sm-2" id="sesi_praktek" onkeyup="sesiPraktek()" name="sesi_praktek" placeholder="Input Sesi">
		<input type="number" class="form-control col-sm-2" id="bobot_skspraktek" name="bobot_skspraktek" placeholder="Bobot Sks/sesi" readonly >
	</div>

		<center><h6>Input Nama Dosen</h6></center>

	<div class="fom-group row">
    <label  class="col-sm-2 col-form-label">Dosen Pengajar</label>
		<div NamaDosenPengajar class="col-sm-8">
    <a onclick="adddosenpengajar()" class="btn btn-sm btn-primary"> New row</a>
      <div  class="d-flex flex-column" style="width: 645px">
        <div class="d-flex my-2">
        <div class="d-flex media-body flex-column">
          <small>Nama Dosen</small>
          <input type="text" id="fname" class="form-control" name="namadosenpengajar" placeholder="Input Nama Dosen" >
        </div>
        <div class="d-flex media-body flex-column">
          <small>SKS Teori Real</small>
          <input type="number" id="sksteori_real" class="form-control" name="sksteori_real"  placeholder="Input Sks Teori Real" >
        </div>
        <div class="d-flex media-body flex-column">
          <small>SKS Praktek Real</small>
          <input type="number" id="skspraktek_real" class="form-control" name="skspraktek_real" onkeyup="sksTeorireal()"  placeholder="Input Sks Praktek Real" >
        </div>
        </div>
        <div class="d-flex">
          <div style="flex: 1">&nbsp;</div>
          <div class="d-flex flex-column">
            <small>Total Sks</small>
            <input type="number" id="Total" class="form-control" name="total" placeholder="Total Sks" >
          </div>
        </div>
      </div>
		</div>
		
	</div>
	
	</form>
  </div>
  </div>


	

    



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
        <script>
	
			function adddosenpengajar() {
			const input = `<div  class="d-flex">
            <input type="text" id="fname" class="form-control col-sm-4" name="namadosen_pengajar" placeholder="Input Nama Dosen" >
			<input type="text" id="fname" class="form-control col-sm-4" name="sksteori_real" placeholder="Input Sks Teori Real" >
			<input type="text" id="fname" class="form-control col-sm-4" name="skspraktek_real" placeholder="Input Sks Praktek Real" >
			<input type="text" id="fname" class="form-control col-sm-4" name="total" placeholder="Total" >
		</div>`
			$("[NamaDosenPengajar]").html($("[NamaDosenPengajar]").html()+ input)
			}

function sesiTeori(){
	let sks_teori = $("#sks_teori").val();
    let sesi_teori = $("#sesi_teori").val();
	$("#bobot_sksteori").val(sks_teori/sesi_teori);
}
function sesiPraktek(){
	let sks_praktek = $("#sks_praktek").val();
    let sesi_praktek = $("#sesi_praktek").val();
	$("#bobot_skspraktek").val(sks_praktek/sesi_praktek);
}
function sksTeorireal(){
	let bobot_sksteori =  $("#bobot_sksteori").val()
	let bobot_skspraktek = $("#bobot_skspraktek").val()

	let sksteori_real = $("#sksteori_real").val()*bobot_sksteori;
    let skspraktek_real = $("#skspraktek_real").val()*bobot_skspraktek;
	$("#Total").val(sksteori_real+skspraktek_real);
}

function sksPraktekreal(){
	let skspraktek_real = $("#skspraktek_real").val();
    let bobot_skspraktek = $("#bobot_skspraktek").val();
	$("#Total").val(sksteori_real*bobot_skspraktek);
}

function nextToDetailPegajaran() {
  $("#detail-pengajaran-tab")[0].click()
}

	</script>
	</body>
</html>