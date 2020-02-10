<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Swafoto :: Daftar</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet">
        <link href="/assets/css/style.css" rel="stylesheet">
        <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="container-fluid h-100">
  <div class="row h-100">
  @include('view-driver.navbar')
    <div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
          <button class="btn sticky-top" data-toggle="collapse" href="#collapseExample" role="bu tton">
            Menu
          </button>   
          <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
        <div class="col-12 content">
            <h6 class="mt-4 mb-2">Profil</h6>
            <br />
            <form action="/driver" method="POST">
            @csrf
              <input type="hidden"  name="id" value="<?php echo($driver->id); ?>" />
              <input type="text" name="name" class="form-control mb-2" value="<?php echo($driver->name); ?>" placeholder="Nama" />
              <input type="email" name="email" class="form-control mb-2" value="<?php echo($driver->email); ?>" placeholder="Email" />
              <input type="date" name="date_birth" class="form-control mb-2" value="<?php echo($driver->date_birth); ?>" placeholder="Tanggal lahir" />
              <div class="d-flex align-items-center justify-content-between">
                  <a href="/drivers" class="btn btn-default" style="width: 100px">Kembali</a>
                  <input type="submit" value="Simpan" class="btn btn-primary mt-2" style="width: 100px;" />
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>