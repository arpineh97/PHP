<?php
session_start();
include "config.php";

$firstName = filter_input(INPUT_POST, 'first_name');
$lastName = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$sum = filter_input(INPUT_POST, 'sum');
$total = $_SESSION['total'];
$productId = $_SESSION['ids'];
$quantity = $_SESSION['quantity'];
$prLen = count($productId);
$orderDate = date('Y-m-d H:i:s');

if (!empty($firstName)){
    if (!empty($lastName)){
        if (!empty($email)){

            $query1 = "INSERT INTO users (first_name, last_name, email)
                    VALUES ('$firstName', '$lastName', '$email')";
            if ($conn->query($query1)){
//                echo "New record is inserted successfully";
                $lastUser_id = $conn->insert_id;
                $query2 = "INSERT INTO orders (user_id, sum, order_date)
                        VALUES ('$lastUser_id', '$total', '$orderDate')";

                if ($conn->query($query2)) {
//                    echo "New record is inserted successfully";
                    $lastOrder_id = $conn->insert_id;

                    $query3_parts = "";
                    $repl = " ";
                    $query3 = "INSERT INTO order_products (order_id, product_id, qty) VALUES";
                    for ($i = 0; $i < $prLen; $i++) {
                        $query3_parts .= "('" . $lastOrder_id . "', '" . $productId[$i] . "', '" . $quantity[$i] . "'),";
                    }
                        $parts = rtrim($query3_parts, ",");
                        $query3 .= $parts;

                    if ($conn->query($query3)){
                        echo "Your order has been successfully CONFIRMED";
                    } else {
                        echo "Error: ". $query3 ." ". $conn->error;
                    }
                } else{
                    echo "Error: ". $query2 ." ". $conn->error;
                }
            } else{
                echo "Error: ". $query1 ." ". $conn->error;
            }
            $conn->close();
        } else{
              echo "Email should not be empty";
              die();
          }
    }
    else{
        echo "Last name should not be empty";
        die();
    }
}
else{
    echo "First name should not be empty";
    die();
}

?>

<form method="post">
    <button formaction="index.php">HOME</button>
</form>