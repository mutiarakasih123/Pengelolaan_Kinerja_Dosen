<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Swafoto :: Pesanan</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
        <link href="/assets/css/style.css" rel="stylesheet"/>
        <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/leaflet.js"></script>
        <style>
        body {
            height: auto;
            background: #efefef;
        }
        .theme{
            background: #ffb5b5 !important;
            color: #fff;
        }
        </style>
    </head>
<body class="bg-grey">
    <div class="container">
        @include('navbar')
        <div class="row d-flex">
        <div class="col-auto  mb-3 p-3 ">
            <div id="map"  class="shadow-sm bg-white" style="width: 500px; height: 300px;"></div> 
        </div>
        <div class="col shadow-sm p-3 bg-white">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Detail Spot Foto</h6>
                    <form action="/simpan-pesanan-spotfoto" method="POST">
                    @csrf
                    <?php 
                    if(session("accessId") == "User")
                    echo('<input type="submit" class="btn btn-sm btn-primary" value="Pesan" />'); 
                    ?>
                    <input name="id" type="hidden" value="<?php echo($spot_foto->id); ?>" />
                </div>
                <hr />
                  <input class="form-control mt-2" type="text" disabled value="<?php echo($spot_foto->nama_tempat); ?>" name="nama_tempat" placeholder="Nama Tempat" required/>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Dari waktu </div>
                    :&nbsp;<input class="form-control mt-2" disabled value="<?php echo($spot_foto->dari_waktu->format('Y-m-d\TH:i:s')); ?>" type="datetime-local" name="dari_waktu" placeholder="Dari Waktu" required/>
                  </div>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Sampai waktu </div>
                    :&nbsp;<input class="form-control mt-2" disabled value="<?php echo($spot_foto->sampai_waktu->format('Y-m-d\TH:i:s')); ?>" type="datetime-local" name="sampai_waktu" placeholder="Sampai Waktu"  required/>
                  </div>
                  <div class="d-flex align-items-center">
                    <div style="width: 160px">Harga </div>
                    :&nbsp;<input class="form-control mt-2" value="<?php echo($spot_foto->harga); ?>" disabled type="number" name="harga" placeholder="Harga" required/>
                </div>
                <div class="d-flex align-items-center">
                    <div style="width: 160px">Driver </div>
                    :&nbsp;
                    <select class="form-control mt-2" name="driverId" disabled>
                        <?php echo('<option>'.$spot_foto->driver.'</option>'); ?>
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <div style="width: 160px">Lokasi Jemput </div>
                    :&nbsp;<input class="form-control mt-2" value="<?php echo($spot_foto->lokasi_jemput); ?>"  type="text" name="lokasi_jemput" placeholder="Lokasi Jemput" required/>
                </div>
                <div class="d-flex align-items-center">
                    <div style="width: 160px">Deskripsi </div>
                    :&nbsp;<textarea class="form-control mt-2" disabled name="deskripsi" placeholder="Deskripsi" rows="3" required><?php echo($spot_foto->deskripsi); ?></textarea>
                </div>
            </form>
        </div>
        <div class="container shadow-sm my-3 mx-2 p-3 bg-white">
        <h6>Gallery</h6>
        <hr />
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
           
                <div class="carousel-inner">
                <?php 
                  for($i = 0; $i < count($images); $i++){
                    if($i == 0){
                      echo('<div class="carousel-item active">');
                    }else{
                      echo('<div class="carousel-item">');
                    }
                    echo('<img class="d-block w-100" height="300" src="'. $images[$i]->path .'" >
                        <div class="carousel-caption d-none d-md-block" style="background: #00000087;">
                          <h5>'.$images[$i]->nama.'</h5>
                        </div>
                      </div>');
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
    <script>
setTimeout(()=> {
    <?php
        $image_path = count($images) > 0 ? $images[0]->path : '/images/no-thumb.png';
        echo("let marker = [ ".$spot_foto->latitude.",".$spot_foto->longtitude."];
            let spot = '<div><h6>".$spot_foto->nama_tempat."</h6><img src=\"".$image_path."\" width=\"150\" height=\"150\" /></div>';
             let map = L.map('map').setView(marker, 11);");
    ?>
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    L.marker(marker).addTo(map)
        .bindPopup(spot)
        .openPopup();

        let onMapClick = ({latlng}) => {
            document.querySelector("input[name='latitude']").value = latlng.lat;
            document.querySelector("input[name='longtitude']").value = latlng.lng;
        }
        
        map.on('click', onMapClick);
},1200);



    </script>
</body>
</html>