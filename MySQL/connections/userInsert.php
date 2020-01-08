<?php
session_start();
include_once '../classes/dbh.class.php';
include_once '../classes/finalInsertions.class.php';

$final = new FinalInsertion();

$firstName = filter_input(INPUT_POST, 'first_name');
$lastName = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$total = $_SESSION['total'];
$productId = $_SESSION['ids'];
$quantity = $_SESSION['quantity'];
$prLen = count($productId);
$orderDate = date('Y-m-d H:i:s');

if (!empty($firstName)) {
    if (!empty($lastName)) {
        if (!empty($email)) {
            $lastUserId = $final -> insertUser($firstName, $lastName, $email);

            if (isset($lastUserId)) {
                echo "New record in Users table is inserted successfully\n";
                $lastOrderId = $final ->insertOrders($lastUserId, $total, $orderDate);

                if (isset($lastOrderId)) {
                    echo "New record in Orders is inserted successfully\n";

                    for ($i = 0; $i < $prLen; $i++) {
                        $final ->insertOrderProducts($lastOrderId, $productId[$i], $quantity[$i]);
                    }
                    echo "New records in Order Products is inserted successfully\n";

                    echo "Your order has been successfully CONFIRMED\n";

                } else {
                    echo "Error: Second Query doesn't executed";
                    die();
                }
            } else {
                echo "Error: First Query doesn't executed";
                die();
            }
        } else {
            echo "Email should not be empty";
            die();
        }
    }
    else {
        echo "Last name should not be empty";
        die();
    }
}
else {
    echo "First name should not be empty";
    die();
}

?>

<form method="post">
    <button formaction="../index.php">HOME</button>
</form>

