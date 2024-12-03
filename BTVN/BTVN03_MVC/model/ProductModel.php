<?php
class ProductModel {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $db = 'ProductManagement';
        $user = 'root';
        $pass = '';
        $this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllProducts() {
        $stmt = $this->conn->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->execute(['name' => $name, 'price' => $price]);
    }

    public function getProduct($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $price) {
        $stmt = $this->conn->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'price' => $price]);
    }

    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
