<?php
namespace Model;

require_once __DIR__ . '/../core/Database.php'; // Pastikan path sesuai

use Core\Database;
use PDO;

class ProdukModel {
    private $conn;
    private $table_name = "tbl_produk";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllProduk() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProdukByUser($userId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addProduk($data, $userId) {
        $query = "INSERT INTO " . $this->table_name . " (nama, harga, jenis, status, nomor_penjual, deskripsi, id_user, alamat) 
                VALUES (:nama, :harga, :jenis, :status, :nomor_penjual, :deskripsi,:id_user, :alamat)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':harga', $data['harga']);
        // $stmt->bindParam(':kondisi', $data['kondisi']);
        $stmt->bindParam(':jenis', $data['jenis']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':nomor_penjual', $data['nomor_penjual']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':id_user', $userId);

        return $stmt->execute();
    }


    public function updateProduk($id, $status) {
        $query = "UPDATE " . $this->table_name . " SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }





}
