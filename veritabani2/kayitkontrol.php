<?php
// ---- Basit yapılandırma ----
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "okul";
$table      = "ogrenci";

// ---- Bağlantı ----
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Bağlantı Hatası: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

// ---- Kayıtları çek ----
$sql = "SELECT id, adsoyad, bolum FROM `$table` ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Kayıtlar</title>
  <style>
    body { font-family: system-ui, -apple-system, Arial, sans-serif; padding: 24px; }
    table { border-collapse: collapse; min-width: 420px; }
    th, td { border: 1px solid #999; padding: 8px 10px; }
    th { background: #ddd; text-align: left; }
    a { text-decoration: none; }
  </style>
</head>
<body>
  <h1>Kayıtlar</h1>

  <table cellpadding="5">
    <tr>
      <th>Ad Soyad</th>
      <th>Bölüm</th>
      <th>Düzenle</th>
    </tr>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['adsoyad']); ?></td>
          <td><?php echo htmlspecialchars($row['bolum']); ?></td>
          <td><a href="duzenle.php?id=<?php echo urlencode($row['id']); ?>">Düzenle</a></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="3">Kayıt bulunamadı.</td>
      </tr>
    <?php endif; ?>
  </table>

  <p><a href="index.html">Yeni Kayıt Ekle</a></p>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
