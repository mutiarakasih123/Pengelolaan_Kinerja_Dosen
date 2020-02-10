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
            <h2 class="mt-3 text-center">&nbsp;</h2>
            <div class="container d-flex">
              <div class="col">
                <div id="map" class="shadow" style="width: 500px; height: 300px;"></div>
              </div>
              <div class="col"> 
                <div class="p-3 shadow-sm">
                <h6>Update Spot Foto</h6>
                <hr />
                <?php   
                  if(isset($messageError)){
                      echo "<div class='alert alert-danger p-1 m-2'>", $messageError ,"</div>";   
                  }
                  if(isset($messageSuccess)){
                    echo "<div class='alert alert-primary p-1 m-2'>", $messageSuccess ,"</div>";   
                  }?>

                <form action="/update-spot-foto" method="post">
                @csrf
                <input type="hidden"  name="id" value="<?php echo($spot_foto->id); ?>" />
                  <div class="d-flex mt-2">
                    <input class="form-control col" value="<?php echo($spot_foto->latitude); ?>" type="text" name="latitude" placeholder="Latitude"  required/>&nbsp;
                    <input class="form-control col" value="<?php echo($spot_foto->longtitude); ?>" type="text" name="longtitude" placeholder="Longtitude" required/>
                  </div>
                  <input class="form-control mt-2" type="text" value="<?php echo($spot_foto->nama_tempat); ?>" name="nama_tempat" placeholder="Nama Tempat" required/>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Dari waktu </div>
                    :&nbsp;<input class="form-control mt-2" value="<?php echo($spot_foto->dari_waktu->format('Y-m-d\TH:i:s')); ?>" type="datetime-local" name="dari_waktu" placeholder="Dari Waktu" required/>
                  </div>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Sampai waktu </div>
                    :&nbsp;<input class="form-control mt-2" value="<?php echo($spot_foto->sampai_waktu->format('Y-m-d\TH:i:s')); ?>" type="datetime-local" name="sampai_waktu" placeholder="Sampai Waktu" required/>
                  </div>
                  <input class="form-control mt-2" value="<?php echo($spot_foto->harga); ?>" type="number" name="harga" placeholder="Harga" required/>
                  <select class="form-control mt-2" name="driverId">
                  <?php
                    for($i = 0;$i < count($drivers); $i++){
                      $selected = $spot_foto->driverId == $drivers[$i]->id ? 'selected' : '';
                      echo('<option value="'. $drivers[$i]->id .'" '.$selected.' >'. $drivers[$i]->name .' | '. $drivers[$i]->email .'</option>');
                    }
                  ?>
                  </select>
                  <textarea class="form-control mt-2" name="deskripsi" placeholder="Deskripsi" rows="3" required><?php echo($spot_foto->deskripsi); ?></textarea>
                  <div class="mt-2 d-flex justify-content-between align-items-center">
                    <a href="/list-spotfoto" class="btn">Kembali</a>
                    <input type="submit" value="Simpan" class="btn btn-primary " style="width: 100px;" />
                 </div>
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