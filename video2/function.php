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
