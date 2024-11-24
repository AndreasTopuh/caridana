<?php
error_reporting(E_ALL & ~E_NOTICE); // Menyembunyikan pesan notice
session_start(); // Pastikan ini dipanggil hanya sekali

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/caridana/index.php");
    exit();
}

require_once '../controller/ProdukController.php';


use Controller\ProdukController;

$produkController = new ProdukController();
$userId = $_SESSION['user']['id'];
$userProdukList = $produkController->showUserProduk($userId);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_produk'])) {
    $produkController->updateProduk($_POST['id'], $_POST['status']);
    header("Location: produk_saya.php"); // Refresh halaman setelah update
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk yang Anda Jual</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/caridana/public/css/style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Produk yang Anda Jual</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Alamat</th> 
                    <th>Nomor Penjual</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($userProdukList): ?>
                    <?php foreach ($userProdukList as $produk): ?>
                        <tr>
                            <td><?= htmlspecialchars($produk['nama']); ?></td>

                            <td>Rp <?= htmlspecialchars(number_format($produk['harga'], 2, ',', '.')); ?></td>

                            <td><?= htmlspecialchars($produk['jenis']); ?></td>

                            <td><?= htmlspecialchars($produk['status']); ?></td>

                            <td><?= htmlspecialchars($produk['nomor_penjual']); ?></td>

                            <td><?= htmlspecialchars($produk['alamat']); ?></td> <!-- Menampilkan alamat -->

                            <td><?= htmlspecialchars($produk['deskripsi']); ?></td>

                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="tersedia" <?= $produk['status'] === 'tersedia' ? 'selected' : ''; ?>>Tersedia</option>
                                        <option value="terjual" <?= $produk['status'] === 'terjual' ? 'selected' : ''; ?>>Terjual</option>
                                    </select>
                                    <button type="submit" name="update_produk" class="btn btn-primary btn-sm mt-1">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Anda belum menjual Produk apapun.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
