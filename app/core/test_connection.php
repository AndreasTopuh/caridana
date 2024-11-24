<?php
// Memasukkan file Database.php
require_once 'Database.core.php';

// Membuat objek dari kelas Database
$database = new Core\Database();

// Mengambil koneksi
$conn = $database->getConnection();

// Mengecek apakah koneksi berhasil
if ($conn) {
    echo "Koneksi berhasil!";
} else {
    echo "Koneksi gagal.";
}
?>
