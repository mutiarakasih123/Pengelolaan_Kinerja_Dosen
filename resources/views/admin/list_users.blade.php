
  @include('admin.admin-navbar')
    <div class="col">
      <div class="row">
        <div class="col-12 shadow py-2">
        <a href="/admin.users-daftar" class="btn btn-sm btn-primary">Tambah Users</a>
        <a class="float-right mt-2" href="/keluar">Keluar</a>
        </div>
        <div class="col-12 content">
            <center> <h6 class="mt-4 mb-2">Daftar User</h6> </center>
            <br />
            <table class="table shadow">
                <thead>
                    <tr>
                    <td>No.</td><td>Nama</td><td>Email</td><td>NIP</td><td>Jabatan</td>
                        <td>Jurusan</td><td>Prodi</td><td>Tanggal Lahir</td><td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($users); $i++){
                            $no = $i + 1;
                            
                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $users[$i]->nama .'</td>
                                <td>'. $users[$i]->email .'</td>
                                <td>'. $users[$i]->nip .'</td>
                                <td>'. $users[$i]->jabatan .'</td>
                                <td>'. $users[$i]->jurusan .'</td>
                                <td>'. $users[$i]->prodi .'</td>
                                <td>'. $users[$i]->tgl_lahir .'</td>
                                
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