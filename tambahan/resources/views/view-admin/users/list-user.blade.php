
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
            <h6 class="mt-4 mb-2">Daftar User</h6>
            <br />
            <table class="table shadow">
                <thead>
                    <tr>
                        <td>No.</td><td>Nama</td><td>Email</td><td>Tanggal lahir</td><td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($users); $i++){
                            $no = $i + 1;
                            
                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $users[$i]->name .'</td>
                                <td>'. $users[$i]->email .'</td>
                                <td>'. $users[$i]->date_birth .'</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/user/'. $users[$i]->id .'">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/user-delete/'. $users[$i]->id .'">Delete</a>
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