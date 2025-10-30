<?php
$servername = "localhost";
$username = "root";
$password = "";

// Bağlantı oluştur
$conn = mysqli_connect($servername, $username, $password);

// Bağlantı kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

// Veritabanı oluşturma sorgusu
$sql = "CREATE DATABASE sinif DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

// Sorguyu çalıştır
if (mysqli_query($conn, $sql)) {
    echo "Veritabanı oluşturuldu.";
} else {
    echo "Veritabanı oluşturma hatası: " . mysqli_error($conn);
}

// Bağlantıyı kapat
mysqli_close($conn);
?>
