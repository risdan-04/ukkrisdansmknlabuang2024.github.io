<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    
    <link rel="stylesheet" href="register.css">
</head>
<body>



    <center>
<form action="proses_register.php" method="post">
<table>
    <h2>REGISTER</h2>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" placeholder="Nama"></td>
    </tr>
    
    <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
    </tr>
    
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" placeholder="User@gmail.com"></td>
    </tr>
    
    <tr>
        <td>NamaLengkap</td>
        <td><input type="text" name="namalengkap" placeholder="Nama Lengkap"></td>
    </tr>
    
    <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat" placeholder="Alamat"></td>
    </tr>
    
    <tr>
        <td></td>
        <td><input type="submit" name="Regist"></td>
    </tr>
    </table>
</form>
</center>

</body>
</html>