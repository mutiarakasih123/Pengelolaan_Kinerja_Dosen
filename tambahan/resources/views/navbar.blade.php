<nav class="navbar navbar-light bg-light shadow-sm my-3 " style="min-width: 85%;background: #ffb5b5 !important;">
            <a href="/" class="navbar-brand mb-0 h1 text-white">Spot Foto</a>
            <?php 
                    if(session("accessId") == "User"){
            echo('<a  class="nav-link mr-auto text-white"  href="/daftar-pesanan">Pesanan</a>');
} ?>
            <div>
                <a href="#" class="btn btn-primary btn-sm"><?php echo(session('username')); ?></a>
                <a href="/keluar" class="btn btn-danger btn-sm">Keluar</a>
            </div>
        </nav>