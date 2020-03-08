@include('tu.tu-navbar')
<div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a class="float-left bg-blue href="#"><?php echo(session('email')); ?> </a>
        <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
	  </div>
		@csrf
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
		user-select: none;
		
	  }
	.container {
		/* background-color: #a39c9b; */
		padding: 5px 20px 15px 20px;
		/* border: 1px solid lightgrey; */
		/* border-radius: 15px; */
		/* Height: 350px; */
		width: 820px;
		}
		/* input[type=text] {
		width: 25%;
		margin-bottom: 20px;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 3px;
		} */

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
		      }
    </style>
</head>
  
<body>
	<div class="container-fluid h-100">
 	<main role="main" class="col-md-25 ml-sm-auto col-lg-25 px-25">
	<div class="container-fluid">
	
	<form class="mt-3" action="/tu.tu-inputdetail" method="POST">
	
<body>
	<div class="row">
	<div class="col-30">
	<form action="#">
		<div class="container">
		
		<center> <h3> Input Detail Pengajaran </h3> </center>
		   
	<div class="form-group row">
        <label  class="col-sm-4 col-form-label for="kodematul"">Kode Mata Kuliah</label>
        <input type="text" class="form-control col-sm-4" id="varchar" name="kodematul" placeholder="Masukkan Mata Kuliah" style=" width: 42%;">
    </div>
	<div class="form-group row">
        <label  class="col-sm-4 col-form-label" for="kodematul">Nama Mata Kuliah</label>
        <input class="form-control col-sm-4" type="text" id="varchar" name="namamakul" placeholder="Nama Mata Kuliah" style=" width: 42%;">
    </div>

	<div class="row form-group">
	<label  class="col-sm-4 col-form-label">Jumlah SKS</label>
	<input class="form-control col-sm-4" type="text" id="varchar" name="jumlah_sks" placeholder="jumlah Sks" style=" width: 42%;">
	</div>
	<center><h6>Input Sks Dosen</h6></center>
	
    <div class="row form-group">
		<label  class="col-sm-4 col-form-label">Sks Teori</label>
		<input type="text" class="form-control col-sm-2" id="fname" name="sks_teori" placeholder="Input Sks">
	    <input type="text" class="form-control col-sm-2" id="fname" name="sesi_teori" placeholder="Input Sesi">
		<input type="text" class="form-control col-sm-2" id="fname" name="bobot_sksteori" placeholder="Bobot Sks/sesi">
	</div>

	<div class="row form-group">
		<label  class="col-sm-4 col-form-label">Sks Praktek</label>
        <input type="text" class="form-control col-sm-2" id="fname" name="sks_praktek" placeholder="Input Sks">
		<input type="text" class="form-control col-sm-2" id="fname" name="sesi_praktek" placeholder="Input Sesi">
		<input type="text" class="form-control col-sm-2" id="fname" name="bobot_skspraktek" placeholder="Bobot Sks/sesi">
	</div>

		<center><h6>Input Nama Dosen</h6></center>

	<div class="fom-group row">
    	<label  class="col-sm-4 col-form-label">Dosen Pengajar</label>
		<div NamaDosenPengajar class="col-sm-8">
			<a onclick="adddosenpengajar()" class="btn btn-sm btn-primary"> New row</a>
            <input type="text" id="fname" class="form-control col-sm-4" name="namadosenpengajar" placeholder="Input Nama Dosen" ><br>
			<input type="text" id="fname" class="form-control col-sm-4" name="sksteori_real" placeholder="Input Sks Teori Real" ><br>

		</div>
		</div>
		<div class="fom-group row">
    	<label  class="col-sm-4 col-form-label">Pengajar Praktek</label>
		<div NamaDosenPraktek class="col-sm-8">
			<a onclick="adddosenpraktek()" class="btn btn-sm btn-primary"> New row</a>
            <input type="text" id="fname" class="form-control" name="namadosenpengajar_praktek" placeholder="Input Nama Dosen" ><br>
		</div>
		</div>	
	<script>
			function adddosenpengajar() {
			const input = `<input type="text" id="fname" class="form-control" name="namadosenpengajar_teori" placeholder="Input Nama Dosen" /><br>`
			$("[NamaDosenPengajar]").html($("[NamaDosenPengajar]").html()+ input)
			}

			function adddosenpraktek() {
			const input = `<input type="text" id="fname" class="form-control" name="namadosenpengajar_praktek" placeholder="Input Nama Dosen" /><br>`
			$("[NamaDosenPraktek]").html($("[NamaDosenPraktek]").html()+ input)

		}
		// 	function myDeleteFunction() {
  		// 	document.getElementById("").deleteRow(0);
		// }
	</script>
	</form>
	<td>	
			<a class="btn btn-sm btn-primary" href="" style=" margin-left: 475px;">Simpan</a>
			<a class = "btn btn-sm btn-primary" href="#">Batal</a>
	</td>
	</main>
	</div>
</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</body>

