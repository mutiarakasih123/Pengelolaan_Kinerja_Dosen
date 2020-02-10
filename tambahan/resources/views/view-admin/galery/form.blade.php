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
            <form action="/upload-spotfoto" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  name="id" value="<?php echo($id); ?>" />
             <div class="container mt-3">
              <h5>Upload foto</h5>
              <hr />
              <label class="p-3 rounded text-center" style="border: 3px dotted #ccc; width: 300px; cursor: pointer;">
                <input class="invisible" type="file" name="image" style="position: absolute;"/>
                <h6>Browse</h6>
                </label>
                <br />

                <?php   
                  if(isset($messageError)){
                      echo "<div class='alert alert-danger p-1 m-2'>", $messageError ,"</div>";   
                  }
                  if(isset($messageSuccess)){
                    echo "<div class='alert alert-primary p-1 m-2'>", $messageSuccess ,"</div>";   
                  }?>
                  <div class="d-flex justify-content-between align-items-center" style="width: 300px"> 
                <a class="btn btn-sm ml-2" href="/list-spotfoto">Kembali</a>&nbsp;
                <input class="btn btn-primary btn-sm" type="submit" value="Upload foto" /> 
                </div>
             </div>
             </form>
             <div class="container shadow-sm mt-3 mx-2 p-3">
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
           
                <div class="carousel-inner">
                <?php 
                  for($i = 0; $i < count($images); $i++){
                    if($i == 0){
                      echo('
                      <div class="carousel-item active">
                        <img class="d-block w-100" height="300" src="'. $images[$i]->path .'" >
                        <div class="carousel-caption d-none d-md-block" style="background: #00000087;">
                          <h5>'.$images[$i]->nama.'</h5>
                          <a href="/delete-image/'.$images[$i]->id.'" class="btn btn-sm btn-danger">Hapus</a>
                        </div>
                      </div>');
                    }else{
                      echo('
                      <div class="carousel-item">
                        <img class="d-block w-100" height="300" src="'. $images[$i]->path .'" >
                        <div class="carousel-caption d-none d-md-block" style="background: #00000087;">
                          <h5>'.$images[$i]->nama.'</h5>
                          <a href="/delete-image/'.$images[$i]->id.'" class="btn btn-sm btn-danger">Hapus</a>
                        </div>
                      </div>');
                    }
                    
                  }
                ?>
                  
                 
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>