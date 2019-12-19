<?php

include "config.php";

$productName = filter_input(INPUT_POST, 'productName');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price');

if (!empty($productName)){
    if (!empty($description)){
        if (!empty($price)){
                $sql = "INSERT INTO products (productName, description, price)
                        VALUES ('$productName', '$description', '$price')";
                if ($conn->query($sql)){
                    echo "New record is inserted successfully";
                }
                $conn->close();
            }
        }
        else{
            echo "price should not be empty";
            die();
        }
}
else{
    echo "product name should not be empty";
    die();
}

?>

<form method="post">
    <button formaction="index.php">HOME</button>
</form>
