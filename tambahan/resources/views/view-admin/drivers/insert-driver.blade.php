
  @include('view-admin.navbar')
    <div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
          <button class="btn sticky-top" data-toggle="collapse" href="#collapseExample" role="bu tton">
            Menu
          </button>   
          <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
        <div class="col-12 content">
            <h6 class="mt-4 mb-2">Tambah Driver</h6>
            <br />
            <form action="/tambah-driver" method="POST">
            @csrf
              <input type="text" name="name" class="form-control mb-2"  placeholder="Nama" />
              <input type="email" name="email" class="form-control mb-2"  placeholder="Email" />
              <input type="date" name="date_birth" class="form-control mb-2"  placeholder="Tanggal lahir" />
              <input type="password" name="password"         placeholder="masukan password"      class="form-control mb-2" />
              <input type="password" name="confirm_password" placeholder="ulangi password"       class="form-control mb-2" />
              <?php 
              if(isset($message)){
                  echo "<div class='alert alert-danger p-1 m-2'>", $message ,"</div>";   
              }?>
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