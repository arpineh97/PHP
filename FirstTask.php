<?php
$random_numbers = [];
for ($random_number = 0; count($random_numbers) < rand(15,110); $random_number++){
      {
        $random_number = mt_rand(1,100);
    }
    $random_numbers[] = $random_number;
}
$result = array_unique($random_numbers);
rsort($result);
if ($result) {
    echo "<table style='width: 5%; border: 1px solid black;'>";
    foreach ($result as $key => $val) {
        $key++;
        echo "<tr style='border: 1px solid black;'>";
        echo "<td style='border: 1px solid black;'>$key</td>";
        echo "<td style='border: 1px solid black;'>$val</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>
