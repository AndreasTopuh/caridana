<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/caridana/index.php");
    exit;
}

require_once '../controller/ProdukController.php';

use Controller\ProdukController;

$produkController = new ProdukController();
$produkList = $produkController->showAllProduk();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Caridana</title>
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
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #00796b;
        }
        .card-subtitle {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 0.9rem;
            color: #333;
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
        .card-link {
            color: #00796b;
            font-weight: 600;
            text-decoration: none;
        }
        .card-link:hover {
            text-decoration: underline;
        }
        .back-btn {
            background-color: #ddd;
            color: #333;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .back-btn:hover {
            background-color: #bbb;
        }
        .page-title {
            text-align: center;
            font-size: 2rem;
            color: #00796b;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="page-title">Daftar Caridana</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <div class="row">
            <?php if ($produkList): ?>
                <?php foreach ($produkList as $produk): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($produk['nama']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($produk['jenis']); ?> - </h6>

                                <p class="card-text">Alamat: <?= htmlspecialchars($produk['alamat']); ?></p>

                                <p class="card-text">
                                    Harga: Rp <?= htmlspecialchars($produk['harga']); ?><br>
                                    Status: <?= htmlspecialchars($produk['status']); ?><br>
                                    Nomor Penjual: 
                                    <a href="https://wa.me/<?= urlencode($produk['nomor_penjual']); ?>" class="card-link" target="_blank">
                                        <?= htmlspecialchars($produk['nomor_penjual']); ?>
                                    </a><br>
                                    Deskripsi: <?= htmlspecialchars($produk['deskripsi']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada barang yang tersedia</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
