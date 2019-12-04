<?php
$inputedTextErr = "";
$inputedText = "";
$numbers = range(0, 9);
$letters = array_merge(range('A', 'Z'), range('a', 'z'));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["inputedText"])) {
        $inputedTextErr = "Մուտքագրեք տեքստը";
    } else {
        $inputedText = test_input($_POST["inputedText"]);

        if ((!preg_match($inputedText, (string)$numbers)) ) {
            $inputedTextErr = "Միայն թվեր են թույլատրվում";
        } elseif ((!preg_match($inputedText, (string)$letters))) {
            $inputedTextErr = "Միայն տառեր են թույլատրվում";
        } elseif ((!preg_match($inputedText, (string)array_merge($numbers, $letters)))) {
            $inputedTextErr = "Միայն տառեր և թվեր են թույլատրվում";

        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check ($text) {
    array_chunk((array)$text,1);
    $num = [];
    $lett = [];
    for( $i = 0; $i < strlen($text); $i++ ) {
        if (is_numeric($text[$i])) {
            array_push($num, $text[$i]);
        }
        else {
            array_push($lett, $text[$i]);
        }
    }
    return [$num, $lett];
}



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <title>Second</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <label>
        <input type="text" name="inputedText" , placeholder="տողի երկարություն" value="<?php echo $inputedText;?>">
    </label>
    <span class="error">* <?php echo $inputedTextErr;?></span>
    <br><br>

    <label>
        <select name="choice[]">
            <option value="Թվեր">Թվեր</option>
            <option value="Տառեր">Տառեր</option>
            <option value="Թվեր և տառեր">Թվեր և տառեր</option>
        </select>
    </label>
    <br><br>

    <input type="submit" name="submit" value="գեներացնել">

</form>

</body>
</html>

<?php

echo "<h2>Տեքստը՝</h2>";
print_r(check($inputedText));
echo "<br>";

?>
