<?php
// Bağlantı
$conn = mysqli_connect("localhost", "root", "", "okul");
if (!$conn) { die("Bağlantı hatası: " . mysqli_connect_error()); }
mysqli_set_charset($conn, "utf8mb4");

// Kayıtları çek (hem id hem numara varsa sorun çıkarmaz)
$sql = "SELECT id, numara, adsoyad, bolum FROM ogrenci ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<table border="1" cellpadding="5">
  <tr style="background-color:#ddd;">
    <td>Ad Soyad</td>
    <td>Bölüm</td>
    <td>Düzenle</td>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <?php
      // Tablonda hangisi varsa onu kullan (öncelik numara)
      $id      = $row['numara'] ?? $row['id'];
      $adsoyad = $row['adsoyad'];
      $bolum   = $row['bolum'];
    ?>
    <tr>
      <td><?php echo htmlspecialchars($adsoyad); ?></td>
      <td><?php echo htmlspecialchars($bolum); ?></td>
      <td><a href="duzenle.php?id=<?php echo urlencode($id); ?>">Düzenle</a></td>
    </tr>
  <?php endwhile; ?>
</table>
<?php
mysqli_free_result($result);
mysqli_close($conn);
