<?php
namespace Controller;

require_once __DIR__ . '/../model/ProdukModel.php'; // Pastikan path ini benar

use Model\ProdukModel;

class ProdukController{
    private $produkModel;

    public function __construct() {
        $this->produkModel = new ProdukModel();
    }

    public function showAllProduk() {
        return $this->produkModel->getAllProduk();
    }

    public function addProduk($data, $userId) {
        return $this->produkModel->addProduk($data, $userId);
    }

    public function updateProduk($id, $status) {
        return $this->produkModel->updateProduk($id, $status);
    }

    public function handleRequest() {
        session_start();

        if (isset($_POST['add_produk'])) {
            $data = [
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'kondisi' => $_POST['kondisi'],
                'jenis' => $_POST['jenis'],
                'status' => $_POST['status'],
                'nomor_penjual' => $_POST['nomor_penjual'],
                'deskripsi' => $_POST['deskripsi']
            ];



            if (isset($_SESSION['user']['id'])) {
                $userId = $_SESSION['user']['id'];

                if ($this->addProduk($data, $userId)) {
                    header("Location: ../view/produk_list.php");
                    exit();
                } else {
                    echo "Gagal menambahkan produk jualan.";
                }
            } else {
                echo "User belum login.";
            }
        }
    }

    public function showUserProduk($userId) {
        return $this->produkModel->getProdukByUser($userId);
    }
}

$produkController = new ProdukController();
$produkController->handleRequest();
