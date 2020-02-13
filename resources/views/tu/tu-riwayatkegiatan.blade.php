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
      @include('tu.tu-navbar')
	<main role="main" class="col-md-3 ml-sm-auto col-lg-10 px-4">
	<div class="container-fluid">
	@csrf
 	<table class="mt-3" action="/" method="POST">
		<center> <h3> Riwayat Kegiatan </h3> </center>
  <tr>
    <th style="width:3%">No</th>
    <th style="width:10%">Sub Unsur</th>
    <th style="width:10%">Kegiatan</th>
    <th style="width:5%">Jurusan</th>
    <th style="width:5%">Prodi</th>
    <th style="width:8%">Tahun Ajaran</th>
    <th style="width:10%">Pengajar Teori</th>
    <th style="width:10%">Pengajar Praktek</th>
    <th style="width:7%">Aksi</th>
    </tr>
  </table>
<!-- <td>
         <a class="btn btn-sm btn-primary" href="/update-spot-foto/'. $spots_foto[$i]->id .'">Edit</a>
         <a class="btn btn-sm btn-danger" href="/delete-spot-foto/'. $spots_foto[$i]->id .'">Delete</a>
    </td> -->
		</main>
	</div>
</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

	</body>
</html>
