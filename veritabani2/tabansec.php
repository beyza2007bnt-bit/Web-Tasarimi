<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "okul"; // Görseldeki seçilen veritabanı

// Bağlantı oluştur
$conn = mysqli_connect($servername, $username, $password);

// Bağlantı kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

// Veritabanı seç
$db_selected = mysqli_select_db($conn, $database);

if ($db_selected) {
    echo "Veritabanı seçilmiştir.";
} else {
    echo "Veritabanı seçilemedi: " . mysqli_error($conn);
}

// Bağlantıyı kapat
mysqli_close($conn);
?>
