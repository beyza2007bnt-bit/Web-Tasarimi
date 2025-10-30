<?php
$conn = mysqli_connect("localhost", "root", "", "okul");
if (!$conn) { die("Bağlantı Hatası: " . mysqli_connect_error()); }
mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT id, numara, adsoyad, bolum FROM ogrenci ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Kayıtlar</title>
  <style>
    body { font-family: system-ui, -apple-system, Arial, sans-serif; padding:24px; }
    table { border-collapse: collapse; min-width: 520px; }
    th, td { border:1px solid #999; padding:8px 10px; }
    th { background:#ddd; text-align:left; }
    a { text-decoration:none; }
  </style>
  <script>
    function silOnayla(e, url) {
      if (!confirm("Silmek istediğinize emin misiniz?")) {
        e.preventDefault();
      } else {
        // onaylandıysa normal yönlendir
        window.location.href = url;
      }
    }
  </script>
</head>
<body>
  <h1>Kayıtlar</h1>

  <table cellpadding="5">
    <tr>
      <th>Ad Soyad</th>
      <th>Bölüm</th>
      <th>Düzenle</th>
      <th>Sil</th>
    </tr>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $pk = $row['numara'] ?? $row['id']; ?>
        <tr>
          <td><?php echo htmlspecialchars($row['adsoyad']); ?></td>
          <td><?php echo htmlspecialchars($row['bolum']); ?></td>
          <td><a href="duzenle.php?id=<?php echo urlencode($pk); ?>">Düzenle</a></td>
          <td>
            <a href="sil.php?id=<?php echo urlencode($pk); ?>"
               onclick="silOnayla(event, this.href)">Sil</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="4">Kayıt bulunamadı.</td></tr>
    <?php endif; ?>
  </table>

  <p><a href="index.html">Yeni Kayıt Ekle</a></p>
</body>
</html>
<?php
if ($result) mysqli_free_result($result);
mysqli_close($conn);
