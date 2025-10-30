<?php
// Basit, parametre almayan fonksiyon
function selamVer() {
echo "Merhaba! <br>";
}
// Fonksiyonu çağırma
selamVer();
// Parametre alan fonksiyon
function selamIsimle($isim) {
echo "Merhaba, $isim! <br>";
}
selamIsimle("Ayşe");
selamIsimle("Mehmet");
// Değer döndüren (return) fonksiyon
function topla($sayi1, $sayi2) {
$sonuc = $sayi1 + $sayi2;
return $sonuc; // Hesaplanan değeri geri döndürür
}
$toplam = topla(10, 15);
echo "10 + 15 = $toplam";
?>