<?php

$inputedNumberErr = "";
$inputedNumber = "";
$numbers = range(0, 9);
$letters = array_merge(range('A', 'Z'), range('a', 'z'));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["inputedNumber"])) {
        $inputedNumberErr = "Մուտքագրեք քանակ";
    } else {
        $inputedNumber = test_input($_POST["inputedNumber"]);
    }
    if (!is_numeric($inputedNumber)) {
        $inputedNumberErr =  "Մուտքագրեք քանակ";
    }
}

function generator ($length)
{
    $text = "";
    $numbers = range(0, 9);
    $letters = array_merge(range('A','Z'), range('a','z'));
    $numbers_letters = array_merge($numbers, $letters);

    foreach ($_GET['choice'] as $selectedOption) {
        if ($selectedOption == 1) {
            for ($i = 0; $i < $length; $i++) {
                $text .= $numbers[rand(0, 9)];
            }
        } elseif ($selectedOption == 2) {
            for ($i = 0; $i < $length; $i++) {
                $text .= $letters[rand(0, 51)];
            }
        } elseif ($selectedOption == 3) {
            for ($i = 0; $i < $length; $i++) {
                $text .= $numbers_letters[rand(0, 61)];
            }
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
        <input type="text" name="inputedNumber" , placeholder="տողի երկարություն" value="<?php echo $inputedNumber;?>">
    </label>
    <span class="error">* <?php echo $inputedNumberErr;?></span>
    <br><br>

    <label>
        <select name="choice">
            <option value="1">Թվեր</option>
            <option value="2">Տառեր</option>
            <option value="3">Թվեր և տառեր</option>
        </select>
    </label>
    <br><br>

    <input type="submit" name="submit" value="գեներացնել">

</form>

</body>
</html>

<?php


echo "<h2>Գեներացված տեքստը՝</h2>";
$generatedText = generator($inputedNumber);
echo "$generatedText";
echo "<br>";
$checkedText = check($generatedText);
echo "$checkedText[0]";
echo "$checkedText[1]";
echo "<br>";

?>


