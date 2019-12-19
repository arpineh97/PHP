<?php
include "config.php";
include "styles.php";

$sql2 = "SELECT 	users.user_id as userUsId, users.first_name, users.last_name,
	   	            SUM(products.price * order_products.qty) AS total, orders.order_date
        FROM        users
        INNER JOIN  orders ON users.user_id = orders.user_id
        INNER JOIN  order_products ON order_products.order_id = orders.order_id
        INNER JOIN  products ON order_products.product_id = products.product_id

        GROUP BY    order_products.order_id
        ORDER BY    orders.order_date DESC";    //This is user data

$sql1 = "SELECT 	orders.user_id as orderUsId, products.productName, products.price, 
                    order_products.qty, orders.order_date
        FROM        orders
        INNER JOIN  order_products ON order_products.order_id = orders.order_id
        INNER JOIN  products ON order_products.product_id = products.product_id
        GROUP BY    products.productName, products.price,
                    order_products.qty, orders.order_date, orderUsId
        ORDER BY    orders.order_date DESC" ;    //This is products data

if ($result2 = mysqli_query($conn, $sql2)) {
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_array($result2)) {
            if ($result1 = mysqli_query($conn, $sql1)) {
                if (mysqli_num_rows($result1) > 0) {
                    echo "<div style='width: 100%; display: flex; flex-direction: row; 
                            justify-content: flex-start; align-items: center;'>
                         <h2>" . $row2['first_name'] . "\t" . $row2['last_name'] . "'s order was done in " .
                        "</h2>" . "<h2 style='margin: 0 10px 0 40px;'>" . $row2['order_date'] . "</h2>" .
                        "</div>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>N</th>";
                    echo "<th>Product</th>";
                    echo "<th>Price</th>";
                    echo "<th>Quantity</th>";
                    echo "</tr>";
                    $qtyNum = 0;
                    while ($row = mysqli_fetch_array($result1)) {
                        if ($row2['userUsId'] == $row['orderUsId']) {
                            $qtyNum++;
                            echo "<tr>";
                            echo "<td>" . $qtyNum . "</td>";
                            echo "<td>" . $row['productName'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['qty'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table><br>";
                    echo "<h3>" . "And Total price is: " . $row2['total'] . "</h3>";

                } else {
                    echo "No records matching";
                }
            }
        }
    } else {
        echo "No records matching";
    }
} else {
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<form>
    <button formaction="index.php">Back</button>
</form>
