<?php
include_once '../connections/checkedProducts.conn.php';
?>

<title>Order</title>

<?php $productsObj = new Products();
$products = $productsObj->showCheckedProducts($data); ?>

<table>
        <tr style="background-color: blanchedalmond;">
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    <?php
        $qtyNum = 0;
        $sum = 0; ?>
    <?php foreach ($products as $row) : ?>
        <tr>
            <td><?php echo $row['product_id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $qty[$qtyNum] ?></td>
            <?php $total = $row['price'] * $qty[$qtyNum++]; ?>
            <td><?php echo $total ?></td>
        </tr>
        <?php
           $sum += $total;
        ?>

    <?php endforeach; $_SESSION['total'] = $sum;?>

</table>

<form method="post" >
    <label>First Name</label>
    <input type="text" name="first_name"></p>
    <p>
        <label>Last Name</label>
        <input type="text" name="last_name"></p>
    <p>
        <label>Email</label>
        <input type="email" name="email"></p>

    <button formaction="../index.php">Cancel</button>
    <button formaction="../connections/userInsert.php">Order</button>
</form>
