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
            <h6 class="mt-4 mb-2">Daftar Spot Foto</h6>
            <br />
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tempat</th>
                        <th width="100">Lat Lang</th>
                        <th>Dari Waktu</th>
                        <th>Sampai Waktu</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th width='130'>Edit</th>
                        <th>&nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($spots_foto); $i++){
                            $no = $i + 1;
                            if(strlen($spots_foto[$i]->deskripsi) > 41){
                                $spots_foto[$i]->deskripsi = substr($spots_foto[$i]->deskripsi, 0, 41) .'...';
                            }
                            
                            if(strlen($spots_foto[$i]->nama_tempat) > 30){
                                $spots_foto[$i]->nama_tempat = substr($spots_foto[$i]->nama_tempat, 0, 41) .'...';
                            }

                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $spots_foto[$i]->nama_tempat .'</td>
                                <td>['. $spots_foto[$i]->latitude .', '. $spots_foto[$i]->longtitude .']</td>
                                <td>'. $spots_foto[$i]->dari_waktu .'</td>
                                <td>'. $spots_foto[$i]->sampai_waktu .'</td>
                                <td>'. $spots_foto[$i]->harga .'</td>
                                <td>'. $spots_foto[$i]->deskripsi .'</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/update-spot-foto/'. $spots_foto[$i]->id .'">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/delete-spot-foto/'. $spots_foto[$i]->id .'">Delete</a>
                                </td>
                                <td><a class="btn btn-sm btn-primary" href="/galery-spot-foto/'. $spots_foto[$i]->id .'">Galery</a></td>
                            </tr>');
                        }
                    ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>