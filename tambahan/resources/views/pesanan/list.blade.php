<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Swafoto :: Pesanan</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet"/>
        <link href="/assets/css/style.css" rel="stylesheet"/>
        <script src="/assets/js/jquery-3.4.1.slim.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <style>
        body {
            height: auto;
            background: #efefef;
        }
        .theme{
            background: #ffb5b5 !important;
            color: #fff;
        }
        .link{
          color: blue;
        }
        </style>
    </head>
<body class="bg-grey">
    <div class="container">
        @include('navbar')
        <div class="row">
          <div class="col">
        <h6 class="mt-4 mb-2">Daftar Spot Foto</h6>
            <br />
            <table class="table shadow ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Tempat</th>
                        <th>Dari Waktu</th>
                        <th>Sampai Waktu</th>
                        <th class="text-right">Harga (Rp)</th>
                        <th colspan="2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $no = 1;
                            $sum_harga = 0;
                            for($i = 0; $i < count($orders); $i++){
    
                              $sum_harga = $sum_harga + $orders[$i]->harga;
                              $date_start = new DateTime($orders[$i]->dari_waktu);
                              $date_end = new DateTime($orders[$i]->sampai_waktu);
                              $datenow = new DateTime("now");
                              $interval = $date_start->diff($datenow);
    
                              $done =  '';
                              if($orders[$i]->done == 0 && $date_start > $datenow){
                                $done =  '<span class="badge badge-info">Menunggu '.$interval->days.' hari '.$interval->format("%h").' jam</span>';
                              }else if($datenow > $date_end){
                                $done = '<span class="badge badge-info">Telah lewat</span>';
                              }else if($datenow >= $date_start && $datenow <= $date_end && $orders[$i]->done == 0){
                                $done =  '<span class="badge badge-primary">Sedang berlangsung</span>';
                              }else if($orders[$i]->done == 1){
                                $done =  '<span class="badge badge-primary">Selesai</span>';
                              }

                          $btnEdit = ($interval->days <= 3) ? '&nbsp;' : '<a class="btn btn-sm btn-danger" href="/batal-pesanan/'. $orders[$i]->id .'">Batal</a>';
                          $linkSpot = '<a class="btn btn-sm link" href="/pesan-spotfoto/'.$orders[$i]->spotFotoId.'">'. $orders[$i]->nama_tempat .'</a>';

                            echo('<tr>
                                <td>'. $no .'</td>
                                <td>'. $linkSpot .'</td>
                                <td>'. $date_start->format('Y-M-d H:i:s') .'</td>
                                <td>'. $date_end->format('Y-M-d H:i:s') .'</td>
                                <td class="text-right">'. $orders[$i]->harga .'</td>
                                <td>'. $done .'</td>
                                <td>'. $btnEdit .'</td>
                            </tr>');

                            $no++;
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                          <td class="text-right">Rp. <?php echo($sum_harga); ?></td>
                        </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
   
</body>
</html>