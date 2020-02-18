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
	.container {
		background-color: #a39c9b;
		padding: 5px 20px 15px 20px;
		border: 1px solid lightgrey;
		border-radius: 15px;
		Height: 370px;
		width: 50px;
		}
		input[type=text] {
		width: 25%;
		margin-bottom: 20px;
		padding: 12px;
		border: 1px solid #ccc;
		border-radius: 3px;
		}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
		      }
          table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}

.fa-check {
  color: green;
}

.fa-remove {
  color: red;
}
    </style>
	
		<!-- Custom styles for this template -->
		<link href="dashboard.css" rel="stylesheet">
  </head>
  
  <body>
	<div class="row">
      @include('admin.admin-navbar')
<main role="main" class="col-md-3 ml-sm-auto col-lg-10 px-4">
	<div class="container-fluid">
	@csrf
 <a href="/admin.users-daftar" class="btn btn-sm btn-primary my-3">Tambah Users</a>
	<table class="mt-3" action="/user" method="POST">
  <center> <h3> Tabel Users </h3> </center>
    <input type="hidden" name="id_user" value="<?php echo($user->id_user); ?>" />
    <input type="text" name="nama" class="form-control mb-2" value="<?php echo($user->nama); ?>" placeholder="Nama" />
    <input type="email" name="email" class="form-control mb-2" value="<?php echo($user->email); ?>" placeholder="Email" />
    <input type="text" name="nip" class="form-control mb-2" value="<?php echo($user->nip); ?>" placeholder="NIP" />
    <input type="text" name="jabatan" class="form-control mb-2" value="<?php echo($user->jabatan); ?>" placeholder="Jabatan" />
    <input type="text" name="jurusan" class="form-control mb-2" value="<?php echo($user->jurusan); ?>" placeholder="Jurusan" />
    <input type="text" name="prodi" class="form-control mb-2" value="<?php echo($user->prodi); ?>" placeholder="Prodi" />
    <input type="date" name="tgl_lahir" class="form-control mb-2" value="<?php echo($user->tgl_lahir); ?>" placeholder="Tanggal lahir" />

    </table>
  
</main>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

</body>

</html>
