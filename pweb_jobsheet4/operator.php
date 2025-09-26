<?php
$a = 10;
$b = 5;

// Operator aritmatika
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

// Operator perbandingan
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

// Operator logika
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "=== Hasil Operasi Aritmatika ===<br>";
echo "a = $a, b = $b<br><br>";
echo "Penjumlahan (a + b) = $hasilTambah<br>";
echo "Pengurangan (a - b) = $hasilKurang<br>";
echo "Perkalian (a * b) = $hasilKali<br>";
echo "Pembagian (a / b) = $hasilBagi<br>";
echo "Sisa Bagi (a % b) = $sisaBagi<br>";
echo "Pangkat (a ** b) = $pangkat<br><br>";

echo "=== Hasil Operasi Perbandingan ===<br>";
echo "Apakah a == b ? " . ($hasilSama ? "true" : "false") . "<br>";
echo "Apakah a != b ? " . ($hasilTidakSama ? "true" : "false") . "<br>";
echo "Apakah a < b ? " . ($hasilLebihKecil ? "true" : "false") . "<br>";
echo "Apakah a > b ? " . ($hasilLebihBesar ? "true" : "false") . "<br>";
echo "Apakah a <= b ? " . ($hasilLebihKecilSama ? "true" : "false") . "<br>";
echo "Apakah a >= b ? " . ($hasilLebihBesarSama ? "true" : "false") . "<br>";
echo "Apakah a === b (identik)? " . ($hasilIdentik ? "true" : "false") . "<br>";
echo "Apakah a !== b (tidak identik)? " . ($hasilTidakIdentik ? "true" : "false") . "<br><br>";

echo "=== Hasil Operasi Logika ===<br>";
echo "a && b = " . ($hasilAnd ? "true" : "false") . "<br>";
echo "a || b = " . ($hasilOr ? "true" : "false") . "<br>";
echo "!a = " . ($hasilNotA ? "true" : "false") . "<br>";
echo "!b = " . ($hasilNotB ? "true" : "false") . "<br><br>";

// Operator penugasan
echo "=== Hasil Operasi Penugasan ===<br>";
$a = 10; // reset ke nilai awal
echo "Nilai awal: a = $a, b = $b<br><br>";

$a += $b;
echo "Setelah a += b → a = $a<br>";

$a -= $b;
echo "Setelah a -= b → a = $a<br>";

$a *= $b;
echo "Setelah a *= b → a = $a<br>";

$a /= $b;
echo "Setelah a /= b → a = $a<br>";

$a %= $b;
echo "Setelah a %= b → a = $a<br>";
?>