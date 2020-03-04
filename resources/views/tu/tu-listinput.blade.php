
  @include('tu.tu-navbar')
    <div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a class="float-left bg-blue href="#"><?php echo(session('email')); ?> </a>
        <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
    <nav class="navbar navbar-right bg-right">
    <div class="col-12 shadow py-2">
    <form class="form-inline">
        <input class="form-control mr-sm-8" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </nav>
        <div class="col-12 content">
            <center> <h6 class="mt-4 mb-2">Data Kegiatan Dosen</h6> </center>
            <br />
            <table class="table shadow" action="/listinput" method="POST" >
                <thead>
                    <tr>
                    <td>No.</td><td>Jurusan</td><td>Sub Unsur</td><td>Kegiatan</td><td>Prodi</td>
                        <td>Pengajar Teori</td><td>Pengajar Praktek</td><td>File</td><td></td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        for($i = 0; $i < count($input); $i++){
                            $no = $i + 1;
                            
                            echo('<tr>
                              <td>'. $no .'</td>
                              <td>'. $input[$i]->jurusan.'</td>
                              <td>'. $input[$i]->subunsur .'</td>
                              <td>'. $input[$i]->kegiatan .'</td>
                              <td>'. $input[$i]->prodi .'</td>
                              <td>'. $input[$i]->namadosenpengajar_teori .'</td>
                              <td>'. $input[$i]->namadosenpengajar_praktek .'</td>
                            <td>'. $input[$i]->file .'</td>
                                                
                              <td>
                                  <a class="btn btn-sm btn-primary" href="/user/'. $forminput[$i]->id_user .'">Detail</a>
                                 
                              </td>
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