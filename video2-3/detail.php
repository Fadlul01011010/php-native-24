<?php
require "function.php";

// tanggap id dari url
$id = $_GET['id'];

$m = query("SELECT * FROM t_mhs WHERE id=$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>

<body>
    <h3>Detail Mahasiswa</h3>

    <ul>
        <li><img src="img/<?= $m['gambar']; ?>" alt="Foto Mahasiswa"></li>
        <li>NIM : <?= $m['nim']; ?></li>
        <li>Nama : <?= $m['nama']; ?></li>
        <li>Email : <?= $m['email']; ?></li>
        <li>Prodi : <?= $m['prodi']; ?></li>
        <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
        <li><a href="latihan3.php">kembali</a></li>
    </ul>
</body>

</html>