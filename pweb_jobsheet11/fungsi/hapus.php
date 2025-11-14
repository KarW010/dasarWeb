<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    // Logika Hapus Jabatan
    if (!empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        
        // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
        if (pg_query($koneksi, $query)) {
            pesan('success', 'Jabatan Telah Terhapus.');
        } else {
            // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
            pesan('danger', "Jabatan Tidak Terhapus Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");

    // Logika Hapus Anggota
    } elseif (!empty($_GET['anggota'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        
        // 1. Hapus dari tabel anggota
        $query1 = "DELETE FROM anggota WHERE user_id = '$id'";
        // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
        if (pg_query($koneksi, $query1)) {
            // 2. Jika sukses, hapus dari tabel user
            $query2 = "DELETE FROM \"user\" WHERE id = '$id'";
            // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
            if (pg_query($koneksi, $query2)) {
                pesan('success', 'Anggota Telah Terhapus.');
            } else {
                // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
                pesan('warning', "Data Login Tidak Terhapus Karena: " . pg_last_error($koneksi));
            }
        } else {
            // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
            pesan('danger', "Anggota Tidak Terhapus Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=anggota");
    }
}
?>