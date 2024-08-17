<?php
function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'db_latihan_php_native_24');
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    // jika datanya hanya ada 1 saja
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // setiap fungsi wajib mengembalikan sebuah nilai denga return
    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    // pecah dulu dataanya, lindungi pake html chars
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $prodi = htmlspecialchars($data['prodi']);
    $gambar = htmlspecialchars($data['gambar']);


    $query = "INSERT INTO 
    t_mhs 
    VALUES
    (NULL, '$nim', '$nama', '$email', '$prodi', '$gambar')
    ";

    mysqli_query($conn, $query);
    echo mysqli_errno($conn);
    // kembalikan nilai apakah ada perubahan / baris yang berubah
    return mysqli_affected_rows($conn);
}
