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
    <title>Halaman Album</title>
    <link rel="stylesheet" href="album.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<style>
    body{
        background-color: aquamarine;
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

<p>Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p>
<center>
    
    <form action="tambah_album.php" method="post">
    <table class="tablee">
    <tr>
        <td>Nama Album</td>
        <td><input type="text" name="namaalbum"></td>
    </tr>

    <tr>
        <td>Deskripsi</td>
        <td><input type="text" name="deskripsi"></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" value="Tambah"></td>
    </tr>
    </table>

    <table class="table-bordered" border="1" cellpadding="15" cellspacing="0">
        <br>
        <tr>
        <th>ID</th>
        <th>Nama Album</th>
        <th>Deskripsi</th>
        <th>Tanggal Dibuat</th>
        <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";


        $userid=$_SESSION['userid'];
        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
        while($data=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?=$data['albumid']?></td>
                <td><?=$data['namaalbum']?></td>
                <td><?=$data['deskripsi']?></td>
                <td><?=$data['tanggaldibuat']?></td>

                <td>
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                    <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
    </form>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    


</body>
</html>