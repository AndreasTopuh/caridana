<?php
// Memasukkan file Database.php
require_once './app/core/Database.php';

// Membuat objek dari kelas Database
$database = new Core\Database();

// Mengambil koneksi
$conn = $database->getConnection();

// Mengecek apakah koneksi berhasil
if ($conn) {
    echo "<h1>Koneksi berhasil!</h1>";
} else {
    echo "<h1>Koneksi gagal.</h1>";
}
?>
