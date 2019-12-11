<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$inputtedNumberErr = '';
$inputtedNumber = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST["inputtedNumber"]) and !is_numeric($inputtedNumber)) {
        $inputtedNumberErr = 'Մուտքագրեք քանակ';
    }
}

function generator ($length, $choice)
{
    $text = "";
    $text1 = "";
    $numbers = range(0, 9);
    $letters = array_merge(range('A','Z'), range('a','z'));

    if ($choice == "numbers") {
        for ($i = 0; $i < $length; $i++) {
                $text .= array_rand($numbers, 1);
            }
    } elseif ($choice == "letters") {
        for ($i = 0; $i < $length; $i++){
             $text .= $letters[rand(0, 51)];
         }
    } elseif ($choice == "numbers and letters") {
        for ($i = 0; $i < $length; $i++) {
            if($i % 2 == 0) {
                $text1 .= $numbers[rand(0, 9)];
            } else {
                $text1 .= $letters[rand(0, 51)];
            }
            $text = str_shuffle($text1);
        }
    }
    return $text;
}

function check ($text)
{
    array_chunk((array)$text, 1);
    $num = [];
    $lett = [];
    for ($i = 0; $i < strlen($text); $i++) {
        if (is_numeric($text[$i])) {
            array_push($num, $text[$i]);
        } else {
            array_push($lett, $text[$i]);
        }
    }
    return [$num, $lett];
}
if (isset($_POST['choice'])) {
    if(isset($_POST['inputtedNumber'])){
        echo "<h2>Գեներացված տեքստը՝</h2>";
        $generatedText = generator($_POST['inputtedNumber'], $_POST['choice']);
        echo $generatedText;
        echo "<br>";
        $checkedText = check($generatedText);
        echo "<br>";
        print_r($checkedText);
        echo "<br>";
    }
} else {
    null;
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Second</title>
</head>
<body>

<form method="post" action="">

    <label>
        <h4>Ներմուծեք տողի երկարությունը՝ </h4>
        <input type="text" name="inputtedNumber" placeholder="տողի երկարություն">
    </label>
    <br><br>

    <label>
        <select name="choice">
            <option value="numbers">Թվեր</option>
            <option value="letters">Տառեր</option>
            <option value="numbers and letters">Թվեր և տառեր</option>
        </select>
    </label>
    <br><br>
    <input type="submit" name="submit" value="գեներացնել">

</form>

</body>
</html>

