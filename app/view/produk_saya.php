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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .btn-secondary {
            background-color: #00796b;
            border-color: #00796b;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
        }
        .btn-secondary:hover {
            background-color: #004d40;
            border-color: #004d40;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .form-select {
            width: 120px;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        .page-title {
            text-align: center;
            font-size: 2rem;
            color: #00796b;
            margin-bottom: 30px;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="page-title">Produk yang Anda Jual</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Nomor Penjual</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
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
                            <td><?= htmlspecialchars($produk['alamat']); ?></td>
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
                                <form method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                                    <button type="submit" name="delete_produk" class="btn btn-danger btn-sm mt-1">Delete</button>
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
