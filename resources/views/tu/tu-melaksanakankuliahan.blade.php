<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kegiatan Data Dosen</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
        <link href="/assets/css/style.css" rel="stylesheet"/>
        <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/leaflet.js"></script>
        <script src="/assets/js/my-map.js"></script>
    </head>
<body>
<div >
@include('navbar')
        <form class="mt-3" action="/diklat-prajabatan" method="POST">
		@csrf
		<center> <h5> Kegiatan melaksanakan kuliahan</h5> </center>
		<ul>
    <a class="nav-link text-blue" href="tu.tu-formmelaksanakankuliahan">Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta	</a>
        
    
        </ul>
      </form>
    </div>