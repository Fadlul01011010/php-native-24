<?php
require "function.php";

// cek jika tidak ada id yang dikirim
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mhs berdasarkan id
$t = query("SELECT * FROM t_tiket WHERE id=$id");

// cek apakah id nya ada
if (!$t) {
    header("Location: index.php");
    exit;
}


// cedk apakah tombol tambah sudah di tekan atau belum
if (isset($_POST['ubah'])) {
    // jika fungsi ini menghasilkan nilai > 0, artinay ada perubahan
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo " Data gagal diubah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ubah data mahasiswa</title>
</head>

<body>
    <h3>Form Ubah data pembeli</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $t['id']; ?>">
        <ul>
            <li>
                <label>
                    NIK :
                    <input type="text" name="nik" value="<?= $t['nik']; ?>" autofocus required>
                </label>
            </li>
            <li>
                <label>
                    Nama :
                    <input type="text" name="nama" required>
                </label>
            </li>
            <li>
                <label>
                    No Hp :
                    <input type="number" name="nohp" required minlength="12">
                </label>
            </li>
            <li>
                <label>
                    Jenis Kelamin :
                    <input type="radio" name="jeniskelamin" value="Laki-Laki" checked>Laki-Laki
                    <input type="radio" name="jeniskelamin" value="Perempuan">Perempuan
                </label>
            </li>
            <li>
                <label>
                    Tanggal :
                    <input type="date" name="tanggal" required>
                </label>
            </li>
            <li>
                <label>
                    Jumlah pengunjung :
                    <input type="number" name="jumlahorang" class="jumlah-pengunjung" required>
                </label>
            </li>
            <li>
                <label>
                    Harga Tiket :
                    <p style="display: inline;">Rp. 10,000</p>
                </label>
            </li>
            <li>
                <label>
                    Total Bayar :
                    <div class="total-bayar" style="display: inline;"></div>
                </label>
            </li>
            <li>
                <button type="submit" name="tambah">Beli Sekarang </button>
            </li>
        </ul>
    </form>
    <script src="js/script.js"></script>
</body>

</html>