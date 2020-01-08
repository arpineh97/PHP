<?php

class FinalInsertion extends Dbh {

    public function insertUser ($firstName, $lastName, $email) {

        $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email]);
        $sql2 = "SELECT * FROM users";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute();
        $result = $stmt2->fetchAll();
        foreach ($result as $row) {
            $lastOne = $row['user_id'];
        }
        return $lastOne;
    }

    public function insertOrders ($lastUserId, $total, $orderDate) {
        $sql = "INSERT INTO orders (user_id, sum, order_date) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$lastUserId, $total, $orderDate]);
        $sql2 = "SELECT * FROM orders";
        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute();
        $result = $stmt2->fetchAll();
        foreach ($result as $row) {
            $lastOne = $row['order_id'];
        }
        return $lastOne;
    }

    public function insertOrderProducts ($lastOrder_id, $productId, $quantity) {
        $sql = "INSERT INTO order_products (order_id, product_id, qty) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$lastOrder_id, $productId, $quantity]);
    }
}