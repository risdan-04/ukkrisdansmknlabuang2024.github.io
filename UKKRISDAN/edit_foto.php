<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Foto</title>
    <link rel="stylesheet" href="foto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<style>
    body{
        background-color: aquamarine;
    }
    td{
    width: 200px;
    height: 30px;
}
</style>

    <nav class="navbar navbar-expand-lg" style="background-color:aqua;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Galerry</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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
<p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>
<center>
    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
    <table>
        <tr>
            <td>Judul</td>
            <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td> 
        </tr>
        <tr>
            <td>Lokasi File</td>
            <td><input type="file" name="lokasifile"></td> 
        </tr>
        <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                        <?php
                            $userid = $_SESSION['userid'];
                            $sql2 = mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data2 = mysqli_fetch_array($sql2)) {
                        ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';
                            }?>><?=$data2['namaalbum']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Ubah"></td>
        </tr>
    </table>
    <?php
            }
    ?>
    </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    

</body>
</html>