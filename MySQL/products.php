<?php
include "config.php";
include "styles.php";

$sql = "SELECT * FROM products";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr style='background-color: blanchedalmond;'>";
        echo "<th>V</th>";
        echo "<th>ID</th>";
        echo "<th>Product</th>";
        echo "<th>Description</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . "<input 
                                type='checkbox' 
                                method='get' 
                                onclick='chooseProduct(". $row['product_id'] .")'
                                name='checkedData'>" . "</td>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['productName'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . "<input 
                                disabled
                                type='number' 
                                name='checkedQty'
                                value='1'                                  
                                id='qty". $row['product_id'] ."'
                                onclick='chooseQty(". $row['product_id'] .")'
                                style='width:60px;'
                                min='1'>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "No records matching";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<form method="post" action="orderPage.php">
    <input type="hidden" id="checkedData" name="checkedData[]"/>
    <input type="hidden" id="checkedQty" name="checkedQty[]"/>
    <button id='myCheck' onclick="chooseQty(<?php $row['product_id'] ?>)">Order</button>
</form>

<script>
    const checkedProductIds = {};
    const checkedQty = {};

    function chooseQty(id) {
        const qtyInput = document.getElementById(`qty${id}`);
        checkedProductIds[id] = qtyInput.value;

        const hiddenInputChecked = document.getElementById('checkedData');
        const hiddenInputQty = document.getElementById('checkedQty');

        hiddenInputChecked.value = JSON.stringify(Object.keys(checkedProductIds));
        hiddenInputQty.value = JSON.stringify(Object.values(checkedProductIds));
    }

    function chooseProduct(id) {
        const qtyInput = document.getElementById(`qty${id}`);
        if (Object.keys(checkedProductIds).includes(id.toString())) {
            delete checkedProductIds[id];
            qtyInput.disabled = true;
            return;
        }
        qtyInput.disabled = false;
        checkedProductIds[id] = 1;
    }

</script>
