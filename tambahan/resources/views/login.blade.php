<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Swafoto :: Daftar</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet">
    </head>
<body style="background: #efefef;">


<form action="/login" method="POST" class="card shadow form-login" >
@csrf
        <h4>Masuk ke aplikasi</h4>
        <hr />
        <label for="username"><b>Username</b>
        <input type="text"     placeholder="masukan email"    name="email"    class="form-control mt-2" /></label>
        <label for="password"><b>Password</b>
        <input type="password" placeholder="masukan password" name="password" class="form-control mt-2" /></label>
        <?php 
        if(isset($message)){
            echo "<div class='alert alert-danger p-1 m-2'>", $message ,"</div>";   
        }?>
        <a href="/daftar" class="mt-2">buat akun baru</a>
        <input type="submit" value="Masuk" class="btn btn-primary mt-2" style="width: 100px;"/>
    </div>
</form>
<style>
.form-login{
    width: 400px;
    padding: 20px;
    margin-top: 30px;
    margin-left: auto;
    margin-right: auto;
}
</style>
</body>
</html>