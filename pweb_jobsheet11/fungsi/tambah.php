<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    // Logika Tambah Jabatan
    if (!empty($_GET['jabatan'])) {
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        $query = "INSERT INTO jabatan (jabatan,keterangan) VALUES('$jabatan','$keterangan')";
        
        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Baru Ditambahkan.");
        } else {
            pesan('danger', "Menambahkan Jabatan Gagal Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");

    // Logika Tambah Anggota
    } elseif (!empty($_GET['anggota'])) {
        // Data Anggota
        $nama = antiinjection($koneksi, $_POST['nama']);
        $jabatan_id = antiinjection($koneksi, $_POST['jabatan']);
        $jenis_kelamin = antiinjection($koneksi, $_POST['jenis_kelamin']);
        $alamat = antiinjection($koneksi, $_POST['alamat']);
        $no_telp = antiinjection($koneksi, $_POST['no_telp']);
        
        // Data User
        $username = antiinjection($koneksi, $_POST['username']);
        $level = antiinjection($koneksi, $_POST['level']);
        $salt = bin2hex(random_bytes(16));
        $password = password_hash($salt . $_POST['password'], PASSWORD_BCRYPT);

        // 1. Insert ke tabel user
        $query_user = "INSERT INTO \"user\" (username, password, salt, level) VALUES('$username', '$password', '$salt', '$level') RETURNING id";
        $result_user = pg_query($koneksi, $query_user);
        
        if ($result_user) {
            $row_user = pg_fetch_assoc($result_user);
            $user_id = $row_user['id'];

            // 2. Insert ke tabel anggota
            $query_anggota = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp, user_id, jabatan_id) VALUES('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$user_id', '$jabatan_id')";
            
            if (pg_query($koneksi, $query_anggota)) {
                pesan('success', "Anggota Baru Ditambahkan.");
            } else {
                // Jika insert anggota gagal, hapus data user yang sudah terlanjur tersimpan
                pg_query($koneksi, "DELETE FROM \"user\" WHERE id = '$user_id'");
                pesan('danger', "Menambahkan Anggota Gagal Karena: " . pg_last_error($koneksi));
            }
        } else {
            pesan('danger', "Menambahkan Data Login Gagal Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=anggota");
    }
}
?>