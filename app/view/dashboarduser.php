<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /unkpresent/caridana/index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/unkpresent/caridana/public/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }
        .container {
            max-width: 1200px;
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
        .card-header {
            background-color: #009688;
            color: white;
            font-size: 1.5rem;
            padding: 15px;
            text-align: center;
        }
        .card-body {
            background-color: white;
            padding: 30px;
            text-align: center;
        }
        .card-body h5 {
            font-size: 1.25rem;
            color: #333;
        }
        .card-body p {
            color: #777;
            font-size: 1rem;
        }
        .btn-custom {
            background-color: #00897b;
            border-color: #00796b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #00796b;
            border-color: #004d40;
        }
        .welcome-message {
            text-align: center;
            font-size: 2rem;
            color: #009688;
            font-weight: 600;
            margin-top: 50px;
            margin-bottom: 30px;
        }
        .profile-info {
            text-align: center;
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #555;
        }
        .row {
            display: flex;
            justify-content: space-around;
        }
        .col-md-4 {
            flex: 1;
            margin: 10px;
        }
        .col-md-4 .card {
            margin: 10px 0;
        }
        .logout-button {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="welcome-message">Hi, <?= htmlspecialchars($user['nama']); ?>!</h1>
        <p class="profile-info">You are logged in with the email: <?= htmlspecialchars($user['email']); ?></p>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-plus-circle"></i> Tambah Jualan
                    </div>
                    <div class="card-body">
                        <h5>Tambah Jualan Baru</h5>
                        <p>Tambah produk yang ingin Anda jual di platform.</p>
                        <a href="./add_produk.php" class="btn btn-custom">Tambah Produk</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-list-ul"></i> Daftar Jualan
                    </div>
                    <div class="card-body">
                        <h5>Lihat Daftar Jualan</h5>
                        <p>Cek semua jualan yang tersedia di platform kami.</p>
                        <a href="./produk_list.php" class="btn btn-custom">Lihat Daftar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-boxes"></i> Jualan Anda
                    </div>
                    <div class="card-body">
                        <h5>Kelola Jualan Anda</h5>
                        <p>Atur produk yang sudah Anda jual atau belum terjual.</p>
                        <a href="./produk_saya.php" class="btn btn-custom">Kelola Jualan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="logout-button">
            <form method="POST" action="../view/logout.php">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
