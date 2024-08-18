<?php
require '../function.php';
$tiket = cari($_GET['keyword']);
?>
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