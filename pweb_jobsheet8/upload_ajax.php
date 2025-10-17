<?php
$targetDir = "uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (!empty($_FILES['files']['name'][0])) {
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmp = $_FILES['files']['tmp_name'][$i];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileType, $allowedTypes)) {
            $targetFile = $targetDir . basename($fileName);

            if (move_uploaded_file($fileTmp, $targetFile)) {
                // Tampilkan thumbnail setiap gambar
                echo "<div style='display:inline-block; margin:10px; text-align:center;'>
                        <img src='$targetFile' width='200' style='height:auto; border:1px solid #ccc;'><br>
                        <small>$fileName</small>
                      </div>";
            }
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>