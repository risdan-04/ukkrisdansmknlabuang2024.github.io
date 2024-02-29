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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="foto.css">
<body>

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
<p>Selamat Datang <b><?= $_SESSION['namalengkap'] ?></b></p> 

<center>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table class="tablee">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
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
                            include "koneksi.php";
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data = mysqli_fetch_array($sql)) {
                        ?>
                            <option value="<?= $data['albumid'] ?>"><?= $data['namaalbum'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table class="table-bordered" border="1" cellpadding="15" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?= $data['fotoid'] ?></td>
            <td><?= $data['judulfoto'] ?></td>
            <td><?= $data['deskripsifoto'] ?></td>
            <td><?= $data['tanggalunggah'] ?></td>
            <td>
                <img src="gambar/<?= $data['lokasifile'] ?>" width="200px">
            </td>
            <td><?= $data['namaalbum'] ?></td>
            <td>
                <a href="hapus_foto.php?fotoid=<?= $data['fotoid'] ?>">Hapus</a>
                <a href="edit_foto.php?fotoid=<?= $data['fotoid'] ?>">Edit</a>
            </td>
        </tr>


        <?php
            }
        ?>
    </table>
    </center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>