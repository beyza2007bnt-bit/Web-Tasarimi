<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = ""; // Eğer veritabanı adı gerekliyse buraya ekle

// Bağlantı oluştur
$conn = mysqli_connect($servername, $username, $password, $database);

// Bağlantı kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

echo "Sunucu ile bağlantı kuruldu.";

// Bağlantıyı kapat
mysqli_close($conn);
?>
