<?php
include "config.php";

//$sql = "SELECT 	users.first_name, users.last_name, products.productName,
//        products.price, order_products.qty,
//	   	SUM(products.price * order_products.qty) AS total, orders.order_date
//        FROM
//            users
//        INNER JOIN orders ON users.user_id = orders.user_id
//        INNER JOIN order_products ON order_products.order_id = orders.order_id
//        INNER JOIN products ON order_products.product_id = products.product_id
//
//        GROUP BY   users.first_name, users.last_name,
//                   products.productName, products.price,
//                   order_products.qty, orders.order_date
//        ORDER BY   order_date DESC";

$sql = "SELECT 	orders.order_date, users.first_name, users.last_name,
	   	SUM(products.price * order_products.qty) AS total
        FROM
            users
        INNER JOIN orders ON users.user_id = orders.user_id
        INNER JOIN order_products ON order_products.order_id = orders.order_id
        INNER JOIN products ON order_products.product_id = products.product_id
        
        GROUP BY   order_products.order_id
        ORDER BY   orders.order_date DESC";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>N</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
//        echo "<th>Product</th>";
//        echo "<th>Price</th>";
//        echo "<th>Quantity</th>";
        echo "<th>Total</th>";
        echo "<th>Order Date</th>";
        echo "</tr>";
        $qtyNum = 0;
        while ($row = mysqli_fetch_array($result)) {
            $qtyNum++;
            echo "<tr>";
            echo "<td>" . $qtyNum . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
//            echo "<td>" . $row['productName'] . "</td>";
//            echo "<td>" . $row['price'] . "</td>";
//            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "<td>" . $row['order_date'] . "</td>";
            echo "</tr>";
        }
        echo "</table><br>";
        mysqli_free_result($result);
    } else {
        echo "No records matching";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<form>
    <button formaction="index.php">Back</button>
</form>
