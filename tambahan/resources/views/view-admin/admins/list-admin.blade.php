
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
            <h6 class="mt-4 mb-2">Daftar Admin</h6>
            <br />
            <table class="table shadow">
                <thead>
                    <tr>
                        <td>No.</td><td>Nama</td><td>Email</td><td>Tanggal lahir</td>
                        <!-- <td>Edit</td> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < count($admins); $i++){
                            $no = $i + 1;
                            
                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $admins[$i]->name .'</td>
                                <td>'. $admins[$i]->email .'</td>
                                <td>'. $admins[$i]->date_birth .'</td>
                                
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