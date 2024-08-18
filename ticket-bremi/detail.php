<?php
require "function.php";

// tanggap id dari url
$id = $_GET['id'];

$t = query("SELECT * FROM t_tiket WHERE id=$id");

// cek jika id tidak ada
// if (!$t) {
//     // header("Location: index.php");
//     // exit;
//     echo "<script>
//         alert('Kode Booking yang anda cari tidak ada');
//         document.location.href = 'index.php';
//     </script>";
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
</head>

<body>
    <h3>Detail Tiket Kode Booking : <?= $t['kodebooking']; ?></h3>

    <ul>
        <li>NIK : <?= $t['nik']; ?></li>
        <li>Nama : <?= $t['nama']; ?></li>
        <li>Jenis Kelamin : <?= $t['jeniskelamin']; ?></li>
        <li>No Hp : <?= $t['nohp']; ?></li>
        <li>Tanggal : <?= $t['tanggal']; ?></li>
        <li>Jumlah Orang : <?= $t['jumlahorang']; ?></li>
        <li>Total Bayar : <?= $t['totalbayar']; ?></li>
        <li>Status Booking : <?= ($t['status'] == 0) ? "Sudah Bayar" : "Belum Bayar"; ?></li>
        <li><a href="ubah.php?id=<?= $t['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $t['id']; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</a></li>
        <li><a href="index.php">kembali</a></li>
    </ul>
</body>

</html>