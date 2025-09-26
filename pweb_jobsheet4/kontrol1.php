<?php
$grades = array(85, 92, 78, 64, 90, 75, 88, 79, 70, 96);

sort($grades);

// Remove the two lowest and two highest by skipping in loop
$total = 0;
for ($i = 2; $i < count($grades) - 2; $i++) {
    $total += $grades[$i];
    echo $grades[$i] . " ";
}

echo "<br>Total of remaining grades: " . $total;
echo "<br>Average: " . ($total / (count($grades) - 4));
?>