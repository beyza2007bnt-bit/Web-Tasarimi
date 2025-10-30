<?php
// --- For Döngüsü ---
// Genellikle belirli bir sayıda tekrar için kullanılır.
echo "<h3>For Döngüsü (1-5 arası)</h3>";
echo "<ul>";
for ($i = 1; $i <= 5; $i++) {
echo "<li>Sayı: $i</li>";
}
echo "</ul>";

// --- While Döngüsü ---
// Koşul doğru (true) olduğu sürece çalışır.
echo "<h3>While Döngüsü</h3>";
$sayac = 1;
while ($sayac <= 3) {
echo "Sayaç değeri: $sayac <br>";
$sayac++; // Sayacı 1 artır ( $sayac = $sayac + 1; ile aynıdır)
}
?>