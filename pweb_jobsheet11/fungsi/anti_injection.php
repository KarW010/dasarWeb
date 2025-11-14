<?php
// **MODIFIKASI: Menggunakan pg_escape_string untuk PostgreSQL**
function antiinjection($koneksi, $data)
{
    // Mengganti mysqli_real_escape_string dengan pg_escape_string
    $filter_sql = pg_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter_sql;
}
?>