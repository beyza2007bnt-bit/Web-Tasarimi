<?php
// ayar.php
function db() : mysqli {
    static $conn = null;
    if ($conn instanceof mysqli) return $conn;

    $conn = mysqli_connect("localhost", "root", "", "okul");
    if (!$conn) {
        die("Bağlantı Hatası: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
}
