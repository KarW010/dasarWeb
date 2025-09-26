<?php
$totalSeats = 45;
$occupiedSeats = 28;

// Hitung kursi kosong
$emptySeats = $totalSeats - $occupiedSeats;

// Hitung persentase kursi kosong
$percentageEmpty = ($emptySeats / $totalSeats) * 100;

echo "Total kursi: $totalSeats<br>";
echo "Kursi terisi: $occupiedSeats<br>";
echo "Kursi kosong: $emptySeats<br>";
echo "Persentase kursi kosong: " . round($percentageEmpty, 2) . "%<br>";
?>