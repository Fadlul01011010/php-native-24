<?php
function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'db_latihan_php_native_24');
}

// perintah yang digunakan untuk crud
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
    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $jeniskelamin = htmlspecialchars($data['jeniskelamin']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $jumlahorang = htmlspecialchars($data['jumlahorang']);
    if ($jumlahorang == 0) {
        echo "<script>
        alert('jumlah pengunjung tidak boleh 0');
        document.location.href = 'tambah.php';
        </script>";
    }
    // Kelola Kode Booking
    $namawisata = "BEP";
    $kodeBooking = $namawisata . strtoupper(uniqid());

    // Kelola Total Bayar
    $hargaTiket = 10000;
    $totalBayar = $hargaTiket * $jumlahorang;

    // Status
    $status = 0;

    // tanggal buat
    date_default_timezone_set('Asia/Jakarta');
    $datecreate = date("Y-m-d h:i:sa");

    // var_dump($kodeBooking . " Rp. " . number_format($totalBayar));
    // die;

    // perintah simpan ke database
    $query = "INSERT INTO 
                t_tiket 
                VALUES
                (NULL, '$kodeBooking', '$nik', '$nama', '$jeniskelamin', '$nohp', '$tanggal', '$jumlahorang', '$totalBayar', '$status', '$datecreate', '$datecreate', '$datecreate')
                ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo mysqli_error($conn);
    // kembalikan nilai apakah ada perubahan / baris yang berubah
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM t_tiket WHERE id=$id") or die(mysqli_error($conn));
    // jangan lupa return

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    // pecah dulu dataanya, lindungi pake html chars
    $id = htmlspecialchars($data['id']);
    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data['nohp']);
    $jeniskelamin = htmlspecialchars($data['jeniskelamin']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $jumlahorang = htmlspecialchars($data['jumlahorang']);
    if ($jumlahorang == 0) {
        echo "<script>
        alert('jumlah pengunjung tidak boleh 0');
        document.location.href = 'tambah.php';
        </script>";
    }
    // Kelola Kode Booking
    $namawisata = "BEP";
    $kodeBooking = $namawisata . strtoupper(uniqid());

    // Kelola Total Bayar
    $hargaTiket = 10000;
    $totalBayar = $hargaTiket * $jumlahorang;

    // Status
    $status = 0;

    // tanggal buat
    date_default_timezone_set('Asia/Jakarta');
    $datecreate = date("Y-m-d h:i:sa");

    $query = "UPDATE 
                t_tiket
                SET 
                nik = '$nik',
                kodebooking = '$kodeBooking',
                nama = '$nama',
                jeniskelamin = '$jeniskelamin',
                nohp = '$nohp',
                tanggal = '$tanggal',
                jumlahorang = '$jumlahorang',
                totalbayar = '$totalBayar',
                status = '$status',
                updated_at = '$datecreate',
                WHERE id='$id'
            ";

    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    // kembalikan nilai apakah ada perubahan / baris yang berubah
    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $conn = koneksi();
    $query = "SELECT * FROM t_tiket 
        WHERE 
        nama LIKE '%$keyword%' OR
        nohp LIKE '%$keyword%' OR 
        kodebooking LIKE '%$keyword%'
        ";

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
