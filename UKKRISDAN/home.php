<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<style>
    nav a{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    form{
        padding-left:20px;
    }
    a{
        margin-right:50px;
        font-weight: bold;
        font-size: 18px;
    }
    h3{
        margin-top: 50px;
    }
    input{
        width:60%;
    }

</style>

<nav class="navbar navbar-expand-lg" style="background-color:aqua;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php" style="font-size: 30px; margin-left: 20px;">Galerry</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="margin-left: 55px;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="foto.php">Foto</a>
        </li>
       
      </ul>
      <form class="d-flex">
      <a class="btn btn-success" type="submit" href="login.php">Login</a>
      <a class="btn btn-danger" type="submit" href="logout.php" >Log Out</a>
      </form>
    </div>
  </div>
</nav>

<center>
<h3>Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></h3>
<form>
<input type="text" placeholder="search">
<button class="btn btn-warning" type="submit">Search</button>
</form>
</center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>