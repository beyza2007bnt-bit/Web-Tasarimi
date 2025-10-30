<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Bu sayfaya POST ile gelmelisiniz.");
}

$adsoyad = trim($_POST['adsoyad'] ?? '');
$bolum   = trim($_POST['bolum']   ?? '');
$pk      = $_POST['id'] ?? $_POST['numara'] ?? null;        // id ya da numara
$pkCol   = isset($_POST['id']) ? 'id' : (isset($_POST['numara']) ? 'numara' : null);

if ($adsoyad === '' || $bolum === '' || !$pk || !$pkCol) {
    exit("Eksik bilgi: adsoyad/bolum/kimlik değeri gereklidir.");
}

$conn = mysqli_connect("localhost", "root", "", "okul");
if (!$conn) {
    exit("Bağlantı hatası: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

// Dinamik olarak id ya da numara sütununa göre UPDATE hazırla
$sql  = "UPDATE ogrenci SET adsoyad = ?, bolum = ? WHERE {$pkCol} = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    exit("Sorgu hazırlanamadı: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssi", $adsoyad, $bolum, $pk);
$ok = mysqli_stmt_execute($stmt);

$affected = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Başarılıysa 2 sn sonra kayıtlara dön
$success = $ok && $affected !== -1;
$message = $success ? "Güncelleme İşlemi Başarılı." : "Güncelleme Başarısız.";

?>
