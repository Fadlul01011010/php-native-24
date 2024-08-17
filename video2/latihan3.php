<?php
require "function.php";
$mahasiswa = query("SELECT * FROM t_mhs");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
</head>

<body>
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="img/<?= $m['gambar']; ?>" alt="foto mahasiswa" width="50"></td>
                <td><?= $m['nama']; ?></td>
                <td>
                    <a href="detail.php?id=<?= $m['id']; ?>">Lihat detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>