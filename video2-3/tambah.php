<?php
require "function.php";

// cedk apakah tombol tambah sudah di tekan atau belum
if (isset($_POST['tambah'])) {
    // jika fungsi ini menghasilkan nilai > 0, artinay ada perubahan
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'latihan3.php';
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
    <title>Tambah data mahasiswa</title>
</head>

<body>
    <h3>Form tambah data mahasiswa</h3>
    <form action="" method="post">
        <ul>
            <li>
                <label>
                    NIM :
                    <input type="text" name="nim" autofocus required>
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
                    Email :
                    <input type="text" name="email" required>
                </label>
            </li>
            <li>
                <label>
                    Prodi :
                    <input type="text" name="prodi" required>
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="text" name="gambar">
                </label>
            </li>
            <li>
                <button type="submit" name="tambah">Tambah</button>
            </li>
        </ul>
    </form>
</body>

</html>