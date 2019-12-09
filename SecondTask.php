<?php

error_reporting(-1);

$inputedNumberErr = "";
$inputedNumber = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["inputedNumber"]) and !is_numeric($inputedNumber)) {
        $inputedNumberErr = "Մուտքագրեք քանակ";
    }
}

function generator ($length)
{
    $text = "";
    $numbers = range(0, 9);
    $letters = array_merge(range('A','Z'), range('a','z'));
    $numbers_letters = array_merge($numbers, $letters);
    $choice = (isset($_POST['choice']) ? $_POST['choice'] : null);

    for ($i = 0; $i < $length; $i++) {
        if ($choice == "numbers") {
            $text .= $numbers[rand(0, 9)];
        } elseif ($choice == "letters") {
            $text .= $letters[rand(0, 51)];
        } elseif ($choice == "numbers and letters") {
            if($i % 2 == 0) {
                $text .= $numbers[rand(0, 9)];
            } else {
                $text .= $letters[rand(0, 51)];
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
    <title>Second</title>
</head>
<body>

<form method="post" action="">

    <label>
        <input type="text" name="inputedNumber" placeholder="տողի երկարություն">
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

<?php

echo "<h2>Գեներացված տեքստը՝</h2>";
$generatedText = generator($_POST['inputedNumber']);
echo "$generatedText";
echo "<br>";
$checkedText = check($generatedText);
print_r($checkedText);
echo "<br>";

?>
