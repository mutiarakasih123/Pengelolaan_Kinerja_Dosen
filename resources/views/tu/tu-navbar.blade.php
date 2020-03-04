<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Menu</title>
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
    <div class="row h-100">
    <div class="col-5 col-md-3 col-lg-2 collapse show m-0 p-0 h-100 bg-dark" id="collapseExample" style="overflow: auto;display: block;height: 75vh;">
      <h4 class="text-white text-center py-2">Pengelolaan Kinerja Dosen</h4>
      <hr class="bg-white mt-1" />
      <ul class="nav flex-column navbar-dark sticky-top ">
      <li class="nav-item">
          <a class="nav-link text-white" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsePendidikan" href="#collapsePendidikan">Pendidikan</a>
        <!-- <nav class="nav nav-pills flex-column" class="collapse" id="collapsePendidikan">
          <a class="nav-link ml-3 my-1" href="#item-1-1">Pendidikan Formal</a>
          <a class="nav-link ml-3 my-1" href="#item-1-2">Diklat Pra Jabatan</a>
        </nav> -->
       </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="forminput">Pelaksanaan Pendidikan</a>
          <!-- <nav class="nav nav-pills flex-column" class="collapse " id="collapsePelaksanaanPendidikan" >
          <a class="nav-link ml-3 my-1" href="tu.tu-melaksanakankuliahan">Melaksanakan perkuliahan</a>
          <a class="nav-link ml-3 my-1" href="#item-2-2">Membimbing seminar</a>
          <a class="nav-link ml-3 my-1" href="#item-2-3">Pendidikan Formal</a>
          <a class="nav-link ml-3 my-1" href="#item-2-4">Membimbing kuliah kerja nyata</a>
          <a class="nav-link ml-3 my-1" href="#item-2-5">Membimbing </a>
          <a class="nav-link ml-3 my-1" href="#item-2-6">Bertugas sebagai penguji pada</a>
          <a class="nav-link ml-3 my-1" href="#item-2-7">Membina kegiatan mahasiswa</a>
          <a class="nav-link ml-3 my-1" href="#item-2-8">Mengembangkan program</a>  
          <a class="nav-link ml-3 my-1" href="#item-2-9">Mengembangkan bahan kuliah</a>
          <a class="nav-link ml-3 my-1" href="#item-2-10">Membimbing Akademik Dosen</a>
          <a class="nav-link ml-3 my-1" href="#item-2-11">Melaksanakan kegiatan</a>
          <a class="nav-link ml-3 my-1" href="#item-2-12">Melakukan kegiatan</a>
          </nav> -->
        </li>
        <li class="nav-item">
        <a class="nav-link text-white" href="tu.tu-listinput">Data Kegiatan Dosen</a>
          <!-- <nav class="nav nav-pills flex-column" class="collapse" id="collapsePendidikan">
      <a class="nav-link ml-3 my-1" href="#item-1-1">Pendidikan</a>
      <a class="nav-link ml-3 my-1" href="#item-1-2">Pelaksanaan Pendidikan</a>
      </nav> -->
        </li>
        <li class="nav-item">
          <a class="nav-link bg-white p-1 mt-3 mx-3 rounded text-center" href="#"><?php echo(session('username')); ?> </a>
        </li> 
      </ul>
    </div>