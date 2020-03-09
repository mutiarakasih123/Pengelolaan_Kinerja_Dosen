
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
            <table class="table shadow" action="/forminput" method="POST" >
                <thead>
                    <tr>
                    <th>Jurusan</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Prodi</th>
                    <th>Tahun Ajaran </th>
                    <th>Semester</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>File</th>
                    
                    
                    </tr>
                <tr style="border-bottom: 5px solid;">
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Jumlah Sks</th>
                <th>Kelas</th>
                
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                
                </tr>
                </thead>
              <tbody>
              <?php
                        for($i = 0; $i < count($listKegiatan); $i++){
                            $no = $i + 1;

                            echo('<tr onclick = "goToDetail('.$listKegiatan[$i]->id_reportkegiatan.')"> 
                             <td>'. $listKegiatan[$i]->jurusan .'</td>
                            <td>'. $listKegiatan[$i]->subunsur .'</td>
                            <td>'. $listKegiatan[$i]->kegiatan .'</td>
                            <td>'. $listKegiatan[$i]->prodi .'</td>
                            <td>'. $listKegiatan[$i]->th_ajaran .'</td>
                            <td>'. $listKegiatan[$i]->semester .'</td>
                            <td>'. $listKegiatan[$i]->tgl_mulai .'</td>
                            <td>'. $listKegiatan[$i]->tgl_selesai .'</td>
                            <td>'. $listKegiatan[$i]->file .'</td>
                            

                          </tr>
                          <tr style="border-bottom: 5px solid;">
                            <td>'. $listKegiatan[$i]->kodemakul .'</td>
                            <td>'. $listKegiatan[$i]->namamakul .'</td>
                            <td>'. $listKegiatan[$i]->jumlah_sks .'</td>
                            <td>'. $listKegiatan[$i]->kelas .'</td>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            
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