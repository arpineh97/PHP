<?php

class Orders extends Dbh {

    public function usersData ()
    {
        $sql2 = "SELECT 	users.user_id as userUsId, users.first_name, users.last_name,
                            SUM(products.price * order_products.qty) AS total, orders.order_date
                FROM        users
                INNER JOIN  orders ON users.user_id = orders.user_id
                INNER JOIN  order_products ON order_products.order_id = orders.order_id
                INNER JOIN  products ON order_products.product_id = products.product_id
        
                GROUP BY    order_products.order_id
                ORDER BY    orders.order_date DESC";    //This is user data

        $stmt2 = $this->connect()->prepare($sql2);
        $stmt2->execute();
        return $stmt2->fetchAll();
    }
    public function productsData ()
    {
        $sql1 = "SELECT 	orders.user_id as orderUsId, products.name, products.price, 
                            order_products.qty, orders.order_date
                FROM        orders
                INNER JOIN  order_products ON order_products.order_id = orders.order_id
                INNER JOIN  products ON order_products.product_id = products.product_id
                GROUP BY    products.name, products.price,
                            order_products.qty, orders.order_date, orderUsId
                ORDER BY    orders.order_date DESC";    //This is products data

        $stmt1 = $this->connect()->prepare($sql1);
        $stmt1->execute();
        return $stmt1->fetchAll();
    }

}