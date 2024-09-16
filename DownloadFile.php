<?php
// Digunakan untuk memeriksa apakah parameter GET dengan nama "file" tidak kosong. Ini berarti URL harus mengandung parameter "file" yang menunjukkan nama file yang akan diunduh.
if (!empty($_GET['file'])) {
    // Digunakan untuk mengambil nama file dari parameter GET yang diberikan. Nama file kemudian digunakan untuk membangun path (lokasi) file yang akan diunduh.
    $fileName  = basename($_GET['file']);
    $filePath  = "uploads/file/" . $fileName;

    //  Digunakan untuk memeriksa apakah nama file tidak kosong
    if (!empty($fileName) && file_exists($filePath)) {
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        //Read file (digunakan untuk membaca file dari path yang ditentukan dan mengirimkannya ke pengguna sebagai respon unduhan.)
        readfile($filePath);
        // Digunakan untuk menghentikan eksekusi script PHP
        exit;
    } else {
        echo "file not exist";
    }
}