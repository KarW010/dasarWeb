<?php
date_default_timezone_set("Asia/Jakarta");

// **MODIFIKASI: Koneksi PostgreSQL**
$host = "localhost";
$user = "postgres"; // Umumnya username default PostgreSQL
$pass = "12345678"; // Ganti dengan password PostgreSQL Anda
$db = "prakwebdb";

$koneksi = pg_connect("host=$host dbname=$db user=$user password=$pass");

if (!$koneksi) {
    die("Koneksi database gagal: " . pg_last_error());
}
?>