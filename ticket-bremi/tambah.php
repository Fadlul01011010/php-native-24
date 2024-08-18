<?php
require "function.php";

// cedk apakah tombol tambah sudah di tekan atau belum
if (isset($_POST['tambah'])) {

    // var_dump($_POST);
    // die;
    // jika fungsi ini menghasilkan nilai > 0, artinay ada perubahan
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo " Data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data pembeli</title>

</head>

<body>
    <h3>Form tambah data pembeli</h3>
    <form action="" method="post">
        <ul>
            <li>
                <label>
                    NIK :
                    <input type="text" name="nik" autofocus required>
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