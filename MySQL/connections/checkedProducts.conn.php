<?php
session_start();
include_once '../classes/dbh.class.php';
include_once '../classes/products.class.php';

if (!empty($_POST['checkedData'])) {
    if (!empty($_POST['checkedQty'])) {
        $data = [];
        $qty = [];

        $checkedData = $_POST['checkedData'];
        $checkedQty = $_POST['checkedQty'];
        echo "Selected products";
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

    } else {
        echo "You didn't choose a product. Qty";
        die();
    }
} else {
    echo "You didn't choose a product. Data";
    die();
}