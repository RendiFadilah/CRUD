<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
    

require 'functions.php';

// ambil data di URL

$id = $_GET["id"];

//query data mahasiswa berdasarkan idnya
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


    //cek apakah tombol submit udah ditekan atau belum?
if( isset($_POST["submit"]) ){
       
    //cek apakah data berhasil diubah atau tidak
       if( ubah($_POST) > 0){
           //pakai alert javascript
           echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
           ";
       } else{
           echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
           ";
       }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="nrp">NRP</label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>i