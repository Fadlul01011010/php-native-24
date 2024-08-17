<?php
require "function.php";

// tanggap id dari url
$id = $_GET['id'];

$m = query("SELECT * FROM t_mhs WHERE id=$id");

// cek jika id tidak ada
if (!$m) {
    // header("Location: index.php");
    // exit;
    echo "<script>
        alert('Id yang anda cari tidak adaa');
        document.location.href = 'index.php';
    </script>";
}

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
        <li><a href="ubah.php?id=<?= $m['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a></li>
        <li><a href="index.php">kembali</a></li>
    </ul>
</body>

</html>