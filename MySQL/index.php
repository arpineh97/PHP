<?php
include_once 'classes/dbh.class.php';
include_once 'classes/products.class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<header><h1>MySQL</h1></header>

<div>
    <form method="post">
        <div style="width: 100%; display: flex; flex-direction: row; justify-content: flex-start; align-items: center;">
            <h2>Products</h2>
            <h3 style="margin: 0 10px 0 40px;">You can insert a new product : </h3>
            <button formaction="views/productInsert.view.php">Insert</button>
        </div>
    </form>
</div>

<div>
    <?php
    $productsObj = new Products();
    $products = $productsObj -> getProducts();
    ?>

    <table>

        <tr style="background-color: blanchedalmond;">
            <th>V</th>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php foreach ($products as $row) : ?>

            <tr>
                <td><input type="checkbox" onclick="chooseProduct(<?php echo  $row['product_id'] ?>)"></td>
                <td><?php echo $row['product_id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><input
                        disabled
                        type="number"
                        id="qty<?php echo $row['product_id'] ?>"
                        onchange="chooseQty(<?php echo $row['product_id'] ?>)"
                        style="width:60px;"
                        min="1"></td>
            </tr>

        <?php endforeach; ?>

    </table>

    <form method="post" action="views/orderPage.view.php">
        <input type="hidden" id="checkedData" name="checkedData[]"/>
        <input type="hidden" id="checkedQty" name="checkedQty[]"/>
        <button id="myCheck">Order</button>
    </form>
</div>

<form>
    <div style="width: 100%; display: flex; flex-direction: row; justify-content: flex-start; align-items: center;">
        <h3>To see all of orders click 'View' button: </h3>
        <button formaction="views/orders.view.php" style="margin-left: 10px;">View</button>
    </div>
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
        console.log(hiddenInputQty);
        console.log(hiddenInputChecked);
        console.log(checkedProductIds);
        console.log(id);
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

</body>
</html>