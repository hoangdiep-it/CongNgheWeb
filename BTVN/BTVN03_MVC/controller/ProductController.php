<?php
require_once '../model/ProductModel.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
        include '../view/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $this->model->addProduct($name, $price);
            header("Location:index.php");
            exit();
        }
        include '../view/add.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $this->model->updateProduct($id, $name, $price);
            header("Location: index.php");
            exit();
        }
        $product = $this->model->getProduct($id);
        include '../view/edit.php';
    }

    public function delete($id) {
        $this->model->deleteProduct($id);
        header("Location: index.php");
        exit();
    }
}
