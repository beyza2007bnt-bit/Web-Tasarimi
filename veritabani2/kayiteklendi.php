<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adsoyad = trim($_POST['adsoyad'] ?? '');
    $bolum   = trim($_POST['bolum'] ?? '');

    // Boş alan kontrolü
    if ($adsoyad === '' || $bolum === '') {
        echo "Lütfen tüm alanları doldurun.";
        exit;
    }

    // Veritabanı bağlantısı
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "okul";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Bağlantı hatası: " . mysqli_connect_error());
    }

    // Türkçe karakter desteği
    mysqli_set_charset($conn, "utf8mb4");

    // Güvenli sorgu (prepared statement)
    $sql  = "INSERT INTO ogrenci (adsoyad, bolum) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $adsoyad, $bolum);
        $sonuc = mysqli_stmt_execute($stmt);

        if ($sonuc) {
            echo "<b>Kayıt Eklenmiştir.</b><br><br>";
            echo "<u><b>Eklenen Bilgiler</b></u><br>";
            echo "Ad Soyad : " . htmlspecialchars($adsoyad) . "<br>";
            echo "Bölüm : " . htmlspecialchars($bolum) . "<br><br>";
        } else {
            echo "Kayıt Başarısız: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Sorgu hazırlanamadı: " . mysqli_error($conn);
    }

    echo '<a href="index.html">Geri Dön</a>';

    mysqli_close($conn);
}
?>
