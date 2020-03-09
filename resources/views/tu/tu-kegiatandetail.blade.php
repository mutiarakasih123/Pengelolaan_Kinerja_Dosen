
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
            <table class="table shadow" >
                <thead>
                 <tr>
                <th>Nama Dosen Pengajar</th>
                <th>Sks Teori</th>
                <th>Sks Praktek</th>
                <th>Total</th>
                                          
                </tr>
                </thead>
              <tbody>
              <?php
                        for($i = 0; $i < count($kegiatanDetail); $i++){
                            $no = $i + 1;

                            echo('<tr> 
                             <td>'. $kegiatanDetail[$i]->namadosen_pengajar .'</td>
                            <td>'. $kegiatanDetail[$i]->sks_teori .'</td>
                            <td>'. $kegiatanDetail[$i]->sks_praktek .'</td>
                            <td>'. $kegiatanDetail[$i]->total .'</td>
                  
                                                   
                          </tr>');
                        }


                ?>
              <!-- <tr>
                   <td>Teknik Informatika</td>
                  <td>Melaksanakan perkuliahan/tutorial dan membimbing</td>
                  <td>Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta</td>
                  <td>Teknik Informatika</td>
                  <td>2019/2020</td>
                  <td>Genap</td>
                  <td>03-15-2020</td>
                  <td>03-30-2020</td>
                  <td>File</td>
              </tr> 

              <tr style="border-bottom: 5px solid;">
                <td>Tj001</td>
                <td>Budaya</td>
                <td>3</td>
                <td>Malam</td>
                <td>2</td>
                <td>1</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                
                </tr>

                <tr>
                   <td>Teknik Informatika</td>
                  <td>Melaksanakan perkuliahan/tutorial dan membimbing</td>
                  <td>Melaksanakan perkulihan/ tutorial dan membimbing, menguji serta</td>
                  <td>Teknik Informatika</td>
                  <td>2019/2020</td>
                  <td>Genap</td>
                  <td>03-15-2020</td>
                  <td>03-30-2020</td>
                  <td>File</td>
              </tr>  -->

              <!-- <tr style="border-bottom: 5px solid;">
                <td>Tj001</td>
                <td>Budaya</td>
                <td>3</td>
                <td>Malam</td>
                <td>2</td>
                <td>1</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                               
                </tr>

              
             
             -->
              </tbody>

                
                   </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function goToDetail (id){
  window.location.href = "/kegiatan/"+id;
}
</script>
</body>
</html>