<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    // Mengecek apakah NIM sudah ada di dalam tabel
    $query_cek_nim = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query_cek_nim);

    // Jika NIM sudah ada, kembalikan 0
    if (mysqli_num_rows($result) > 0) {
        return 0;
    } else {
        // Jika NIM belum ada, masukkan data ke dalam tabel
        $sql_mahasiswa = "INSERT INTO mahasiswa(nim, nama, kelas, jurusan, semester) VALUES ('$nim','$nama','$kelas','$jurusan','$semester')";
        mysqli_query($koneksi, $sql_mahasiswa);

        // Mengembalikan jumlah baris yang terpengaruh oleh operasi query (1 jika berhasil, 0 jika gagal)
        return mysqli_affected_rows($koneksi);
    }
}



// Membuat fungsi hapus
function hapus($nim)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = $nim");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $semester = htmlspecialchars($data['semester']);

    $sql = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' WHERE nim = $nim";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

