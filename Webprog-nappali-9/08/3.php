<?php
$students = [
["neptun" => "ABCDEF", "grade" => 4, "glasses" => true],
["neptun" => "GHIJKL", "grade" => 3, "glasses" => false],
["neptun" => "MONPQR", "grade" => 5, "glasses" => true],
["neptun" => "STUVWX", "grade" => 4, "glasses" => false],
["neptun" => "YZABCD", "grade" => 4, "glasses" => false],
];

// 1.) szemüveges hallgatók neptun kódjai ,-vel
echo implode(",", array_map(
    fn($s) => $s["neptun"],
    array_filter($students, fn($s) => $s["glasses"])
)) . "<br>";
// 2.) minden hallgató átlaga
echo array_sum(array_column($students, "grade")) / count($students) . "<br>";
// 3.) add meg az első nem-szemüveges hallgató jegyét
echo array_find($students, fn($s) => !$s["glasses"])["grade"] . "<br>";
// 4.) hány hallgató neptun kódja tartalmaz A betűt?
echo count(array_filter($students, fn($s) => str_contains($s["neptun"], "A"))) . "<br>";;
// 5.) hány szemüveges hallgató kapott 5-öst?
echo count(array_filter($students, fn($s) => $s["glasses"] && $s["grade"] === 5)) . "<br>";
?>