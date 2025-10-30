<?php
$gun_kodu = "Car"; // Çarşamba
switch ($gun_kodu) {
case "Pzt":
echo "Bugün Pazartesi.";
break; // break: Koşul sağlanırsa switch'ten çık
case "Sal":
echo "Bugün Salı.";
break;
case "Car":
echo "Bugün Çarşamba.";
break;
case "Per":
echo "Bugün Perşembe.";
break;
case "Cum":
echo "Bugün Cuma.";
break;
case "Cmt":
case "Pzr": // Birden fazla 'case' aynı sonucu verebilir
echo "Hafta sonu!";
break;
default: // Hiçbiri eşleşmezse
echo "Geçersiz gün kodu.";
break;
}
?>