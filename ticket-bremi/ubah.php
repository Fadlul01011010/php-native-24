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
$m = query("SELECT * FROM t_mhs WHERE id=$id");

// cek apakah id nya ada
if (!$m) {
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
    <h3>Form Ubah data mahasiswa</h3>

    <a href="detail.php?id=<?= $m['id']; ?>"><button>Batal</button></a>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $m['id']; ?>">
        <ul>
            <li>
                <label>
                    NIM :
                    <input type="text" name="nim" autofocus required value="<?= $m['nim']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Nama :
                    <input type=" text" name="nama" required value="<?= $m['nama']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Email :
                    <input type=" text" name="email" required value="<?= $m['email']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Prodi :
                    <input type=" text" name="prodi" required value="<?= $m['prodi']; ?>">
                </label>
            </li>
            <li>
                <label>
                    Gambar :
                    <input type="text" name="gambar" value="<?= $m['gambar']; ?>">
                </label>
            </li>
            <li>
                <button type=" submit" name="ubah">Ubah Data</button>

            </li>
        </ul>
    </form>
</body>

</html>