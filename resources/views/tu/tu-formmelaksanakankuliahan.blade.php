<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="/dist/css/dashboard.css" />
		
	<title>Tata Usaha</title>
	
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
		      }
    </style>
	
		<!-- Custom styles for this template -->
		<link href="dashboard.css" rel="stylesheet">
  </head>
  
  <body>
	<div class="row"> 
  @include('navbar')
	<main role="main" class="col-md-3 ml-sm-auto col-lg-10 px-4">
	<div class="container-fluid">
	@csrf
		<form class="mt-3" action="/diklat-prajabatan" method="POST">
				<center> <h3> Form Melaksanakan Kegiatan Dosen </h3> </center>
        <div class="form-group row">
    	  <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
    	  <div class="col-sm-10">
     	 	<input type="text" readonly class="form-control-plaintext" id="jurusan" value="Teknik Informatika">
     </div>
  </div>
  <div class="form-group row">
        <label  class="col-sm-2 col-form-label">Prodi</label>
        <input type="text" id="varchar" name="prodi" placeholder="Masukkan Prodi" style=" width: 42%;">
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

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

	</body>
</html>
