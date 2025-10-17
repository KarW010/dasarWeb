<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "images/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif"); // ekstensi gambar yang diizinkan
    $maxsize = 5 * 1024 * 1024; // ukuran maksimum 5MB per file

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmp = $_FILES['files']['tmp_name'][$i];
        $fileSize = $_FILES['files']['size'][$i];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . $fileName;

        // Validasi ekstensi dan ukuran file
        if (in_array($fileExt, $allowedExtensions) && $fileSize <= $maxsize) {
            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
                
                // === Tambahan: tampilkan thumbnail gambar ===
                echo "<img src='$targetFile' width='200' style='height:auto; margin:10px; border:1px solid #ccc;'><br>";
                // ===========================================
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName tidak valid (bukan gambar atau melebihi 5MB).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>