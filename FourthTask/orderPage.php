<?php
session_start();
include "config.php";


if (!empty($_POST['checkedData'])) {
    if (!empty($_POST['checkedQty'])) {
        echo "<h3>You choose the following product(s): </h3>";
            $data = [];
            $qty = [];

            $checkedData = $_POST['checkedData'];
            $checkedQty = $_POST['checkedQty'];

                $stringData = str_replace(']', "",
                            str_replace('[', "",
                                str_replace('"', "", $checkedData)));
                $stringQty = str_replace(']', "",
                            str_replace('[', "",
                                str_replace('"', "", $checkedQty)));

            $data = explode(',', $stringData[0]);
            $_SESSION['ids'] = $data;
            $qty = explode(',', $stringQty[0]);
             $_SESSION['quantity'] = $qty;
    }
} else {
    echo "You didn't choose a product.";
}

$sql = "SELECT * FROM `products` WHERE `product_id` IN (" . implode(',', array_map('intval', $data)) . ")";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Product</th>";
        echo "<th> Description </th>";
        echo "<th>Price</th>";
        echo "<th>Qty</th>";
        echo "<th>Total</th>";
        echo "</tr>";
        $qtyNum = 0;
        $sum = 0;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $qty[$qtyNum] . "</td>";
            $total = $row['price'] * $qty[$qtyNum];
            echo "<td>" . $total . "</td>";
//                echo "<td>" . $sum . "</td>";
            echo "</tr>";
            $sum += $total;
            $qtyNum++;
        } $_SESSION['total'] = $sum;
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
<title>Order</title>
<form method="post" action="usIns.php">

    First Name : <label>
        <input type="text" name="first_name">
    </label><br><br>
    Last Name : <label>
        <input type="text" name="last_name">
    </label><br><br>
    Email : <label>
        <input type="email" name="email">
    </label><br><br>
    <button formaction="index.php">Cancel</button>
    <input type="submit" name="order" value="Order">
</form>

<script>

</script>