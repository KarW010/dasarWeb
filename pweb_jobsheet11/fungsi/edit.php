<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    // Logika Edit Jabatan
    if (!empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_POST['id']);
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";
        
        // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
        if (pg_query($koneksi, $query)) {
            pesan('success', 'Jabatan Telah Diubah.');
        } else {
            // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
            pesan('danger', "Mengubah Jabatan Gagal Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=jabatan");

    // Logika Edit Anggota
    } elseif (!empty($_GET['anggota'])) {
        $id = antiinjection($koneksi, $_POST['id']);
        
        // Data Anggota
        $nama = antiinjection($koneksi, $_POST['nama']);
        $jabatan_id = antiinjection($koneksi, $_POST['jabatan']);
        $jenis_kelamin = antiinjection($koneksi, $_POST['jenis_kelamin']);
        $alamat = antiinjection($koneksi, $_POST['alamat']);
        $no_telp = antiinjection($koneksi, $_POST['no_telp']);
        
        // Data User
        $username = antiinjection($koneksi, $_POST['username']);
        $password_mentah = $_POST['password'];

        // 1. Update tabel anggota
        $query_anggota = "UPDATE anggota SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp', jabatan_id = '$jabatan_id' WHERE user_id = '$id'";
        
        // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
        if (pg_query($koneksi, $query_anggota)) {
            $pesan = "Anggota Telah Diubah.";
            
            // 2. Update tabel user (hanya jika password diisi)
            if (!empty($password_mentah)) {
                $salt = bin2hex(random_bytes(16));
                $password = password_hash($salt . $password_mentah, PASSWORD_BCRYPT);
                $query_user = "UPDATE \"user\" SET username = '$username', password = '$password', salt = '$salt' WHERE id = '$id'";
            } else {
                $query_user = "UPDATE \"user\" SET username = '$username' WHERE id = '$id'";
            }
            
            // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
            if (pg_query($koneksi, $query_user)) {
                pesan('success', $pesan . " Data Login juga diperbarui.");
            } else {
                // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
                pesan('warning', $pesan . " Tapi, Data Login Gagal Diperbarui Karena: " . pg_last_error($koneksi));
            }

        } else {
            // **PERBAIKAN: Ganti mysqli_error dengan pg_last_error**
            pesan('danger', "Mengubah Anggota Gagal Karena: " . pg_last_error($koneksi));
        }

        header("Location: ../index.php?page=anggota");
    }
}
?>