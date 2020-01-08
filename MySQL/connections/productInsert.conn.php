<?php
include_once '../classes/dbh.class.php';
include_once '../classes/products.class.php';

$productName = filter_input(INPUT_POST, 'productName');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price');
$productsObj = new Products;

if (!empty($productName)){
    if (!empty($description)){
        if (!empty($price)) {
            $productsObj -> insertProduct($productName, $description, $price);
        } else{
            echo "price should not be empty";
            die();
        }
    } else{
        echo "description should not be empty";
        die();
    }
} else{
    echo "product name should not be empty";
    die();
}

?>

<form method="post">
    <button formaction="../index.php">HOME</button>
</form>
