<?php
    $a = [8, 6, 7, 0, -3, -6, 9];

    // Task 1: return and output the array of even numbers from $a
    function isEven($x){
        return $x % 2 === 0;
    }
    $task1 = array_filter($a, "isEven");
    echo implode(",", $task1);
    echo "<br>";

    // Task 2: square the array
    $task2 = array_map(fn($x) => $x * $x, $a);
    echo implode(",", $task2);
    echo "<br>";

    // Task 3: what is the sum of the array
    $task3 = array_sum($a);
    echo $task3 . "<br>";

    // Task 4: what is the average of the array
    $task4 = $task3 / count($a);
    echo $task4 . "<br>";

    // Task 5: what is the largest number in the array
    $task5 = max($a);
    echo $task5 . "<br>";

    // Task 6: how many negative numbers are in the array
    $task6 = count(array_filter($a, fn($x) => $x < 0));
    echo $task6 . "<br>";

    // Task 7: what is the index of element 0 in the array
    $task7 = array_find_key($a, fn($x) => $x === 0);
    echo $task7 . "<br>";

    // Task 8: is there an odd number in the array (answer: yes/no)
    $task8 = array_any($a, fn($x) => $x % 2 === 1);
    echo $task8 ? "yes" : "no";
?>