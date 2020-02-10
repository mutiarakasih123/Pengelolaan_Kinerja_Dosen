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
              <div class='container mt-3 mb-2'>
                <a href='/list-spotfoto' class='btn btn-primary btn-sm ml-3'>Daftar Spotfoto</a>
              </div>
            <div class="container d-flex">
              <div class="col">
                <div id="map" class="shadow" style="width: 500px; height: 300px;"></div>
              </div>
              <div class="col"> 
                <div class="p-3 shadow-sm">
                <h6>Tambah Spot Foto</h6>
                <hr />
                <?php   
                  if(isset($messageError)){
                      echo "<div class='alert alert-danger p-1 m-2'>", $messageError ,"</div>";   
                  }
                  if(isset($messageSuccess)){
                    echo "<div class='alert alert-primary p-1 m-2'>", $messageSuccess ,"</div>";   
                  }?>

                <form action="insert-spotfoto" method="post">
                @csrf
                  <div class="d-flex mt-2">
                    <input class="form-control col" type="text" name="latitude" placeholder="Latitude"  required/>&nbsp;
                    <input class="form-control col" type="text" name="longtitude" placeholder="Longtitude" required/>
                  </div>
                  <input class="form-control mt-2" type="text" name="nama_tempat" placeholder="Nama Tempat" required/>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Dari waktu </div>
                    :&nbsp;<input class="form-control mt-2"  type="datetime-local" name="dari_waktu" placeholder="Dari Waktu" required/>
                  </div>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Sampai waktu </div>
                    :&nbsp;<input class="form-control mt-2"  type="datetime-local" name="sampai_waktu" placeholder="Sampai Waktu" required/>
                  </div>
                  <input class="form-control mt-2" type="number" name="harga" placeholder="Harga" required/>
                  <select class="form-control mt-2" name="driverId">
                  <?php
                    for($i = 0;$i < count($drivers); $i++){
                      echo('<option value="'. $drivers[$i]->id .'" >'. $drivers[$i]->name .' | '. $drivers[$i]->email .'</option>');
                    }
                  ?>
                  </select>
                  <textarea class="form-control mt-2" name="deskripsi" placeholder="Deskripsi" rows="3" required></textarea>
                
                  <input type="submit" value="Simpan" class="btn btn-primary mt-2 ml-auto d-block" style="width: 100px;" />
                </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>