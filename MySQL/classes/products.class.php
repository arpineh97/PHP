<?php

class Products extends Dbh {

    public function insertProduct ($productName, $description, $price) {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$productName, $description, $price]);
    }

    public function getProducts () {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll ();
    }

    public function showCheckedProducts($data) {
        $sql = "SELECT * FROM `products` WHERE `product_id` IN (" . implode(',', array_map('intval', $data)) . ")";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll ();
    }
}