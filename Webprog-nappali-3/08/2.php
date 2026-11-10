<?php
    $t = [8, -5, 0, 2, -7, 9, 3];

    // 1.) emeld négyzetre és irasd ki a tömböt
    $t1 = array_map(fn($x) => $x*$x, $t);
    echo implode(", ", $t1) . "<br>";
    // 2.) mennyi a tömb összege?
    $t2 = array_sum($t);
    echo $t2 . "<br>";
    // 3.) mennyi a tömb átlaga?
    $t3 = $t2 / count($t);
    echo round($t3, 2) . "<br>";
    // 4.) melyik a legnagyobb szám?
    $t4 = max($t);
    echo $t4 . "<br>";
    // 5.) hány negatív szám van?
    $t5 = count(array_filter($t, fn($x) => $x < 0));
    echo $t5 . "<br>";
    // 6.) mi az 0 érték indexe?
    $t6 = array_find_key($t, fn($x) => $x === 0);
    echo $t6 . "<br>";
    // 7.) van-e a tömbben prímszám?
    function isPrime(int $n): bool // by GPT
    {
        if ($n < 2) {
            return false;
        }
        if ($n === 2) {
            return true;
        }
        if ($n % 2 === 0) {
            return false;
        }
        for ($i = 3; $i * $i <= $n; $i += 2) {
            if ($n % $i === 0) {
                return false;
            }
        }
        return true;
    }
    $t7 = array_any($t, "isPrime");
    echo ($t7 ? "van" : "nincs") . "<br>";
    // 8.) add meg az első negatív számot!
    $t8 = array_find($t, fn($x) => $x < 0);
    echo $t8 . "<br>";
    // 9.) írd ki a tömböt visszafelé!
    $t9 = array_reverse($t);
    echo implode(", ", $t9);
?>