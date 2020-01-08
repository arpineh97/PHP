<?php
include_once '../classes/dbh.class.php';
include_once '../classes/orders.class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
</head>

<body>

<?php
    $ordersObj = new Orders();
    $users = $ordersObj -> usersData();
    $products = $ordersObj -> productsData();
?>
<?php foreach ($users as $row2) : ?>
    <div style='width: 43%; display: flex; flex-direction: row; justify-content: flex-start;
                align-items: center; background-color: lavender;margin: auto'>
        <h2><?php echo $row2['first_name'] . "\t" . $row2['last_name'] . "'s order was done in " ?> </h2>
        <h2 style='margin-left: 0.5%'><?php echo $row2['order_date'] . ". " ?></h2>
    </div>
    <table style='margin: auto'>
        <tr style="background-color: blanchedalmond;">
            <th>N</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php $qtyNum = 0; ?>

        <?php foreach ($products as $row) : ?>
            <?php if ($row2['userUsId'] == $row['orderUsId']) : ?>
            <?php $qtyNum++; ?>
            <tr>
                <td><?php echo $qtyNum ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['qty'] ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table><br>
    <h3 style='margin-left: 50%'>Total cost of purchases: <?php echo $row2['total'] ?></h3>
<?php endforeach; ?>

<form>
    <button formaction="../index.php">Back</button>
</form

</body>
</html>