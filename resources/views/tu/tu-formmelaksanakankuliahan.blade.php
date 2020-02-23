<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
        <link href="/assets/css/style.css" rel="stylesheet"/>
        <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/leaflet.js"></script>
        <script src="/assets/js/my-map.js"></script>

    <style>
                /* width */
        ::-webkit-scrollbar {
          width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
          background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: #555;
        }

    </style>
  </head>
  
  <body>
	<div class="container-fluid h-100">
  @include('tu.tu-navbar')
	<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-10">
	<div class="container-fluid">
	@csrf
		<form class="mt-3" action="/diklat-prajabatan" method="POST">
				<center> <h3> Form Melaksanakan Kegiatan Dosen </h3> </center>
      <div class="form-group row">
		  </div>
        <div class="form-group row">
    	  <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
    	  <div class="col-sm-10">
     	 	<input type="text" readonly class="form-control-plaintext" id="jurusan" value="Teknik Informatika">
     </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-2" for="inlineFormCustomSelectPref">Sub Unsur</label>
			  <select class="custom-select col-sm-5" id="inlineFormCustomSelectPref"  >
				  <option selected> Pilih Sub Unsur </option>
				  <option value="1">Melaksanakan perkuliahan/tutorial dan membimbing,menguji serta menyelenggarakan 
          pendidikan dilabratorium, praktek keguruan bengkel/studi/kebun/percobaan/teknologi pengajaran dan praktek lapangan</option>
				  <option value="2">Membimbing seminar</option>
			</select>
      </div>
      <div class="form-group row">
      <label class="col-sm-2" for="inlineFormCustomSelectPref">Kegiatan</label>
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
      </div>
			  <!-- <select class="custom-select col-sm-5" id="inlineFormCustomSelectPref"  >
				  <option selected> Pilih Kegiatan </option>
				  <option value="1">Melaksanakan perkuliahan/tutorial dan 
          membimbing,menguji serta menyelenggarakan 
          pendidikan dilabratorium, praktek keguruan bengkel/studi/kebun/percobaan/teknologi 
          pengajaran dan praktek lapangan</option>
				  <option value="2">Membimbing seminar</option>
			</select> -->
      </div>
      
  <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Prodi</label>
         <select class="custom-select col-sm-5" id="inlineFormCustomSelectPref"  >
				  <option selected> Pilih Prodi </option>
				  <option value="1">Teknik Informatika</option>
				  <option value="2">Multimedia </option>
			</select>
    	</div>
  <div class="form-group row">
		    <label class="col-sm-2" for="inlineFormCustomSelectPref">Tahun Ajaran</label>
			  <select class="custom-select col-sm-5" id="inlineFormCustomSelectPref"  >
				  <option selected> Pilih Tahun Ajaran </option>
				  <option value="1">2019</option>
				  <option value="2">2020</option>
			</select>
	</div>
  <div class="form-group row">
		    <label class="col-sm-2" for="inlineFormCustomSelectPref">Semester</label>
		  	<select class="custom-select col-sm-5" id="inlineFormCustomSelectPref">
				  <option selected> Pilih Semester</option>
				  <option value="1">Genap</option>
				  <option value="2">Ganjil</option>
          <div class="form-group row">
      </select>
	</div>
  <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Tanggal Mulai</label>
        <input type="date" id="date" name="date" placeholder="tanggal">
    </div>
    <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Tanggal Selesai</label>
        <input type="date" id="date" name="date" placeholder="tanggal">
    </div>
  <label class="p-3 rounded text-center" style="border: 4px dotted #ccc;width: 300px; 
					right: 200px; cursor: pointer;padding: inherit;margin-top: 10px;margin-right: 390px;margin-left: 390px;">
					<input class="invisible" type="file" name="image" style="position: absolute;">
					<h6>Upload File</h6>
  </label>
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

	</body>
</html>
