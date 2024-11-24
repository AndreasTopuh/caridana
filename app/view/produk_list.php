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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/caridana/public/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Caridana</h1>
        <a href="dashboarduser.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <div class="row">
            <?php if ($produkList): ?>
                <?php foreach ($produkList as $produk): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">

                                <h5 class="card-title"><?= htmlspecialchars($produk['nama']); ?>
                                </h5>

                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                    <?= htmlspecialchars($produk['jenis']); ?> - 
                                </h6>
                                
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

                               <a href="https://wa.me/<?= urlencode($produk['nomor_penjual']); ?>?text=Halo,%20saya%20tertarik%20dengan%20barang%20Anda:%20<?= urlencode($produk['nama']); ?>" class="card-link" target="_blank">Hubungi Penjual</a>


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
