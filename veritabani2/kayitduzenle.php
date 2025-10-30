<?php
// ID parametresini al
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Geçersiz ID parametresi.");
}

// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "", "okul");
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

// Kayıt bilgilerini çek
$sql = "SELECT * FROM ogrenci WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$ogrenci = mysqli_fetch_assoc($result);

if (!$ogrenci) {
    die("Kayıt bulunamadı.");
}

$adsoyad = $ogrenci['adsoyad'];
$bolum   = $ogrenci['bolum'];

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

