<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

body {
  /* background-color: #94bbe9; */
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #a39c9b;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 15px;
}

input[type=text], select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #00008c;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #00008c;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>

<body>
<div class="row">
  <div class="col-60">
      <div class="container">
  <form action="/admin.users-daftar" method="POST">
      @csrf
      
      <center><h3>Form User</h3></center>
        <div class="row">
        <div class="col-50">
            <label for="nama"><i class="fa fa-user"></i> Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Enter nama">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Enter email">
            <label for="nip"><i class="fa fa-address-card-o"></i> NIP</label>
            <input type="text" id="adr" name="nip" placeholder="Enter nip">
            <label for="jabatan"><i class="fa fa-user"></i> Jabatan</label>
            <select name="jabatan" class='form-control'>
              <option>Pilih Jabatan...</option>
              <option>Jabatan 2</option>
              <option>Jabatan 3</option>
              <option>TU Informatika</option>
            </select>

            <label for="jurusan"><i class="fa fa-user"></i> Jurusan</label>
            <select name="jurusan" class='form-control'>
              <option>Pilih Jurusan...</option>
              <option>Teknik Informatika</option>
              <option>Teknik Mesin</option>
            </select>
          </div>

          <div class="col-50">
            <label for="prodi"><i class="fa fa-user"></i> Prodi</label>
            <select name="prodi" class='form-control'>
              <option>Pilih Prodi...</option>
              <option>Teknik Informatika</option>
              <option>Teknik Geomatika</option>
              <option>Teknik Multimedia dan Jaringan</option>
              <option>Animasi</option>
            </select>
            
            <label for="tgl_lahir"><i class="fa fa-address-card-o"></i> Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" style="height:40px" id="city" placeholder="tgl_lahir">
            <br></br>
            <label for="password"><i class="fa fa-address-card-o"></i> Password</label>
            <input type="text" id="password" name="password" placeholder="Enter Password">
            <label for="expyear"><i class="fa fa-address-card-o"></i>Ulangi Password</label>
            <input type="text" id="password" name="ulangi_password" placeholder="Ulangi Password">
              </div>
          </div>
          
        </div>
            <input type="submit" value="Simpan" class="btn">
      </form>
      
    </div>
  </div>
</div>

</body>
</html>
