
  @include('tu.tu-navbar')
    <div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a class="float-left bg-blue href="#"><?php echo(session('email')); ?> </a>
        <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
        <div class="col-12 content">
            <center> <h6 class="mt-4 mb-2">Data Kegiatan Dosen</h6> </center>
            <br />
            <table class="table shadow" action="/tu.tu-listinput" method="POST" >
                <thead>
                    <tr>
                    <td>No.</td><td>Jurusan</td><td>Sub Unsur</td><td>Kegiatan</td><td>Prodi</td>
                        <td>Tahun Ajaran </td><td>Semester</td><td>Tanggal Mulai</td>
                        <td>Tanggal Selesai</td><td>Kode Mata Kuliah</td><td>Nama Mata Kuliah</td>
                        <td>sks Teori</td><td>sks Praktek</td><td>Pengajar Teori</td><td>Pengajar Praktek</td>
                        <td>File</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($users); $i++){
                            $no = $i + 1;
                            
                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $users[$i]->jurusan.'</td>
                                <td>'. $users[$i]->subunsur .'</td>
                                <td>'. $users[$i]->kegiatan .'</td>
                                <td>'. $users[$i]->prodi .'</td>
                                <td>'. $users[$i]->semester .'</td>
                                <td>'. $users[$i]->tgl_mulai .'</td>
                                <td>'. $users[$i]->tgl_selesai .'</td>
                                <td>'. $users[$i]->kodemakul .'</td>
                                <td>'. $users[$i]->namamakul .'</td>
                                <td>'. $users[$i]->sks_praktek .'</td>
                                <td>'. $users[$i]->sesi_praktek .'</td>
                                <td>'. $users[$i]->namadosenpengajar_teori .'</td>
                                <td>'. $users[$i]->namadosenpengajar_praktek .'</td>
                                <td>'. $users[$i]->file .'</td>
                                                
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/user/'. $users[$i]->id_user .'">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/user-delete/'. $users[$i]->id_user .'">Delete</a>
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