<?php
$random_numbers = [];
while(count($random_numbers) < 103){
      {
        $random_number = mt_rand(1,100);
    }
    $random_numbers[] = $random_number;
}

var_dump($random_numbers);

$result = array_unique($random_numbers);
rsort($result);

if (count($result)) {
    echo "<table style='width: 5%; border: 1px solid black;'>";
    foreach ($result as $key => $val) {

        echo "<tr style='border: 1px solid black;'>";
        echo "<td style='border: 1px solid black;'>$key</td>";
        echo "<td style='border: 1px solid black;'>$val</td>";
        echo "</tr>";
    }

    echo "</table>";
}

