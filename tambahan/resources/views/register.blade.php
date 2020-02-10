<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Swafoto :: Daftar</title>
        <link href="/assets/css/bootstrap4.4.min.css" rel="stylesheet">
    </head>
<body style="background: #efefef;">

<form action="/daftar" method="post" class="card shadow form-login" >
@csrf
        <h3>Daftar</h3>
        <hr />
        <label for="name"><b>Nama</b>
        <input required type="text"     name="name"             placeholder="masukan nama"          class="form-control mt-2" /></label>
        <label for="email"><b>Email</b>
        <input required type="email"    name="email"            placeholder="masukan email"         class="form-control mt-2" /></label>
        <label for="date_birth"><b>Tanggal Lahir</b>
        <input required type="date"     name="date_birth"       placeholder="masukan tanggal lahir" class="form-control mt-2" /></label>
        <label for="password"><b>Pasword</b>
        <input required type="password" name="password"         placeholder="masukan password"      class="form-control mt-2" /></label>
        <label for="password"><b>Ulangi Password</b>
        <input required type="password" name="confirm_password" placeholder="ulangi password"       class="form-control mt-2" /></label>
        <?php 
        if(isset($message)){
            echo "<div class='alert alert-danger p-1 m-2'>", $message ,"</div>";   
        }?>
        <div class="d-flex align-items-center justify-content-between mt-2">
            <a href="/login" class="btn btn-default" style="width: 100px">Batal</a>
            <input type="submit" value="Simpan" class="btn btn-primary mt-2" style="width: 100px;" />
        </div>
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