<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product orders</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<header style="background: antiquewhite; text-align: center"><h1>MySQL</h1></header>

<form method="post">
    <div style="width: 100%; display: flex; flex-direction: row; justify-content: flex-start; align-items: center;">
        <h2>Products</h2>
        <h3 style="margin: 0 10px 0 40px;">You can insert a new product : </h3>
        <button formaction="prodIns.php">Insert</button>
    </div>
</form>

<div >
    <?php require("products.php"); ?>
</div>
<form>
    <div style="width: 100%; display: flex; flex-direction: row; justify-content: flex-start; align-items: center;">
        <h3>To see all of orders click 'View' button: </h3>
        <button formaction="orders.php" style="margin-left: 10px;">View</button>
    </div>
</form>


</body>
</html>