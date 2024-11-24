<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/caridana/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jualan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        /* Additional styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
        }
        .form-control-sm {
            font-size: 1rem;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .form-control-sm:focus {
            background-color: #ffffff;
            border-color: #66afe9;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(66, 153, 225, 0.25);
        }
        .btn-custom {
            background-color: #00796b;
            border-color: #00796b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #004d40;
            border-color: #004d40;
        }
        .back-btn {
            background-color: #ddd;
            color: #333;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #bbb;
        }
        .form-group {
            margin-bottom: 20px;
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
        <h1 class="page-title">Tambah Jualan</h1>
        
        <a href="dashboarduser.php" class="back-btn mb-3">Kembali ke Dashboard</a>
        
        <form method="POST" action="../controller/ProdukController.php" class="card p-4 bg-white rounded">
            <div class="form-group">
                <label for="nama" class="form-label">Nama Jualan</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Jualan" required>
            </div>

            <div class="form-group">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control form-control-sm" placeholder="Harga" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="jenis" class="form-label">Jenis Jualan</label>
                <input type="text" name="jenis" id="jenis" class="form-control form-control-sm" placeholder="Jenis Jualan">
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat Penjual</label>
                <input type="text" name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat Penjual">
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select form-control-sm" required>
                    <option value="tersedia">Tersedia</option>
                    <option value="terjual">Terjual</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_penjual" class="form-label">Nomor Penjual</label>
                <p><em><strong>Contoh: 628*********</strong></em></p>
                <input type="text" name="nomor_penjual" id="nomor_penjual" class="form-control form-control-sm" placeholder="Nomor Penjual" required>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <p><em>Tulis kekurangan/mines Jualan anda</em></p>
                <textarea name="deskripsi" id="deskripsi" class="form-control form-control-sm" placeholder="Deskripsi"></textarea>
            </div>

            <button type="submit" name="add_produk" class="btn btn-custom">Tambah Jualan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
