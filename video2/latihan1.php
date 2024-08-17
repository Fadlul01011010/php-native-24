<?php
// koneksikan ke database
$conn = mysqli_connect('localhost', 'root', '', 'db_latihan_php_native_24');

// ambil data nya
$result = mysqli_query($conn, 'SELECT * FROM t_mhs');

// ubah ke array
// $row = mysqli_fetch_row($result); // numerix
// $row = mysqli_fetch_array($result); // menghasilkan Array numerik dan Assosiative
// while ($row = mysqli_fetch_assoc($result)) { // menghasilkan Array assosiative
//     echo $row['nama'];
// }

// looping dan simpan
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// simpan ke variabel mahasiswa
$mahasiswa = $rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>

<body>
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="img/<?= $m['gambar']; ?>" alt="foto mahasiswa" width="50"></td>
                <td><?= $m['nim']; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['email']; ?></td>
                <td><?= $m['prodi']; ?></td>
                <td>
                    <a href="">Detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>