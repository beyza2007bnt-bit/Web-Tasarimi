<?php
// ---- Parametre ----
$pk = $_GET['id'] ?? $_GET['numara'] ?? null;           // id veya numara
$pkCol = isset($_GET['id']) ? 'id' : (isset($_GET['numara']) ? 'numara' : null);

if (!$pkCol || !ctype_digit((string)$pk)) {
    http_response_code(400);
    exit("Geçersiz istek.");
}

// ---- Bağlantı ----
$conn = mysqli_connect("localhost", "root", "", "okul");
if (!$conn) { exit("Bağlantı hatası: " . mysqli_connect_error()); }
mysqli_set_charset($conn, "utf8mb4");

// ---- Silme ----
$sql  = "DELETE FROM ogrenci WHERE {$pkCol} = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) { exit("Sorgu hazırlanamadı: " . mysqli_error($conn)); }

mysqli_stmt_bind_param($stmt, "i", $pk);
$ok = mysqli_stmt_execute($stmt);

$affected = mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

$success = $ok && $affected > 0;
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Silme İşlemi</title>
  <?php if ($success): ?>
    <meta http-equiv="refresh" content="1; url=kayitlar.php">
  <?php endif; ?>
  <style>
    body { font-family: system-ui, -apple-system, Arial, sans-serif; padding:24px; }
  </style>
</head>
<body>
  <b><?php echo $success ? "Silme İşlemi Başarılı" : "Silme İşlemi Başarısız."; ?></b><br><br>
  <a href="kayitlar.php">Kayıtlara Dön</a>
</body>
</html>
