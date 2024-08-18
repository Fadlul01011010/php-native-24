<?php
require 'function.php';

$tiket = query("SELECT * FROM t_tiket");

// ketika tombol di klik
if (isset($_POST['cari'])) {
    $tiket = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembeli</title>
</head>

<body>
    <h3>Daftar pembeli ticket</h3>
    <a href="tambah.php">Tambah data</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autocomplete="off" autofocus placeholder="Cari berdasarkan nama" class="input-cari">
        <button type="submit" name="cari" class="tombol-cari">Carii</button>
    </form>
    <br><br>
    <div class="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Booking</th>
                    <th>Nama</th>
                    <th>No Hp</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tiket)): ?>
                    <tr>
                        <td colspan="7">
                            <p>Data Tidak ditemukan</p>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($tiket as $t) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $t['kodebooking']; ?></td>
                        <td><?= $t['nama']; ?></td>
                        <td><?= $t['nohp']; ?></td>
                        <td><?= $t['tanggal']; ?></td>
                        <td><?= ($t['status'] == 0) ? "Belum Bayar" : "Sudah Bayar";  ?></td>
                        <td><a href="detail.php?id=<?= $t['id']; ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="js/scriptcari.js"></script>
</body>

</html>