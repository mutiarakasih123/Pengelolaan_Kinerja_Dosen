<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Swafoto :: Daftar</title>
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
        </style>
    </head>
<body class="bg-grey">
    <div class="container">
        
        <div class="d-flex justify-content-center flex-wrap mb-4">
        @include('navbar')
        <?php

date_default_timezone_set("Asia/Jakarta");

        for($i = 0; $i < count($spotsfoto); $i++){
            $date_start = new DateTime($spotsfoto[$i]->dari_waktu);
            $date_end = new DateTime($spotsfoto[$i]->sampai_waktu);
            $spotsfoto[$i]->path = $spotsfoto[$i]->path == null ? '/images/no-thumb.png' : $spotsfoto[$i]->path;

            echo('<div class="p-3 mt-2 mx-2 bg-white shadow" style="width: 300px; height: 332px;">
                    <img src="'.$spotsfoto[$i]->path.'" width="250" height="200" class="d-block ml-auto mr-auto mt-2" />
                    <div class="mx-2 d-flex align-items-center justify-content-between">
                        <div>
                            <p style="margin-bottom: 0;"><b>'.$spotsfoto[$i]->nama_tempat.'</b><br/>
                            <small> Harga : Rp. '.$spotsfoto[$i]->harga.' </small> <br/> 
                            </p>
                          <small>  '. $date_start->format('d M Y H:i').' - '.$date_end->format('d M Y H:i').' </small> 
                        </div>
                        &nbsp;<a href="/pesan-spotfoto/'.$spotsfoto[$i]->id.'" class="btn theme btn-sm " >Detail</a>
                    </div>
                </div>');
        }
        ?>
        </div>
    </div>
</body>
</html>