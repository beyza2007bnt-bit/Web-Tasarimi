<?php
$sunucu = "localhost"; // veya 127.0.0.1
$vt_adi = "test_db"; // Oluşturduğunuz veritabanının adı
$kullanici = "root"; // XAMPP varsayılan kullanıcı adı
$sifre = ""; // XAMPP varsayılan şifresi (boş)
try {
// 1. Veritabanına Bağlanma (PDO Nesnesi)
$db = new PDO("mysql:host=$sunucu;dbname=$vt_adi;charset=utf8", $kullanici, $sifre);
// Hata modunu ayarla (Exception'ları yakalamak için)
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Veritabanı bağlantısı başarılı! <br><hr>";
// 2. Veri Ekleme (Hazırlıklı İfadeler - Prepared Statements)
// SQL Injection saldırılarını önlemek için BU YÖNTEM KULLANILMALIDIR.
$stmt = $db->prepare("INSERT INTO kullanicilar (ad, email) VALUES (:ad, :email)");
// Parametreleri bağla
$stmt->bindParam(':ad', $ad);
$stmt->bindParam(':email', $email);
// İlk kullanıcıyı ekle (Eğer daha önce eklemediyseniz)
// $ad = "Ali Veli";
// $email = "ali@veli.com";
// $stmt->execute();
// İkinci kullanıcıyı ekle (Eğer daha önce eklemediyseniz)
// $ad = "Ayşe Fatma";
// $email = "ayse@fatma.com";
// $stmt->execute();

// 3. Veri Çekme (SELECT)
echo "<h3>Kullanıcı Listesi</h3>";
$sorgu = $db->query("SELECT * FROM kullanicilar");
// fetch metodu ile verileri tek tek al
// FETCH_ASSOC: Sütun adlarıyla ilişkisel dizi döndürür
while ($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
echo "ID: " . $satir['id'] . " - Ad: " . $satir['ad'] . " - Email: " . $satir['email'] . "<br>";
}
} catch (PDOException $e) {
// Bağlantı veya sorgu hatası olursa burası çalışır
echo "HATA: " . $e->getMessage();
}
// 4. Bağlantıyı Kapat
$db = null;
?>