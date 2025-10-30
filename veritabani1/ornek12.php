<?php
$sayac = 10;
// while döngüsü bu koşulda hiç çalışmaz
while ($sayac < 5) {
echo "Bu yazı hiç görünmeyecek.";
$sayac++;
}
echo "<hr>";
// do-while en az bir kez çalışır
do {
echo "Sayaç: $sayac (Koşul yanlış olsa bile 1 kez çalıştı) <br>";
$sayac++;
} while ($sayac < 5); // Koşul burada kontrol ediliyor
?>