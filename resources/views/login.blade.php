<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("/images/politeknik.jpg");

  min-height: 670px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  opacity: 0.9;
  filter: alpha(opacity=50);
  border-radius: 15px;
  border: 1px;
  position: absolute;
  right: 20;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: White;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #00008c;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>

<body>
<div class="bg-img">

  <form action="login" method="POST" class="container">
  @csrf
   <center> <h1>Login</h1> </center>

    <label for="email"><b>Email</b>
    <input type="text" placeholder="Enter Email" name="email" required></label>

    <label for="password"><b>Password</b>
    <input type="password" placeholder="Enter Password" name="password" required></label>
    <button type="submit" class="btn">Login</button>
      <?php
      if(isset($message)){
      echo "<div class='alert alert-danger p-1 m-2'>",  $message , "</div>";
      }?>

    
    <br></br>
    <a href="/register-dosen" class="mt-2">Buat Akun</a>
    <p>Copyright &copy; Mutiara</p>

  </div>
  </form>

</body>

</html>
