<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "okul"; // Veritabanı adı

// Bağlantı oluştur
$conn = mysqli_connect($servername, $username, $password, $database);

// Bağlantı kontrolü
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

// Sorgu çalıştır
$sql = "SELECT * FROM ogrenci";
$result = mysqli_query($conn, $sql);

// Sonuç sayısı
if ($result) {
    $count = mysqli_num_rows($result);
    echo "Toplam " . $count . " kayıt bulunmuştur.";
} else {
    echo "Sorgu hatası: " . mysqli_error($conn);
}

// Bağlantıyı kapat
mysqli_close($conn);
?>
